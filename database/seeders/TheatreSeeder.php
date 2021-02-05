<?php

namespace Database\Seeders;

use App\Models\Theatre;
use Illuminate\Database\Seeder;

class TheatreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Theatre::create(['cinema_id' => 1, 'allocation' => 1]);
        Theatre::create(['cinema_id' => 1, 'allocation' => 2]);

        Theatre::create(['cinema_id' => 2, 'allocation' => 1]);
        Theatre::create(['cinema_id' => 2, 'allocation' => 2]);
    }
}
