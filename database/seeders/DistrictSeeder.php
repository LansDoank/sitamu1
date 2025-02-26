<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\District;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $district = [
        //     ['code' => '1101', 'name' => 'Kabupaten Simeulue'],
        //     ['code' => '1102', 'name' => 'Kabupaten Aceh Singkil'],
        //     ['code' => '1103', 'name' => 'Kabupaten Aceh Selatan'],
        //     ['code' => '1104', 'name' => 'Kabupaten Aceh Tenggara'],
        //     ['code' => '1105', 'name' => 'Kabupaten Aceh Timur'],
        //     ['code' => '1106', 'name' => 'Kabupaten Aceh Tengah'],
        //     ['code' => '1107', 'name' => 'Kabupaten Aceh Barat'],
        //     ['code' => '1108', 'name' => 'Kabupaten Aceh Besar'],
        //     ['code' => '1109', 'name' => 'Kabupaten Pidie'],
        //     ['code' => '1110', 'name' => 'Kabupaten Bireuen'],
        //     ['code' => '1111', 'name' => 'Kabupaten Aceh Utara'],
        //     ['code' => '1112', 'name' => 'Kabupaten Aceh Barat Daya'],
        //     ['code' => '1113', 'name' => 'Kabupaten Gayo Lues'],
        //     ['code' => '1114', 'name' => 'Kabupaten Aceh Tamiang'],
        //     ['code' => '1115', 'name' => 'Kabupaten Nagan Raya'],
        //     ['code' => '1116', 'name' => 'Kabupaten Aceh Jaya'],
        //     ['code' => '1117', 'name' => 'Kabupaten Bener Meriah'],
        //     ['code' => '1118', 'name' => 'Kabupaten Pidie Jaya'],
        //     ['code' => '1171', 'name' => 'Kota Banda Aceh'],
        //     ['code' => '1172', 'name' => 'Kota Sabang'],
        //     ['code' => '1173', 'name' => 'Kota Langsa'],
        //     ['code' => '1174', 'name' => 'Kota Lhokseumawe'],
        //     ['code' => '1175', 'name' => 'Kota Subulussalam'],
        //     ['code' => '1201', 'name' => 'Kabupaten Nias'],
        //     ['code' => '1202', 'name' => 'Kabupaten Mandailing Natal'],
        //     ['code' => '1203', 'name' => 'Kabupaten Tapanuli Selatan'],
        //     ['code' => '1204', 'name' => 'Kabupaten Tapanuli Tengah'],
        //     ['code' => '1205', 'name' => 'Kabupaten Tapanuli Utara'],
        //     ['code' => '1206', 'name' => 'Kabupaten Toba Samosir'],
        //     ['code' => '1207', 'name' => 'Kabupaten Labuhan Batu'],
        //     ['code' => '1208', 'name' => 'Kabupaten Asahan'],
        //     ['code' => '1209', 'name' => 'Kabupaten Simalungun'],
        // ];

        // foreach ($district as $data) {
        //     District::create($data);
        // }

        District::create([
            'code' => '3205',
            'name' => 'Garut',
            'province_code' => 32,
        ]);
    }
}
