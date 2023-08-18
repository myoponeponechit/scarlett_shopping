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
            'voucherNo' => $this->faker->ean8,
            'qty' => $this->faker->ean8,
            'total' => $this->faker->ean8,
            'paymentSlip' => $this->faker->imageUrl,
            'payment_id' => rand(1,10),
            'item_id' => rand(1,10),
            'category_id' => rand(1,10),
            'user_id' => rand(1,10)
        ];
    }
}
