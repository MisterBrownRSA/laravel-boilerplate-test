@extends('frontend.layouts.app')


@section('content')
    {{--    can either do per cinema/theatre or showings, decided to just do showings for now --}}
    <div class="container">
        <div class="row">
            <div class="card" style="width: 18rem;">
                <img src="{{ $showing->film->image_url }}" class="card-img-top"
                     alt="{{ $showing->film->name }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $showing->film->name }}</h5>
                    <p class="card-text">{{ $showing->film->description }}</p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Cinema: {{ $showing->theatre->cinema->name }}
                        @ {{ $showing->theatre->cinema->location }}</li>
                    <li class="list-group-item">Showing at: <br> {{ $showing->showing_at }}
                        ({{ $showing->showing_at->diffForHumans() }})
                    </li>
                </ul>
                <div class="card-body">
                    <a href="#" class="btn btn-primary">BOOK NOW</a>

                </div>
                <div class="card-footer">
                    Pay R{{ $showing->film->price }} per ticket ({{ $showing->available_seats }} available)
                </div>
            </div>
        </div>
    </div>
@endsection
