<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('plan_categories')->insert([
            [
                'plan_name' => '30分コース',
                'weekday_price' => '600',
                'holiday_price' => '800',
            ],
            [
                'plan_name' => '60分コース',
                'weekday_price' => '1000',
                'holiday_price' => '1200',
            ],
            [
                'plan_name' => 'フリータイム',
                'weekday_price' => '2000',
                'holiday_price' => '2400',
            ],
        ]);

        DB::table('cast_categories')->insert([
            [
                'cast_name' => 'あんこ',
                'gender' => '1',
                'types' => 'エキゾチックショートヘア',
                'age' => '4',
                'character' => '好奇心旺盛、食いしん坊',
                'main_image_path' => 'images/uf9ENIkCRNmEEMLDilk6AiUV40VNhqu1D5lbIiDT.png',
                'sub_image_path' => 'images/3o1pTOYNVR602jsBpdhsln3S9yEti4jMZNV46lOt.jpg',
            ],
            [
                'cast_name' => 'おもち',
                'gender' => '2',
                'types' => 'ペルシャ',
                'age' => '5',
                'character' => 'おとなしい、ビビり',
                'main_image_path' => 'images/Vgag2NhJnNcT0OAnWkNZ1sfmZAQWzfdLWbifvGmK.png',
                'sub_image_path' => 'images/GcGjKS1fInKkyTvyadOmDKT5rE1G9Nw0q4kt9ZGS.jpg',
            ],
            [
                'cast_name' => 'きなこ',
                'gender' => '2',
                'types' => '雑種',
                'age' => '3',
                'character' => 'メンヘラ、甘えん坊',
                'main_image_path' => 'images/jIizBglATziD0DfBKBkZfS87PuydtvPwHHwVBMpJ.png',
                'sub_image_path' => 'images/ObxLeQ71kOKQ3T8vOLJzU0Ql4yjUa8a2GnvIyoUy.jpg',
            ],
        ]);
    }
}
