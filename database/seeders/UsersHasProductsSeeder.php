<?php
namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersHasProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('users_has_products')->insert([
            [
                'user_id' => 2,
                'product_id' => 1,
                'price_paid' => 1250,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 3,
                'product_id' => 2,
                'price_paid' => 2250,
                'created_at' => now(),
                'updated_at' => now(),
            ], 
            [
                'user_id' => 3,
                'product_id' => 1,
                'price_paid' => 1250,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}