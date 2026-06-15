<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seed Student User
        User::factory()->create([
            'name' => 'Mahasiswa Test',
            'email' => 'student@careerhub.com',
            'password' => \Illuminate\Support\Facades\Hash::make('password'),
            'role' => 'student',
        ]);

        // Seed Admin User
        User::factory()->create([
            'name' => 'Admin Test',
            'email' => 'admin@careerhub.com',
            'password' => \Illuminate\Support\Facades\Hash::make('password'),
            'role' => 'admin',
        ]);

        // Run Vacancy Seeder
        $this->call(VacancySeeder::class);
    }
}
