<?php

namespace App\Services;

use App\Models\ReserveForm;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;



class FormService
{
    // public static function formatDate($reserveForms){


    //     foreach ($reserveForms as $reserveForm) {
    //         return $reserveForm->formated_date = Carbon::parse($reserveForm->date)->format('Y-m-d H:i');
    //     }
    // }

    public static function CheckAccess($id)
    {
        $reserve = ReserveForm::find($id);

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
}
