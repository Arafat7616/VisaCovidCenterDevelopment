@extends('BdGovt.layouts.master')

@push('title')
BD Govt.
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
                        <li><a href="{{ route('bdGovt.dashboard') }}">Bangladesh Govt Panel</a></li>
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
                        <h4 class="panel-title">Total Trusted Medical Assistant</h4>
                    </div>
                    <div class="panel-body">
                        <h3 class=""><b>{{ $users->where('user_type','trusted-medical-assistant')->count() }}</b></h3>
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
        
        
    </div> <!-- container -->
</div> <!-- content -->
@endsection

@push('script')
{{-- <script src="{{ asset('assets/super-admin/plugins/jquery-sparkline/jquery.sparkline.min.js') }}"></script> --}}
<script src="{{ asset('assets/super-admin/pages/dashborad.js') }}"></script>
@endpush
