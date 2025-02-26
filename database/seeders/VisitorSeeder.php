<?php

namespace Database\Seeders;

use App\Models\Visitor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VisitorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Visitor::create([
            'fullname' => 'Muhamad Maulana',
            'institution' => 'Media',
            'address' => 'Jl. Jendral Sudirman No. 1',
            'check_in' => today(),
            'check_out' => today(),
            'telephone' => '083130497878',
            'visitor_photo' => "user_photo/profile.png",
            'visit_type_id' => 1,
            'objective' => 'Studi Banding',
            'i_n_i' => '1234567890',
            'province_code' => '32',
            'district_code' => '3201',
            'subdistrict_code' => '3201010',
            'village_code' => '3201010001',
        ]);
        Visitor::create([
            'fullname' => 'Edi Kurniawan',
            'institution' => 'Warga',
            'address' => 'Jl. Jendral Sudirman No. 1',
            'check_in' => today(),
            'check_out' => today(),
            'telephone' => '081234567890',
            'visitor_photo' => "user_photo/profile.png",
            'visit_type_id' => 1,
            'objective' => 'Cari Informasi',
            'i_n_i' => '1234567890',
            'province_code' => '32',
            'district_code' => '3201',
            'subdistrict_code' => '3201010',
            'village_code' => '3201010001',
        ]);
        Visitor::create([
            'fullname' => 'Restu Rudiasnyah',
            'institution' => 'Media',
            'address' => 'Jl. Jendral Sudirman No. 1',
            'check_in' => today(),
            'check_out' => today(),
            'telephone' => '012345678',
            'visitor_photo' => "user_photo/profile.png",
            'visit_type_id' => 1,
            'objective' => 'Meeting',
            'i_n_i' => '1234567890',
            'province_code' => '32',
            'district_code' => '3201',
            'subdistrict_code' => '3201010',
            'village_code' => '3201010001',
        ]);
    }
}
