<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class OwnersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Ownerテーブルにユーザーのデータを挿入。
     * ID、メールアドレス、ハッシュ化されたパスワード
     * @return void
     */
    public function run()
    {
        DB::table('owners')->insert([
            [
                'id' => '1',
                'name' => 'owner_test',
                'email' => 'owner_test@test.com',
                'password' => Hash::make('password123'),
            ],
        ]);
    }
}
