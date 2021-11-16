@extends('SuperAdmin.layouts.master')
@push('title')
Edit Booster
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
                    <h4 class="pull-left page-title">Edit Booster</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="{{route('superAdmin.dashboard')}}">Dashboard</a></li>
                        <li><a href="javascript:void(0)">Manage Booster</a></li>
                        <li class="active">Edit Booster</li>
                    </ol>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <form action="{{ route('superAdmin.booster.normal.update', $booster) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    @include('Others.message')
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">Edit Booster information</h3>
                        </div>
                        <div class="panel-body">
                            <div class="container">
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="name_of_vaccine">Name of vaccine</label>
                                            <input type="text" name="name_of_vaccine" class="form-control" id="name_of_vaccine" value="{{ $booster->name_of_vaccine }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="date">Date</label>
                                            <input type="date" name="date" class="form-control" id="date" value="{{\Carbon\Carbon::parse($booster->date)->format('Y-m-d')}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="antibody_last_date">Antibody last date</label>
                                            <input type="date" name="antibody_last_date" class="form-control" id="antibody_last_date" value="{{\Carbon\Carbon::parse($booster->antibody_last_date)->format('Y-m-d')}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="status">Status</label>
                                            <select class="form-control" name="status" required="">
                                                <option {{ $booster->status == '1' ? 'selected' : '' }} value="1">Active</option>
                                                <option {{ $booster->status == '0' ? 'selected' : '' }} value="0">Inactive</option>
                                            </select>
                                        </div>
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

@endpush
