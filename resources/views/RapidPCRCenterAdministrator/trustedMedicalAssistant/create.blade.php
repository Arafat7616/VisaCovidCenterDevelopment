@extends('RapidPCRCenterAdministrator.layouts.master')

@push('title')
    Create New Trusted Medical Assistant
@endpush

@push('css')
    <link rel="stylesheet" href="{{asset('assets/center-part/css/TrustedMedicalAssistantAccount.css')}}">
@endpush

@section('content')
    <div class="container my-5 ">
        <div class="row">
            <div class="col-lg-6 col-md-12 col-sm-12 mb-5">
                <!-- ==============card header title start=============== -->
                <div class="card trusted_medical_assistant_account w-75 mx-auto">
                    <div class="card-body  text-center">
                        <h6 >Create Trusted Medical Assistant account</h6>
                    </div>
                </div>
                <!-- =================card header title start=============== -->

                <!-- =================card form start======================== -->

                <div class="card w-75 shadow mx-auto">
                    <div class="card-body">

                        <form id="registrationForm" action="{{route('rapidPcrCenterAdministrator.trustedPeople.store')}}" method="POST">
                            @csrf
                            <div class="container">
                                <div class="form-group row mt-3">
                                    <label for="inputPassword" class="col-sm-5 col-form-label text-muted">Passport</label>
                                    <div class="col-sm-7">
                                        <input type="text" name="passport" value="{{ old('passport') }}" class="form-control @error('passport') is-invalid @enderror" id="passport" placeholder="987 6789 6547" >
                                    </div>
                                </div>


                                @error('passport')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror


                                <div class="form-group row mt-3">
                                    <label for="inputPassword" class="col-sm-5 col-form-label text-muted">Designation</label>
                                    <div class="col-sm-7">
                                        <select class="form-select text-muted" id="user_type" name="user_type" aria-label="Default select example">
                                            <option selected>Select One</option>
                                            <option {{ old('user_type') === 'trusted-medical-assistant' ?? 'selected'}} value="trusted-medical-assistant">Trusted Medical Assistant</option>
                                            <option {{ old('user_type') === 'receptionist' ?? 'selected'}} value="receptionist">Receptionist</option>
                                            <option {{ old('user_type') === 'pathologist' ?? 'selected'}} value="pathologist">Pathologist</option>
                                        </select>
                                    </div>
                                </div>
                                @error('user_type')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                                <div class="form-group row mt-3">
                                    <label for="phone" class="col-sm-5 col-form-label text-muted">Mobile</label>
                                    <div class="col-sm-7">
                                        <input type="text" name="phone" value="{{ old('phone') }}" class="form-control @error('phone') is-invalid @enderror" id="phone" placeholder="018 2700 7441">
                                    </div>
                                </div>

                                @error('phone')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                                <div class="form-group row my-3">
                                    <label for="nid" class="col-sm-5 col-form-label text-muted">NID</label>
                                    <div class="col-sm-7">
                                        <input type="text" name="nid" value="{{ old('nid') }}" class="form-control @error('nid') is-invalid @enderror" id="nid" placeholder="987 6789 6547">
                                    </div>
                                </div>
                                @error('nid')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="text-center ">
                                <button type="submit" class="trusted-medical-assistant-form-sub-btn mt-3 w-75">Submit</button>
                            </div>
                        </form>

                    </div>
                </div>
                <!--=================== card form end =========================-->
            </div>

            <!--================== Otp right side div start==================== -->
            <div class="col-lg-6 col-md-12 col-sm-12 text-center">
                <div class="right-side-form d-none">

                    <!--======================== otp card start here==================== -->
                    <div class="d-flex justify-content-center">
                        <div class="card shadow w-50">
                            <div class="card-body">
                                <h5 class="card-title text-muted">OTP verification</h5>
                                <div class='text-center otp-card-place my-2'>
                                    <input type="text" class='form-control otp-card-place' id="otp" name="otp" placeholder='Enter your otp' />
                                </div>
                                <a href="javascript:void(0)"><button style="color: red !important;" class='btn text-muted re-send-otp-time'><span class="left-time">00</span> Second</button></a>
                                <a href="javascript:void(0)" class="card-link"><button class='btn text-muted  re-send-otp-btn'>Resend</button></a>
                                <a href="#" class="card-link"><button class='otp-btn-verify text-light' id="verification">Verify</button></a>
                            </div>
                        </div>
                    </div>
                    <!--======================== otp card end here==================== -->
                    <div class="apply-next-btn-a d-none">
                        <a href="{{route('rapidPcrCenterAdministrator.qrScan')}}" class="mt-5 btn apply-next-btn">Next</a>
                    </div>
                </div>
            </div>

            <!--================== Otp right side div end==================== -->
        </div>
    </div>
@endsection


@push('script')

{{--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>--}}

    <script>
        jQuery(document).ready(function($){
            $("#registrationForm").submit(function (e) {
                e.preventDefault();
                $('.right-side-form').removeClass("d-none");
                $('.right-side-form').addClass("d-block");
                $('.re-send-otp-time').hide();

                var formData = new FormData();
                formData.append('passport', $('#passport').val());
                formData.append('user_type', $('#user_type').val());
                formData.append('phone', $('#phone').val());
                formData.append('nid', $('#nid').val());

                $.ajax({
                    method: 'POST',
                    url: '/rapid-pcr-center-administrator/trustedPeople',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(data) {
                        // $('#main-form').trigger("reset");
                        $('.re-send-otp-time').hide();
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: data.message,
                            showConfirmButton: false,
                            timer: 1500
                        })
                        $('.otp-reg').show();
                        $('.otp-sent-number').innerText($('#personPhone').val());
                        $("html, body").animate({ scrollTop: $(document).height() }, "slow");
                        // setTimeout(function() {
                        //     location.reload();
                        // }, 800); //
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

            $('#verification').click(function (e){
                e.preventDefault();

                var formData = new FormData();
                formData.append('phone', $('#phone').val());
                formData.append('otp', $('#otp').val());

                $.ajax({
                    method: 'POST',
                    url: '/rapid-pcr-center-administrator/trustedPeople/verification',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(data) {
                        if(data.type == 'success')
                        {
                            /*$('#registrationForm').trigger("reset");*/
                            $('.apply-next-btn-a').removeClass("d-none");
                            $('.apply-next-btn-a').addClass("d-block");
                            Swal.fire({
                                position: 'top-end',
                                icon: 'success',
                                title: data.message,
                                showConfirmButton: false,
                                timer: 1500
                            })
                            $('.otp-reg').show();
                            $('.otp-sent-number').innerText($('#personPhone').val());
                            $("html, body").animate({ scrollTop: $(document).height() }, "slow");

                            // setTimeout(function() {
                            //     location.reload();
                            // }, 800); //
                        }else (data.type == 'error')
                        {
                            Swal.fire({
                                position: 'center',
                                icon: data.type,
                                title: 'Oops...',
                                footer: data.message,
                                showConfirmButton: false,
                                // timer: 1500
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

            $('.re-send-otp-btn').click(function (e){
                var formData = new FormData();
                formData.append('phone', $('#phone').val());

                $.ajax({
                    method: 'POST',
                    url: '/rapid-pcr-center-administrator/trustedPeople/resend-otp',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(data) {
                        // console.log(data.message);
                        if(data.type == 'success')
                        {
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
                                showConfirmButton: true,
                                // timer: 1500
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
        });
    </script>

@endpush
