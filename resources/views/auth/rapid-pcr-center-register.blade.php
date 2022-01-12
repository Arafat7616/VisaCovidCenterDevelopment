@extends('auth.master')

@push('title')
    Rapid PCR Center Registration
@endpush

@push('css')

@endpush
@section('content')
    <div class="container container-bg-color my-3">
        <!--========================== full form start ==========================================-->
        <form id="main-form" action="javascript:void(0)">
            <div class="card mt-2 card-title1">
                <div class="card-body center-title">
                    <h5 class='card-title fw-bold mx-5'>Rapid PCR Center Details</h5>
                </div>
            </div>
            <!--========================== Center Details form input start ==========================================-->
            <div class="card-body shadow">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 ">
                            <div class="mx-5">
                                <div class='center-Details-form'>
                                    <div class="mb-3 row">
                                        <label for="centerName" class="col-sm-3 col-form-label text-muted">Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" id="centerName" name="centerName" class="form-control"
                                                placeholder='Enter Center Name' />
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="country" class="col-sm-3 col-form-label text-muted">Country</label>
                                        <div class="col-sm-5">
                                            <select class="form-control form-select text-muted" name="country" id="country">
                                                <option disabled value="">Select country</option>
                                                @foreach ($countries as $country)
                                                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="state" class="col-sm-3 col-form-label text-muted">State</label>
                                        <div class="col-sm-5">
                                            <select class="form-control form-select text-muted" name="state" id="state">
                                                <option disabled value="">Select state</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="airport" class="col-sm-3 col-form-label text-muted">Airport</label>
                                        <div class="col-sm-5">
                                            <select class="form-control form-select text-muted" name="airport" id="airport">
                                                <option disabled value="">Select airport</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="city" class="col-sm-3 col-form-label text-muted">City</label>
                                        <div class="col-sm-5">
                                            <select class="form-control form-select text-muted" name="city" id="city">
                                                <option disabled value="">Select city</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="space" class="col-sm-3 col-form-label text-muted">Space(sqft)</label>
                                        <div class="col-sm-9">
                                            <select class="form-control form-select text-muted" name="space" id="space">
                                                <option disabled value="">Select Space(sqft)</option>
                                                @foreach ($centerAreas as $space)
                                                    <option value="{{ $space->id }}">{{ $space->title }} ({{ $space->minimum_space }}-{{ $space->maximum_space }})</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <!-- {/* Right side form start */} -->
                            </div>
                        </div>
                        <div class="col-md-6 d-flex  align-items-center">
                            <div class='right-side-form'>
                                <div class="mb-3 row">
                                    <label for="zipCode" class="col-sm-3 col-form-label text-muted">Zip code</label>
                                    <div class="col-sm-9">
                                        <input type="text" id="zipCode" name="zipCode" class="form-control"
                                            placeholder='Enter Zip Code' />
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="hotLine" class="col-sm-3 col-form-label text-muted">HotLine</label>
                                    <div class="col-sm-9">
                                        <input type="text" id="hotLine" name="hotLine" class="form-control"
                                            placeholder='Enter HotLine' />
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="centerEmail" class="col-sm-3 col-form-label text-muted">Email</label>
                                    <div class="col-sm-9">
                                        <input type="email" id="centerEmail" name="centerEmail" class="form-control"
                                            placeholder='Enter Email' />
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="address" class="col-sm-3 col-form-label text-muted">Address</label>
                                    <div class="col-sm-9">
                                        <input type="text" id="address" name="address" class="form-control"
                                            placeholder='Enter Address' />
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="mapLocation" class="col-sm-3 col-form-label text-muted">Location Link</label>
                                    <div class="col-sm-9">
                                        <input type="text" id="mapLocation" name="mapLocation" class="form-control"
                                            placeholder='Enter Map Location Link' />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--========================== Center Form details input end ==========================================-->
            <!-- {/*............ person details start.................. */} -->
            <div class="card mt-5 card-title1">
                <div class="card-body center-title">
                    <h5 class='card-title mx-5 fw-bold'>Person Details</h5>
                </div>
            </div>
            <!--========================== Person Form details input Start ==========================================-->
            <div class="card-body shadow">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 ">
                            <div class="mx-5">
                                <div class='center-Details-form'>
                                    <div class="mb-3 row">
                                        <label for="personName" class="col-sm-3 col-form-label text-muted">Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" id="personName" name="personName" class="form-control"
                                                placeholder='Enter Name' />
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="personEmail" class="col-sm-3 col-form-label text-muted">Email</label>
                                        <div class="col-sm-9">
                                            <input type="email" id="personEmail" name="personEmail" class="form-control"
                                                placeholder='Enter Email' />
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="personNID" class="col-sm-3 col-form-label text-muted">NID</label>
                                        <div class="col-sm-9">
                                            <input type="text" id="personNID" name="personNID" class="form-control"
                                                placeholder='Enter NID Number' />
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="personPhone" class="col-sm-3 col-form-label text-muted">Phone</label>
                                        <div class="col-sm-9">
                                            <input type="text" id="personPhone" name="personPhone" class="form-control"
                                                placeholder='Enter Phone Number' />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 d-flex  justify-content-center">
                            <div class='right-side-form'>
                                <div class="mb-3 row">
                                    <label for="password" class="col-sm-3 col-form-label text-muted">Password</label>
                                    <div class="col-sm-9">
                                        <input type="password" id="password" name="password" class="form-control"
                                            placeholder='Enter Password' />
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="confirmPassword" class="col-sm-3 col-form-label text-muted">Confirm
                                        password</label>
                                    <div class="col-sm-9">
                                        <input type="password" id="confirmPassword" name="confirmPassword"
                                            class="form-control" placeholder='Confirm Password' />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--========================== Person Form details input end ==========================================-->
            <!-- {/* ...............Documents form details start ........................*/} -->
            <div class="card mt-5 card-title1">
                <div class="card-body center-title">
                    <h5 class='card-title mx-5 fw-bold'>Documents</h5>
                </div>
            </div>
            <!--========================== Documents Form details input start ==========================================-->
            <div class="card-body shadow">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 ">
                            <div class="mx-5">
                                <div class='center-Details-form'>
                                    <div class="mb-3 row">
                                        <label for="tradeLicenseNumber" class="col-sm-3 col-form-label text-muted">Trade
                                            License</label>
                                        <div class="col-sm-9">
                                            <input type="text" id="tradeLicenseNumber" name="tradeLicenseNumber"
                                                class="form-control" placeholder='Enter Trade License No.' />
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="document1" class="col-sm-4 col-form-label text-muted">Document 1</label>
                                        <div class="col-sm-8">
                                            <input name="document1" id="document1" class="form-control" type="file"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 d-flex  justify-content-center">
                            <div class='right-side-form'>
                                <div class="mb-3 row">
                                    <label for="document2" class="col-sm-4 col-form-label text-muted">Document 2</label>
                                    <div class="col-sm-8">
                                        <input name="document2" id="document2" class="form-control" type="file"/>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="document3" class="col-sm-4 col-form-label text-muted">Document 3</label>
                                    <div class="col-sm-8">
                                        <input name="document3" id="document3" class="form-control" type="file"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--========================== Documents Form details input end ==========================================-->
            <!-- {/*............... Documents form details end ..............................*/} -->
            <div class="text-center mt-5 mb-5">
                <button class='reg-sub-btn full-form-submit mb-5'>Submit</button>
            </div>
        </form>
        <!--========================== full form end ==========================================-->
        <!-- {/* Otp design div */} -->
        <div class="otp-reg my-5">
            <p class="text-muted text-center">
                An Otp is just sent to your mobile <span class="otp-sent-number text-danger"></span>. Enter the OTP here.
            </p>
            <div class="otp-card text-center d-flex justify-content-center">
                <!-- ================Otp card start======================= -->
                <div class="card shadow">
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
                <!--================== Otp card end================ -->
            </div>
            <div class="text-center mt-5">
                <button class='apply-reg-btn'></button>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        $( document ).ready(function() {
            $('.otp-reg').hide();
            $('.full-form-submit').click(function() {
                var formData = new FormData();
                formData.append('centerName', $('#centerName').val());
                formData.append('country', $('#country').val());
                formData.append('state', $('#state').val());
                formData.append('airport', $('#airport').val());
                formData.append('city', $('#city').val());
                formData.append('space', $('#space').val());
                formData.append('zipCode', $('#zipCode').val());
                formData.append('address', $('#address').val());
                formData.append('mapLocation', $('#mapLocation').val());
                formData.append('hotLine', $('#hotLine').val());
                formData.append('centerEmail', $('#centerEmail').val());
                formData.append('personName', $('#personName').val());
                formData.append('personEmail', $('#personEmail').val());
                formData.append('personNID', $('#personNID').val());
                formData.append('personPhone', $('#personPhone').val());
                formData.append('password', $('#password').val());
                formData.append('confirmPassword', $('#confirmPassword').val());
                formData.append('tradeLicenseNumber', $('#tradeLicenseNumber').val());
                formData.append('document1', $('#document1')[0].files[0]);
                formData.append('document2', $('#document2')[0].files[0]);
                formData.append('document3', $('#document3')[0].files[0]);

                $.ajax({
                    method: 'POST',
                    url: '/rapid-pcr-center-register-data-store',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(data) {
                        // $('#main-form').trigger("reset");
                        // console.log(data.message);
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: data.message,
                            showConfirmButton: false,
                            timer: 1500
                        })

                        $('.otp-reg').show();
                        $('.otp-sent-number').text($('#personPhone').val());
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
                })
            });
        });

        $('#verification').click(function (e){
            e.preventDefault();

            var formData = new FormData();
            formData.append('otp', $('#otp').val());

            $.ajax({
                method: 'POST',
                url: '/center-register-otp-verify',
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

                        setTimeout(function() {
                            location.replace(data.url);
                        }, 800); //
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


    </script>

    <script type="text/javascript">

        $('#country').change(function() {
            var countryID = $(this).val();
            if (countryID) {
                $.ajax({
                    type: "GET",
                    url: "{{ url('api/get-state-list') }}/" + countryID,
                    success: function(res) {
                        if (res) {
                            $("#state").empty();
                            //$("#state").append('<option>Select</option>');
                            $.each(res, function(key, value) {
                                $("#state").append('<option value="' + value.id + '">' + value
                                    .name + '</option>');
                            });
                        } else {
                            $("#state").empty();
                        }
                    }
                });
                $.ajax({
                    type: "GET",
                    url: "{{ url('api/get-airport-list') }}/" + countryID,
                    success: function(res) {
                        if (res) {
                            $("#airport").empty();
                            //$("#airport").append('<option>Select</option>');
                            $.each(res, function(key, value) {
                                $("#airport").append('<option value="' + value.id + '">' + value
                                    .airport_name + '</option>');
                            });
                        } else {
                            $("#airport").empty();
                        }
                    }
                });
            } else {
                $("#state").empty();
                $("#airport").empty();
                $("#city").empty();
            }
        });
        $('#state').on('change', function() {
            var stateID = $(this).val();
            if (stateID) {
                $.ajax({
                    type: "GET",
                    url: "{{ url('api/get-city-list') }}/" + stateID,
                    success: function(res) {
                        if (res) {
                            $("#city").empty();
                            $.each(res, function(key, value) {
                                $("#city").append('<option value="' + value.id + '">' + value
                                    .name + '</option>');
                            });

                        } else {
                            $("#city").empty();
                        }
                    }
                });
            } else {
                $("#city").empty();
            }

        });
    </script>
@endpush
