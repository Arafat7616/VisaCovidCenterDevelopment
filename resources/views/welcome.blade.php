@extends('auth.home-master')

@push('title')
Home
@endpush

@push('css')

@endpush
@section('content')
{{-- <div class="container">
        <img class="background-image" src="{{ asset('assets/center-part/image/homepage-background.png') }}" alt="Logo" />
<div class="showcase">
    <div class="logo-container">
        <img class="logo" src="{{ asset(get_static_option('logo') ?? 'assets/center-part/image/logo.png') }}" alt="Logo" />
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
</div> --}}
<!--================= header section start=============== -->
@include('auth.includes.landing.header')
<!--================= header section end===================== -->
<!--==================== Section-1 Top banner start============== -->
@include('auth.includes.landing.banner')
<!--===================== Section-1 Top banner end================ -->
<!-- ============Section-2 services page start=========== -->
@include('auth.includes.landing.service')
<!-- ==============Section-2 services page end=============== -->
<!--=================== section-3 download app banner start============== -->
@include('auth.includes.landing.download-app')
<!--=================== section-3 download app banner end============== -->

<!--============== section-4 how it's work start============ -->

@include('auth.includes.landing.how-it-work')
<!-- ============= section-4 how it's work end=============== -->
<!--================================== progressbar section starts here ==================-->
@include('auth.includes.landing.progressbar-section')
<!--================================== progressbar section end here ==================-->
<!-- ================footer section start================================ -->
@include('auth.includes.landing.footer')
<!--=========================== footer section end======================== -->
@endsection

@push('script')
<script>
    // Add active class to the current button (highlight it)
    var header = document.getElementById("navbarSupportedContent");
    var btns = header.getElementsByClassName("btn");
    for (var i = 0; i < btns.length; i++) {
        btns[i].addEventListener("click", function() {
            var current = document.getElementsByClassName("active");
            current[0].className = current[0].className.replace(" active", "");
            this.className += " active";
        });
    }
</script>
@endpush
