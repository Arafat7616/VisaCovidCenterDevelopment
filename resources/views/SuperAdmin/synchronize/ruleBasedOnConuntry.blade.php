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
                            <li><a href="{{route('superAdmin.synchronize.countries')}}">All Synchronize Rule</a></li>
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
                                    <form role="form" action="{{route('superAdmin.synchronize.ruleUpdate', $country->id)}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @include('Others.toaster_message')
                                        <input name="country_id" type="hidden" value="{{ $country->id }}">
                                        <div class="row">
                                            @foreach ($synchronizes as $key => $synchronize)
                                                <div class="col-lg-4 col-md-4" >
                                                    <input style="margin: 8px;" @if( check_country_and_synchronize_role($country->id,$synchronize->id) )  checked @endif id="synchronize_{{ $synchronize->id }}" type="checkbox" value="{{ $synchronize->id }}" name="synchronizes[]">
                                                    <label for="synchronize_{{ $synchronize->id }}"> {{ $synchronize->synchronize_rule }} </label>
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="row">
                                            <button type="submit" class="btn btn-success waves-effect waves-light">Submit</button>
                                            <a href="{{route('superAdmin.synchronize.countries')}}" class="btn btn-info waves-effect waves-light">Back</a>
                                        </div>
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
