@extends('SuperAdmin.layouts.master')
@push('title')
Download | Setting 
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
                    <h4 class="pull-left page-title">Edit Download</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="{{route('superAdmin.dashboard')}}">Dashboard</a></li>
                        <li><a href="javascript:void(0)">Setting's</a></li>
                        <li class="active">Edit Download</li>
                    </ol>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <form action="{{ route('superAdmin.setting.landingPage.downloadUpdate') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @include('Others.message')
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <h3 class="panel-title  text-white">Download's information</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                               <div class="container">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="service_title">Service Title</label>
                                        <input type="text" name="service_title" class="form-control" id="service_title" value="{{ get_static_option('service_title') }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="service_description">Service Description.</label>
                                        <textarea class="form-control" name="service_description" id="service_description" cols="30" rows="7">{{ get_static_option('service_description') }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="download_highlight">Download Highlight</label>
                                        <input type="text" name="download_highlight" class="form-control" id="download_highlight" value="{{ get_static_option('download_highlight') }}">
                                    </div>                         
                                    <div class="form-group">
                                        <label for="download_title">Download Title</label>
                                        <input type="text" name="download_title" class="form-control" id="download_title" value="{{ get_static_option('download_title') }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="download_btn_link">Download Link</label>
                                        <input type="text" name="download_btn_link" class="form-control" id="download_btn_link" value="{{ get_static_option('download_btn_link') }}">
                                    </div>
                                    <div class="form-group">
                                        <img class="rounded-circle" height="70px;" width="70px;" src="{{ asset(get_static_option('download_image') ?? get_static_option('no_image')) }}" alt="">
                                        <label for="download_image">Download Mobile Image <span class="text-danger">If want to change image then select new</span></label>
                                        <input name="download_image" type="file" accept="image/*" class="form-control" id="download_image">
                                    </div>                                    
                                </div>
                               </div>
                            </div>
                        </div>
                        <div class="panel-footer">
                            <div class=" text-right">
                                <button type="submit" class="btn btn-dark waves-effect waves-ligh">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div> <!-- End Row -->
    </div>
</div>
@endsection

@push('datatableJS')

@endpush

@push('script')

@endpush