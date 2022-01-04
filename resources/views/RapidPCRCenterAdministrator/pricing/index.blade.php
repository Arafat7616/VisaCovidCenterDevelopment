@extends('RapidPCRCenterAdministrator.layouts.master')

@push('title')
    Create New Trusted Medical Assistant
@endpush

@push('css')
    <link rel="stylesheet" href="{{asset('assets/center-part/css/setting_up_price_13.css')}}">
    
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endpush

@section('content')
    <div class="setting_up_price py-5">
        <div class="container">
            <div class="row">
                @if(Session::has('message'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('message') }}
                    </div>
                @endif
            </div>

            <form action="{{route('rapidPcrCenterAdministrator.price.update', $price->id)}}" method="POST">
                @csrf
                @method('put')
                <div class="setting_up_price__body shadow-sm">
                    <div class="row setting_up_price__body__text">
                        <p>
                            Setting up price
                            @if($price->status == 0)
                                <span class="badge badge-warning text-danger">Pending</span>
                            @elseif($price->status == 1)
                                <span class="badge badge-success text-success">Approved</span>
                            @endif
                        </p>

                       
                    </div>
                    <div class="row row-cols-1 row-cols-md-6 g-4">
                        <div class="col">
                            <div class="card h-100 shadow-sm">
                                <div class="setting_up_price__card__head">
                                    <p>PCR Test</p>
                                </div>
                                <div class="card-body setting_up_price__card__body">
                                    <input type="text" value="{{$price->pcr_normal}}" name="pcr_normal">
                                    <small>Regular</small>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 shadow-sm">
                                <div class="setting_up_price__card__head">
                                    <p>PCR Test</p>
                                </div>
                                <div class="card-body setting_up_price__card__body setting_up_price__card__premium">
                                    <i class="fa fa-star"></i>
                                    <input type="text" value="{{$price->pcr_premium}}" name="pcr_premium">
                                    <small>Premium</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-2">
                            <button type="submit" class="btn btn-success btn-sm mt-3">Update</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
