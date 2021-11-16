@extends('SuperAdmin.layouts.master')

@push('title')
Super Admin
@endpush

@push('css')

@endpush

@section('content')
<div class="content">
    <div class="container">
        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-header-title">
                    <h4 class="pull-left page-title">Dashboard</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="{{ route('superAdmin.dashboard') }}">Super Admin Panel</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 col-lg-3">
                <div class="panel panel-primary text-center">
                    <div class="panel-heading">
                        <h4 class="panel-title">Total User</h4>
                    </div>
                    <div class="panel-body">
                        <h3 class=""><b>{{ $users->where('user_type','user')->count() }}</b></h3>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="panel panel-primary text-center">
                    <div class="panel-heading">
                        <h4 class="panel-title">Total Administrator</h4>
                    </div>
                    <div class="panel-body">
                        <h3 class=""><b>{{ $users->where('user_type','administrator')->count() }}</b></h3>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="panel panel-primary text-center">
                    <div class="panel-heading">
                        <h4 class="panel-title">Total Volunteer</h4>
                    </div>
                    <div class="panel-body">
                        <h3 class=""><b>{{ $users->where('user_type','volunteer')->count() }}</b></h3>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="panel panel-primary text-center">
                    <div class="panel-heading">
                        <h4 class="panel-title">Total Receptionist</h4>
                    </div>
                    <div class="panel-body">
                        <h3 class=""><b>{{ $users->where('user_type','receptionist')->count() }}</b></h3>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="panel panel-primary text-center">
                    <div class="panel-heading">
                        <h4 class="panel-title">Total Pathologist</h4>
                    </div>
                    <div class="panel-body">
                        <h3 class=""><b>{{ $users->where('user_type','pathologist')->count() }}</b></h3>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="panel panel-success text-center">
                    <div class="panel-heading">
                        <h4 class="panel-title text-white">Total Medical Center</h4>
                    </div>
                    <div class="panel-body">
                        <h3 class=""><b>{{ $centers->count() }}</b></h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 col-lg-3">
                <div class="panel panel-dark text-center">
                    <div class="panel-heading">
                        <h4 class="panel-title text-white">Premium PCR </h4>
                    </div>
                    <div class="panel-body">
                        <h3 class=""><b>{{ $pcrTests->where('registration_type','premium')->count() }}</b></h3>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="panel panel-dark text-center">
                    <div class="panel-heading">
                        <h4 class="panel-title text-white">Registered PCR </h4>
                    </div>
                    <div class="panel-body">
                        <h3 class=""><b>{{ $pcrTests->where('registration_type','normal')->count() }}</b></h3>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="panel panel-dark text-center">
                    <div class="panel-heading">
                        <h4 class="panel-title text-white">Positive PCR </h4>
                    </div>
                    <div class="panel-body">
                        <h3 class=""><b>{{ $pcrTests->where('pcr_result','positive')->count() }}</b></h3>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="panel panel-dark text-center">
                    <div class="panel-heading">
                        <h4 class="panel-title text-white">Negative PCR </h4>
                    </div>
                    <div class="panel-body">
                        <h3 class=""><b>{{ $pcrTests->where('pcr_result','negative')->count() }}</b></h3>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="panel panel-info text-center">
                    <div class="panel-heading">
                        <h4 class="panel-title text-white">Premium Vaccination </h4>
                    </div>
                    <div class="panel-body">
                        <h3 class=""><b>{{ $vaccinations->where('registration_type','premium')->count() }}</b></h3>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="panel panel-info text-center">
                    <div class="panel-heading">
                        <h4 class="panel-title text-white">Registered Vaccination </h4>
                    </div>
                    <div class="panel-body">
                        <h3 class=""><b>{{ $vaccinations->where('registration_type','normal')->count() }}</b></h3>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="panel panel-info text-center">
                    <div class="panel-heading">
                        <h4 class="panel-title text-white">1st Dose Taken </h4>
                    </div>
                    <div class="panel-body">
                        <h3 class=""><b>{{ $vaccinations->where('date_of_first_dose','!=',null)->count() }}</b></h3>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="panel panel-info text-center">
                    <div class="panel-heading">
                        <h4 class="panel-title text-white">2nd Dose Taken </h4>
                    </div>
                    <div class="panel-body">
                        <h3 class=""><b>{{ $vaccinations->where('date_of_second_dose','!=',null)->count() }}</b></h3>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="panel panel-warning text-center">
                    <div class="panel-heading">
                        <h4 class="panel-title text-white">Premium Booster </h4>
                    </div>
                    <div class="panel-body">
                        <h3 class=""><b>{{ $boosters->where('registration_type','premium')->count() }}</b></h3>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="panel panel-warning text-center">
                    <div class="panel-heading">
                        <h4 class="panel-title text-white">Registered Booster </h4>
                    </div>
                    <div class="panel-body">
                        <h3 class=""><b>{{ $boosters->where('registration_type','normal')->count() }}</b></h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            {{-- <div class="col-sm-6 col-lg-3">
                <div class="panel panel-primary text-center">
                    <div class="panel-heading">
                        <h4 class="panel-title">Order Status</h4>
                    </div>
                    <div class="panel-body">
                        <h3 class=""><b>3685</b></h3>
                        <p class="text-muted"><b>15%</b> Orders in Last 10 months</p>
                    </div>
                </div>
            </div> --}}
        </div>
        <div class="row">
            {{-- <div class="col-sm-4">
                <div class="panel panel-primary">
                    <div class="panel-body">
                        <h4 class="m-t-0">Revenue</h4>
                        <ul class="list-inline m-t-30 widget-chart text-center">
                            <li>
                                <i class="mdi mdi-arrow-up-bold-circle text-success"></i>
                                <h4 class=""><b>5248</b></h4>
                                <h5 class="text-muted m-b-0">Marketplace</h5>
                            </li>
                            <li>
                                <i class="mdi mdi-arrow-down-bold-circle text-danger"></i>
                                <h4 class=""><b>321</b></h4>
                                <h5 class="text-muted m-b-0">Last week</h5>
                            </li>
                            <li>
                                <i class="mdi mdi-arrow-up-bold-circle text-success"></i>
                                <h4 class=""><b>964</b></h4>
                                <h5 class="text-muted m-b-0">Last Month</h5>
                            </li>
                        </ul>
                        <div id="sparkline1" style="margin: 0 -21px -22px -22px;"></div>
                    </div>
                </div>
            </div> --}}
        </div>
    </div> <!-- container -->
</div> <!-- content -->
@endsection

@push('script')
{{-- <script src="{{ asset('assets/super-admin/plugins/jquery-sparkline/jquery.sparkline.min.js') }}"></script> --}}
<script src="{{ asset('assets/super-admin/pages/dashborad.js') }}"></script>
@endpush
