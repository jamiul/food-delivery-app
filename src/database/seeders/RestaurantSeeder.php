<?php

namespace Database\Seeders;

use App\Models\Restaurant;
use Illuminate\Database\Seeder;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Restaurant::create([
            'name' => 'Restaurant 1',
            'latitude' => 40.730610,
            'longitude' => -73.935242,
        ]);

        Restaurant::create([
            'name' => 'Restaurant 2',
            'latitude' => 34.052235,
            'longitude' => -118.243683,
        ]);
    }
}
