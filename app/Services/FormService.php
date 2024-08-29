<?php

namespace App\Services;

use App\Models\ReserveForm;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;



class FormService
{
    public static function formatDate($reserveForms)
    {


        foreach ($reserveForms as $reserveForm) {
            $reserveForm->formated_Date = Carbon::parse($reserveForm->start_date)->format('Y年m月d日');
            $reserveForm->formated_startDate = Carbon::parse($reserveForm->start_date)->format('Y年m月d日 H:i');
            $reserveForm->formated_startTime = Carbon::parse($reserveForm->start_date)->format('H:i');
            $reserveForm->formated_endDate = Carbon::parse($reserveForm->end_date)->format('H:i');
        }

        return $reserveForms;
    }

    public static function CheckAccess($id)
    {
        $reserve = ReserveForm::find($id);

        // 予約が存在しない場合、404エラーページを表示
        if (!$reserve) {
            abort(404, 'このページは存在しません。');
        }

        //他のユーザーがURLを直接入力しても見れないように
        if (Auth::id() !== $reserve->user_id) {
            abort(403, 'このページは存在しません。');
        }

        return $reserve;
    }

    public static function joinDateAndTime($date, $time)
    {
        $join = $date . " " . $time;
        return Carbon::createFromFormat('Y-m-d H:i', $join);
        // return $dataTime;
    }

    public function createReservation($request)
    {
        // トランザクションを開始
        DB::beginTransaction();

        try {
            //重複する予約がないかチェック
            $events = DB::table('reserve_forms')
                ->where(function ($query) use ($request) {
                    $query->where('cast_category_id', '=', $request->cast_category)
                        ->where('start_date', '<', $request->end_time)
                        ->where('end_date', '>', $request->start_time);
                })
                ->get()
                ->toArray();


            if (!empty($events)) {
                session()->flash('error', 'この時間帯は既に他の予約が存在します。');
                return to_route('user.booking.create');
            }

            // $now = Carbon::now();
            // foreach ($events as $event) {
            //     if ($event->start_time > $now) {
            //         session()->flash('error', '過去の時間は予約できません。');
            //     }
            // }

            // 重複がない場合、予約を登録
            ReserveForm::create([
                'name' => $request->name,
                'email' => $request->email,
                'plan_category_id' => $request->plan_category,
                'cast_category_id' => $request->cast_category,
                // 'date' => $request->date,
                'start_date' => $request->start_time,
                'end_date' => $request->end_time,
                'message' => $request->message,
                'user_id' => Auth::id(), //ログインしているユーザーID
            ]);

            // トランザクションをコミット
            DB::commit();

            session()->flash('status', '予約完了しました。');
            return to_route('user.booking.index');
        } catch (\Exception $e) {
            DB::rollBack();
            session()->flash('error', '予約に失敗しました。');
        }
    }

    public function updateReservation($request, $reserve)
    {
        // トランザクションを開始
        DB::beginTransaction();

        try {
            // 重複する予約がないかチェック
            $events = DB::table('reserve_forms')
                ->where(function ($query) use ($request) {
                    $query->where('cast_category_id', '=', $request->cast_category)
                        ->where('start_date', '<', $request->end_time)
                        ->where('end_date', '>', $request->start_time);
                })
                ->get()
                ->toArray();

            $check = false;
            foreach ($events as $event) {
                if ($event->id !== $reserve->id) {
                    $check = true;
                    break;
                }
            }

            if ($check) {
                session()->flash('error', 'この時間帯は既に他の予約が存在します。');
                return to_route('user.booking.edit', ['id' => $reserve->id]);
            }

            // 重複がない場合、予約を更新
            $reserve->name = $request->name;
            $reserve->email = $request->email;
            $reserve->plan_category_id = $request->plan_category;
            $reserve->cast_category_id = $request->cast_category;
            $reserve->start_date = $request->start_time;
            $reserve->end_date = $request->end_time;
            $reserve->message = $request->message;
            $reserve->save();

            // トランザクションをコミット
            DB::commit();

            session()->flash('status', '予約日時の変更が完了しました。');
            return to_route('user.booking.index');
        } catch (\Exception $e) {
            DB::rollBack();
            session()->flash('error', '予約に失敗しました。');
            return to_route('user.booking.edit', ['id' => $reserve->id]);
        }
    }
}
