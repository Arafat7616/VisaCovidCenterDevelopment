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
                    <h4 class="pull-left page-title">Edit user</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="{{route('superAdmin.dashboard')}}">Dashboard</a></li>
                        <li><a href="javascript:void(0)">Manage User's</a></li>
                        <li class="active">Edit user</li>
                    </ol>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <form action="{{ route('superAdmin.manageUser.update', $user->id) }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    @include('Others.message')
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">Edit {{ $user->name }}'s information</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" class="form-control" id="name" value="{{ $user->name }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" class="form-control" id="email" value="{{ $user->email }}">
                                    </div>                
                                    <div class="form-group">
                                        <label for="phone">Phone</label>
                                        <input type="text" name="phone" class="form-control" id="phone" value="{{ $user->phone }}">
                                    </div>                
                                    <div class="form-group middle-image-helper">
                                        <div id="preview">
                                            <img height="100px;" width="100px;" src="{{ asset($user->image ?? get_static_option('no_image')) }}" id="image-display" class="mw-100 w-200px image-display">
                                        </div>
                                        <label for="image">Image</label>
                                        <input type="file" accept="image/*" id="image" name="image" class="image-importer correct_example">                                    
                                    </div>                
                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <select class="form-control" name="status" required="">
                                            <option {{ $user->userInfo->status == '1' ? 'selected' : '' }}
                                                value="1">Active</option>
                                            <option {{ $user->userInfo->status == '0' ? 'selected' : '' }}
                                                value="0">Inactive</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="gender">Gender</label>
                                        <select class="form-control" name="gender" required="">
                                            <option {{ $user->userInfo->gender == 'Male' ? 'selected' : '' }}
                                                value="Male">Male</option>
                                            <option {{ $user->userInfo->gender == 'Female' ? 'selected' : '' }}
                                                value="Female">Female</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="dob">Date of Birth</label>
                                        <input type="date" name="dob" class="form-control" id="dob" value="{{ \Carbon\Carbon::parse($user->userInfo->dob)->format('Y-m-d') }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="nidNo">Nid No.</label>
                                        <input type="text" name="nidNo" class="form-control" id="nidNo" value="{{ $user->userInfo->nid_no }}">
                                    </div>           
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="passportNo">Passport No.</label>
                                        <input type="text" name="passportNo" class="form-control" id="passportNo" value="{{ $user->userInfo->passport_no }}">
                                    </div>   
                                    <div class="form-group">
                                        <label for="fatherName">Father Name</label>
                                        <input type="text" name="fatherName" class="form-control" id="fatherName" value="{{ $user->userInfo->father_name }}">
                                    </div>        
                                    <div class="form-group">
                                        <label for="motherName">Mother Name</label>
                                        <input type="text" name="motherName" class="form-control" id="motherName" value="{{ $user->userInfo->mother_name }}">
                                    </div>        
                                    <div class="form-group">
                                        <label for="bloodGroup">Blood Group</label>
                                        <select class="form-control" name="bloodGroup" required="">
                                            <option value="">Select One</option>
                                            <option {{$user->userInfo->blood_group == 'A+' ? 'selected' : ''}} value="A+">A+</option>
                                            <option {{$user->userInfo->blood_group == 'A-' ? 'selected' : ''}} value="A-">A-</option>
                                            <option {{$user->userInfo->blood_group == 'B+' ? 'selected' : ''}} value="B+">B+</option>
                                            <option {{$user->userInfo->blood_group == 'B-' ? 'selected' : ''}} value="B-">B-</option>
                                            <option {{$user->userInfo->blood_group == 'AB+' ? 'selected' : ''}} value="AB+">AB+</option>
                                            <option {{$user->userInfo->blood_group == 'AB-' ? 'selected' : ''}} value="AB-">AB-</option>
                                            <option {{$user->userInfo->blood_group == 'O+' ? 'selected' : ''}} value="O+">O+</option>
                                            <option {{$user->userInfo->blood_group == 'O-' ? 'selected' : ''}} value="O-">O-</option>
                                        </select>
                                    </div>   
                                    <div class="form-group">
                                        <label for="presentAddress">Present Address</label>
                                        <input type="text" name="presentAddress" class="form-control" id="presentAddress" value="{{ $user->userInfo->present_address }}">
                                    </div>   
                                    <div class="form-group">
                                        <label for="permanentAddress">Permanent Address</label>
                                        <input type="text" name="permanentAddress" class="form-control" id="permanentAddress" value="{{ $user->userInfo->permanent_address }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="countryId">Country</label>
                                        <select class="form-control" name="countryId" required="" id="country">
                                            @foreach($countries as $country)
                                                <option {{$user->userInfo->country_id == $country->id ? 'selected' : ''}} value="{{$country->id}}">{{$country->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>   
                                    <div class="form-group">
                                        <label for="stateId">State</label>
                                        <select class="form-control" name="stateId" required="" id="state">
                                            @foreach($states as $state)
                                                <option {{$user->userInfo->state_id == $state->id ? 'selected' : ''}} value="{{$state->id}}">{{$state->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>   
                                    <div class="form-group">
                                        <label for="cityId">City</label>
                                        <select class="form-control" name="cityId" required="" id="city">
                                            @foreach($cities as $city)
                                                <option {{$user->userInfo->city_id == $city->id ? 'selected' : ''}} value="{{$city->id}}">{{$city->name}}</option>
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
