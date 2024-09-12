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
        // dd($reserveForms);



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
}
