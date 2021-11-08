@extends('SuperAdmin.layouts.master')
@push('title')
Banner | Setting 
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
                    <h4 class="pull-left page-title">Edit Banner</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="{{route('superAdmin.dashboard')}}">Dashboard</a></li>
                        <li><a href="javascript:void(0)">Setting's</a></li>
                        <li class="active">Edit Banner</li>
                    </ol>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <form action="{{ route('superAdmin.setting.landingPage.bannerUpdate') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @include('Others.message')
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <h3 class="panel-title  text-white">Banner's information</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                               <div class="container">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="banner_highlight">Highlight</label>
                                        <input type="text" name="banner_highlight" class="form-control" id="banner_highlight" value="{{ get_static_option('banner_highlight') }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="banner_title">Title</label>
                                        <input type="text" name="banner_title" class="form-control" id="banner_title" value="{{ get_static_option('banner_title') }}">
                                    </div>                         
                                    <div class="form-group">
                                        <label for="banner_btn_link">Button Link</label>
                                        <input type="text" name="banner_btn_link" class="form-control" id="banner_btn_link" value="{{ get_static_option('banner_btn_link') }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="banner_description">Description.</label>
                                        <textarea class="form-control" name="banner_description" id="banner_description" cols="30" rows="7">{{ get_static_option('banner_description') }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <img class="rounded-circle" height="70px;" width="70px;" src="{{ asset(get_static_option('banner_image') ?? get_static_option('no_image')) }}" alt="">
                                        <label for="banner_image">Banner Image <span class="text-danger">If want to change image then select new</span></label>
                                        <input name="banner_image" type="file" accept="image/*" class="form-control" id="banner_image">
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