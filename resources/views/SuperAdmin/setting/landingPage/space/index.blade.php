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
                    <h4 class="pull-left page-title">Edit Space</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="{{route('superAdmin.dashboard')}}">Dashboard</a></li>
                        <li><a href="javascript:void(0)">Setting's</a></li>
                        <li class="active">Edit Space</li>
                    </ol>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <form action="{{ route('superAdmin.setting.spaceUpdate') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @include('Others.message')
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <h3 class="panel-title  text-white">Space's information</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                               <div class="container">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="sft_per_person">Per Person Sft</label>
                                        <input type="text" name="sft_per_person" class="form-control" id="sft_per_person" value="{{ get_static_option('sft_per_person') }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="others_sft">Others Sft</label>
                                        <input type="text" name="others_sft" class="form-control" id="others_sft" value="{{ get_static_option('others_sft') }}">
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