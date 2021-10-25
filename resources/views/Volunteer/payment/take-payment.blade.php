@extends('Volunteer.layouts.master')

@push('title')
    Payment Receive
@endpush

@push('css')
    <link rel="stylesheet" href="{{ asset('assets/center-part/css/user_profile_26.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/center-part/css/user_profile_27.css') }}">
@endpush

@section('content')
    <div class="profile py-5">
        <div class="container">
            <h5 class="profile__title">PCR Process</h5>
            <div class="profile__title__bottom"></div>

            <div class="row">
                <div class="col-6">
                    <div class="card profile-card">
                        <div class="card-body">
                            <div class="text-center">
                                <img class="card-img profile-card-image"
                                    src="{{ asset($user->image ?? get_static_option('no_image')) }}" alt="Card image cap">
                                <h1 class="profile-name">{{ $user->name }}</h1>
                            </div>
                            <div class="profile-details row">
                                <div class="col-6 details-key">
                                    <h5>Blood Group</h5>
                                    <h5>Passport</h5>
                                    <h5>Phone</h5>
                                    <h5>Age</h5>
                                    <h5>Present Address</h5>
                                </div>
                                <div class="col-6 details-value">
                                    <h5>{{ $user->userInfo->blood_group }}</h5>
                                    <h5>{{ $user->userInfo->passport_no }}</h5>
                                    <h5>{{ $user->phone }}</h5>
                                    <h5>{{ \Carbon\Carbon::now()->format('y') - \Carbon\Carbon::parse($user->userInfo->dob)->format('y') }}
                                    </h5>
                                    <h5>{{ $user->userInfo->present_address }}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 unpaid-div">
                    <div class="profile-other-info">
                        <div class="card payment-method-card">
                            <div class="card-body">
                                <h2>Payment Status</h2>
                                <button class="btn btn-danger status-btn unpaid-btn">UNPAID</button>
                            </div>
                        </div>

                        <div class="card liveness-card">
                            <div class="card-body">
                                <h2>Liveness</h2>
                                <button class="btn btn-primary liveness-take-btn bg-liveness-1st">Taken with client's
                                    device</button>
                                <button class="btn btn-info liveness-take-btn bg-liveness-2nd">Take now with this
                                    device</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 after-click-unpaid">
                    <div class="profile-other-info">
                        <div class="card payment-method-card">
                            <div class="card-body">
                                <h2 class="mb-5">Payment Status</h2>
                                <div class="profile-details row">
                                    <div class="col-6">
                                        <p>PCR Test fee</p>
                                        <h4>Total</h4>
                                    </div>
                                    <div class="col-6 text-end">
                                        <p>$9.99</p>
                                        <h4>$13.97</h4>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card payment-method-card">
                            <div class="card-body">
                                <h2 class="mb-5">Payment method</h2>
                                <div class="payment-method-lists">
                                    <div id="owl-demo" class="owl-carousel owl-theme">
                                        <div class="item"><img src="{{ asset('assets/center-part/payment-method/bkash.png') }}" alt="Owl Image">
                                        </div>
                                        <div class="item"><img src="{{ asset('assets/center-part/payment-method/nagad.png') }}" alt="Owl Image">
                                        </div>
                                        <div class="item"><img src="{{ asset('assets/center-part/payment-method/rocket.png') }}" alt="Owl Image">
                                        </div>
                                        <div class="item"><img src="{{ asset('assets/center-part/payment-method/upay.png') }}" alt="Owl Image">
                                        </div>
                                        <div class="item"><img src="{{ asset('assets/center-part/payment-method/upay.png') }}" alt="Owl Image">
                                        </div>
                                        <div class="item"><img src="{{ asset('assets/center-part/payment-method/bank.png') }}" alt="Owl Image">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="payment-checkbox">
                            <input type="checkbox" class="checkbox">
                            <label>Payment received</label>
                        </div>

                        <div class="">
                            <button type="button" class="btn btn-primary full-width-button-box">Payment confirmed</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        $(document).ready(function() {
            $(".after-click-unpaid").hide();
            $(".unpaid-btn").click(function() {
                $(".unpaid-div").hide();
                $(".after-click-unpaid").show();
            });
        });
    </script>
@endpush
