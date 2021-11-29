@extends('SuperAdmin.layouts.master')
@push('title')
    Create Synchronize Rule
@endpush

@section('content')
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-header-title">
                        <h4 class="pull-left page-title">Create Synchronize Rule</h4>
                        <ol class="breadcrumb pull-right">
                            <li><a href="{{route('superAdmin.dashboard')}}">Dashboard</a></li>
                            <li><a href="{{route('superAdmin.slider.index')}}">All Synchronize Rule</a></li>
                            <li class="active">Create Synchronize Ruler</li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">Create Synchronize Rule</h3>
                        </div>

                        <div class="panel-body">
                            <div class="row">
                                <div class="col-xs-12">
                                    <form role="form" action="{{route('superAdmin.synchronize.store')}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @include('Others.message')

                                        <div class="form-group">
                                            <label for="country_id" class="control-label">Country</label>
                                            <div>
                                                <select class="form-control @error('title') is-invalid @enderror" name="country_id">
                                                    <option>Select Country</option>
                                                    @foreach($countries as $country)
                                                        <option @if(old('country_id') == $country->id) selected @endif value="{{$country->id}}">{{$country->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        @error('country')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror

                                        <div class="form-group">
                                            <label for="synchronize_rule">Synchronize Rule</label>
                                            <input type="text" name="synchronize_rule" value="{{ old('synchronize_rule') }}" class="form-control @error('synchronize_rule') is-invalid @enderror" id="ex1" placeholder="Synchronize rule">
                                        </div>

                                        @error('synchronize_rule')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror


                                        <div class="form-group">
                                            <label for="status">Synchronize Rule Status</label>
                                            <br>
                                            @php
                                                if (old('status')){
                                                    $status = old('status');
                                                }else {
                                                        $status = 1;
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
                                        <a href="{{route('superAdmin.synchronize.index')}}" class="btn btn-info waves-effect waves-light">Back</a>
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
