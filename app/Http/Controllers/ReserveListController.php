<?php

namespace App\Http\Controllers;

use App\Models\ReserveForm;
use App\Services\FormService;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReserveListController extends Controller
{
    public function index()
    {
        $today = Carbon::today();

        $reserveForms = ReserveForm::orderBy('start_date', 'asc')
            ->whereDate('start_date', '>', $today)
            ->paginate(5);
        FormService::formatDate($reserveForms);

        return view('reserve-list.index', compact('reserveForms'));
    }

    public function past()
    {
        $today = Carbon::today();

        $pastReserveForms = ReserveForm::orderBy('start_date', 'desc')
            ->whereDate('start_date', '<', $today)
            ->paginate(5);
        FormService::formatDate($pastReserveForms);

        return view('reserve-list.past', compact('pastReserveForms'));
    }

    public function cancel()
    {

        $cancelReservations = ReserveForm::onlyTrashed()
            ->orderBy('start_date', 'desc')
            ->paginate(5);
        FormService::formatDate($cancelReservations);

        return view('reserve-list.cancel', compact('cancelReservations'));
    }


    public function show($id)
    {
        $reserve = ReserveForm::withTrashed()->find($id);
        $reserve->formated_date = Carbon::parse($reserve->start_date)->format('Y年m月d日');
        $reserve->formated_startTime = Carbon::parse($reserve->start_date)->format('H:i');
        $reserve->formated_endDate = Carbon::parse($reserve->end_date)->format('H:i');

        $today = Carbon::today()->format('Y年m月d日');
        $date = Carbon::parse($reserve->editEventDate)->format('Y年m月d日');

        return view('reserve-list.show', compact('reserve', 'today', 'date'));
    }

    public function destroy($id)
    {
        ReserveForm::findOrFail($id)->delete(); //ソフトデリート

        session()->flash('status', 'キャンセルが完了しました');
        return to_route('owner.reserve-list.index');
    }
}
