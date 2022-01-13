@extends('Administrator.layouts.master')

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
            <h5 class="profile__title">Manage center</h5>
            <div class="profile__title__bottom"></div>

            <div class="row">
                <div class="col-6">
                    <div class="card profile-card">
                        <div class="card-header">
                            <h1 class="text-muted">Update space <span class="@if($center->status == 1) text-success @elseif ($center->status == 0) text-danger @endif">@if($center->status == 1)Approved @elseif ($center->status == 0) Pending @endif</span></h1>
                        </div>
                        <div class="card-body">
                            <form class="form" action="{{ route('administrator.updateCenterSpace') }}" method="POST">
                                @csrf
                                @include('Others.toaster_message')
                                <!--begin::Alert-->
                                <!--end::Alert-->
                                <div class="form-group row mb-2">
                                    <label for="space" class="col-4 text-alert h5 text-muted">Space(sqft)</label>
                                    <div class="col-8">
                                        <select class="form-control form-select text-muted" name="space" id="space">
                                            <option disabled value="">Select Space(sqft)</option>
                                            @foreach ($centerAreas as $space)
                                                <option @if($space->id == $center->center_area_id) selected @endif value="{{ $space->id }}">{{ $space->title }} ({{ $space->minimum_space }}-{{ $space->maximum_space }})</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('space')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
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
