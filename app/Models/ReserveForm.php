<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\User;
use Illuminate\Database\Eloquent\Casts\Attribute; //アクセサ
use Illuminate\Database\Eloquent\SoftDeletes;


class ReserveForm extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'email',
        'plan_category_id',
        'cast_category_id',
        // 'date',
        'start_date',
        'end_date',
        'message',
        'user_id',

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

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    protected function startTime(): Attribute
    {
        return new Attribute(
            get: fn() => Carbon::parse($this->start_date)->format('H時i分')
        );
    }

    protected function endTime(): Attribute
    {
        return new Attribute(
            get: fn() => Carbon::parse($this->end_date)->format('H時i分')
        );
    }

    protected function editEventDate(): Attribute
    {
        return new Attribute(
            get: fn() => Carbon::parse($this->start_date)->format('Y-m-d')
        );
    }
}
