@extends('auth.master')

@push('title')
    Home
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
                                        <label for="inputPassword" class="col-sm-3 col-form-label text-muted">Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" "inputPassword"
                                                placeholder='Unity throught population center' />
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="inputPassword"
                                            class="col-sm-3 col-form-label text-muted">Country</label>
                                        <div class="col-sm-5">
                                            <select class="form-select text-muted" aria-label="Default select example">
                                                <option value="1">Bangladesh</option>
                                                <option value="2">Country-2</option>
                                                <option value="3">Country-3</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="inputPassword" class="col-sm-3 col-form-label text-muted">Zip
                                            code</label>
                                        <div class="col-sm-4">
                                            <input type="text" class="form-control" "inputPassword" placeholder='1230' />
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="inputPassword"
                                            class="col-sm-3 col-form-label text-muted">HotLine</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="inputPassword"
                                                placeholder='00 91123 498 762' />
                                        </div>
                                    </div>
                                </div>
                                <!-- {/* Right side form start */} -->
                            </div>
                        </div>
                        <div class="col-md-6 d-flex  align-items-center">
                            <div class='right-side-form'>

                                <div class="mb-3 row">
                                    <label for="inputPassword" class="col-sm-3 col-form-label text-muted">City</label>
                                    <div class="col-sm-8">
                                        <select class="form-select text-muted" aria-label="Default select example">
                                            <option value="1">Dhaka</option>
                                            <option value="2">City-2</option>
                                            <option value="3">City-3</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="inputPassword" class="col-sm-3 col-form-label text-muted">Area</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="inputPassword" placeholder='Uttara' />
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
                                        <label for="inputPassword" class="col-sm-3 col-form-label text-muted">Name</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="inputPassword"
                                                placeholder='HM Asaduzzaman Kamal' />
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="inputPassword" class="col-sm-3 col-form-label text-muted">Email</label>
                                        <div class="col-sm-9">
                                            <input type="mail" class="form-control" id="inputPassword"
                                                placeholder='asaduzzaman.uttps@gmail.com' />
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="inputPassword" class="col-sm-3 col-form-label text-muted">NID</label>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" id="inputPassword"
                                                placeholder='123 234 234' />
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="inputPassword" class="col-sm-3 col-form-label text-muted">Mobile</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" id="inputPassword"
                                                placeholder='018 2700 7441' />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 d-flex  justify-content-center">
                            <div class='right-side-form'>
                                <div class="mb-3 row">
                                    <label for="inputPassword" class="col-sm-5 col-form-label text-muted">Create
                                        password</label>
                                    <div class="col-sm-7">
                                        <input type="password" class="form-control" id="inputPassword"
                                            placeholder='p a s s w o r d' />
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="inputPassword" class="col-sm-5 col-form-label text-muted">Confirm
                                        password</label>
                                    <div class="col-sm-7">
                                        <input type="password" class="form-control" id="inputPassword"
                                            placeholder='p a s s w o r d' />
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
                                        <label for="inputPassword" class="col-sm-4 col-form-label text-muted">Trade
                                            License</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" id="inputPassword"
                                                placeholder='987 654 567' />
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label for="inputPassword" class="col-sm-4 col-form-label text-muted">Document
                                            1</label>
                                        <div class="col-sm-8">
                                            <input class="form-control" type="file" id="formFile"></input>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 d-flex  justify-content-center">
                            <div class='right-side-form'>
                                <div class="mb-3 row">
                                    <label for="inputPassword" class="col-sm-3 col-form-label text-muted">Document
                                        2</label>
                                    <div class="col-sm-8">
                                        <input class="form-control" type="file" id="formFile"></input>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="inputPassword" class="col-sm-3 col-form-label text-muted">Document
                                        3</label>
                                    <div class="col-sm-8">
                                        <input class="form-control" type="file" id="formFile"></input>

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
                <button onClick={handleClickOtp} class='reg-sub-btn'>Submit</button>
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

@endpush



{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

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
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
