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
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'id' => '1',
                'name' => 'test1',
                'phone' => '08012345678',
                'email' => 'test1@test.com',
                'password' => Hash::make('password123'),
            ],
            [
                'id' => '2',
                'name' => 'test2',
                'phone' => '09012345678',
                'email' => 'test2@test.com',
                'password' => Hash::make('password123'),
            ],
            [
                'id' => '3',
                'name' => 'test3',
                'phone' => '09087654321',
                'email' => 'test3@test.com',
                'password' => Hash::make('password123'),
            ],
            [
                'id' => '4',
                'name' => 'test4',
                'phone' => '08087654321',
                'email' => 'test4@test.com',
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