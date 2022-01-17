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
                    <h4 class="pull-left page-title">Edit Rapid PCR Center</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="{{route('superAdmin.dashboard')}}">Dashboard</a></li>
                        <li><a href="javascript:void(0)">Manage Rapid PCR Center's</a></li>
                        <li class="active">Edit Rapid PCR Center</li>
                    </ol>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <form action="{{ route('superAdmin.manageRapidPcrCenter.update', $rapidPcrCenter->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @include('Others.toaster_message')
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">Edit {{ $rapidPcrCenter->name }}'s information</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" class="form-control" id="name" value="{{ $rapidPcrCenter->name }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" class="form-control" id="email" value="{{ $rapidPcrCenter->email }}">
                                    </div>                
                                    <div class="form-group">
                                        <label for="tradeLicenceNo">Trade Licence No.</label>
                                        <input type="text" name="tradeLicenceNo" class="form-control" id="tradeLicenceNo" value="{{ $rapidPcrCenter->trade_licence_no }}">
                                    </div>                 
                                    <div class="form-group">
                                        <label for="zipCode">Zip Code</label>
                                        <input type="text" name="zipCode" class="form-control" id="zipCode" value="{{ $rapidPcrCenter->zip_code }}">
                                    </div>    
                                      
                                    <div class="form-group">
                                        <label for="mapLocationLink">Map Location Link</label>
                                        <input type="text" name="mapLocationLink" class="form-control" id="mapLocationLink" value="{{ $rapidPcrCenter->map_location }}">
                                    </div>                 
                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <input type="text" name="address" class="form-control" id="address" value="{{ $rapidPcrCenter->address }}">
                                    </div>                 
                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <select class="form-control" name="status" required="">
                                            <option {{ $rapidPcrCenter->status == '1' ? 'selected' : '' }}
                                                value="1">Active</option>
                                            <option {{ $rapidPcrCenter->status == '0' ? 'selected' : '' }}
                                                value="0">Inactive</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="country">Country</label>
                                        <select class="form-control" name="country" required="" id="country">
                                            @foreach($countries as $country)
                                                <option {{$rapidPcrCenter->country_id == $country->id ? 'selected' : ''}} value="{{$country->id}}">{{$country->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>   
                                    <div class="form-group">
                                        <label for="state">State</label>
                                        <select class="form-control" name="state" required="" id="state">
                                            @foreach($states as $state)
                                                <option {{$rapidPcrCenter->state_id == $state->id ? 'selected' : ''}} value="{{$state->id}}">{{$state->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>   
                                    <div class="form-group">
                                        <label for="city">City</label>
                                        <select class="form-control" name="city" required="" id="city">
                                            @foreach($cities as $city)
                                                <option {{$rapidPcrCenter->city_id == $city->id ? 'selected' : ''}} value="{{$city->id}}">{{$city->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>   
                                    <div class="form-group">
                                        <label for="space">Space(sqft)</label>
                                        <select class="form-control" name="space" required="" id="space">
                                            <option disabled value="">Select Space(sqft)</option>
                                            @foreach($rapidPcrCenterAreas as $space)
                                                <option {{$space->center_area_id == $space->id ? 'selected' : ''}} value="{{$space->id}}">{{ $space->title }} ({{ $space->minimum_space }}-{{ $space->maximum_space }})</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="waitingSeatCapacity">Waiting Seat Capacity</label>
                                        <input type="number" name="waitingSeatCapacity" class="form-control" id="waitingSeatCapacity" value="{{ $rapidPcrCenter->waiting_seat_capacity }}">
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