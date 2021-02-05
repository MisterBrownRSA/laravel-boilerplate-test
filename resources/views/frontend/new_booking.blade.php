@extends('frontend.layouts.app')


@section('content')
    {{--    can either do per cinema/theatre or showings, decided to just do showings for now --}}
    <div class="container mt-5">
        <div class="row">
            <div class="col-4">
                <img src="{{ $showing->film->image_url }}" class="card-img-top"
                     alt="{{ $showing->film->name }}">
            </div>
            <div class="col-8">
                    <h2 class="card-title">{{ $showing->film->name }}</h2>
                    <p>{{ $showing->film->description }}</p>
                <p>Cinema: {{ $showing->theatre->cinema->name }}
                        @ {{ $showing->theatre->cinema->location }}</p>
                <p>Showing at: {{ $showing->showing_at }}
                        ({{ $showing->showing_at->diffForHumans() }})</p>
                <p>Pay R{{ $showing->film->price }} per ticket ({{ $showing->available_seats }} available)</p>
                <a href="#" class="btn btn-primary">BOOK NOW</a>
            </div>
        </div>
    </div>
@endsection
