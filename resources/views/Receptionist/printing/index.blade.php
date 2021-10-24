@extends('Receptionist.layouts.master')

@push('title')
    Printing
@endpush

@push('css')
    <link rel="stylesheet" href="{{ asset('assets/center-part/css/Accordion-42.css') }}">
@endpush

@section('content')
    <div class="container py-4">
        <div class="card page-wrapper">
            {{-- <div class="accordion-table-breadcrumb">
                <div class="accordion-table-header ">
                    <div class="container">
                        <div class="row ">
                            <div class="col-4 ms-auto">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="ID/Name/Phone/Date">
                                    <div class="input-group-append">
                                        <button class="btn btn-secondary" type="button">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
            @foreach ($pcrTestsOrderByDate as $pcrTestOrderByDate)
                <div class="accordion" id="accordionExample{{ $loop->iteration }}">
                    <div class="accordion-item table-accordion-item">
                        <h2 class="accordion-header" id="heading{{ $loop->iteration }}">
                            <button class="accordion-button table-accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapse{{ $loop->iteration }}" aria-expanded="true" aria-controls="collapse{{ $loop->iteration }}">
                                {{-- <span class="table-accordion-date">{{ $pcrTestOrderByDate->first()->result_published_date->format('d/m/Y') }}</span> --}}
                                <span class="table-accordion-date">{{ Carbon\Carbon::parse($pcrTestOrderByDate->first()->result_published_date)->format('d/m/Y') }}</span>
                                <span class="table-accordion-people">{{ $pcrTestOrderByDate->count() }} People</span>
                            </button>
                        </h2>
                        <div id="collapse{{ $loop->iteration }}" class="accordion-collapse collapse @if($loop->iteration == 1) show @endif" aria-labelledby="heading{{ $loop->iteration }}"
                            data-bs-parent="#accordionExample{{ $loop->iteration }}">
                            <div class="accordion-body table-accordion-body">
                                <table class="table accordion-table">
                                    <thead>
                                        <tr>
                                            <th scope="col"> <input type="checkbox" class="custom-control-input" id="customCheck1" checked></th>
                                            <th scope="col">ID</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Phone</th>
                                            <th scope="col">Share</th>
                                            <th scope="col">Print</th>
                                            <th scope="col">View</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="table-row">
                                            <td><input type="checkbox" class="custom-control-input" id="customCheck1"></td>
                                            <td>345 234 124</td>
                                            <td>Ahmed Abdali</td>
                                            <td>018 2700 7441</td>
                                            <td>
                                                <a href="#"><img class="share-option-image"
                                                        src="{{ asset('uploads/images/imo.png') }}" alt=""></a>
                                                <a href="#"><img class="share-option-image"
                                                        src="{{ asset('uploads/images/whatsapp.png') }}" alt=""></a>
                                                <a href="#"><img class="share-option-image"
                                                        src="{{ asset('uploads/images/gmail.png') }}" alt=""></a>
                                            </td>
                                            <td class="text-center">
                                                <a href="#">
                                                    <i class="fa fa-print"></i>
                                                </a>
                                            </td>
                                            <td class="text-center">
                                                <a href="#"><i class="fa fa-eye text-dark"></i></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" class="custom-control-input" id="customCheck1"
                                                    checked>
                                            </td>
                                            <td>345 234 124</td>
                                            <td>Ahmed Abdali</td>
                                            <td>018 2700 7441</td>
                                            <td>
                                                <a href="#"><img class="share-option-image"
                                                        src="{{ asset('uploads/images/imo.png') }}" alt=""></a>
                                                <a href="#"><img class="share-option-image"
                                                        src="{{ asset('uploads/images/whatsapp.png') }}" alt=""></a>
                                                <a href="#"><img class="share-option-image"
                                                        src="{{ asset('uploads/images/gmail.png') }}" alt=""></a>
                                            </td>
                                            <td class="text-center">
                                                <a href="#">
                                                    <i class="fa fa-print"></i>
                                                </a>
                                            </td>
                                            <td class="text-center">
                                                <a href="#"><i class="fa fa-eye text-dark"></i></a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

@push('script')

@endpush
