@extends('auth.bdGovt.master')

@push('title')
Immigration Officer Log In
@endpush

@push('css')
<link rel="stylesheet" href="{{ asset('assets/center-part/css/Administrator-3.css') }}">
@endpush
@section('content')
{{-- <div class="container my-5 ">
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
                            <input name="phone" id="phone" type="text"
                                class="form-control @error('phone') is-invalid @enderror"
                                placeholder='Enter Phone Number'>
                        </div>
                        @error('phone')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        <div class="mb-3">
                            <label for="password" class="form-label text-muted">Password</label>
                            <input type="password" name="password"
                                class="form-control @error('email') is-invalid @enderror" id="password">
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
                            <a href="#" class="card-link"><button class='otp-btn-verify text-light'>Verify</button></a>
                        </div>
                    </div>
                </div>
                <!--======================== otp card end here==================== -->
            </div>
            <button class="mt-5  apply-reg-btn">Login</button>
        </div>
        <!--================== Otp right side div end==================== -->
    </div>
</div> --}}

<div class="col-12 d-flex">
    <div class="left-log col-md-6">
        <img height="100%" class="login-image" src="{{ asset('assets/bd-govt/img/Portal/govt-login.png') }}" alt="">
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
                                    class="form-control form-control-in-btn btn-success immigration-officer-form-sub-btn">Log
                                    in</button>
                            </div>
                            {{-- <p class="log-from-text">Don't create an account? <a href="signup.html">Create</a></p>
                            --}}
                        </form>
                    </div>
                    <div class="otp-verify-form">
                        <form class="justify-content-center" id="otp-verify-form-reset-trigger">
                            <div class="form-group">
                                <button type="submit" class="form-control form-control-in-btn btn-primary">OTP
                                    Verification</button>
                            </div>
                            <div class="col-12">
                                <div class="from-gorup otp-font"> 
                                    <input type="text" class="inputs otp-text" maxlength="1" id="first" onkeyup="movetoNext(this, 'second')">
                                    <input type="text" class="inputs otp-text" maxlength="1" id="second" onkeyup="movetoNext(this, 'third')">
                                    <input type="text" class="inputs otp-text" maxlength="1" id="third" onkeyup="movetoNext(this, 'fourth')">
                                    <input type="text" class="inputs otp-text" maxlength="1" id="fourth" onkeyup="movetoNext(this, 'fivth')">
                                    <input type="text" class="inputs otp-text" maxlength="1" id="fivth" onkeyup="movetoNext(this, 'sixth')">
                                    <input type="text" class="inputs otp-text" maxlength="1" id="sixth">
                                    {{-- <div class='text-center otp-card-place my-2'>
                                        <input type="text" class='form-control otp-card-place' id="otp" placeholder='12345' />
                                    </div> --}}
                                </div>
                            </div>
                            <div class="form-group">
                                <p class="log-from-text ">An OTP is sent to your phone.<br>

                                    <a href="javascript:void(0)"><button style="color: red !important;" class='btn text-muted re-send-otp-time'><span class="left-time">00</span> Second</button></a>

                                    <span><a href="javascript:void(0)" class="re-send-otp-btn">Resend</a></span>
                                </p>
                            </div>
                            <div class="form-group otp-btn-pa">
                                <button type="submit" class="form-control form-control-in-btn btn-success otp-btn-verify">Verify</button>
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
<script>
    $(document).ready(function() {
        $('.otp-verify-form').hide();
        $('.immigration-officer-form-sub-btn').click(function(e) {
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
                    if(data.type == 'success'){
                        $('.otp-verify-form').show();
                        $('.login-form').hide();
                        $('.re-send-otp-time').hide();
                        Swal.fire({
                            position: 'top-end', 
                            icon: 'success', 
                            title: data.message, 
                            showConfirmButton: false, 
                            timer: 1500
                        });
                    } else if(data.type == 'error'){
                        Swal.fire({
                            position: 'center' , 
                            icon: data.type,
                            title: 'Oops...',
                            footer: data.message,
                            showConfirmButton: false, 
                            timer: 1500
                        });
                    }
                }
                , error: function(xhr) {
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
                }
            , });
        });

        $('.re-send-otp-btn').click(function (e){
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
                        if(data.type == 'success')
                        {
                            $('.right-side-form').show();
                            $('#otp-verify-form-reset-trigger').trigger("reset");
                            Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: data.message,
                                showConfirmButton: false,
                                timer: 1500
                            })
                        }else if(data.type == 'error')
                        {
                            Swal.fire({
                                position: 'center',
                                icon: data.type,
                                title: 'Oops...',
                                footer: data.message,
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
                $('.re-send-otp-btn').hide();               
                $('.re-send-otp-time').show(); 
                var t = 60;  
                setInterval(() => {
                    if(t > 1){
                        
                        $('.left-time').html(t);   
                        t = t-1;

                    }else{
                        clearInterval();
                        $('.re-send-otp-btn').show();               
                        $('.re-send-otp-time').hide(); 
                        t = 60;
                    }
                }, 1000);            
            });

        $('.otp-btn-verify').click(function(e) {
            e.preventDefault();

            var margedOtp =  $('#first').val()+$('#second').val()+$('#third').val()+$('#fourth').val()+$('#fivth').val()+$('#sixth').val();
            var formData = new FormData();
            formData.append('phone', $('#phone').val());
            formData.append('otp', margedOtp);

            $.ajax({
                method: 'POST'
                , url: '/login/checkOtp'
                , headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
                , data: formData
                , processData: false
                , contentType: false
                , success: function(data) {
                    if (data.type == 'success') {
                        Swal.fire({
                            position: 'top-end', 
                            icon: 'success', 
                            title: data.message, 
                            showConfirmButton: false, 
                            timer: 1500
                        })
                        $('#login-form-submit').submit();
                    } else if(data.type == 'error') {
                        Swal.fire({
                            position: 'center',
                            icon: data.type,
                            title: 'Oops...',
                            footer: data.message,
                            showConfirmButton: false, 
                            timer: 1500
                        })
                    }

                }
                , error: function(xhr) {
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
                        icon: 'error'
                        , title: 'Oops...'
                        , footer: errorMessage
                    })
                }
            , });
        });      
    });

    function movetoNext(current, nextFieldID) {  
        if (current.value.length >= current.maxLength) {  
            document.getElementById(nextFieldID).focus();  
        }  
    } 

</script>
@endpush