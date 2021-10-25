@extends('Receptionist.layouts.master')

@push('title')
    New Registraton
@endpush

@push('css')
    <link rel="stylesheet" href="{{ asset('assets/center-part/css/Registration-process-44-45.css') }}">
@endpush

@section('content')
    <div class="container my-3">
        <h2 class="reg-color">Registration process</h2>
        <hr>
    </div>
    <div class="container my-3">
        <div class="row">
            <div class="col-md-7">
                <div class="card">
                    <nav>
                        <div class="nav nav-tabs justify-content-around" id="nav-tab" role="tablist">
                            <button class="nav-link" id="nav-home-tab" data-bs-toggle="tab"  type="button" role="tab" aria-controls="nav-home" aria-selected="true" data-toggle="pill" href="#form-1">Create account</button>
                            <button class="nav-link active" id="nav-profile-tab" data-bs-toggle="tab"  type="button" role="tab" aria-controls="nav-profile" aria-selected="false" data-toggle="pill" href="#form-2">Existing account</button>
                        </div>
                    </nav>
                    <div class="card-body">
                        <div class="tab-content">
                            <div id="form-1" class="tab-pane fade w-50">
                                <form id="registrationForm" action="#" method="post">
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
                                    <input type="hidden" id="center_id" name="center_id" value="{{ Auth::user()->center_id }}">
                                    <input type="hidden" id="user_type" name="user_type" value="user">

                                    <div class="submit-button text-center">
                                        <button type="submit" class="addministator-form-sub-btn">Submit</button>
                                    </div>
                                </form>
                            </div>

                            <div id="form-2" class="tab-pane active w-50 ms-auto ">
                                <form>
                                    <div class="my-4 row">
                                        <label for="inputPassword" class="col-sm-4 col-form-label text-muted">Passport</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control form-circle" id="inputPassword" placeholder="987 6789 6547">
                                        </div>
                                    </div>

                                    <div class="mb-4 row">
                                        <label for="inputPassword" class="col-sm-4 col-form-label text-muted">Location</label>
                                        <div class="col-sm-7">
                                            <select class="form-select text-muted form-circle" aria-label="Default select example">
                                                <option selected>Bangladesh</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="mb-4 row">
                                        <label for="inputPassword" class="col-sm-4 col-form-label text-muted">Mobile</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control form-circle" placeholder="987 6789 6547" >
                                        </div>
                                    </div>

                                    <div class="my-4 row">
                                        <label for="inputPassword" class="col-sm-4 col-form-label text-muted">NID</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control form-circle"placeholder='987 6789 6547'>
                                        </div>
                                    </div>

                                    <div class="submit-button  text-center ">
                                        <div class="w-100 addministator-form-sub-btn">Submit</div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-5" id="otp_form">
                <div class="row">
                    <div class="d-flex justify-content-center">
                        <div class="card shadow mr-3">
                            <div class="card-body">
                                <h5 class="card-title text-muted">OTP verification</h5>
                                <div class='text-center otp-card-place my-2'>
                                    <input type="text" id="otp" class='form-control otp-card-place' placeholder='' />
                                </div>

                                <a href="#" class="card-link"><button class='btn text-muted'>Resend</button></a>
                                <a href="#" class="card-link"><button class='otp-btn-verify text-light'>Verify</button></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row w-100">
                    <div id="complete_button" class="text-center mt-4">
                        <a href="{{route('receptionist.qrScan')}}" class="btn btn-success w-25">Done</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        jQuery(document).ready(function($){
            $('#otp_form').hide();
            $('#complete_button').hide();

            $("#registrationForm").submit(function (e) {
                e.preventDefault();
                var formData = new FormData();
                formData.append('passport', $('#passport').val());
                formData.append('user_type', $('#user_type').val());
                formData.append('phone', $('#phone').val());
                formData.append('nid', $('#nid').val());
                formData.append('center_id', $('#center_id').val());


                $.ajax({
                    method: 'POST',
                    url: '/receptionist/trustedPeople',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(data) {
                        $('#otp_form').show();
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: data.message,
                            showConfirmButton: false,
                            timer: 2000
                        })
                        $('.otp-reg').show();
                        $('.otp-sent-number').innerText($('#personPhone').val());
                        $("html, body").animate({ scrollTop: $(document).height() }, "slow");
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
                    url: '/receptionist/trustedPeople/verification',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(data) {
                        $('#complete_button').show();
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: data.message,
                            showConfirmButton: false,
                            timer: 2000
                        })
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
        });
    </script>
@endpush
