<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Support\Facades\DB;


class DatabaseConnectionTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_example(): void
    {
        $this->assertTrue(true);
    }

    public function test_database_connection()
    {
        try {
            DB::connection()->getPdo();
            $this->assertTrue(true, 'Database connection successful.');
        } catch (\Exception $e) {
            $this->fail('Failed to connect to the database: ' . $e->getMessage());
        }
    }
}
