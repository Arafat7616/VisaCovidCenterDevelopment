@extends('SuperAdmin.layouts.master')
@push('title')
Edit Work | Setting
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
                    <h4 class="pull-left page-title">Edit Work</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="{{route('superAdmin.dashboard')}}">Dashboard</a></li>
                        <li><a href="javascript:void(0)">Setting's</a></li>
                        <li class="active">Edit Work</li>
                    </ol>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <form action="{{ route('superAdmin.setting.landingPage.work.update', $work) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    @include('Others.message')
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <h3 class="panel-title  text-white">Edit Work</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="container">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="title">Title</label>
                                            <input type="text" name="title" class="form-control" id="title" value="{{ $work->title }}">
                                        </div>
                                        <div class="form-group">
                                            <label for="description">Description</label>
                                            <input type="text" name="description" class="form-control" id="description" value="{{ $work->description }}">
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
