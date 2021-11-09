@extends('SuperAdmin.layouts.master')
@push('title')
Footer | Setting 
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
                    <h4 class="pull-left page-title">Edit Footer</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="{{route('superAdmin.dashboard')}}">Dashboard</a></li>
                        <li><a href="javascript:void(0)">Setting's</a></li>
                        <li class="active">Edit Footer</li>
                    </ol>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <form action="{{ route('superAdmin.setting.landingPage.footerUpdate') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @include('Others.message')
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">Footer's information</h3>
                        </div>
                        <div class="panel-body">
                           <div class="container">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="app_moto">App Motto </label>
                                        <input type="text" name="app_moto" class="form-control" id="app_moto" value="{{ get_static_option('app_moto') }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="app_facebook_link">App Facebook Link</label>
                                        <input type="text" name="app_facebook_link" class="form-control" id="app_facebook_link" value="{{ get_static_option('app_facebook_link') }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="app_linkedin_link">App Linkedin Link</label>
                                        <input type="text" name="app_linkedin_link" class="form-control" id="app_linkedin_link" value="{{ get_static_option('app_linkedin_link') }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="app_mail_address">App Mail Address</label>
                                        <input type="text" name="app_mail_address" class="form-control" id="app_mail_address" value="{{ get_static_option('app_mail_address') }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="footer_details">Footer Description.</label>
                                        <textarea class="form-control" name="footer_details" id="footer_details" cols="30" rows="7">{{ get_static_option('footer_details') }}</textarea>
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
