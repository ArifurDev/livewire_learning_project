<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'customer_id' => $this->faker->randomNumber(),
            'total_products' => $this->faker->randomDigitNotZero(),
            'sub_total' => $this->faker->randomElement([1000,2000]),
            'vat' => $this->faker->randomDigitNotZero(),
            'total' => $this->faker->randomElement([1500,2000]),
            'pay' => $this->faker->randomElement([500,450]),
            'due' => $this->faker->randomElement([450,350]),
            'payment_status' => $this->faker->randomElement(['advanch','full payment']),
            'shiping_charge' => $this->faker->randomElement([50,60,120]),
            'order_status' => $this->faker->randomElement(['panding','processing'])
        ];
    }
}
