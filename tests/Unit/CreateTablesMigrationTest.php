<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schema;


class CreateTablesMigrationTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_example(): void
    {
        $this->assertTrue(true);
    }

    use RefreshDatabase;

    public function test_tables_are_created()
    {
        // Ejecutar todas las migraciones
        Artisan::call('migrate');

        // Verificar que las tablas existen en la base de datos
        $this->assertTrue(Schema::hasTable('authors'));
        $this->assertTrue(Schema::hasTable('categories'));
        $this->assertTrue(Schema::hasTable('posts'));
        $this->assertTrue(Schema::hasTable('products'));
        $this->assertTrue(Schema::hasTable('users'));
        $this->assertTrue(Schema::hasTable('users_has_products'));
        $this->assertTrue(Schema::hasTable('profiles'));
        // Finalmente, verifica que todas las aserciones fueron exitosas
        $this->assertTrue(true, 'Todas las tablas se crearon correctamente');
    }

    // 

    
}
