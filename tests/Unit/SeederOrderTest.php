<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;


class SeederOrderTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_example(): void
    {
        $this->assertTrue(true);
    }

    use RefreshDatabase;

    public function test_seeders_are_in_correct_order()
    {
        // Ejecutar la migración sin errores
        $this->artisan('migrate');

        // Ejecutar los seeders en el orden especificado
        $this->artisan('db:seed', ['--class' => 'AuthorsSeeder']);
        $this->artisan('db:seed', ['--class' => 'CategoriesSeeder']);
        $this->artisan('db:seed', ['--class' => 'PostsSeeder']);
        $this->artisan('db:seed', ['--class' => 'ProductsSeeder']);
        $this->artisan('db:seed', ['--class' => 'UsersSeeder']);
        $this->artisan('db:seed', ['--class' => 'UsersHasProductsSeeder']);
        $this->artisan('db:seed', ['--class' => 'ProfilesSeeder']);

        // Verificar que la ejecución de los seeders no lanzó excepciones
        $this->assertTrue(true);
    }
}
