<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TheatreController extends Controller
{
    public function index() {
        return view('backend.auth.theatre.index');
    }
}
