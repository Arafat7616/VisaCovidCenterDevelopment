@extends('SuperAdmin.layouts.master')
@push('title')
Center's Profile
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
                    <h4 class="pull-left page-title">Center's Profile</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="{{route('superAdmin.dashboard')}}">Dashboard</a></li>
                        <li><a href="javascript:void(0)">Manage Center</a></li>
                        <li class="active">Center's Profile</li>
                    </ol>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="panel panel-color panel-success">
                    <div class="panel-heading">
                        <h3 class="panel-title">Center Details</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="text-center">
                                    <div>
                                        <h3>{{ $center->name }}</h3>
                                        <h4>{{ $center->email }}</h4>
                                    </div>
                                </div>
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        <span class="badge badge-primary">{{ $center->zip_code }}</span>
                                        Zip Code 
                                    </li>
                                    <li class="list-group-item">
                                        <span class="badge badge-primary">{{ $center->address }}</span>
                                        Address
                                    </li>
                                    <li class="list-group-item">
                                        <span class="badge badge-success">{{ $center->trade_licence_no }}</span>
                                        Trade Licence No.
                                    </li>
                                    <li class="list-group-item">
                                        <span class="badge badge-warning">{{ $center->country ? $center->country->name : '' }}</span>
                                        Country
                                    </li>
                                    <li class="list-group-item">
                                        <span class="badge badge-dark">{{ $center->state ? $center->state->name : '' }}</span>
                                        State
                                    </li>
                                    <li class="list-group-item">
                                        <span class="badge badge-info">{{ $center->city? $center->city->name : '' }}</span>
                                        City
                                    </li>
                                    <li class="list-group-item">
                                        @if ($center->status == 0)
                                        <span class="badge badge-danger">Inactive</span>
                                        @elseif($center->status == 1)
                                        <span class="badge badge-success">Active</span>
                                        @endif
                                      Status
                                    </li>
                                    @foreach ($center->documents as $document)
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
                                        <img style="border-radius: 20%" height="200px;" width="200px;" src="{{ asset($center->administrator->image ?? get_static_option('user')) }}" class="rounded-circle rounded" alt="User">
                                    </div>
                                    <div>
                                        <h3>{{ $center->administrator->name }}</h3>
                                        <h4>{{ $center->administrator->email }}</h4>
                                    </div>
                                </div>
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        <span class="badge badge-primary">{{ $center->administrator->phone }}</span>
                                        Phone
                                    </li>
                                    <li class="list-group-item">
                                        @if ($center->administrator->status == 0)
                                        <span class="badge badge-danger">Inactive</span>
                                        @elseif($center->administrator->status == 1)
                                        <span class="badge badge-success">Active</span>
                                        @endif
                                      Status
                                    </li>
                                    <li class="list-group-item">
                                        <span class="badge badge-info">    
                                            <a style="padding: 0 20px;" href="{{ route('superAdmin.manageUser.profile', $center->administrator_id) }}">
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
