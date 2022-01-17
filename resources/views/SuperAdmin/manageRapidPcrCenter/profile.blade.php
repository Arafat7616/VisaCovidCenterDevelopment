@extends('SuperAdmin.layouts.master')
@push('title')
Rapid PCR Center's Profile
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
                    <h4 class="pull-left page-title">Rapid PCR Center's Profile</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="{{route('superAdmin.dashboard')}}">Dashboard</a></li>
                        <li><a href="javascript:void(0)">Manage Rapid PCR Center</a></li>
                        <li class="active">Rapid PCR Center's Profile</li>
                    </ol>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="panel panel-color panel-success">
                    <div class="panel-heading">
                        <h3 class="panel-title">Rapid PCR Center Details</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="text-center">
                                    <div>
                                        <h3>{{ $rapidPcrCenter->name }}</h3>
                                        <h4>{{ $rapidPcrCenter->email }}</h4>
                                    </div>
                                </div>
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        <span class="badge badge-primary">{{ $rapidPcrCenter->zip_code }}</span>
                                        Zip Code 
                                    </li>
                                    <li class="list-group-item">
                                        <span class="badge badge-primary">{{ $rapidPcrCenter->address }}</span>
                                        Address
                                    </li>
                                    <li class="list-group-item">
                                        <span class="badge badge-success">{{ $rapidPcrCenter->trade_licence_no }}</span>
                                        Trade Licence No.
                                    </li>
                                    <li class="list-group-item">
                                        <span class="badge badge-warning">{{ $rapidPcrCenter->country ? $rapidPcrCenter->country->name : '' }}</span>
                                        Country
                                    </li>
                                    <li class="list-group-item">
                                        <span class="badge badge-dark">{{ $rapidPcrCenter->state ? $rapidPcrCenter->state->name : '' }}</span>
                                        State
                                    </li>
                                    <li class="list-group-item">
                                        <span class="badge badge-info">{{ $rapidPcrCenter->city? $rapidPcrCenter->city->name : '' }}</span>
                                        City
                                    </li>
                                    <li class="list-group-item">
                                        @if ($rapidPcrCenter->status == 0)
                                        <span class="badge badge-danger">Inactive</span>
                                        @elseif($rapidPcrCenter->status == 1)
                                        <span class="badge badge-success">Active</span>
                                        @endif
                                      Status
                                    </li>
                                    @foreach ($rapidPcrCenter->documents as $document)
                                        <li class="list-group-item">
                                            @if($document)
                                                <div class="mailbox-attachment-info">
                                                    <a href="{{ asset($document) }}" download class="btn btn-default btn-xs float-right"><i class="fa fa-cloud-download"></i></a>
                                                </div>
                                            @else
                                                <a title="Sorry there is no document">
                                                    <div class="mailbox-attachment-info">
                                                        <a href="#" class="btn btn-default btn-xs float-right"><i class="fa fa-cloud-download"></i></a>
                                                    </div>
                                                </a>
                                            @endif
                                            Document 
                                        </li>
                                    @endforeach   
                                </ul>
                            </div>
                        </div> <!-- end row -->
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="panel panel-color panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Administrator Details</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="text-center">
                                    <div>
                                        <img style="border-radius: 20%" height="200px;" width="200px;" src="{{ asset($rapidPcrCenter->administrator->image ?? get_static_option('user')) }}" class="rounded-circle rounded" alt="User">
                                    </div>
                                    <div>
                                        <h3>{{ $rapidPcrCenter->administrator->name }}</h3>
                                        <h4>{{ $rapidPcrCenter->administrator->email }}</h4>
                                    </div>
                                </div>
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        <span class="badge badge-primary">{{ $rapidPcrCenter->administrator->phone }}</span>
                                        Phone
                                    </li>
                                    <li class="list-group-item">
                                        @if ($rapidPcrCenter->administrator->status == 0)
                                        <span class="badge badge-danger">Inactive</span>
                                        @elseif($rapidPcrCenter->administrator->status == 1)
                                        <span class="badge badge-success">Active</span>
                                        @endif
                                      Status
                                    </li>
                                    <li class="list-group-item">
                                        <span class="badge badge-info">    
                                            <a style="padding: 0 20px;" href="{{ route('superAdmin.manageUser.profile', $rapidPcrCenter->administrator_id) }}">
                                                <i class="fa fa-eye"></i>
                                            </a>
                                        </span>
                                        Profile
                                    </li>
                                </ul>
                            </div>
                        </div> <!-- end row -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('datatableJS')

@endpush

@push('script')

@endpush
