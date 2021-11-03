@extends('SuperAdmin.layouts.master')
@push('title')
User's Profile
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
                    <h4 class="pull-left page-title">User' Profile</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="{{route('superAdmin.dashboard')}}">Dashboard</a></li>
                        <li><a href="javascript:void(0)">Manage User's</a></li>
                        <li class="active">User' Profile</li>
                    </ol>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="panel panel-color panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Personal Details</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="text-center">
                                    <div>
                                        <img style="border-radius: 20%" height="200px;" width="200px;" src="{{ asset($user->image ?? get_static_option('user')) }}" class="rounded-circle rounded" alt="User">
                                    </div>
                                    <div>
                                        <h3>{{ $user->name }}</h3>
                                        <h4>{{ $user->user_type }}</h4>
                                    </div>
                                </div>
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        <span class="badge badge-primary">{{ $user->email }}</span>
                                        Email
                                    </li>
                                    <li class="list-group-item">
                                        <span class="badge badge-primary">{{ $user->phone }}</span>
                                        Phone
                                    </li>
                                    <li class="list-group-item">
                                        @if ($user->status == 0)
                                        <span class="badge badge-danger">Deactive</span>
                                        @elseif($user->status == 1)
                                        <span class="badge badge-success">Active</span>
                                        @endif
                                      Status
                                    </li>
                                    <li class="list-group-item">
                                        <span class="badge badge-success">{{ $user->userInfo->dob }}</span>
                                        Date of Birth
                                    </li>
                                    <li class="list-group-item">
                                        <span class="badge badge-success">{{ $user->userInfo->gender }}</span>
                                        Gender
                                    </li>
                                    <li class="list-group-item">
                                        <span class="badge badge-info">{{ $user->userInfo->nid_no }}</span>
                                        NID
                                    </li>
                                    <li class="list-group-item">
                                        <span class="badge badge-info">{{ $user->userInfo->passport_no }}</span>
                                        Passport
                                    </li>
                                    <li class="list-group-item">
                                        <span class="badge badge-info">{{ $user->userInfo->blood_group }}</span>
                                        Blood Group
                                    </li>
                                    <li class="list-group-item">
                                        <span class="badge badge-dark">{{ $user->userInfo->mother_name }}</span>
                                        Mother Name
                                    </li>
                                    <li class="list-group-item">
                                        <span class="badge badge-dark">{{ $user->userInfo->father_name }}</span>
                                        Father Name
                                    </li>
                                    <li class="list-group-item">
                                        <span class="badge badge-dark">{{ $user->userInfo->present_address }}</span>
                                        Present Address
                                    </li>
                                    <li class="list-group-item">
                                        <span class="badge badge-dark">{{ $user->userInfo->permanent_address }}</span>
                                        Permanent Address
                                    </li>
                                </ul>
                            </div>
                        </div> <!-- end row -->
                    </div>
                </div>
            </div>
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
                                        <h3>{{ $user->center->name }}</h3>
                                        <h4>{{ $user->center->email }}</h4>
                                    </div>
                                </div>
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        <span class="badge badge-primary">{{ $user->center->zip_code }}</span>
                                        Zip Code 
                                    </li>
                                    <li class="list-group-item">
                                        <span class="badge badge-primary">{{ $user->center->address }}</span>
                                        Address
                                    </li>
                                    <li class="list-group-item">
                                        <span class="badge badge-success">{{ $user->center->trade_licence_no }}</span>
                                        Trade Licence No.
                                    </li>
                                    <li class="list-group-item">
                                        @if ($user->center->status == 0)
                                        <span class="badge badge-danger">Deactive</span>
                                        @elseif($user->center->status == 1)
                                        <span class="badge badge-success">Active</span>
                                        @endif
                                      Status
                                    </li>
                                    @foreach ($user->center->documents as $document)
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
        </div>
    </div>
</div>
@endsection

@push('datatableJS')

@endpush

@push('script')

@endpush
