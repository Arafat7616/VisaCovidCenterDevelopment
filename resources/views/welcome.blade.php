@extends('auth.home-master')

@push('title')
    Home
@endpush

@push('css')

@endpush
@section('content')
    {{-- @if (Route::has('login'))
        <div class="top-right links">
            @auth
                <a href="{{ url('/home') }}">Home</a>
            @else
                <a href="{{ route('login') }}">Login</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Register</a>
                @endif
            @endauth
        </div>
    @endif --}}

    <div class="container">
        <img class="background-image" src="{{ asset('assets/center-part/image/homepage-background.png') }}" alt="Logo" />
        <div class="showcase">
            <div class="logo-container">
                <img class="logo" src="{{ asset('assets/center-part/image/logo.png') }}" alt="Logo" />
            </div>

            <div class="text-container text-center">
                <div class="col">
                    <div class="row card-div">
                        <h1 class="home-card"><a href="{{ route('login') }}">Trusted person log in</a></h1>
                    </div>
                    <div class="row card-div">
                        <h1 class="home-card"><a href="{{ route('login') }}">Center Administrator</a></h1>
                    </div>
                    <div class="row card-div">
                        <h1 class="home-card"><a href="{{ route('centerRegister') }}">Center Registration</a></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')

@endpush
