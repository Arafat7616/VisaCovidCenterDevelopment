@extends('auth.superAdmin.master')

@push('title')
Immigration Officer Log In
@endpush

@push('css')
<link rel="stylesheet" href="{{ asset('assets/center-part/css/Administrator-3.css') }}">
@endpush
@section('content')

<div class="col-12 d-flex">
    <div class="left-log col-md-6">
        <img height="100%" class="login-image" src="{{ asset('assets/super-admin-login/img/Portal/super-admin-login.png') }}" alt="">
    </div>
    <div class="right-log col-md-6">
        <center>
            <div class="border-top">
                <div class="log-form">
                    <img src="{{ asset(get_static_option('logo') ?? get_static_option('no_image')) }}" alt="Logo">
                    <div class="login-form">
                        <form  action="{{route('login')}}" method="POST" class="justify-content-center" id="login-form-submit">
                            @csrf
                            <div class="form-group log-form-div">
                                <input id="phone" name="phone" type="text"
                                    class="form-control form-control-in @error('phone') is-invalid @enderror" id="phone"
                                    placeholder="Enter Phone">
                            </div>
                            <div class="form-group log-form-div">
                                <input id="password" name="password" type="password"
                                    class="form-control form-control-in @error('password') is-invalid @enderror"
                                    id="password" placeholder="Enter Password">
                            </div>
                            <div class="form-group log-form-div">
                                <button type="submit"
                                    class="form-control form-control-in-btn btn-success immigration-officer-form-sub-btn">Log in</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </center>
    </div>
</div>
@endsection

@push('script')

@endpush