<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Restaurant>
 */
class RestaurantFactory extends Factory {
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition() {
        $dummy_lowest_price = floor(mt_rand(500, 10000) / 500) * 500;

        return [
            'name' => $this->faker->name,
            'image' => basename('public/restaurants/dummy.jpg'),
            'description' => $this->faker->realText,
            'lowest_price' => $dummy_lowest_price,
            'highest_price' => $dummy_lowest_price + 2000,
            'opening_time' => '10:00:00',
            'closing_time' => '22:00:00',
            'postal_code' => $this->faker->postcode,
            'address' => $this->faker->prefecture . ' ' . $this->faker->city . $this->faker->streetAddress . ' ' . $this->faker->secondaryAddress,
            'phone_number' => $this->faker->phoneNumber,
            'regular_holiday' => 'なし',
        ];
    }
}
