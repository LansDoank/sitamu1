<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Visitor>
 */
class VisitorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'fullname' => fake()->name(),
            'institution' => 'APH',
            'address' => fake()->address(),
            'check_in' => today(),
            'check_out' => today(),
            'telephone' => fake()->phoneNumber(),
            'visitor_photo' => 'user_photo/profile.png',
            'visit_type_id' => 1,
            'objective' => 'Studi Banding',
            'i_n_i' => fake()->sentence(),
            'province_code' => '32',
            'district_code' => '3205',
            'subdistrict_code' => '320508',
            'village_code' => '3205082003',
        ];
    }
}
