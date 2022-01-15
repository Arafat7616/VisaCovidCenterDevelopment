@extends('SuperAdmin.layouts.master')
@push('title')
    Edit Center Area
@endpush

@section('content')
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-header-title">
                        <h4 class="pull-left page-title">Edit Center Area</h4>
                        <ol class="breadcrumb pull-right">
                            <li><a href="{{route('superAdmin.dashboard')}}">Dashboard</a></li>
                            <li><a href="{{route('superAdmin.centerArea.index')}}">All Center Area</a></li>
                            <li class="active">Edit Center Area</li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">Edit Center Area</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-xs-12">
                                    <form role="form" action="{{route('superAdmin.centerArea.update', $centerArea->id)}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        @include('Others.toaster_message')
                                        <div class="form-group">
                                            <label for="title">Center area title</label>
                                            <input type="text" name="title" value="{{ $centerArea->title }}" class="form-control @error('title') is-invalid @enderror" id="ex1" placeholder="Enter area title">
                                        </div>
                                        @error('title')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror

                                        <div class="form-group">
                                            <label for="minimum_space">Center minimum space</label>
                                            <input type="number" name="minimum_space" value="{{ $centerArea->minimum_space }}" class="form-control @error('minimum_space') is-invalid @enderror" id="ex1" placeholder="Enter minimum space">
                                        </div>
                                        @error('minimum_space')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror

                                        <div class="form-group">
                                            <label for="maximum_space">Center maximun space</label>
                                            <input type="number" name="maximum_space" value="{{ $centerArea->maximum_space }}" class="form-control @error('maximum_space') is-invalid @enderror" id="ex1" placeholder="Enter maximun space">
                                        </div>
                                        @error('maximum_space')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror

                                        <div class="form-group">
                                            <label for="category">Category</label>
                                            <input type="text" name="category" value="{{ $centerArea->category }}" class="form-control @error('category') is-invalid @enderror" id="ex1" placeholder="Enter category">
                                        </div>
                                        @error('category')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror

                                        <div class="form-group">
                                            <label for="status">Center Area Status</label>
                                            <br>
                                            @php
                                                if ($centerArea->status == 1){
                                                    $status = $centerArea->status;
                                                }else {
                                                    $status = 0;
                                                }
                                            @endphp
                                            <div class="radio radio-info radio-inline">
                                                <input type="radio" id="inlineRadio1" value="1" name="status" @if($status==1) {{'checked'}}@endif>
                                                <label for="inlineRadio1">Active</label>
                                            </div>
                                            <div class="radio radio-info radio-inline">
                                                <input type="radio" id="inlineRadio1" value="0" name="status"@if($status==0) {{'checked'}}@endif>
                                                <label for="inlineRadio1">Inactive</label>
                                            </div>
                                        </div>
                                        @error('status')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror

                                        <button type="submit" class="btn btn-success waves-effect waves-light">Submit</button>
                                        <a href="{{route('superAdmin.centerArea.index')}}" class="btn btn-info waves-effect waves-light">Back</a>
                                    </form>
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
