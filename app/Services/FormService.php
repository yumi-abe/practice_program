<?php

namespace App\Services;

class FormService
{
    public static function formatDate($reserveForms){


        foreach ($reserveForms as $reserveForm) {
            return $reserveForm->formated_date = Carbon::parse($reserveForm->date)->format('Y-m-d H:i');
        }
    }

}

?>