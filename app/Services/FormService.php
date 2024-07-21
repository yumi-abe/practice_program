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
        if (Auth::id() !== $reserve->user_id){
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

}

?>