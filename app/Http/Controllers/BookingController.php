<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Showing;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index(Request $request, Showing $showing)
    {
        return view('frontend.new_booking')->with(['showing' => $showing]);
    }

    /**
     * @param Request $request
     * @param Showing $showing
     */
    public function create(Request $request, Showing $showing)
    {
        //TODO:: validation - skipping this step to save time.

        for ($i = 1; $i <= (int) $request->input('tickets'); $i++) {
            $booking = Booking::create([
                'user_id' => $request->input('user'),
                'showing_id' => $showing->id,
                'status' => 'test',
            ]);
        }

        $booking->save();
        return $booking;
    }
}
