<?php
namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfilesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('profiles')->insert([
            [
                'user_id' => 1,
                'full_name' => 'Laura Romano',
                'address' => 'Calle Principal, Ciudad',
                'phone_number' => '1234567890',
                'birth_date' => '1990-01-01',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2,
                'full_name' => 'Lucas Diglaglio',
                'address' => 'Calle Secundaria, Ciudad',
                'phone_number' => '9876543210',
                'birth_date' => '1995-05-05',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 3,
                'full_name' => 'Pedro Perez',
                'address' => 'Calle Secundaria, Ciudad',
                'phone_number' => '9876543210',
                'birth_date' => '1995-05-05',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 4,
                'full_name' => 'Romina Rodriguez',
                'address' => 'Calle Secundaria, Ciudad',
                'phone_number' => '9876543210',
                'birth_date' => '1995-05-05',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
