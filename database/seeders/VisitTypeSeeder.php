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
            'qr_code' => '127.0.0.1:8000/form/1374011006/koto-panjang',
            'name' => 'koto panjang',
            'slug' => 'koto-panjang',
            'province_code' => 13,
            'district_code' => 1374,
            'sub_district_code' => 137401,
            'village_code' => 1374011006,
        ]);
        VisitType::create([
            'qr_code' => '127.0.0.1:8000/form/6171031004/sungaibeliung',
            'name' => 'sungaibeliung',
            'slug' => 'sungaibeliungkoto-panjang',
            'province_code' => 61,
            'district_code' => 6171,
            'sub_district_code' => 617103,
            'village_code' => 6171031004,
        ]);
    }
}
