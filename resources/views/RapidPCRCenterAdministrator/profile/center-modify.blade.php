@extends('RapidPCRCenterAdministrator.layouts.master')

@push('title')
    Rapid PCR Center Modify
@endpush

@push('css')
    <link rel="stylesheet" href="{{ asset('assets/center-part/css/user_profile_30.css') }}">
@endpush

@section('content')
    <!-- Main Page Starts -->
    <div class="profile py-5">
        <div class="container">
            <h5 class="profile__title">Rapid PCR Center Modify</h5>
            <div class="profile__title__bottom"></div>
            <div class="card profile-card">
                <div class="card-header">
                    <h1 class="text-muted">Update space <span class="@if($rapidPcrCenter->status == 1) text-success @elseif ($rapidPcrCenter->status == 0) text-danger @endif">@if($rapidPcrCenter->status == 1)Approved @elseif ($rapidPcrCenter->status == 0) Pending @endif</span></h1>
                </div>
                <div class="card-body">
                    <form class="form" action="{{ route('rapidPcrCenterAdministrator.centerModifyPost') }}" method="POST">
                        @csrf
                        @include('Others.toaster_message')
                        <!--begin::Alert-->
                        <!--end::Alert-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row mb-2">
                                    <label for="space" class="col-4 text-alert h5 text-muted">Space(sqft)</label>
                                    <div class="col-8">
                                        <input type="number" value="{{ $rapidPcrCenter->space }}" id="space" name="space" class="form-control text-muted"
                                        placeholder='1000' />
                                    </div>
                                    @error('space')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group row mb-2">
                                    <label for="centerName" class="col-4 text-alert h5 text-muted">Name</label>
                                    <div class="col-8">
                                        <input type="text" value="{{ $rapidPcrCenter->name }}" id="centerName" name="centerName" class="form-control text-muted"
                                        placeholder='Enter Center Name' />
                                    </div>
                                    @error('centerName')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group row mb-2">
                                    <label for="country" class="col-4 text-alert h5 text-muted">Country</label>
                                    <div class="col-8">
                                        <select class="form-control form-select text-muted" name="country" id="country">
                                            <option disabled value="">Select country</option>
                                            @foreach ($countries as $country)
                                                <option @if($country->id == $rapidPcrCenter->country_id) selected @endif value="{{ $country->id }}">{{ $country->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('country')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group row mb-2">
                                    <label for="state" class="col-4 text-alert h5 text-muted">State</label>
                                    <div class="col-8">
                                        <select class="form-control form-select text-muted" name="state" id="state">
                                            <option disabled value="">Select state</option>
                                        </select>
                                    </div>
                                    @error('state')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group row mb-2">
                                    <label for="city" class="col-4 text-alert h5 text-muted">City</label>
                                    <div class="col-8">
                                        <select class="form-control form-select text-muted" name="city" id="city">
                                            <option disabled value="">Select city</option>
                                        </select>
                                    </div>
                                    @error('city')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group row mb-2">
                                    <label for="waitingSeatCapacity" class="col-4 text-alert h5 text-muted">Waiting Seat Capacity</label>
                                    <div class="col-8">
                                        <input type="number" value="{{ $rapidPcrCenter->waiting_seat_capacity }}" id="waitingSeatCapacity" name="waitingSeatCapacity" class="form-control text-muted"
                                        placeholder='Waiting Seat Capacity' />
                                    </div>
                                    @error('waitingSeatCapacity')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row mb-2">
                                    <label for="zipCode" class="col-4 text-alert h5 text-muted">Zip code</label>
                                    <div class="col-8">
                                        <input type="text" value="{{ $rapidPcrCenter->zip_code }}" id="zipCode" name="zipCode" class="form-control text-muted"
                                        placeholder='Zip Code' />
                                    </div>
                                    @error('zipCode')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group row mb-2">
                                    <label for="hotline" class="col-4 text-alert h5 text-muted">HotLine</label>
                                    <div class="col-8">
                                        <input type="text" value="{{ $rapidPcrCenter->hotline }}" id="hotline" name="hotline" class="form-control text-muted"
                                        placeholder='HotLine' />
                                    </div>
                                    @error('hotline')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group row mb-2">
                                    <label for="centerEmail" class="col-4 text-alert h5 text-muted">Email</label>
                                    <div class="col-8">
                                        <input type="text" value="{{ $rapidPcrCenter->email }}" id="centerEmail" name="centerEmail" class="form-control text-muted"
                                        placeholder='Email' />
                                    </div>
                                    @error('centerEmail')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group row mb-2">
                                    <label for="address" class="col-4 text-alert h5 text-muted">Address</label>
                                    <div class="col-8">
                                        <input type="text" value="{{ $rapidPcrCenter->address }}" id="address" name="address" class="form-control text-muted"
                                        placeholder='Address' />
                                    </div>
                                    @error('address')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group row mb-2">
                                    <label for="mapLocation" class="col-4 text-alert h5 text-muted">Location Link</label>
                                    <div class="col-8">
                                        <input type="text" value="{{ $rapidPcrCenter->map_location }}" id="mapLocation" name="mapLocation" class="form-control text-muted"
                                        placeholder='Enter Map Location Link' />
                                    </div>
                                    @error('mapLocation')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>                           
                            </div>
                            <div class="form-group row mt-4">
                                <div class="text-end">
                                    <button class="btn btn-primary" type="submit">Save Changes</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Main Page Ends -->
@endsection

@push('script')
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
            } else {
                $("#state").empty();
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
