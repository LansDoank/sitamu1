<?php

namespace Database\Seeders;

use App\Models\District;
use App\Models\Province;
use App\Models\Role;
use App\Models\SubDistrict;
use App\Models\User;
use App\Models\Village;
use App\Models\Visitor;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([RoleSeeder::class,UserSeeder::class,]);
        // User::factory(1)->recycle([
        //     Role::all(),
        // ])->create();

        
    }
}
