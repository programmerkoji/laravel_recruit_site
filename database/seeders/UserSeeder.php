<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
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
                'name' => 'テスト太郎',
                'email' => 'test_user@test.com',
                'password' => Hash::make('password1234'),
            ],
            [
                'name' => 'テスト次郎',
                'email' => 'test_user02@test.com',
                'password' => Hash::make('password1234'),
            ]
        ]);
    }
}
