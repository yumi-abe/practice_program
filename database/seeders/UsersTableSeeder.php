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
                'name' => 'test',
                'email' => 'test@test.com',
                'password' => Hash::make('password123'),
            ],
            [
                'id' => '2',
                'name' => 'test2',
                'email' => 'test2@test.com',
                'password' => Hash::make('password123'),
            ],
            [
                'id' => '3',
                'name' => 'test3',
                'email' => 'test3@test.com',
                'password' => Hash::make('password123'),
            ],
            [
                'id' => '4',
                'name' => 'test4',
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