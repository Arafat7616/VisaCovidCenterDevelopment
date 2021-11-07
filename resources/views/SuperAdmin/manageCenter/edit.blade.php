@extends('SuperAdmin.layouts.master')
@push('title')
Edit
@endpush

@push('datatableCSS')

@endpush

@push('css')

@endpush


@section('content')
<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-header-title">
                    <h4 class="pull-left page-title">Edit Center</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="{{route('superAdmin.dashboard')}}">Dashboard</a></li>
                        <li><a href="javascript:void(0)">Manage Center's</a></li>
                        <li class="active">Edit Center</li>
                    </ol>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <form action="{{ route('superAdmin.manageUser.update', $center->administrator->id) }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    @include('Others.message')
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">Edit {{ $center->name }}'s information</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" class="form-control" id="name" value="{{ $center->name }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" class="form-control" id="email" value="{{ $center->email }}">
                                    </div>                
                                    <div class="form-group">
                                        <label for="tradeLicenceNo">Trade Licence No.</label>
                                        <input type="text" name="tradeLicenceNo" class="form-control" id="tradeLicenceNo" value="{{ $center->trade_licence_no }}">
                                    </div>                 
                                    <div class="form-group">
                                        <label for="zipCode">Zip Code</label>
                                        <input type="text" name="zipCode" class="form-control" id="zipCode" value="{{ $center->zip_code }}">
                                    </div>                 
                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <input type="text" name="address" class="form-control" id="address" value="{{ $center->address }}">
                                    </div>                 
                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <select class="form-control" name="status" required="">
                                            <option {{ $center->status == '1' ? 'selected' : '' }}
                                                value="1">Active</option>
                                            <option {{ $center->status == '0' ? 'selected' : '' }}
                                                value="0">Inactive</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="passportNo">Passport No.</label>
                                        <input type="text" name="passportNo" class="form-control" id="passportNo" value="{{ $center->administrator->userInfo->passport_no }}">
                                    </div>   
                                    <div class="form-group">
                                        <label for="fatherName">Father Name</label>
                                        <input type="text" name="fatherName" class="form-control" id="fatherName" value="{{ $center->administrator->userInfo->father_name }}">
                                    </div>        
                                    <div class="form-group">
                                        <label for="motherName">Mother Name</label>
                                        <input type="text" name="motherName" class="form-control" id="motherName" value="{{ $center->administrator->userInfo->mother_name }}">
                                    </div>        
                                    <div class="form-group">
                                        <label for="bloodGroup">Blood Group</label>
                                        <select class="form-control" name="bloodGroup" required="">
                                            <option value="">Select One</option>
                                            <option {{$center->administrator->userInfo->blood_group == 'A+' ? 'selected' : ''}} value="A+">A+</option>
                                            <option {{$center->administrator->userInfo->blood_group == 'A-' ? 'selected' : ''}} value="A-">A-</option>
                                            <option {{$center->administrator->userInfo->blood_group == 'B+' ? 'selected' : ''}} value="B+">B+</option>
                                            <option {{$center->administrator->userInfo->blood_group == 'B-' ? 'selected' : ''}} value="B-">B-</option>
                                            <option {{$center->administrator->userInfo->blood_group == 'AB+' ? 'selected' : ''}} value="AB+">AB+</option>
                                            <option {{$center->administrator->userInfo->blood_group == 'AB-' ? 'selected' : ''}} value="AB-">AB-</option>
                                            <option {{$center->administrator->userInfo->blood_group == 'O+' ? 'selected' : ''}} value="O+">O+</option>
                                            <option {{$center->administrator->userInfo->blood_group == 'O-' ? 'selected' : ''}} value="O-">O-</option>
                                        </select>
                                    </div>   
                                    <div class="form-group">
                                        <label for="presentAddress">Present Address</label>
                                        <input type="text" name="presentAddress" class="form-control" id="presentAddress" value="{{ $center->administrator->userInfo->present_address }}">
                                    </div>   
                                    <div class="form-group">
                                        <label for="permanentAddress">Permanent Address</label>
                                        <input type="text" name="permanentAddress" class="form-control" id="permanentAddress" value="{{ $center->administrator->userInfo->permanent_address }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="countryId">Country</label>
                                        <select class="form-control" name="countryId" required="" id="country">
                                            @foreach($countries as $country)
                                                <option {{$center->administrator->userInfo->country_id == $country->id ? 'selected' : ''}} value="{{$country->id}}">{{$country->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>   
                                    <div class="form-group">
                                        <label for="stateId">State</label>
                                        <select class="form-control" name="stateId" required="" id="state">
                                            @foreach($states as $state)
                                                <option {{$center->administrator->userInfo->state_id == $state->id ? 'selected' : ''}} value="{{$state->id}}">{{$state->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>   
                                    <div class="form-group">
                                        <label for="cityId">City</label>
                                        <select class="form-control" name="cityId" required="" id="city">
                                            @foreach($cities as $city)
                                                <option {{$center->administrator->userInfo->city_id == $city->id ? 'selected' : ''}} value="{{$city->id}}">{{$city->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>   
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer">
                            <div class=" text-right">
                                <button type="submit" class="btn btn-dark waves-effect waves-ligh">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div> <!-- End Row -->
    </div>
</div>
@endsection

@push('datatableJS')

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
