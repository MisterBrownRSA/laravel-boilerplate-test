<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Showing;

/**
 * Class HomeController.
 */
class HomeController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $showings = Showing::all()->load(['film', 'theatre.cinema']);

        return view('frontend.index')->with(['showings' => $showings]);
    }
}
