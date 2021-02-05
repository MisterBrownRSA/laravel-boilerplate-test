<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Showing;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

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

        $bookings = new Collection();

        if ($showing->max_seats < $showing->available_seats + $request->input('tickets')) {
            return response('Not enough seats', 400);
        }

        for ($i = 1; $i <= (int)$request->input('tickets'); $i++) {
            $booking = Booking::create([
                'reference' => Str::uuid(),
                'user_id' => $request->input('user'),
                'showing_id' => $showing->id,
                'status' => 'test',
            ]);

            $booking->save();

            $bookings->add($booking);
        }

        return $bookings;
    }
}
