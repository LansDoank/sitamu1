<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'photo' => 'user_photo/profile.png',
            'name' => fake()->name(),
            'username' => 'admin',
            'password' => bcrypt('admin123'),
            'province_code' => '32',
            'district_code' => '3205',
            'sub_district_code' => '320507',
            'village_code' => '3205072003',
            'role_id' => 1,
        ]);

        // User::factory(10)->create();
    }
}
