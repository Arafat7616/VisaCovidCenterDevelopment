@extends('auth.master')

@push('title')
    Center Registration
@endpush

@push('css')

@endpush
@section('content')
    <div class="container container-bg-color my-3">
        <!--========================== full form start ==========================================-->
        <form>
            <div class="card mt-2 card-title1">
                <div class="card-body center-title">
                    <h5 class='card-title fw-bold mx-5'>Center Details</h5>
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
                                            <input type="text" id="centerName" name="centerName" class="form-control" placeholder='Enter Center Name' />
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="country"
                                            class="col-sm-3 col-form-label text-muted">Country</label>
                                        <div class="col-sm-5">
                                            <select class="form-control form-select text-muted" name="country"  id="country" >
                                                <option disabled value="">Select country</option>
                                                @foreach($countries as $country)
                                                    <option value="{{$country->id}}">{{$country->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="state"
                                            class="col-sm-3 col-form-label text-muted">State</label>
                                        <div class="col-sm-5">
                                            <select class="form-control form-select text-muted" name="state"  id="state" >
                                                <option disabled value="">Select state</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="city"
                                            class="col-sm-3 col-form-label text-muted">City</label>
                                        <div class="col-sm-5">
                                            <select class="form-control form-select text-muted" name="city"  id="city" >
                                                <option disabled value="">Select city</option>
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
                                        <input type="text" id="zipCode" name="zipCode" class="form-control" placeholder='Enter Zip Code' />
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="hotLine" class="col-sm-3 col-form-label text-muted">HotLine</label>
                                    <div class="col-sm-9">
                                        <input type="text" id="hotLine" name="hotLine" class="form-control" placeholder='Enter HotLine' />
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="area" class="col-sm-3 col-form-label text-muted">Area</label>
                                    <div class="col-sm-9">
                                        <input type="text" id="area" name="area" class="form-control" placeholder='Enter Area' />
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
                                        <label for="PersonName" class="col-sm-3 col-form-label text-muted">Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" id="PersonName" name="PersonName" class="form-control" placeholder='Enter Name' />
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="PersonEmail" class="col-sm-3 col-form-label text-muted">Email</label>
                                        <div class="col-sm-9">
                                            <input type="email" id="PersonEmail" name="PersonEmail" class="form-control" placeholder='Enter Email' />
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="PersonNID" class="col-sm-3 col-form-label text-muted">NID</label>
                                        <div class="col-sm-9">
                                            <input type="email" id="PersonNID" name="PersonNID" class="form-control" placeholder='Enter NID Number' />
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="PersonPhone" class="col-sm-3 col-form-label text-muted">Phone</label>
                                        <div class="col-sm-9">
                                            <input type="email" id="PersonPhone" name="PersonPhone" class="form-control" placeholder='Enter Phone Number' />
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
                                        <input type="password" id="password" name="password" class="form-control" placeholder='Enter Password' />
                                    </div>
                                </div>

                                <div class="mb-3 row">
                                    <label for="confirmPassword" class="col-sm-3 col-form-label text-muted">Confirm password</label>
                                    <div class="col-sm-9">
                                        <input type="password" id="confirmPassword" name="confirmPassword" class="form-control" placeholder='Confirm Password' />
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
                                        <label for="tradeLicenseNumber" class="col-sm-3 col-form-label text-muted">Trade License</label>
                                        <div class="col-sm-9">
                                            <input type="text" id="tradeLicenseNumber" name="tradeLicenseNumber" class="form-control" placeholder='Enter Trade License' />
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="document1" class="col-sm-4 col-form-label text-muted">Document 1</label>
                                        <div class="col-sm-8">
                                            <input name="document1" id="document1" class="form-control" type="file" id="formFile"/>
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
                                        <input name="document2" id="document2" class="form-control" type="file" id="formFile"/>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="document3" class="col-sm-4 col-form-label text-muted">Document 3</label>
                                    <div class="col-sm-8">
                                        <input name="document3" id="document3" class="form-control" type="file" id="formFile"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--========================== Documents Form details input end ==========================================-->
            <!-- {/*............... Documents form details end ..............................*/} -->
            <div class="text-center mt-5">
                <button class='reg-sub-btn full-form-submit'>Submit</button>
            </div>
        </form>
        <!--========================== full form end ==========================================-->
        <!-- {/* Otp design div */} -->
        <div class="otp-reg my-5">
            <p class="text-muted text-center">
                An Otp is just sent to your mobile 01827 007 441. Enter the OTP here.
            </p>
            <div class="otp-card text-center d-flex justify-content-center">
                <!-- ================Otp card start======================= -->
                <div class="card shadow">
                    <div class="card-body">
                        <h5 class="card-title text-muted">OTP verification</h5>
                        <div class='text-center otp-card-place my-2'>
                            <input type="text" class='form-control otp-card-place' placeholder='12345' />
                        </div>

                        <a href="#" class="card-link"><button class='btn text-muted'>Resend</button></a>
                        <a href="#" class="card-link"><button class=' otp-btn-verify text-light'>Verify</button></a>
                    </div>
                </div>
                <!--================== Otp card end================ -->
            </div>
            <div class="text-center mt-5">
                <button class='apply-reg-btn'>Apply for center registration</button>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
         $('#full-form-submit').click(function(){
               var formData = new FormData();
               formData.append('name', $('#category-name').val())
               formData.append('icon', $('#icon')[0].files[0])
               $.ajax({
                   method: 'POST',
                   url: '/admin/special-service',
                   headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                   data: formData,
                   processData: false,
                   contentType: false,
                   success: function (data) {
                       $('#modal').modal('hide');
                       $('#category-name').val('');
                       Swal.fire({
                           position: 'top-end',
                           icon: 'success',
                           title: 'Successfully add '+data.name,
                           showConfirmButton: false,
                           timer: 1500
                       })
                       setTimeout(function() {
                           location.reload();
                       }, 800);//
                   },
                   error: function (xhr) {
                       var errorMessage = '<div class="card bg-danger">\n' +
                           '                        <div class="card-body text-center p-5">\n' +
                           '                            <span class="text-white">';
                       $.each(xhr.responseJSON.errors, function(key,value) {
                           errorMessage +=(''+value+'<br>');
                       });
                       errorMessage +='</span>\n' +
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
    </script>
@endpush
