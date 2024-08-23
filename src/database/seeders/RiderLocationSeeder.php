<?php

namespace Database\Seeders;

use App\Models\RiderLocation;
use Illuminate\Database\Seeder;

class RiderLocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        RiderLocation::create([
            "rider_id" => "1",
            "service_name" => "restaurant",
            "lat" => "41.118491",
            "long" => "25.404509",
            "capture_time" => "2024-08-23 14:30:00",
        ]);

    }
}
