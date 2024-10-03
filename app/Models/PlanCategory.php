<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'plan_name',
        'weekday_price',
        'holiday_price',
    ];

    public function ReserveForm()
    {
        return $this->hasMany(ReserveForm::class);
    }
}
