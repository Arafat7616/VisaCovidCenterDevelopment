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
                        <li><a href="#">Xadmino</a></li>
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
                        <h4 class="panel-title">Total Subscription</h4>
                    </div>
                    <div class="panel-body">
                        <h3 class=""><b>2568</b></h3>
                        <p class="text-muted"><b>48%</b> From Last 24 Hours</p>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-lg-3">
                <div class="panel panel-primary text-center">
                    <div class="panel-heading">
                        <h4 class="panel-title">Order Status</h4>
                    </div>
                    <div class="panel-body">
                        <h3 class=""><b>3685</b></h3>
                        <p class="text-muted"><b>15%</b> Orders in Last 10 months</p>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-lg-3">
                <div class="panel panel-primary text-center">
                    <div class="panel-heading">
                        <h4 class="panel-title">Unique Visitors</h4>
                    </div>
                    <div class="panel-body">
                        <h3 class=""><b>25487</b></h3>
                        <p class="text-muted"><b>65%</b> From Last 24 Hours</p>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-lg-3">
                <div class="panel panel-primary text-center">
                    <div class="panel-heading">
                        <h4 class="panel-title">Monthly Earnings</h4>
                    </div>
                    <div class="panel-body">
                        <h3 class=""><b>$2779.7</b></h3>
                        <p class="text-muted"><b>31%</b> From Last 1 month</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-4">
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
            </div>

            <div class="col-sm-4">
                <div class="panel panel-primary">
                    <div class="panel-body">
                        <h4 class="m-t-0">Email Sent</h4>
                        <ul class="list-inline m-t-30 widget-chart text-center">
                            <li>
                                <i class="mdi mdi-arrow-up-bold-circle text-success"></i>
                                <h4 class=""><b>3654</b></h4>
                                <h5 class="text-muted m-b-0">Marketplace</h5>
                            </li>
                            <li>
                                <i class="mdi mdi-arrow-down-bold-circle text-danger"></i>
                                <h4 class=""><b>954</b></h4>
                                <h5 class="text-muted m-b-0">Last week</h5>
                            </li>
                            <li>
                                <i class="mdi mdi-arrow-up-bold-circle text-success"></i>
                                <h4 class=""><b>8462</b></h4>
                                <h5 class="text-muted m-b-0">Last Month</h5>
                            </li>
                        </ul>
                        <div id="sparkline2" style="margin: 0 -21px -22px -22px;"></div>
                    </div>
                </div>
            </div>

            <div class="col-sm-4">
                <div class="panel panel-primary">
                    <div class="panel-body">
                        <h4 class="m-t-0">Monthly Subscriptions</h4>
                        <ul class="list-inline m-t-30 widget-chart text-center">
                            <li>
                                <i class="mdi mdi-arrow-up-bold-circle text-success"></i>
                                <h4 class=""><b>3256</b></h4>
                                <h5 class="text-muted m-b-0">Marketplace</h5>
                            </li>
                            <li>
                                <i class="mdi mdi-arrow-down-bold-circle text-danger"></i>
                                <h4 class=""><b>785</b></h4>
                                <h5 class="text-muted m-b-0">Last week</h5>
                            </li>
                            <li>
                                <i class="mdi mdi-arrow-up-bold-circle text-success"></i>
                                <h4 class=""><b>1546</b></h4>
                                <h5 class="text-muted m-b-0">Last Month</h5>
                            </li>
                        </ul>
                        <div id="sparkline3" style="margin: 0 -21px -22px -22px;"></div>
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
