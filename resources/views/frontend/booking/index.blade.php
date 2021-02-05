@extends('frontend.layouts.app')

@section('content')
<div class="container mt-5">
        <div class="row">
            @foreach ($bookings as $booking)
                <div class="col-4">
                    <Booking :booking="{{ $booking->toJson() }}" :user="{{ Auth::check() ? json_encode(Auth::user()->only('id')) : 'false' }}"></Booking>
                </div>
            @endforeach
        </div>
    </div>
@endsection
