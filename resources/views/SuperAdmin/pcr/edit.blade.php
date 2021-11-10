@extends('SuperAdmin.layouts.master')
@push('title')
Edit PCR Test
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
                    <h4 class="pull-left page-title">Edit PCR Test</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="{{route('superAdmin.dashboard')}}">Dashboard</a></li>
                        <li><a href="javascript:void(0)">Manage PCR Test</a></li>
                        <li class="active">Edit PCR Test</li>
                    </ol>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <form action="{{ route('superAdmin.pcr.normal.update', $pcrTest) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @include('Others.message')
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">Edit {{ $pcrTest->user->name }}'s information</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" class="form-control" id="name" value="{{ $pcrTest->user->name }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" class="form-control" id="email" value="{{ $pcrTest->user->email }}">
                                    </div>                
                                    <div class="form-group">
                                        <label for="phone">Phone</label>
                                        <input type="text" name="phone" class="form-control" id="phone" value="{{ $pcrTest->user->phone }}">
                                    </div>                
                                    <div class="form-group middle-image-helper">
                                        <div id="preview">
                                            <img height="100px;" width="100px;" src="{{ asset($pcrTest->user->image ?? get_static_option('no_image')) }}" id="image-display" class="mw-100 w-200px image-display">
                                        </div>
                                        <label for="image">Image</label>
                                        <input type="file" accept="image/*" id="image" name="image" class="image-importer correct_example">                                    
                                    </div>                
                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <select class="form-control" name="status" required="">
                                            <option {{ $pcrTest->user->status == '1' ? 'selected' : '' }}
                                                value="1">Active</option>
                                            <option {{ $pcrTest->user->status == '0' ? 'selected' : '' }}
                                                value="0">Inactive</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="gender">Gender</label>
                                        <select class="form-control" name="gender" required="">
                                            <option {{ $pcrTest->user->userInfo->gender == 'Male' ? 'selected' : '' }}
                                                value="Male">Male</option>
                                            <option {{ $pcrTest->user->userInfo->gender == 'Female' ? 'selected' : '' }}
                                                value="Female">Female</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="dob">Date of Birth</label>
                                        <input type="date" name="dob" class="form-control" id="dob" value="{{ \Carbon\Carbon::parse($pcrTest->user->userInfo->dob)->format('Y-m-d') }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="nidNo">Nid No.</label>
                                        <input type="text" name="nidNo" class="form-control" id="nidNo" value="{{ $pcrTest->user->userInfo->nid_no }}">
                                    </div>           
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="passportNo">Passport No.</label>
                                        <input type="text" name="passportNo" class="form-control" id="passportNo" value="{{ $pcrTest->user->userInfo->passport_no }}">
                                    </div>   
                                    <div class="form-group">
                                        <label for="fatherName">Father Name</label>
                                        <input type="text" name="fatherName" class="form-control" id="fatherName" value="{{ $pcrTest->user->userInfo->father_name }}">
                                    </div>        
                                    <div class="form-group">
                                        <label for="motherName">Mother Name</label>
                                        <input type="text" name="motherName" class="form-control" id="motherName" value="{{ $pcrTest->user->userInfo->mother_name }}">
                                    </div>        
                                    <div class="form-group">
                                        <label for="bloodGroup">Blood Group</label>
                                        <select class="form-control" name="bloodGroup" required="">
                                            <option value="">Select One</option>
                                            <option {{$pcrTest->user->userInfo->blood_group == 'A+' ? 'selected' : ''}} value="A+">A+</option>
                                            <option {{$pcrTest->user->userInfo->blood_group == 'A-' ? 'selected' : ''}} value="A-">A-</option>
                                            <option {{$pcrTest->user->userInfo->blood_group == 'B+' ? 'selected' : ''}} value="B+">B+</option>
                                            <option {{$pcrTest->user->userInfo->blood_group == 'B-' ? 'selected' : ''}} value="B-">B-</option>
                                            <option {{$pcrTest->user->userInfo->blood_group == 'AB+' ? 'selected' : ''}} value="AB+">AB+</option>
                                            <option {{$pcrTest->user->userInfo->blood_group == 'AB-' ? 'selected' : ''}} value="AB-">AB-</option>
                                            <option {{$pcrTest->user->userInfo->blood_group == 'O+' ? 'selected' : ''}} value="O+">O+</option>
                                            <option {{$pcrTest->user->userInfo->blood_group == 'O-' ? 'selected' : ''}} value="O-">O-</option>
                                        </select>
                                    </div>   
                                    <div class="form-group">
                                        <label for="presentAddress">Present Address</label>
                                        <input type="text" name="presentAddress" class="form-control" id="presentAddress" value="{{ $pcrTest->user->userInfo->present_address }}">
                                    </div>   
                                    <div class="form-group">
                                        <label for="permanentAddress">Permanent Address</label>
                                        <input type="text" name="permanentAddress" class="form-control" id="permanentAddress" value="{{ $pcrTest->user->userInfo->permanent_address }}">
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
