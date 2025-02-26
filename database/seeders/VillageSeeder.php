<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Village;

class VillageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $villages = [
        //     ['code' => '3201010001', 'name' => 'Desa Cibiru'],
        //     ['code' => '3201010002', 'name' => 'Desa Cileunyi'],
        //     ['code' => '3201010003', 'name' => 'Desa Cilengkrang'],
        //     ['code' => '3201010004', 'name' => 'Desa Cimenyan'],
        //     ['code' => '3201010005', 'name' => 'Desa Bojongsoang'],
        //     ['code' => '3201010006', 'name' => 'Desa Rancaekek'],
        //     ['code' => '3201010007', 'name' => 'Desa Majalaya'],
        //     ['code' => '3201010008', 'name' => 'Desa Ciparay'],
        //     ['code' => '3201010009', 'name' => 'Desa Pacet'],
        //     ['code' => '3201010010', 'name' => 'Desa Kertasari'],
        //     ['code' => '3201010011', 'name' => 'Desa Pangalengan'],
        //     ['code' => '3201010012', 'name' => 'Desa Arjasari'],
        //     ['code' => '3201010013', 'name' => 'Desa Banjaran'],
        //     ['code' => '3201010014', 'name' => 'Desa Cangkuang'],
        //     ['code' => '3201010015', 'name' => 'Desa Pameungpeuk'],
        //     ['code' => '3201010016', 'name' => 'Desa Katapang'],
        //     ['code' => '3201010017', 'name' => 'Desa Soreang'],
        //     ['code' => '3201010018', 'name' => 'Desa Kutawaringin'],
        //     ['code' => '3201010019', 'name' => 'Desa Margaasih'],
        //     ['code' => '3201010020', 'name' => 'Desa Margahayu'],
        //     ['code' => '3201010021', 'name' => 'Desa Dayeuhkolot'],
        //     ['code' => '3201010022', 'name' => 'Desa Baleendah'],
        //     ['code' => '3201010023', 'name' => 'Desa Cangkuang Wetan'],
        //     ['code' => '3201010024', 'name' => 'Desa Bojongmalaka'],
        //     ['code' => '3201010025', 'name' => 'Desa Jelekong'],
        //     ['code' => '3201010026', 'name' => 'Desa Cangkuang Kulon'],
        //     ['code' => '3201010027', 'name' => 'Desa Cangkuang Rahayu'],
        //     ['code' => '3201010028', 'name' => 'Desa Cangkuang Tengah'],
        //     ['code' => '3201010029', 'name' => 'Desa Cangkuang Girang'],
        //     ['code' => '3201010030', 'name' => 'Desa Cangkuang Hilir'],
        //     ['code' => '3201010031', 'name' => 'Desa Cangkuang Kidul'],
        //     ['code' => '3201010032', 'name' => 'Desa Cangkuang Barat'],
        // ];

        // foreach ($villages as $village) {
        //     Village::create($village);
        // }

        Village::create([
            'code' => '3205072003',
            'name' => 'Sukarasa',
            'sub_district_code' => '320507'
        ]);
        Village::create([
            'code' => '3205072004',
            'name' => 'Cikedokan',
            'sub_district_code' => '320507'
        ]);
        Village::create([
            'code' => '3205072005',
            'name' => 'Sukaasih',
            'sub_district_code' => '320507'
        ]);
    }
}
