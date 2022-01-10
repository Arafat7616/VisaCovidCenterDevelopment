@extends('RapidPCRCenterTrustedMedicalAssistant.layouts.master')

@push('title')
    Dashboard
@endpush

@push('css')
    <link rel="stylesheet" href="{{ asset('assets/center-part/css/accordion_table_16.css') }}">

@endpush

@section('content')
    {{-- <div class="container py-4">
        <div class="card page-wrapper">
            <div class="accordion-table-breadcrumb">
                <div class="accordion-table-header ">
                    <div class="container">
                        <div class="row justify-content-between">
                            <div class="col-4">
                                <div class="accorion-link mt-2" id='active-div'>
                                    <a href="#" class="accorion-btn breadcrumb-active">PCR</a>
                                    <a href="#" class="accorion-btn">Vaccine</a>
                                    <a href="#" class="accorion-btn">Booster</a>
                                </div>
                            </div>
                            <div class="col-4">
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
            </div>
            <div class="accordion" id="accordionExample">
                <div class="accordion-item table-accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button table-accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            <span class="table-accordion-date">06-10-2021</span>
                            <span class="table-accordion-people">490 People</span>
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body table-accordion-body">
                            <table class="table accordion-table">
                                <thead>
                                    <tr>
                                        <th scope="col"> <input type="checkbox" class="custom-control-input"
                                                id="customCheck1" checked></th>
                                        <th scope="col">ID</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">Gender</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="table-row">
                                        <td><input type="checkbox" class="custom-control-input" id="customCheck1"></td>
                                        <td>345 234 124</td>
                                        <td>Ahmed Abdali</td>
                                        <td>018 2700 7441</td>
                                        <td>Male</td>
                                        <td class="enter-icon-div">
                                            <a href="#">
                                                <img class="enter-icon"
                                                    src="{{ asset('assets/center-part/image/enter.png') }}" alt="">
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" class="custom-control-input" id="customCheck1" checked>
                                        </td>
                                        <td>345 234 124</td>
                                        <td>Ahmed Abdali</td>
                                        <td>018 2700 7441</td>
                                        <td>Male</td>
                                        <td class="enter-icon-div">
                                            <a href="#">
                                                <img class="enter-icon"
                                                    src="{{ asset('assets/center-part/image/enter.png') }}" alt="">
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" class="custom-control-input" id="customCheck1" checked>
                                        </td>
                                        <td>345 234 124</td>
                                        <td>Ahmed Abdali</td>
                                        <td>018 2700 7441</td>
                                        <td>Male</td>
                                        <td class="enter-icon-div">
                                            <a href="#">
                                                <img class="enter-icon"
                                                    src="{{ asset('assets/center-part/image/enter.png') }}" alt="">
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="accordion-item  table-accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button table-accordion-button collapsed" type="button"
                            data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false"
                            aria-controls="collapseTwo">
                            <span class="table-accordion-date">06-10-2021</span>
                            <span class="table-accordion-people">490 People</span>
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <table class="table accordion-table">
                                <thead>
                                    <tr>
                                        <th scope="col"> <input type="checkbox" class="custom-control-input"
                                                id="customCheck1" checked></th>
                                        <th scope="col">ID</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">Gender</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="table-row">
                                        <td><input type="checkbox" class="custom-control-input" id="customCheck1"></td>
                                        <td>345 234 124</td>
                                        <td>Ahmed Abdali</td>
                                        <td>018 2700 7441</td>
                                        <td>Male</td>
                                        <td class="enter-icon-div">
                                            <a href="#">
                                                <img class="enter-icon"
                                                    src="{{ asset('assets/center-part/image/enter.png') }}" alt="">
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" class="custom-control-input" id="customCheck1" checked>
                                        </td>
                                        <td>345 234 124</td>
                                        <td>Ahmed Abdali</td>
                                        <td>018 2700 7441</td>
                                        <td>Male</td>
                                        <td class="enter-icon-div">
                                            <a href="#">
                                                <img class="enter-icon"
                                                    src="{{ asset('assets/center-part/image/enter.png') }}" alt="">
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" class="custom-control-input" id="customCheck1" checked>
                                        </td>
                                        <td>345 234 124</td>
                                        <td>Ahmed Abdali</td>
                                        <td>018 2700 7441</td>
                                        <td>Male</td>
                                        <td class="enter-icon-div">
                                            <a href="#">
                                                <img class="enter-icon"
                                                    src="{{ asset('assets/center-part/image/enter.png') }}" alt="">
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="accordion-item  table-accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button table-accordion-button collapsed" type="button"
                            data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false"
                            aria-controls="collapseThree">
                            <span class="table-accordion-date">06-10-2021</span>
                            <span class="table-accordion-people">490 People</span>
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <table class="table accordion-table">
                                <thead>
                                    <tr>
                                        <th scope="col"> <input type="checkbox" class="custom-control-input"
                                                id="customCheck1" checked></th>
                                        <th scope="col">ID</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">Gender</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="table-row">
                                        <td><input type="checkbox" class="custom-control-input" id="customCheck1"></td>
                                        <td>345 234 124</td>
                                        <td>Ahmed Abdali</td>
                                        <td>018 2700 7441</td>
                                        <td>Male</td>
                                        <td class="enter-icon-div">
                                            <a href="#">
                                                <img class="enter-icon"
                                                    src="{{ asset('assets/center-part/image/enter.png') }}" alt="">
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" class="custom-control-input" id="customCheck1" checked>
                                        </td>
                                        <td>345 234 124</td>
                                        <td>Ahmed Abdali</td>
                                        <td>018 2700 7441</td>
                                        <td>Male</td>
                                        <td class="enter-icon-div">
                                            <a href="#">
                                                <img class="enter-icon"
                                                    src="{{ asset('assets/center-part/image/enter.png') }}" alt="">
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" class="custom-control-input" id="customCheck1" checked>
                                        </td>
                                        <td>345 234 124</td>
                                        <td>Ahmed Abdali</td>
                                        <td>018 2700 7441</td>
                                        <td>Male</td>
                                        <td class="enter-icon-div">
                                            <a href="#">
                                                <img class="enter-icon"
                                                    src="{{ asset('assets/center-part/image/enter.png') }}" alt="">
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div> --}}
@endsection

@push('script')

@endpush
