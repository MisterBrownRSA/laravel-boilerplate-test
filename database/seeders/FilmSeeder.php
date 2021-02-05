<?php

namespace Database\Seeders;

use App\Models\Film;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

class FilmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //TODO:: make api call to films
        $response = Http::post('http://www.omdbapi.com/?apikey=51fd2bc1&type=movie&s=batman');
        $json = $response->json();

        for ($i = 0; $i < 4; $i++) {
            $singleFilm = Http::post('http://www.omdbapi.com/?apikey=51fd2bc1&i=' . $json["Search"][$i]["imdbID"]);

            Film::create([
                'name' => $json["Search"][$i]["Title"],
                'image_url' => $json["Search"][$i]["Poster"],
                'description' => $singleFilm["Plot"],
                'price' => random_int(0,20),
            ]);
        }
    }
}
