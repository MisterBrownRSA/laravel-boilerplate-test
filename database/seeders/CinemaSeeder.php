<?php

namespace Database\Seeders;

use App\Models\Cinema;
use Illuminate\Database\Seeder;

class CinemaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (app()->environment(['local', 'testing'])) {
            Cinema::create(['name' => 'Ster Kinekor', 'location' => 'Waterfront']);
            Cinema::create(['name' => 'Nu Metro', 'location' => 'Canal Walk']);
        }
    }
}
