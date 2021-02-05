<?php

namespace Database\Seeders;

use App\Models\Showing;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class ShowingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        Showing::create([
            "reference" => Str::uuid(),
            "film_id" => 1,
            "theatre_id" => 1,
            "bookings" => 0,
            "showing_at" => $faker->dateTimeBetween($startDate = 'now', $endDate = '+ 2 days'),
        ]);
    }
}
