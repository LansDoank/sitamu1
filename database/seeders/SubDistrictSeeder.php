<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SubDistrict;

class SubDistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $subdistricts = [
        //     ['code' => '1101010', 'name' => 'Teupah Selatan'],
        //     ['code' => '1101020', 'name' => 'Simeulue Timur'],
        //     ['code' => '1101021', 'name' => 'Teupah Barat'],
        //     ['code' => '1101022', 'name' => 'Teupah Tengah'],
        //     ['code' => '1101030', 'name' => 'Simeulue Tengah'],
        //     ['code' => '1101031', 'name' => 'Teluk Dalam'],
        //     ['code' => '1101032', 'name' => 'Simeulue Cut'],
        //     ['code' => '1101040', 'name' => 'Salang'],
        //     ['code' => '1101050', 'name' => 'Simeulue Barat'],
        //     ['code' => '1101051', 'name' => 'Alafan'],
        //     ['code' => '1102010', 'name' => 'Pulau Banyak'],
        //     ['code' => '1102011', 'name' => 'Pulau Banyak Barat'],
        //     ['code' => '1102020', 'name' => 'Singkil'],
        //     ['code' => '1102021', 'name' => 'Singkil Utara'],
        //     ['code' => '1102022', 'name' => 'Kuala Baru'],
        //     ['code' => '1102030', 'name' => 'Simpang Kanan'],
        //     ['code' => '1102031', 'name' => 'Gunung Meriah'],
        //     ['code' => '1102032', 'name' => 'Danau Paris'],
        //     ['code' => '1102033', 'name' => 'Suro Makmur'],
        //     ['code' => '1102042', 'name' => 'Singkohor'],
        //     ['code' => '1102043', 'name' => 'Kota Baharu'],
        //     ['code' => '1103010', 'name' => 'Trumon'],
        //     ['code' => '1103011', 'name' => 'Trumon Timur'],
        //     ['code' => '1103012', 'name' => 'Trumon Tengah'],
        //     ['code' => '1103020', 'name' => 'Bakongan'],
        //     ['code' => '1103021', 'name' => 'Bakongan Timur'],
        //     ['code' => '1103022', 'name' => 'Kota Bahagia'],
        //     ['code' => '1103030', 'name' => 'Kluet Selatan'],
        //     ['code' => '1103031', 'name' => 'Kluet Timur'],
        //     ['code' => '1103040', 'name' => 'Kluet Utara'],
        //     ['code' => '1103041', 'name' => 'Pasie Raja'],
        // ];

        // foreach ($subdistricts as $subdistrict) {
        //     SubDistrict::create($subdistrict);
        // }

        SubDistrict::create([
            'code' => '320507',
            'name' => 'Samarang',
            'district_code' => '3205',
        ]);
    }
}
