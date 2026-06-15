<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VacancySeeder extends Seeder
{
    public function run(): void
    {
        DB::table('vacancies')->insert([
            [
                'title' => 'Frontend Developer Intern',
                'company' => 'PT Maju Bersama',
                'location' => 'Bandung',
                'description' => 'Membantu pengembangan website perusahaan.',
                'deadline' => '2026-07-31',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'UI/UX Designer Intern',
                'company' => 'PT Digital Nusantara',
                'location' => 'Jakarta',
                'description' => 'Membuat desain antarmuka aplikasi.',
                'deadline' => '2026-08-15',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}