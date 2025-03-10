<?php

namespace Database\Seeders;

use App\Models\VisitType;
use Illuminate\Database\Seeder;

class VisitTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        VisitType::create([
            'qr_code' => 'https://tamudesa.id/form/3205072003/sukarasa',
            'name' => 'sukarasa',
            'slug' => 'sukarasa',
            'province_code' => 32,
            'district_code' => 3205,
            'sub_district_code' => 320507,
            'village_code' => 3205072003,
        ]);
    }
}
