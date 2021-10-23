@extends('Administrator.layouts.master')

@push('title')
    Edit volunteer
@endpush

@push('css')
    <link rel="stylesheet" href="{{asset('assets/center-part/css/administrator_profile_6.css')}}">
    <style>
        .administrator__profile__card__content h6{
            padding: 0px 0px;
            margin: 20px 0px;
        }

        .administrator__profile__card__input h6{
            padding: 0px 0px;
            margin: 18px 0px;
        }
    </style>
@endpush

@section('content')
    <div class="administrator__profile py-5">
        <div class="container">
            <form action="{{route('administrator.trustedPeople.update', $user->id)}}" method="post">
                @csrf
                @method('put')
                <div class="administrator__profile__card shadow-sm">
                    <div class="row">
                        <div class="col-4">
                            <div class="row">
                                <div class="col-3 administrator__profile__card__content my-0">
                                    <h6>Name</h6>
                                    <h6>Father</h6>
                                    <h6>Mother</h6>
                                    <h6>Blood</h6>
                                    <h6>Passport</h6>
                                    <h6>NID</h6>
                                    <h6>Country</h6>
                                    <h6>State</h6>
                                </div>
                                <div class="col-8 administrator__profile__card__input">
                                    <h6><input class="@error('name') is-invalid @enderror" type="text" name="name" value="{{$user->name}}"></h6>
                                    <h6><input class="@error('father_name') is-invalid @enderror" type="text" name="father_name" value="{{$userInfo->father_name}}"></h6>
                                    <h6><input class="@error('mother_name') is-invalid @enderror" type="text" name="mother_name" value="{{$userInfo->mother_name}}"></h6>
                                    <h6>
                                        <select class="@error('blood_group') is-invalid @enderror" name="blood_group">
                                            <option value="">Select One</option>
                                            <option {{$userInfo->blood_group == 'A+' ? 'selected' : ''}} value="A+">A+</option>
                                            <option {{$userInfo->blood_group == 'A-' ? 'selected' : ''}} value="A-">A-</option>
                                            <option {{$userInfo->blood_group == 'B+' ? 'selected' : ''}} value="B+">B+</option>
                                            <option {{$userInfo->blood_group == 'B-' ? 'selected' : ''}} value="B-">B-</option>
                                            <option {{$userInfo->blood_group == 'AB+' ? 'selected' : ''}} value="AB+">AB+</option>
                                            <option {{$userInfo->blood_group == 'AB-' ? 'selected' : ''}} value="AB-">AB-</option>
                                            <option {{$userInfo->blood_group == 'O+' ? 'selected' : ''}} value="O+">O+</option>
                                            <option {{$userInfo->blood_group == 'O-' ? 'selected' : ''}} value="O-">O-</option>
                                        </select>
                                    </h6>
                                    <h6><input class="@error('passport_no') is-invalid @enderror" type="text" name="passport_no" value="{{$userInfo->passport_no}}"></h6>
                                    <h6><input class="@error('nid_no') is-invalid @enderror" type="text" name="nid_no" value="{{$userInfo->nid_no}}"></h6>
                                    <h6>
                                        <select class="@error('country_id') is-invalid @enderror" name="country_id" id="country">
                                            <option value="">Select One</option>
                                            @foreach($countries as $country)
                                                <option {{$userInfo->country_id == $country->id ? 'selected' : ''}} value="{{$country->id}}">{{$country->name}}</option>
                                            @endforeach
                                        </select>
                                    </h6>
                                    <h6>
                                        <select class="@error('state_id') is-invalid @enderror" name="state_id" id="state">
                                            <option value="">Select One</option>
                                            @foreach($states as $state)
                                                <option {{$userInfo->state_id == $state->id ? 'selected' : ''}} value="{{$state->id}}">{{$state->name}}</option>
                                            @endforeach
                                        </select>
                                    </h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="row">
                                <div class="col-4 administrator__profile__card__content">
                                    <h6>Email</h6>
                                    <h6>Birth Date</h6>
                                    <h6>Mobile</h6>
                                    <h6>Present Address</h6>
                                    <h6>Permanent Address</h6>
                                    <h6>City</h6>
                                    <h6>Gender</h6>
                                </div>
                                <div class="col-8 administrator__profile__card__input">
                                    <h6><input class="@error('email') is-invalid @enderror" type="email" name="email" value="{{$user->email}}"></h6>
                                    <h6><input class="@error('dob') is-invalid @enderror" type="date" name="dob" value="{{\Carbon\Carbon::parse($userInfo->dob)->format('Y-m-d')}}"></h6>
                                    <h6><input class="@error('phone') is-invalid @enderror" type="text" name="phone" value="{{$user->phone}}"></h6>
                                    <h6><input class="@error('present_address') is-invalid @enderror" type="text" name="present_address" value="{{$userInfo->present_address}}"></h6>
                                    <h6><input class="@error('permanent_address') is-invalid @enderror" type="text" name="permanent_address" value="{{$userInfo->permanent_address}}"></h6>
                                    <h6>
                                        <select name="city_id" id="city">
                                            <option value="">Select one</option>
                                            @foreach($cities as $city)
                                                <option {{$userInfo->city_id == $city->id ? 'selected' : ''}} value="{{$city->id}}">{{$city->name}}</option>
                                            @endforeach
                                        </select>
                                    </h6>
                                    <h6>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" {{$userInfo->gender == 'Male' ? 'checked' : ''}}  type="radio" name="gender" id="inlineRadio1" value="Male">
                                            <label class="form-check-label" for="inlineRadio1">Male</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" {{$userInfo->gender == 'Female' ? 'checked': ''}} type="radio" name="gender" id="inlineRadio2" value="Female">
                                            <label class="form-check-label" for="inlineRadio2">Female</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" {{$userInfo->gender == 'Other' ? 'checked' : ''}} type="radio" name="gender" id="inlineRadio3" value="Other">
                                            <label class="form-check-label" for="inlineRadio3">Other</label>
                                        </div>
                                    </h6>
                                    <h6><input type="hidden" name="user_info_id" value="{{$userInfo->id}}"></h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <img class="administrator__profile__img img-fluid" src="{{ asset($user->image ?? get_static_option('user')) }}" alt="">
                        </div>
                    </div>
                </div>

                <div class="text-center">
                    <button type="submit" class="administrator__profile__button">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('css')

@endpush

@push('script')
    <script>
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
