<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use phpDocumentor\Reflection\Types\This;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(TagsSeeder::class);
        $this->call(AuthorsSeeder::class);
        $this->call(CategoriesSeeder::class);
        $this->call(PostsSeeder::class);
        $this->call(ProductsSeeder::class);
        $this->call(UsersSeeder::class);
    }
}