<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;



class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * userテーブルにサンプルユーザーのデータを挿入。
     * ID、名前、電話番号、メールアドレス、ハッシュ化されたパスワード
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'id' => '101',
                'name' => '田中 太郎',
                'phone' => '08011112222',
                'email' => 'tanaka@test.com',
                'password' => Hash::make('password123'),
            ],
            [
                'id' => '102',
                'name' => '山田 花子',
                'phone' => '09022223333',
                'email' => 'yamada@test.com',
                'password' => Hash::make('password123'),
            ],
            [
                'id' => '103',
                'name' => '佐藤 二郎',
                'phone' => '08033332222',
                'email' => 'satou@test.com',
                'password' => Hash::make('password123'),
            ],
        ]);
    }
}
// $table->string('email')->unique();
// $table->timestamp('email_verified_at')->nullable();
// $table->string('password');
// $table->rememberToken();
// $table->timestamps();