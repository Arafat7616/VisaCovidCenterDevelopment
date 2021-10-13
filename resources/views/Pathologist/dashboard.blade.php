@extends('Pathologist.layouts.master')

@push('title')
    Dashboard
@endpush

@push('css')

@endpush

@section('content')
<div class="hero_pure">
    <!--Waiting Result-->
    <div class="tap_result_1" id="tap_result_1">
        <div class="container py-4">
            <div class="card page-wrapper" style="margin-bottom: 100px">
                <div class="accordion-table-breadcrumb">
                    <div class="accordion-table-header">
                        <div class="container">
                            <div class="row justify-content-between">
                                <div class="col-4">
                                    <div class="accorion-link mt-2" id="active-div">
                                        <button id="tap_on_s" onclick="openWaiting()" class="tab-on-btn">
                                            <a href="#" class="accorion-btn breadcrumb-active">Waiting</a>
                                        </button>
                                        <button id="tap_on_s1" onclick="openPublish()" class="tab-on-btn">
                                            <a href="#" class="accorion-btn">Published</a>
                                        </button>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="ID/Name/Phone/Date" />
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
                                <table class="table">
                                    <thead class="new-reg-tbl-head" style="background-color: white; color: gray">
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Phone</th>
                                            <th scope="col">Upload</th>
                                            <th scope="col">Share</th>
                                        </tr>
                                    </thead>

                                    <div class="scroll_new_ta">
                                        <tbody class="scroll_new_ber">
                                            <tr>
                                                <td class="td_new">234 234 234</td>
                                                <td class="td_new">Mark Jock</td>
                                                <td class="td_new">01785521452</td>
                                                <td class="td_new">
                                                    <a href="#">
                                                        <img src="{{ asset('assets/center-part/image/icon/upload.png') }}" alt=""
                                                                class="upload-result-pub" />
                                                    </a>
                                                </td>
                                                <td class="td_new">
                                                    <a href=""><img src="{{ asset('assets/center-part/image/logo.png') }}" alt=""
                                                            class="new-r-icon" /></a>
                                                    <a href=""><img src="{{ asset('assets/center-part/image/logo.png') }}" alt=""
                                                            class="new-r-icon" /></a>
                                                    <a href=""><img src="{{ asset('assets/center-part/image/logo.png') }}" alt=""
                                                            class="new-r-icon" /></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="td_new">234 234 234</td>
                                                <td class="td_new">Mark Jock</td>
                                                <td class="td_new">01785521452</td>
                                                <td class="td_new">
                                                    <a href="#">
                                                        <img src="{{ asset('assets/center-part/image/icon/upload.png') }}" alt=""
                                                                class="upload-result-pub" />
                                                    </a>
                                                </td>
                                                <td class="td_new">
                                                    <a href=""><img src="{{ asset('assets/center-part/image/logo.png') }}" alt=""
                                                            class="new-r-icon" /></a>
                                                    <a href=""><img src="{{ asset('assets/center-part/image/logo.png') }}" alt=""
                                                            class="new-r-icon" /></a>
                                                    <a href=""><img src="{{ asset('assets/center-part/image/logo.png') }}" alt=""
                                                            class="new-r-icon" /></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="td_new">234 234 234</td>
                                                <td class="td_new">Mark Jock</td>
                                                <td class="td_new">01785521452</td>
                                                <td class="td_new">
                                                    <a href="#">
                                                        <img src="{{ asset('assets/center-part/image/icon/upload.png') }}" alt=""
                                                                class="upload-result-pub" />
                                                    </a>
                                                </td>
                                                <td class="td_new">
                                                    <a href=""><img src="{{ asset('assets/center-part/image/logo.png') }}" alt=""
                                                            class="new-r-icon" /></a>
                                                    <a href=""><img src="{{ asset('assets/center-part/image/logo.png') }}" alt=""
                                                            class="new-r-icon" /></a>
                                                    <a href=""><img src="{{ asset('assets/center-part/image/logo.png') }}" alt=""
                                                            class="new-r-icon" /></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="td_new">234 234 234</td>
                                                <td class="td_new">Mark Jock</td>
                                                <td class="td_new">01785521452</td>
                                                <td class="td_new">
                                                    <a href="#">
                                                        <img src="{{ asset('assets/center-part/image/icon/upload.png') }}" alt=""
                                                                class="upload-result-pub" />
                                                    </a>
                                                </td>
                                                <td class="td_new">
                                                    <a href=""><img src="{{ asset('assets/center-part/image/logo.png') }}" alt=""
                                                            class="new-r-icon" /></a>
                                                    <a href=""><img src="{{ asset('assets/center-part/image/logo.png') }}" alt=""
                                                            class="new-r-icon" /></a>
                                                    <a href=""><img src="{{ asset('assets/center-part/image/logo.png') }}" alt=""
                                                            class="new-r-icon" /></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="td_new">234 234 234</td>
                                                <td class="td_new">Mark Jock</td>
                                                <td class="td_new">01785521452</td>
                                                <td class="td_new">
                                                    <a href="#">
                                                        <img src="{{ asset('assets/center-part/image/icon/upload.png') }}" alt=""
                                                                class="upload-result-pub" />
                                                    </a>
                                                </td>
                                                <td class="td_new">
                                                    <a href=""><img src="{{ asset('assets/center-part/image/logo.png') }}" alt=""
                                                            class="new-r-icon" /></a>
                                                    <a href=""><img src="{{ asset('assets/center-part/image/logo.png') }}" alt=""
                                                            class="new-r-icon" /></a>
                                                    <a href=""><img src="{{ asset('assets/center-part/image/logo.png') }}" alt=""
                                                            class="new-r-icon" /></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="td_new">234 234 234</td>
                                                <td class="td_new">Mark Jock</td>
                                                <td class="td_new">01785521452</td>
                                                <td class="td_new">
                                                    <a href="#">
                                                        <img src="{{ asset('assets/center-part/image/icon/upload.png') }}" alt=""
                                                                class="upload-result-pub" />
                                                    </a>
                                                </td>
                                                <td class="td_new">
                                                    <a href=""><img src="{{ asset('assets/center-part/image/logo.png') }}" alt=""
                                                            class="new-r-icon" /></a>
                                                    <a href=""><img src="{{ asset('assets/center-part/image/logo.png') }}" alt=""
                                                            class="new-r-icon" /></a>
                                                    <a href=""><img src="{{ asset('assets/center-part/image/logo.png') }}" alt=""
                                                            class="new-r-icon" /></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="td_new">234 234 234</td>
                                                <td class="td_new">Mark Jock</td>
                                                <td class="td_new">01785521452</td>
                                                <td class="td_new">
                                                    <a href="#">
                                                        <img src="{{ asset('assets/center-part/image/icon/upload.png') }}" alt=""
                                                                class="upload-result-pub" />
                                                    </a>
                                                </td>
                                                <td class="td_new">
                                                    <a href=""><img src="{{ asset('assets/center-part/image/logo.png') }}" alt=""
                                                            class="new-r-icon" /></a>
                                                    <a href=""><img src="{{ asset('assets/center-part/image/logo.png') }}" alt=""
                                                            class="new-r-icon" /></a>
                                                    <a href=""><img src="{{ asset('assets/center-part/image/logo.png') }}" alt=""
                                                            class="new-r-icon" /></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="td_new">234 234 234</td>
                                                <td class="td_new">Mark Jock</td>
                                                <td class="td_new">01785521452</td>
                                                <td class="td_new">
                                                    <a href="#">
                                                        <img src="{{ asset('assets/center-part/image/icon/upload.png') }}" alt=""
                                                                class="upload-result-pub" />
                                                    </a>
                                                </td>
                                                <td class="td_new">
                                                    <a href=""><img src="{{ asset('assets/center-part/image/logo.png') }}" alt=""
                                                            class="new-r-icon" /></a>
                                                    <a href=""><img src="{{ asset('assets/center-part/image/logo.png') }}" alt=""
                                                            class="new-r-icon" /></a>
                                                    <a href=""><img src="{{ asset('assets/center-part/image/logo.png') }}" alt=""
                                                            class="new-r-icon" /></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="td_new">234 234 234</td>
                                                <td class="td_new">Mark Jock</td>
                                                <td class="td_new">01785521452</td>
                                                <td class="td_new">
                                                    <a href="#">
                                                        <img src="{{ asset('assets/center-part/image/icon/upload.png') }}" alt=""
                                                                class="upload-result-pub" />
                                                    </a>
                                                </td>
                                                <td class="td_new">
                                                    <a href=""><img src="{{ asset('assets/center-part/image/logo.png') }}" alt=""
                                                            class="new-r-icon" /></a>
                                                    <a href=""><img src="{{ asset('assets/center-part/image/logo.png') }}" alt=""
                                                            class="new-r-icon" /></a>
                                                    <a href=""><img src="{{ asset('assets/center-part/image/logo.png') }}" alt=""
                                                            class="new-r-icon" /></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="td_new">234 234 234</td>
                                                <td class="td_new">Mark Jock</td>
                                                <td class="td_new">01785521452</td>
                                                <td class="td_new">
                                                    <a href="#">
                                                        <img src="{{ asset('assets/center-part/image/icon/upload.png') }}" alt=""
                                                                class="upload-result-pub" />
                                                    </a>
                                                </td>
                                                <td class="td_new">
                                                    <a href=""><img src="{{ asset('assets/center-part/image/logo.png') }}" alt=""
                                                            class="new-r-icon" /></a>
                                                    <a href=""><img src="{{ asset('assets/center-part/image/logo.png') }}" alt=""
                                                            class="new-r-icon" /></a>
                                                    <a href=""><img src="{{ asset('assets/center-part/image/logo.png') }}" alt=""
                                                            class="new-r-icon" /></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="td_new">234 234 234</td>
                                                <td class="td_new">Mark Jock</td>
                                                <td class="td_new">01785521452</td>
                                                <td class="td_new">
                                                    <a href="#">
                                                        <img src="{{ asset('assets/center-part/image/icon/upload.png') }}" alt=""
                                                                class="upload-result-pub" />
                                                    </a>
                                                </td>
                                                <td class="td_new">
                                                    <a href=""><img src="{{ asset('assets/center-part/image/logo.png') }}" alt=""
                                                            class="new-r-icon" /></a>
                                                    <a href=""><img src="{{ asset('assets/center-part/image/logo.png') }}" alt=""
                                                            class="new-r-icon" /></a>
                                                    <a href=""><img src="{{ asset('assets/center-part/image/logo.png') }}" alt=""
                                                            class="new-r-icon" /></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="td_new">234 234 234</td>
                                                <td class="td_new">Mark Jock</td>
                                                <td class="td_new">01785521452</td>
                                                <td class="td_new">
                                                    <a href="#">
                                                        <img src="{{ asset('assets/center-part/image/icon/upload.png') }}" alt=""
                                                                class="upload-result-pub" />
                                                    </a>
                                                </td>
                                                <td class="td_new">
                                                    <a href=""><img src="{{ asset('assets/center-part/image/logo.png') }}" alt=""
                                                            class="new-r-icon" /></a>
                                                    <a href=""><img src="{{ asset('assets/center-part/image/logo.png') }}" alt=""
                                                            class="new-r-icon" /></a>
                                                    <a href=""><img src="{{ asset('assets/center-part/image/logo.png') }}" alt=""
                                                            class="new-r-icon" /></a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </div>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--publish Result-->
    <div class="tap_result_1" id="tap_result_2">
        <div class="container py-4">
            <div class="card page-wrapper" style="margin-bottom: 100px">
                <div class="accordion-table-breadcrumb">
                    <div class="accordion-table-header">
                        <div class="container">
                            <div class="row justify-content-between">
                                <div class="col-4">
                                    <div class="accorion-link mt-2" id="active-div">
                                        <button id="tap_on_s" onclick="openWaiting()" class="tab-on-btn">
                                            <a href="#" class="accorion-btn">Waiting</a>
                                        </button>
                                        <button id="tap_on_s1" onclick="openPublish()" class="tab-on-btn">
                                            <a href="#" class="accorion-btn breadcrumb-active">Published</a>
                                        </button>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="ID/Name/Phone/Date" />
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
                            <button class="accordion-button table-accordion-button" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true"
                                aria-controls="collapseOne">
                                <span class="table-accordion-date">06-10-2021</span>
                                <span class="table-accordion-people">490 People</span>
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body table-accordion-body">
                                <table class="table">
                                    <thead class="new-reg-tbl-head" style="background-color: white; color: gray">
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Phone</th>
                                            <th scope="col">Upload</th>
                                            <th scope="col">Share</th>
                                        </tr>
                                    </thead>

                                    <div class="scroll_new_ta">
                                        <tbody class="scroll_new_ber">
                                            <tr>
                                                <td class="td_new">234 234 234</td>
                                                <td class="td_new">Mark Jock</td>
                                                <td class="td_new">01785521452</td>
                                                <td class="td_new">
                                                    <label for="file-up-57"><img src="{{ asset('assets/center-part/image/icon/edit.png') }}"
                                                            alt="" class="upload-result-pub" /></label>
                                                </td>
                                                <td class="td_new">
                                                    <a href=""><img src="{{ asset('assets/center-part/image/logo.png') }}" alt=""
                                                            class="new-r-icon" /></a>
                                                    <a href=""><img src="{{ asset('assets/center-part/image/logo.png') }}" alt=""
                                                            class="new-r-icon" /></a>
                                                    <a href=""><img src="{{ asset('assets/center-part/image/logo.png') }}" alt=""
                                                            class="new-r-icon" /></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="td_new">234 234 234</td>
                                                <td class="td_new">Mark Jock</td>
                                                <td class="td_new">01785521452</td>
                                                <td class="td_new">
                                                    <label for="file-up-57"><img src="{{ asset('assets/center-part/image/icon/edit.png') }}"
                                                            alt="" class="upload-result-pub" /></label>
                                                </td>
                                                <td class="td_new">
                                                    <a href=""><img src="{{ asset('assets/center-part/image/logo.png') }}" alt=""
                                                            class="new-r-icon" /></a>
                                                    <a href=""><img src="{{ asset('assets/center-part/image/logo.png') }}" alt=""
                                                            class="new-r-icon" /></a>
                                                    <a href=""><img src="{{ asset('assets/center-part/image/logo.png') }}" alt=""
                                                            class="new-r-icon" /></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="td_new">234 234 234</td>
                                                <td class="td_new">Mark Jock</td>
                                                <td class="td_new">01785521452</td>
                                                <td class="td_new">
                                                    <label for="file-up-57"><img src="{{ asset('assets/center-part/image/icon/edit.png') }}"
                                                            alt="" class="upload-result-pub" /></label>
                                                </td>
                                                <td class="td_new">
                                                    <a href=""><img src="{{ asset('assets/center-part/image/logo.png') }}" alt=""
                                                            class="new-r-icon" /></a>
                                                    <a href=""><img src="{{ asset('assets/center-part/image/logo.png') }}" alt=""
                                                            class="new-r-icon" /></a>
                                                    <a href=""><img src="{{ asset('assets/center-part/image/logo.png') }}" alt=""
                                                            class="new-r-icon" /></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="td_new">234 234 234</td>
                                                <td class="td_new">Mark Jock</td>
                                                <td class="td_new">01785521452</td>
                                                <td class="td_new">
                                                    <label for="file-up-57"><img src="{{ asset('assets/center-part/image/icon/edit.png') }}"
                                                            alt="" class="upload-result-pub" /></label>
                                                </td>
                                                <td class="td_new">
                                                    <a href=""><img src="{{ asset('assets/center-part/image/logo.png') }}" alt=""
                                                            class="new-r-icon" /></a>
                                                    <a href=""><img src="{{ asset('assets/center-part/image/logo.png') }}" alt=""
                                                            class="new-r-icon" /></a>
                                                    <a href=""><img src="{{ asset('assets/center-part/image/logo.png') }}" alt=""
                                                            class="new-r-icon" /></a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </div>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item table-accordion-item">
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
                                <table class="table">
                                    <thead class="new-reg-tbl-head" style="background-color: white; color: gray">
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Phone</th>
                                            <th scope="col">Upload</th>
                                            <th scope="col">Share</th>
                                        </tr>
                                    </thead>

                                    <div class="scroll_new_ta">
                                        <tbody class="scroll_new_ber">
                                            <tr>
                                                <td class="td_new">234 234 234</td>
                                                <td class="td_new">Mark Jock</td>
                                                <td class="td_new">01785521452</td>
                                                <td class="td_new">
                                                    <label for="file-up-57"><img src="{{ asset('assets/center-part/image/icon/edit.png') }}"
                                                            alt="" class="upload-result-pub" /></label>
                                                </td>
                                                <td class="td_new">
                                                    <a href=""><img src="{{ asset('assets/center-part/image/logo.png') }}" alt=""
                                                            class="new-r-icon" /></a>
                                                    <a href=""><img src="{{ asset('assets/center-part/image/logo.png') }}" alt=""
                                                            class="new-r-icon" /></a>
                                                    <a href=""><img src="{{ asset('assets/center-part/image/logo.png') }}" alt=""
                                                            class="new-r-icon" /></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="td_new">234 234 234</td>
                                                <td class="td_new">Mark Jock</td>
                                                <td class="td_new">01785521452</td>
                                                <td class="td_new">
                                                    <label for="file-up-57"><img src="{{ asset('assets/center-part/image/icon/edit.png') }}"
                                                            alt="" class="upload-result-pub" /></label>
                                                </td>
                                                <td class="td_new">
                                                    <a href=""><img src="{{ asset('assets/center-part/image/logo.png') }}" alt=""
                                                            class="new-r-icon" /></a>
                                                    <a href=""><img src="{{ asset('assets/center-part/image/logo.png') }}" alt=""
                                                            class="new-r-icon" /></a>
                                                    <a href=""><img src="{{ asset('assets/center-part/image/logo.png') }}" alt=""
                                                            class="new-r-icon" /></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="td_new">234 234 234</td>
                                                <td class="td_new">Mark Jock</td>
                                                <td class="td_new">01785521452</td>
                                                <td class="td_new">
                                                    <label for="file-up-57"><img src="{{ asset('assets/center-part/image/icon/edit.png') }}"
                                                            alt="" class="upload-result-pub" /></label>
                                                </td>
                                                <td class="td_new">
                                                    <a href=""><img src="{{ asset('assets/center-part/image/logo.png') }}" alt=""
                                                            class="new-r-icon" /></a>
                                                    <a href=""><img src="{{ asset('assets/center-part/image/logo.png') }}" alt=""
                                                            class="new-r-icon" /></a>
                                                    <a href=""><img src="{{ asset('assets/center-part/image/logo.png') }}" alt=""
                                                            class="new-r-icon" /></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="td_new">234 234 234</td>
                                                <td class="td_new">Mark Jock</td>
                                                <td class="td_new">01785521452</td>
                                                <td class="td_new">
                                                    <label for="file-up-57"><img src="{{ asset('assets/center-part/image/icon/edit.png') }}"
                                                            alt="" class="upload-result-pub" /></label>
                                                </td>
                                                <td class="td_new">
                                                    <a href=""><img src="{{ asset('assets/center-part/image/logo.png') }}" alt=""
                                                            class="new-r-icon" /></a>
                                                    <a href=""><img src="{{ asset('assets/center-part/image/logo.png') }}" alt=""
                                                            class="new-r-icon" /></a>
                                                    <a href=""><img src="{{ asset('assets/center-part/image/logo.png') }}" alt=""
                                                            class="new-r-icon" /></a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </div>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item table-accordion-item">
                        <h2 class="accordion-header" id="headingFour">
                            <button class="accordion-button table-accordion-button collapsed" type="button"
                                data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false"
                                aria-controls="collapseFour">
                                <span class="table-accordion-date">06-10-2021</span>
                                <span class="table-accordion-people">490 People</span>
                            </button>
                        </h2>
                        <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <table class="table">
                                    <thead class="new-reg-tbl-head" style="background-color: white; color: gray">
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Phone</th>
                                            <th scope="col">Upload</th>
                                            <th scope="col">Share</th>
                                        </tr>
                                    </thead>

                                    <div class="scroll_new_ta">
                                        <tbody class="scroll_new_ber">
                                            <tr>
                                                <td class="td_new">234 234 234</td>
                                                <td class="td_new">Mark Jock</td>
                                                <td class="td_new">01785521452</td>
                                                <td class="td_new">
                                                    <label for="file-up-57"><img src="{{ asset('assets/center-part/image/icon/edit.png') }}"
                                                            alt="" class="upload-result-pub" /></label>
                                                </td>
                                                <td class="td_new">
                                                    <a href=""><img src="{{ asset('assets/center-part/image/logo.png') }}" alt=""
                                                            class="new-r-icon" /></a>
                                                    <a href=""><img src="{{ asset('assets/center-part/image/logo.png') }}" alt=""
                                                            class="new-r-icon" /></a>
                                                    <a href=""><img src="{{ asset('assets/center-part/image/logo.png') }}" alt=""
                                                            class="new-r-icon" /></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="td_new">234 234 234</td>
                                                <td class="td_new">Mark Jock</td>
                                                <td class="td_new">01785521452</td>
                                                <td class="td_new">
                                                    <label for="file-up-57"><img src="{{ asset('assets/center-part/image/icon/edit.png') }}"
                                                            alt="" class="upload-result-pub" /></label>
                                                </td>
                                                <td class="td_new">
                                                    <a href=""><img src="{{ asset('assets/center-part/image/logo.png') }}" alt=""
                                                            class="new-r-icon" /></a>
                                                    <a href=""><img src="{{ asset('assets/center-part/image/logo.png') }}" alt=""
                                                            class="new-r-icon" /></a>
                                                    <a href=""><img src="{{ asset('assets/center-part/image/logo.png') }}" alt=""
                                                            class="new-r-icon" /></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="td_new">234 234 234</td>
                                                <td class="td_new">Mark Jock</td>
                                                <td class="td_new">01785521452</td>
                                                <td class="td_new">
                                                    <label for="file-up-57"><img src="{{ asset('assets/center-part/image/icon/edit.png') }}"
                                                            alt="" class="upload-result-pub" /></label>
                                                </td>
                                                <td class="td_new">
                                                    <a href=""><img src="{{ asset('assets/center-part/image/logo.png') }}" alt=""
                                                            class="new-r-icon" /></a>
                                                    <a href=""><img src="{{ asset('assets/center-part/image/logo.png') }}" alt=""
                                                            class="new-r-icon" /></a>
                                                    <a href=""><img src="{{ asset('assets/center-part/image/logo.png') }}" alt=""
                                                            class="new-r-icon" /></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="td_new">234 234 234</td>
                                                <td class="td_new">Mark Jock</td>
                                                <td class="td_new">01785521452</td>
                                                <td class="td_new">
                                                    <label for="file-up-57"><img src="{{ asset('assets/center-part/image/icon/edit.png') }}"
                                                            alt="" class="upload-result-pub" /></label>
                                                </td>
                                                <td class="td_new">
                                                    <a href=""><img src="{{ asset('assets/center-part/image/logo.png') }}" alt=""
                                                            class="new-r-icon" /></a>
                                                    <a href=""><img src="{{ asset('assets/center-part/image/logo.png') }}" alt=""
                                                            class="new-r-icon" /></a>
                                                    <a href=""><img src="{{ asset('assets/center-part/image/logo.png') }}" alt=""
                                                            class="new-r-icon" /></a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </div>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')

@endpush
