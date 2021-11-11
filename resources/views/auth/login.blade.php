@extends('auth.master')

@push('title')
    Log In
@endpush

@push('css')
    <link rel="stylesheet" href="{{ asset('assets/center-part/css/Administrator-3.css') }}">
@endpush
@section('content')
    <div class="container my-5 ">
        <div class="row">
            <div class="col-lg-6 col-md-12 col-sm-12 mb-5">
                <!-- ==============card header title start=============== -->
                <div class="card administrator-card-head w-75 mx-auto">
                    <div class="card-body  text-center">
                        <h6 class="">Log in</h6>
                    </div>
                </div>
                <!-- =================card header title start=============== -->
                <!-- =================card form start======================== -->
                <div class="card w-75 shadow mx-auto">
                    <div class="card-body">
                        <form action="{{route('login')}}" method="POST" id="loginForm">
                            @csrf
                            <div class="mb-3">
                                <label for="phone" class="form-label text-muted">Phone Number</label>
                                <input name="phone" id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" placeholder='Enter Phone Number'>
                            </div>
                            @error('phone')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <div class="mb-3">
                                <label for="password" class="form-label text-muted">Password</label>
                                <input type="password" name="password" class="form-control @error('email') is-invalid @enderror" id="password">
                            </div>
                            @error('password')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <div class="text-center">
                                <button type="submit" class="addministator-form-sub-btn">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!--=================== card form end =========================-->
            </div>
            <!--================== Otp right side div start==================== -->
            <div class="col-lg-6 col-md-12  col-sm-12 text-center mt-3 otp-reg">
                <div class="right-side-form">
                    <p class="text-muted">An OTP is just sent to your mobile <br> <span class="otp-sent-number"></span></p>
                    <p class="text-muted">Enter the OTP here :</p>
                    <!--======================== otp card start here==================== -->
                    <div class="d-flex justify-content-center">
                        <div class="card shadow w-50">
                            <div class="card-body">
                                <h5 class="card-title text-muted">OTP verification</h5>
                                <div class='text-center otp-card-place my-2'>
                                    <input type="text" class='form-control otp-card-place' id="otp" placeholder='12345' />
                                </div>
                                <a href="#" class="card-link"><button class='btn text-muted'>Resend</button></a>
                                <a href="#" class="card-link"><button
                                        class='otp-btn-verify text-light'>Verify</button></a>
                            </div>
                        </div>
                    </div>
                    <!--======================== otp card end here==================== -->
                </div>
                <button class="mt-5  apply-reg-btn">Login</button>
            </div>
            <!--================== Otp right side div end==================== -->
        </div>
    </div>
@endsection

@push('script')
    <script>
        $(document).ready(function() {
            $('.right-side-form').hide();
            $('.apply-reg-btn').hide();

            $('.addministator-form-sub-btn').click(function (e){
                e.preventDefault();
                var formData = new FormData();
                formData.append('phone', $('#phone').val());
                formData.append('password', $('#password').val());

                $.ajax({
                    method: 'POST',
                    url: '/login/getOtp',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(data) {

                        console.log(data.message);
                        if(data.type == 'success')
                        {
                            $('.right-side-form').show();
                            console.log(data);
                            /*$('#registrationForm').trigger("reset");*/
                            Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: data.message,
                                showConfirmButton: false,
                                timer: 1500
                            })
                            /*$('.otp-reg').show();
                            $('.otp-sent-number').innerText($('#personPhone').val());
                            $("html, body").animate({ scrollTop: $(document).height() }, "slow");*/

                            // setTimeout(function() {
                            //     location.reload();
                            // }, 800); //
                        }else (data.type == 'warning')
                        {
                            Swal.fire({
                                position: 'top-end',
                                icon: 'warning',
                                title: data.message,
                                showConfirmButton: false,
                                timer: 1500
                            })
                        }

                    },
                    error: function(xhr) {
                        var errorMessage = '<div class="card bg-danger">\n' +
                            '                        <div class="card-body text-center p-5">\n' +
                            '                            <span class="text-white">';
                        $.each(xhr.responseJSON.errors, function(key, value) {
                            errorMessage += ('' + value + '<br>');
                        });
                        errorMessage += '</span>\n' +
                            '                        </div>\n' +
                            '                    </div>';
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            footer: errorMessage
                        })
                    },
                });
            });

            $('.otp-btn-verify').click(function (e){
                e.preventDefault();
                var formData = new FormData();
                formData.append('phone', $('#phone').val());
                formData.append('otp', $('#otp').val());

                $.ajax({
                    method: 'POST',
                    url: '/login/checkOtp',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(data) {
                        if(data.type == 'success')
                        {
                            $('.apply-reg-btn').show();
                            console.log(data);
                            /*$('#registrationForm').trigger("reset");*/
                            Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: data.message,
                                showConfirmButton: false,
                                timer: 1500
                            })
                            /*$('.otp-reg').show();
                            $('.otp-sent-number').innerText($('#personPhone').val());
                            $("html, body").animate({ scrollTop: $(document).height() }, "slow");*/

                            // setTimeout(function() {
                            //     location.reload();
                            // }, 800); //
                        }else (data.type == 'warning')
                        {
                            Swal.fire({
                                position: 'top-end',
                                icon: 'warning',
                                title: data.message,
                                showConfirmButton: false,
                                timer: 1500
                            })
                        }

                    },
                    error: function(xhr) {
                        var errorMessage = '<div class="card bg-danger">\n' +
                            '                        <div class="card-body text-center p-5">\n' +
                            '                            <span class="text-white">';
                        $.each(xhr.responseJSON.errors, function(key, value) {
                            errorMessage += ('' + value + '<br>');
                        });
                        errorMessage += '</span>\n' +
                            '                        </div>\n' +
                            '                    </div>';
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            footer: errorMessage
                        })
                    },
                });
            });

            $('.apply-reg-btn').click(function (){
                $('#loginForm').submit();
            });
        });
    </script>
@endpush


{{--
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
--}}
