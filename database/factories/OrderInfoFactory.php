<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OrderInfo>
 */
class OrderInfoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'order_id' => $this->faker->randomElement([1,2,3,4,5,6,7,8]),
            'product_id' => $this->faker->randomElement([1,4,5,7,8,9,40,21]),
            'quantity' => $this->faker->randomElement([4,5,7,8,9]),
            'unit_price' => $this->faker->randomElement([400,500,700,800,900]),
            'total' => $this->faker->randomElement([4000,5000,7000,8000,9000])
        ];
    }
}
