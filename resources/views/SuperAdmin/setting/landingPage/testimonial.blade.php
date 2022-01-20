@extends('SuperAdmin.layouts.master')
@push('title')
Testimonial | Setting 
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
                    <h4 class="pull-left page-title">Edit Testimonial</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="{{route('superAdmin.dashboard')}}">Dashboard</a></li>
                        <li><a href="javascript:void(0)">Setting's</a></li>
                        <li class="active">Edit Testimonial</li>
                    </ol>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <form action="{{ route('superAdmin.setting.landingPage.testimonialUpdate') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @include('Others.toaster_message')
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">Testimonial's information</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="how_we_work_title">We Work Title</label>
                                        <input type="text" name="how_we_work_title" class="form-control" id="how_we_work_title" value="{{ get_static_option('how_we_work_title') }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="how_we_work_description">We Work Description.</label>
                                        <textarea class="form-control" name="how_we_work_description" id="how_we_work_description" cols="30" rows="7">{{ get_static_option('how_we_work_description') }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="testimonial_title">Testimonial Title</label>
                                        <input type="text" name="testimonial_title" class="form-control" id="testimonial_title" value="{{ get_static_option('testimonial_title') }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="testimonial_description">Testimonial Description.</label>
                                        <textarea class="form-control" name="testimonial_description" id="testimonial_description" cols="30" rows="7">{{ get_static_option('testimonial_description') }}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="pcr_test_amount">We Work Title</label>
                                        <input type="text" name="pcr_test_amount" class="form-control" id="pcr_test_amount" value="{{ get_static_option('pcr_test_amount') }}">
                                    </div> 
                                    <div class="form-group">
                                        <label for="vaccine_amount">We Work Title</label>
                                        <input type="text" name="vaccine_amount" class="form-control" id="vaccine_amount" value="{{ get_static_option('vaccine_amount') }}">
                                    </div> 
                                    <div class="form-group">
                                        <label for="booster_amount">We Work Title</label>
                                        <input type="text" name="booster_amount" class="form-control" id="booster_amount" value="{{ get_static_option('booster_amount') }}">
                                    </div> 
                                    <div class="form-group">
                                        <label for="immigration_crossing_amount">We Work Title</label>
                                        <input type="text" name="immigration_crossing_amount" class="form-control" id="immigration_crossing_amount" value="{{ get_static_option('immigration_crossing_amount') }}">
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
