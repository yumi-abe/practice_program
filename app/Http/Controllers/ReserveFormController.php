<?php

namespace App\Http\Controllers;

use App\Models\CastCategory;
use App\Models\PlanCategory;
use App\Models\User;
use App\Services\FormService;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreFormRequest;

use Illuminate\Http\Request;
use App\Models\ReserveForm;
use Carbon\Carbon;

class ReserveFormController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //ログイン中のIDを取得
        $user_id = Auth::id();

        // ログインIDに基づいて予約フォームデータを取得
        $reserveForms = ReserveForm::where('user_id', $user_id)
                        ->with(['planCategory', 'castCategory'])
                        ->get();

        // $reserveForms = ReserveForm::with(['planCategory', 'castCategory'])
        // ->get();FormatDate

        // 日付をフォーマットする（秒なし）
        foreach ($reserveForms as $reserveForm) {
             $reserveForm->formated_date = Carbon::parse($reserveForm->date)->format('Y-m-d H:i');
        }


        // $format_date = FormService::formatDate($reserveForms);

        // dd($format_date);

        return view('forms.index', compact('reserveForms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //ログイン中のユーザーの情報を取得（userテーブルのid,名前,メールアドレス）
        $users = User::where('id', Auth::id())
        ->select('id', 'name', 'email')
        ->get();
        // dd($users);

        // プラン、キャストカテゴリIDのクエリを準備する
        $castsQuery = CastCategory::whereIn('id', range(1, 10)); // 1から10までのIDに対応する行を取得したい場合
        $plansQuery = PlanCategory::whereIn('id', range(1, 10)); 

        // 上記のIDに対応する行のidをキー、nameを値とする配列を取得
        $casts = $castsQuery->pluck('cast_name', 'id');
        $plans = $plansQuery->pluck('plan_name', 'id');

        // dd($casts);

        return view('forms.create', compact('casts','plans', 'users'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFormRequest $request)
    {
        $startDate = FormService::joinDateAndTime($request['event_date'], $request['start_time']);

        $endDate = FormService::joinDateAndTime($request['event_date'], $request['end_time']);

        ReserveForm::create([
            'name' => $request->name,
            'email' => $request->email,
            'plan_category_id' => $request->plan_category,
            'cast_category_id' => $request->cast_category,
            // 'date' => $request->date,
            'start_date' => $startDate,
            'end_date' => $endDate,
            'message' => $request->message,
            'user_id' => Auth::id(), //ログインしているユーザーID
        ]);

        return to_route('user.forms.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $reserve = FormService::CheckAccess($id);

        $planId = $reserve->plan_category_id ;
        $castsId = $reserve->cast_category_id ;

        // プラン、キャストカテゴリIDのクエリを準備する
        $castsQuery = CastCategory::whereIn('id', range(1, 10)); // 1から10までのIDに対応する行を取得したい場合
        $plansQuery = PlanCategory::whereIn('id', range(1, 10)); 

        // 上記のIDに対応する行のidをキー、nameを値とする配列を取得
        $plans = $plansQuery->pluck('plan_name','id');
        $casts = $castsQuery->pluck('cast_name','id');

        $plansId = $plans[$reserve->plan_category_id];
        $castsId = $casts[$reserve->cast_category_id];

        $date = Carbon::parse($reserve->editEventDate)->format('Y年m月d日');

        // dd($casts, $plans, $plansId, $castsId);

        return view('forms.show', compact('reserve', 'plansId', 'castsId', 'date'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $reserve = FormService::CheckAccess($id);
        
        return view('forms.edit', compact('reserve',));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreFormRequest $request, $id)
    {
        $reserve = FormService::CheckAccess($id);

        $startDate = FormService::joinDateAndTime($request['event_date'], $request['start_time']);

        $endDate = FormService::joinDateAndTime($request['event_date'], $request['end_time']);

        $reserve->name = $request->name;
        $reserve->email = $request->email;
        $reserve->plan_category_id = $request->plan_category;
        $reserve->cast_category_id = $request->cast_category;
        // $reserve->date = $request->date;
        $reserve->start_date = $startDate;
        $reserve->end_date = $endDate;
        $reserve->message = $request->message;
        $reserve->save();

        session()->flash('status', '更新しました');

        return to_route('user.forms.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reserve = FormService::CheckAccess($id);
        
        $reserve->delete();

        return to_route('user.forms.index');
    }
}
