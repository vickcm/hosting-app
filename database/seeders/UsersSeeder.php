<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert(
            [
                [
                    'username' => 'sojita',
                    'email' => 'sojita2004@hotmail.com',
                    'password' => Hash::Make('olvidate'),
                    'role' => 'admin',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'username' => 'user',
                    'email' => 'user@user.com',
                    'password' => Hash::Make('user'),
                    'role' => 'user',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            ]
        );
    }
}
