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
                    'user_id' => 1, // 'user_id' => '1
                    'username' => 'sojita',
                    'email' => 'sojita2004@hotmail.com',
                    'password' => Hash::Make('olvidate'),
                    'role' => 'admin',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    "user_id" => 2, // "user_id" => "2
                    'username' => 'LucasM',
                    'email' => 'user@user.com',
                    'password' => Hash::Make('olvidate'),
                    'role' => 'user',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    "user_id" => 3, // "user_id" => "2
                    'username' => 'PedroC',
                    'email' => 'user2@user2.com',
                    'password' => Hash::Make('olvidate'),
                    'role' => 'user',
                    'created_at' => now(),
                    'updated_at' => now(),
                ], 
                [
                    "user_id" => 4, // "user_id" => "2
                    'username' => 'RominaM',
                    'email' => 'user3@user3.com',
                    'password' => Hash::Make('olvidate'),
                    'role' => 'user',
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            ]
        );
    }
}