<?php

namespace Database\Factories;

use Faker\Provider\bg_BG\PhoneNumber;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserAddress>
 */
class UserAddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id'   => mt_rand(1, 5),
            'number'    => $this->faker->phoneNumber(),
            'village'   => $this->faker->sentence(1),
            'district'  => $this->faker->sentence(1),
            'province'  => $this->faker->sentence(1),
            'postal_code'   => mt_rand(500000, 900000),
            'complate_address'  => $this->faker->paragraph(),
        ];
    }
}
