<?php

namespace App\Http\Controllers;

use App\Models\CastCategory;
use App\Models\PlanCategory;
use App\Models\User;
use App\Services\FormService;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreFormRequest;
use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;
use App\Models\ReserveForm;
use Carbon\Carbon;

class BookingController extends Controller
{
    public function index()
    {
        //ログイン中のIDを取得
        $user_id = Auth::id();

        // ログインIDに基づいて予約フォームデータを取得
        $reserveForms = ReserveForm::where('user_id', $user_id)
            // ->with(['planCategory', 'castCategory'])
            ->orderBy('start_date', 'desc')
            ->get();

        // dd($reserveForms);

        // 日付をフォーマットする（秒なし）
        foreach ($reserveForms as $reserveForm) {
            $reserveForm->formated_startDate = Carbon::parse($reserveForm->start_date)->format('Y年n月j日 H:i');
            $reserveForm->formated_endDate = Carbon::parse($reserveForm->end_date)->format('H:i');
        }
        return view('booking.index', compact('reserveForms'));
    }

    public function create()
    {
        //ログイン中のユーザーの情報を取得（userテーブルのid,名前,メールアドレス）
        $users = User::where('id', Auth::id())
            ->select('id', 'name', 'email')
            ->get();

        // プラン、キャストカテゴリIDのクエリを準備する
        $castsQuery = CastCategory::whereIn('id', range(1, 10)); // 1から10までのIDに対応する行を取得したい場合
        $plansQuery = PlanCategory::whereIn('id', range(1, 10));

        // 上記のIDに対応する行のidをキー、nameを値とする配列を取得
        $casts = $castsQuery->pluck('cast_name', 'id');
        $plans = $plansQuery->pluck('plan_name', 'id');

        // dd($casts);

        return view('booking.create', compact('casts', 'plans', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    protected $formService;

    public function __construct(FormService $formService)
    {
        $this->formService = $formService;
    }
    public function store(StoreFormRequest $request)
    {

        $result = $this->formService->createReservation($request);

        return $result;
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

        $planId = $reserve->plan_category_id;
        $castsId = $reserve->cast_category_id;

        // プラン、キャストカテゴリIDのクエリを準備する
        $castsQuery = CastCategory::whereIn('id', range(1, 10)); // 1から10までのIDに対応する行を取得したい場合
        $plansQuery = PlanCategory::whereIn('id', range(1, 10));

        // 上記のIDに対応する行のidをキー、nameを値とする配列を取得
        $plans = $plansQuery->pluck('plan_name', 'id');
        $casts = $castsQuery->pluck('cast_name', 'id');

        $plansId = $plans[$reserve->plan_category_id];
        $castsId = $casts[$reserve->cast_category_id];

        $date = Carbon::parse($reserve->editEventDate)->format('Y年m月d日');

        // dd($casts, $plans, $plansId, $castsId);

        return view('booking.show', compact('reserve', 'plansId', 'castsId', 'date'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //ログイン中のIDを取得
        $user_id = Auth::id();


        $reserve = FormService::CheckAccess($id);

        $reserve->formated_startDate = Carbon::parse($reserve->start_date)->format('Y年n月j日 H:i');
        $reserve->formated_endDate = Carbon::parse($reserve->end_date)->format('H:i');

        return view('booking.edit', compact('reserve',));
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

        $result = $this->formService->updateReservation($request, $reserve);

        return $result;
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

        return to_route('user.booking.index');
    }
}
