@extends('auth.master')

@push('title')
    User Information
@endpush

@push('css')
    <link rel="stylesheet" href="{{ asset('assets/center-part/css/new_registration_model_39.css') }}">
@endpush
@section('content')
    <div class="container">
        <div class="row text-center">
            <div class="col-4 col-sm-12 col-xs-12 col-xl-4 ">
                <div class="row">
                    <div class="col-4 new_registration__model__content">
                        <h6>Name</h6>
                        <h6>Father</h6>
                        <h6>Passport</h6>
                        <h6>NID</h6>
                    </div>
                    <div class="col-8">
                        <h6>{{ $user->name }}</h6>
                        <h6>{{ $user->userInfo->father_name }}</h6>
                        <h6>{{ $user->userInfo->passport_no }}</h6>
                        <h6>{{ $user->nid_no }}</h6>
                    </div>
                </div>
            </div>
            <div class="col-4 col-sm-12 col-xs-12 col-xl-4">
                <div class="row">
                    <div class="col-4">
                        <h6>Birth Date</h6>
                        <h6>Location</h6>
                        <h6>Mobile</h6>
                        <h6>Address</h6>
                    </div>
                    <div class="col-8">
                        <h6>{{ $user->userInfo->dob }}</h6>
                        <h6>{{ $user->userInfo->city->name }}</h6>
                        <h6>{{ $user->phone }}</h6>
                        <h6>{{ $user->userInfo->present_address }}</h6>
                    </div>
                </div>
            </div>
            <div class="col-4 col-sm-12 col-xs-12 col-xl-4">
                <img class="new_registration__model__img img-fluid" src="{{ asset($user->image ?? get_static_option('no_image')) }}" alt="">
            </div>
            <div class="new_registration__model__divider"></div>
            <div class="row">
                <div class="col-12 text-center pb-0">
                    <h6 class="new_registration__title">Vaccine</h6>
                </div>
                <div class="col-4 p-0 ps-3">
                    <h5 class="new_registration__head">Dose 1</h5>
                    <div class="new_registration__body px-3">
                        <span>Cinopharma 982</span> <br>
                        <span>Vaccine Center: Kuet Moitri Hospital</span> <br>
                        <span>Served By: 93274</span> <br>
                        <span>Date: 01-04-2021</span>
                    </div>
                </div>
                <div class="col-4 ps-0 pe-0">
                    <h5 class="new_registration__head new_registration__border">Dose 2</h5>
                    <div class="new_registration__body px-3">
                        <span>Cinopharma 982</span> <br>
                        <span>Vaccine Center: Kuet Moitri Hospital</span> <br>
                        <span>Served By: 93274</span> <br>
                        <span>Date: 01-04-2021</span>
                    </div>
                </div>
                <div class="col-4 ps-0 pe-3">
                    <h5 class="new_registration__head">Booster</h5>
                    <div class="new_registration__body px-3">
                        <span>Cinopharma 982</span> <br>
                        <span>Vaccine Center: Kuet Moitri Hospital</span> <br>
                        <span>Served By: 93274</span> <br>
                        <span>Date: 01-04-2021</span>
                    </div>
                </div>
            </div>

            <div class="row mt-5">
                <div class="col-12 text-center">
                    <h6 class="new_registration__title">PCR</h6>
                </div>
                <div class="col-4 p-0 ps-3">
                    <h5 class="new_registration__head">Date</h5>
                    <div class="new_registration__body px-3">
                        <span>Taken:  10-15-10</span> <br>
                        <span>Received: 10-15-10</span> <br>
                        <span>Active Till: 01-04-2021</span>
                    </div>
                </div>
                <div class="col-4 ps-0 pe-0">
                    <h5 class="new_registration__head new_registration__border">Authorised</h5>
                    <div class="new_registration__body px-3">
                        <span>Vaccine Center: Kuet Moitri Hospital</span> <br>
                        <span>Served By: 93274</span> <br>
                        <span>System: Visa Covid</span>
                    </div>
                </div>
                <div class="col-4 ps-0 pe-3">
                    <h5 class="new_registration__head">Result</h5>
                    <div class="new_registration__body px-3">
                        <p class="text-success">Positive</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row my-5">
            <div class="new_registration__qr text-center">
                <img src="{{ asset('assets/center-part/image/qr/qr_img.png') }}" alt="">
            </div>
        </div>

        <div class="row my-5">
            <div class="new_registration__modal__bottom text-center d-flex align-items-center">
                <div class="col-6">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis deleniti est in ipsa quos sunt tempore voluptas voluptatem. Corporis, cum dignissimos</p>
                </div>
                <div class="col-6 me-0">
                    <img src="{{ asset(get_static_option('logo') ?? get_static_oprion('no_image')) }}" alt="">
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')

@endpush
