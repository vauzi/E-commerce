<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'category_id'   => mt_rand(1, 10),
            'product_name'  => $this->faker->sentence(3),
            'image'        => $this->faker->sentence(2),
            'price'         => mt_rand(100000, 9000000),
            'stock'         => mt_rand(1, 99),
            'description'   => $this->faker->text(500),
            'time'          => now()
        ];
    }
}
