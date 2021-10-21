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
                        <h6>{{ $user->userInfo->nid_no }}</h6>
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
                        {{-- <h6>{{ $user->userInfo->city->name }}</h6> --}}
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
                        <span>{{ $user->vaccination->name_of_vaccine }}</span> <br>
                        <span>Vaccine Center: {{ $user->vaccination->center->name }}</span> <br>
                        <span>Served By: {{ $user->vaccination->first_served_by_id }}</span> <br>
                        <span>Date: {{ $user->vaccination->date_of_first_dose }}</span>
                    </div>
                </div>
                <div class="col-4 ps-0 pe-0">
                    <h5 class="new_registration__head new_registration__border">Dose 2</h5>
                    <div class="new_registration__body px-3">
                        <span>{{ $user->vaccination->name_of_vaccine }}</span> <br>
                        <span>Vaccine Center: {{ $user->vaccination->center->name }}</span> <br>
                        <span>Served By: {{ $user->vaccination->second_served_by_id }}</span> <br>
                        <span>Date: {{ $user->vaccination->date_of_second_dose }}</span>
                    </div>
                </div>
                <div class="col-4 ps-0 pe-3">
                    <h5 class="new_registration__head">Booster</h5>
                    <div class="new_registration__body px-3">
                        <span>{{ $user->booster->name_of_vaccine }}</span> <br>
                        <span>Vaccine Center: {{ $user->booster->center->name }}</span> <br>
                        <span>Served By: {{ $user->booster->served_by_id }}</span> <br>
                        <span>Date: {{ $user->booster->date }}</span>
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
                        <span>Sample Collection:  {{ $user->pcrTest->sample_clloection_date }}</span> <br>
                        <span>Tested Date:  {{ $user->pcrTest->date_of_pcr_test }}</span> <br>
                        <span>Result Published:  {{ $user->pcrTest->result_published_date }}</span> <br>
                    </div>
                </div>
                <div class="col-4 ps-0 pe-0">
                    <h5 class="new_registration__head new_registration__border">Authorised</h5>
                    <div class="new_registration__body px-3">
                        <span>Medical Center: {{ $user->pcrTest->center->name }}</span> <br>
                        <span>Served By: {{ $user->pcrTest->tested_by }}</span> <br>
                        <span>System: {{ config('app.name') }}</span>
                    </div>
                </div>
                <div class="col-4 ps-0 pe-3">
                    <h5 class="new_registration__head">Result</h5>
                    <div class="new_registration__body px-3">
                        @if($user->pcrTest->pcr_result == 'positive')
                            <p class="text-danger">Positive</p>
                        @elseif ($user->pcrTest->pcr_result == 'negative')
                            <p class="text-success">Negative</p>
                        @endif
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
                    <p>{{ get_static_option('report_wish_tag') }}</p>
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
