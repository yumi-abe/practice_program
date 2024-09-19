<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CastCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'cast_name',
        'gender',
        'types',
        'age',
        'character',
        'main_image_path',
        'sub_image_path',
    ];

    public function ReserveForm()
    {
        return $this->hasMany(ReserveForm::class);
    }
}
