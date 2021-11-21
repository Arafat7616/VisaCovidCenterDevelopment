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
                    <h4 class="pull-left page-title">Edit Price</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="{{route('superAdmin.dashboard')}}">Dashboard</a></li>
                        <li><a href="javascript:void(0)">Manage Price's</a></li>
                        <li class="active">Edit Price</li>
                    </ol>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <form action="{{ route('superAdmin.managePrice.update', $price->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @include('Others.message')
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">Edit price information</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="pcr_normal">Normal PCR</label>
                                        <input type="text" name="pcr_normal" class="form-control" id="pcr_normal" value="{{ $price->pcr_normal }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="booster_normal">Normal Booster</label>
                                        <input type="text" name="booster_normal" class="form-control" id="booster_normal" value="{{ $price->booster_normal }}">
                                    </div>                
                                    <div class="form-group">
                                        <label for="vaccine_normal">Normal Vaccination</label>
                                        <input type="text" name="vaccine_normal" class="form-control" id="vaccine_normal" value="{{ $price->vaccine_normal }}">
                                    </div>                
                                    <div class="form-group">
                                        <label for="pcr_premium">Premium PCR</label>
                                        <input type="text" name="pcr_premium" class="form-control" id="pcr_premium" value="{{ $price->pcr_premium }}">
                                    </div>                     
                                    <div class="form-group">
                                        <label for="booster_premium">Premium Booster</label>
                                        <input type="text" name="booster_premium" class="form-control" id="booster_premium" value="{{ $price->booster_premium }}">
                                    </div>                     
                                    <div class="form-group">
                                        <label for="vaccine_premium">Premium Vaccination</label>
                                        <input type="text" name="vaccine_premium" class="form-control" id="vaccine_premium" value="{{ $price->vaccine_premium }}">
                                    </div>                     
                                    <div class="form-group">
                                        <label for="status">Status</label>
                                        <select class="form-control" name="status" required="">
                                            <option {{ $price->status == '1' ? 'selected' : '' }}
                                                value="1">Active</option>
                                            <option {{ $price->status == '0' ? 'selected' : '' }}
                                                value="0">Inactive</option>
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