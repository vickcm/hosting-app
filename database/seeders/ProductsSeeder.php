<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Para interactuar con las tablas, vamos a usar la clase DB de Laravel, que nos da acceso al
        // "Query Builder".
        DB::table('products')->insert([
            [
             
                'title' => 'titulo 1',
                'subtitle' => 'subtitulo 1',
                'description' => 'descripción 1',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
             
                'title' => 'titulo 2',
                'subtitle' => 'subtitulo 2',
                'description' => 'descripción 2',
                'created_at' => now(),
                'updated_at' => now(),
            ]
         
        ]);
    }
}
