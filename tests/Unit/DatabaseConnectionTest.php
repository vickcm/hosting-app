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

    public function testDatabaseConnection()
    {
        try {
            DB::connection()->getPdo();
            $this->assertTrue(true, 'Database connection successful.');
        } catch (\Exception $e) {
            $this->fail('Failed to connect to the database: ' . $e->getMessage());
        }
    }
}
