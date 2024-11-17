<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\JobListing;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'first_name' => 'Test',
            'last_name' => 'User',
            'email' => 'test@example.com',
        ]);

        JobListing::factory(20)->create();
    }
}
