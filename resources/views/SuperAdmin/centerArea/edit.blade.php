@extends('SuperAdmin.layouts.master')

@push('title')
    Edit Slider
@endpush

@section('content')
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-header-title">
                        <h4 class="pull-left page-title">Edit Slider</h4>
                        <ol class="breadcrumb pull-right">
                            <li><a href="{{route('superAdmin.dashboard')}}">Dashboard</a></li>
                            <li><a href="{{route('superAdmin.slider.index')}}">All Slider</a></li>
                            <li class="active">Edit Slider</li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">Edit Slider</h3>
                        </div>

                        <div class="panel-body">
                            <div class="row">
                                <div class="col-xs-12">
                                    <form role="form" action="{{route('superAdmin.slider.update', $slider->id)}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @include('Others.message')
                                        @method('put')
                                        <div class="form-group">
                                            <label for="name">Slider Title</label>
                                            <input type="text" name="title" value="{{$slider->title ? $slider->title : old('name') }}" class="form-control @error('title') is-invalid @enderror" id="ex1" placeholder="Enter Slider Title">
                                        </div>
                                        @error('title')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror


                                        <div class="form-group">
                                            <label for="image">Slider Image</label>
                                            <img src="{{asset($slider->image)}}" alt="course thumbnail" class="img-responsive w-lg" style="height: 200px;">
                                        </div>

                                        <div class="form-group">
                                            <input type="file" name="image" value="{{ old('image') ? old('image') : '' }}" class="form-control @error('image') is-invalid @enderror">
                                        </div>
                                        @error('image')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror


                                        <div class="form-group">
                                            <label for="status">Slider Status</label>
                                            <br>
                                            @php
                                                if(old('status')){
                                                    $status = old('status');
                                                }else{
                                                    $status = $slider->status;
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
                                        <a href="{{route('superAdmin.slider.index')}}" class="btn btn-info waves-effect waves-light">Back</a>
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
