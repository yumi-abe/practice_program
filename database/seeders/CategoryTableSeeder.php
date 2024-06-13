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
            ],
            [
                'plan_name' => '60分コース',
            ],
            [
                'plan_name' => 'フリータイム',
            ],
        ]);

        DB::table('cast_categories')->insert([
            [
                'cast_name' => 'あんこ',
            ],
            [
                'cast_name' => 'おもち',
            ],
            [
                'cast_name' => 'きなこ',
            ],
        ]);
    }
}
