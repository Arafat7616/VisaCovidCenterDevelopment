@extends('Volunteer.layouts.master')

@push('title')
    User's
@endpush

@push('css')
    <link rel="stylesheet" href="{{ asset('assets/center-part/css/Accordion-42.css') }}">
@endpush

@section('content')
    <div class="container py-4 ">
        <div class="card page-wrapper-rg-n">
            <div class="page-wrapper-rg-np">
                <nav aria-label="">
                    <div class="row breadcrumb-new">
                        <div class="col-12">
                            <div class="search-boxn">
                                <table>
                                    <tr class="search-boxn">
                                        <td class="td_new1"><input type="text" class="form-control i-new-r"
                                                placeholder="ID/Name/Phone/Date"></td>
                                        <td class="td_new3"><button class="search-new-r"><i
                                                    class="fa fa-search form-control-feedback-new"></i></button></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </nav>

                <table class="table">
                    <thead class="new-reg-tbl-head">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Subscription</th>
                            <th scope="col">Share</th>
                        </tr>
                    </thead>

                    <div class="scroll_new_ta">
                        <tbody class="scroll_new_ber">
                            <tr>
                                <td class="td_new">234 234 234</td>
                                <td class="td_new">Mark Jock</td>
                                <td class="td_new">01785521452</td>
                                <td class="td_new">200 days</td>
                                <td class="td_new">
                                    <a href="#"><img class="share-option-image" src="{{ asset('uploads/images/imo.png') }}" alt=""></a>
                                    <a href="#"><img class="share-option-image" src="{{ asset('uploads/images/whatsapp.png') }}" alt=""></a>
                                    <a href="#"><img class="share-option-image" src="{{ asset('uploads/images/gmail.png') }}" alt=""></a>
                                </td>
                            </tr>
                            <tr>
                                <td class="td_new">234 234 234</td>
                                <td class="td_new">Mark Jock</td>
                                <td class="td_new">01785521452</td>
                                <td class="td_new">200 days</td>
                                <td class="td_new">
                                    <a href="#"><img class="share-option-image" src="{{ asset('uploads/images/imo.png') }}" alt=""></a>
                                    <a href="#"><img class="share-option-image" src="{{ asset('uploads/images/whatsapp.png') }}" alt=""></a>
                                    <a href="#"><img class="share-option-image" src="{{ asset('uploads/images/gmail.png') }}" alt=""></a>
                                </td>
                            </tr>
                        </tbody>
                    </div>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('script')

@endpush
