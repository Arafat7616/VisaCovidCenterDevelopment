@extends('SuperAdmin.layouts.master')

@push('title')
    Edit Synchronize Rule
@endpush

@section('content')
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-header-title">
                        <h4 class="pull-left page-title">Edit Synchronize Rule</h4>
                        <ol class="breadcrumb pull-right">
                            <li><a href="{{route('superAdmin.dashboard')}}">Dashboard</a></li>
                            <li><a href="{{route('superAdmin.synchronize.index')}}">All Synchronize Rule</a></li>
                            <li class="active">Edit Synchronize Rule</li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">Edit Synchronize Rule</h3>
                        </div>

                        <div class="panel-body">
                            <div class="row">
                                <div class="col-xs-12">
                                    <form role="form" action="{{route('superAdmin.synchronize.update', $synchronize->id)}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @include('Others.message')
                                        @method('put')
                                        <div class="form-group">
                                            <label for="country_id" class="control-label">Country</label>
                                            <div>
                                                <select class="form-control @error('title') is-invalid @enderror" name="country_id">
                                                    <option>Select Country</option>
                                                    @foreach($countries as $country)
                                                        <option @if($synchronize->country_id == $country->id) selected @endif value="{{$country->id}}">{{$country->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        @error('country')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror

                                        <div class="form-group">
                                            <label for="synchronize_rule">Synchronize Rule</label>
                                            <input type="text" name="synchronize_rule" value="{{ $synchronize->synchronize_rule }}" class="form-control @error('synchronize_rule') is-invalid @enderror" id="ex1" placeholder="Synchronize rule">
                                        </div>

                                        @error('synchronize_rule')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror


                                        <div class="form-group">
                                            <label for="status">Synchronize Rule Status</label>
                                            <br>

                                            <div class="radio radio-info radio-inline">
                                                <input type="radio" id="inlineRadio1" value="1" name="status" @if($synchronize->status == 1) checked @endif>
                                                <label for="inlineRadio1">Active</label>
                                            </div>

                                            <div class="radio radio-info radio-inline">
                                                <input type="radio" id="inlineRadio1" value="0" name="status" @if($synchronize->status == 0 ) @endif>
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
