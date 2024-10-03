<?php

namespace App\Models;

use Carbon\Carbon;
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

    /**
     * キャストの作成日が現在日付から3日以内かどうかを判定。
     * 3日以内の場合はtrue,それ以外の場合はfalseを返す。
     * 使用例）キャストが新規登録された際に「new」をつける
     * 
     * @return bool
     */
    public function isNew()
    {
        return $this->created_at->gt(Carbon::now()->subDays(3));
    }
}
