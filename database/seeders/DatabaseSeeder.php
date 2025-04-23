<?php

namespace Database\Seeders;

use App\Models\CompanySetting;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Admin Memoowi',
            'email' => 'admin@admin.com',
            'password' => bcrypt('12345678'),
            'role' => 'admin',
        ]);

        CompanySetting::factory()->create([
            'name' => 'PT. Nusa',
            'description' => 'PT. Nusa is a company that specializes in technology solutions.',
            'address' => 'Jl. Raya No. 123, Jakarta',
            'phone' => '62112345678',
            'value' => 'Bersama Membangun Bangsa',
        ]);
    }
}
