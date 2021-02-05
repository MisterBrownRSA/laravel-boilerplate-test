<?php

namespace App\Http\Controllers;

use App\Models\Showing;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index(Request $request, Showing $showing) {
        return view('frontend.new_booking')->with(['showing' => $showing]);
    }
}
