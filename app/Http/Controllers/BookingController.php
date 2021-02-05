<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Showing;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class BookingController extends Controller
{
    public function index(Request $request) {
        $bookings = Booking::where('user_id', Auth::user()->id)->where('status', '<>', 'cancelled')->get()->load(['showing.film', 'showing.theatre.cinema']);

        return view('frontend.booking.index')->with(['bookings' => $bookings]);
    }

    public function admin(Request $request) {
        return view('backend.auth.booking.index');
    }

    public function show(Request $request, Showing $showing)
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
                'status' => 'booked',
            ]);

            $booking->save();

            $bookings->add($booking);
        }

        return $bookings;
    }

    public function delete(Request $request) {
        //TODO:: validation
        $booking = Booking::where('reference' ,$request->input('reference'))->first();

        if (Carbon::now()->diffInHours($booking->showing->showing_at) <= 1) {
            return response('Could not delete an hour before showing', 400);
        }

        $booking->status = 'cancelled';
        $booking->save();

        return $booking;
    }
}
