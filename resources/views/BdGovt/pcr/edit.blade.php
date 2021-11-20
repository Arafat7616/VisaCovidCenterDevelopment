@extends('BdGovt.layouts.master')
@push('title')
Edit PCR Test
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
                    <h4 class="pull-left page-title">Edit PCR Test</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="{{route('bdGovt.dashboard')}}">Dashboard</a></li>
                        <li><a href="javascript:void(0)">Manage PCR Test</a></li>
                        <li class="active">Edit PCR Test</li>
                    </ol>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <form action="{{ route('bdGovt.pcr.normal.update', $pcrTest) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    @include('Others.message')
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">Edit PCR test information</h3>
                        </div>
                        <div class="panel-body">
                            <div class="container">
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label for="sample_collection_date">Sample Collection Date</label>
                                            <input type="date" name="sample_collection_date" class="form-control" id="sample_collection_date" value="{{\Carbon\Carbon::parse($pcrTest->sample_collection_date)->format('Y-m-d')}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="date_of_pcr_test">Date of PCR Test</label>
                                            <input type="date" name="date_of_pcr_test" class="form-control" id="date_of_pcr_test" value="{{\Carbon\Carbon::parse($pcrTest->date_of_pcr_test)->format('Y-m-d')}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="result_published_date">Result Published Date</label>
                                            <input type="date" name="result_published_date" class="form-control" id="result_published_date" value="{{\Carbon\Carbon::parse($pcrTest->result_published_date)->format('Y-m-d')}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="status">Status</label>
                                            <select class="form-control" name="status" required="">
                                                <option {{ $pcrTest->status == '1' ? 'selected' : '' }} value="1">Active</option>
                                                <option {{ $pcrTest->status == '0' ? 'selected' : '' }} value="0">Inactive</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="pcr_result">PCR result</label>
                                            <select class="form-control" name="pcr_result" required="">
                                                <option {{ $pcrTest->pcr_result == 'positive' ? 'selected' : '' }} value="positive">Positive</option>
                                                <option {{ $pcrTest->pcr_result == 'negative' ? 'selected' : '' }} value="negative">Negative</option>
                                            </select>
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
