<?php

namespace Database\Seeders;

use App\Models\Rider;
use Illuminate\Database\Seeder;

class RiderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Rider::create([
            'name' => 'rider 1',
        ]);

        Rider::create([
            'name' => 'rider 2',
        ]);

        Rider::create([
            'name' => 'rider 3',
        ]);
    }
}
