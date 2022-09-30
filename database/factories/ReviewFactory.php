<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Restaurant;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Review>
 */
class ReviewFactory extends Factory {
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition() {
        $restaurants = Restaurant::all();
        $number_restaurants = Restaurant::count() - 1;
        $random_number_restaurant = mt_rand(0, $number_restaurants);
        $restaurant_id = $restaurants[$random_number_restaurant]->id;

        $users = User::all();
        $number_users = User::count() - 1;
        $random_number_user = mt_rand(0, $number_users);
        $user_id = $users[$random_number_user]->id;

        return [
            'score' => mt_rand(1, 5),
            'comment' => '好みの味でした。また行きたいです。',
            'restaurant_id' => $restaurant_id,
            'user_id' => $user_id,
        ];
    }
}
