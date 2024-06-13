<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class ReserveForm extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'plan_category_id',
        'cast_category_id',
        'date',
        'message',

    ];

    // protected $casts = [
    //     'date' => 'datetime:Y-m-d',
    // ];

    // public function getFormattedDateAttribute()
    // {
    //     return $this->date ? $this->date->format('Y-m-d H:i') : null;
    // }

    
    public function planCategory()
    {
        return $this->belongsTo(PlanCategory::class);
    }

    public function castCategory()
    {
        return $this->belongsTo(CastCategory::class);
    }
}
