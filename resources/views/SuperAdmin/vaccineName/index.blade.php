@extends('SuperAdmin.layouts.master')

@push('title')
    Vaccine Name List
@endpush


@section('content')
    <div class="content">
        <div class="container">

            <div class="row">
                <div class="col-sm-12">
                    <div class="page-header-title">
                        <h4 class="pull-left page-title">All Vaccine Name</h4>
                        <ol class="breadcrumb pull-right">
                            <li><a href="{{route('superAdmin.dashboard')}}">Dashboard</a></li>
                            <li class="active">All Vaccine Name</li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>

            <div class="row m-b-15">
                <div class="col-sm-12">
                    <a class="btn btn-primary" href="{{route('superAdmin.vaccineName.create')}}"><i class="fa fa-plus"></i> Create New Vaccine Name</a>
                </div>
            </div>


            <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">All Vaccine Name Table</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-xs-12">
                                    <table id="datatable-buttons" class="table table-striped table-bordered">
                                        <thead>
                                        <tr>
                                            <th>#SL</th>
                                            <th>Name</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>

                                        </thead>
                                        <tbody>
                                        @foreach($vaccineNames as $vaccineName)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td class="text-capitalize">{{$vaccineName->name}}</td>
                                                <td>
                                                    <span class="label {{$vaccineName->status ? 'label-success':'label-warning'}}">{{$vaccineName->status ? 'Active':'Inactive'}}</span>
                                                </td>
                                                <td>
                                                    <a href="{{route('superAdmin.vaccineName.edit', $vaccineName->id)}}" class="btn btn-success"><i class="fa fa-edit"></i></a>
                                                    <button class="btn btn-danger" onclick="delete_function(this)" value="{{ route('superAdmin.vaccineName.destroy', $vaccineName) }}"><i class="fa fa-trash"></i></button>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('css')
@endpush

@push('script')
@endpush
