@extends('RapidPCRCenterPathologist.layouts.master')

@push('title')
    Trusted Profile
@endpush

@push('css')
    <link rel="stylesheet" href="{{ asset('assets/center-part/css/user_profile_30.css') }}">
@endpush

@section('content')
    <!-- Main Page Starts -->
    <div class="profile py-5">
        <div class="container">
            <h5 class="profile__title">Trusted Profile</h5>
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
                                    <h5>Trusted ID</h5>
                                    <h5>Phone</h5>
                                    <h5>Post</h5>
                                    <h5>Age</h5>
                                    <h5>Rapid PCR Center</h5>
                                    <h5>Rapid PCR Center ID</h5>
                                </div>
                                <div class="col-6 details-value">
                                    <h5>{{ $user->id }}</h5>
                                    <h5>{{ $user->phone }}</h5>
                                    <h5>Rapid PCR Pathologist</h5>
                                    <h5>{{ \Carbon\Carbon::now()->format('y') - \Carbon\Carbon::parse($user->userInfo->dob)->format('y') }}
                                    </h5>
                                    <h5>{{ $user->rapidPcrCenter->name ?? '' }}</h5>
                                    <h5>{{ $user->rapid_pcr_center_id }}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card profile-card">
                        <div class="card-header">
                            <h1 class="text-muted">Change password</h1>
                        </div>
                        <div class="card-body">
                            <form class="form" action="{{ route('changePassword') }}" method="POST">
                                @csrf
                                <!--begin::Alert-->
                                @include('Others.message')
                                <!--end::Alert-->
                                <div class="form-group row mb-2">
                                    <label for="oldPassword" class="col-4 text-alert h5 text-muted">Current password</label>
                                    <div class="col-8">
                                        <input id="oldPassword" name="oldPassword" type="password" class="form-control"/>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label for="password" class="col-4 text-alert h5 text-muted">New password</label>
                                    <div class="col-8">
                                        <input id="password" name="password" type="password" class="form-control"/>
                                    </div>
                                </div>
                                <div class="form-group row mb-2">
                                    <label for="confirmPassword" class="col-4 text-alert h5 text-muted">Confirm password</label>
                                    <div class="col-8">
                                        <input id="confirmPassword" name="confirmPassword" type="password" class="form-control"/>
                                    </div>
                                </div>
                                <div class="form-group row mt-4">

                                    <div class="text-end">
                                        <button class="btn btn-primary" type="submit">Save Changes</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Main Page Ends -->
@endsection

@push('script')

@endpush
