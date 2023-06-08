<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;



class AuthorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('authors')->insert(
        [ 
            [
                'author_id' => 1,
                'name' => 'Pedro Díaz',
                'email' => 'pdiaz@nubeweb.com',
                'created_at' => now(),
                'updated_at' => now(),
            ], 
            [
                'author_id' => 2,
                'name' => 'Lucas García',
                'email' => 'lgarcia@nubeweb.com',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}