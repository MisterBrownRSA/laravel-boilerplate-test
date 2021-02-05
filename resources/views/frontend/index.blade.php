@extends('frontend.layouts.app')


@section('content')
    {{--    can either do per cinema/theatre or showings, decided to just do showings for now --}}
    <div class="container mt-5">
        <div class="row">
            @foreach ($showings as $showing)
                <div class="col-4">
                    <Showing :showing="{{ $showing->toJson() }}" :auth="{{ Auth::check() }}"></Showing>
                </div>
            @endforeach
        </div>
    </div>
@endsection
