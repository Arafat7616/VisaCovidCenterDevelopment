@extends('Administrator.layouts.master')

@push('title')
    Create New volunteer
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

            <form action="{{route('administrator.price.update', $centerPrice->id)}}" method="POST">
                @csrf
                @method('put')
                <div class="setting_up_price__body shadow-sm">
                    <div class="row setting_up_price__body__text">
                        <p>
                            Setting up price
                            @if($centerPrice->status == 0)
                                <span class="badge badge-warning text-danger">Pending</span>
                            @elseif($centerPrice->status == 1)
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
                                    <input type="text" value="{{$centerPrice->pcr_normal}}" name="pcr_normal">
                                    <small>Regular</small>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 shadow-sm">
                                <div class="setting_up_price__card__head">
                                    <p>Vaccine</p>
                                </div>
                                <div class="card-body setting_up_price__card__body">
                                    <input type="text" value="{{$centerPrice->vaccine_normal}}" name="vaccine_normal">
                                    <small>Regular</small>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 shadow-sm">
                                <div class="setting_up_price__card__head">
                                    <p>Booster</p>
                                </div>
                                <div class="card-body setting_up_price__card__body">
                                    <input type="text" value="{{$centerPrice->booster_normal}}" name="booster_normal">
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
                                    <input type="text" value="{{$centerPrice->pcr_premium}}" name="pcr_premium">
                                    <small>Premium</small>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 shadow-sm">
                                <div class="setting_up_price__card__head">
                                    <p>Vaccine</p>
                                </div>
                                <div class="card-body setting_up_price__card__body setting_up_price__card__premium">
                                    <i class="fa fa-star"></i>
                                    <input type="text" value="{{$centerPrice->vaccine_premium}}" name="vaccine_premium">
                                    <small>Premium</small>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="card h-100 shadow-sm">
                                <div class="setting_up_price__card__head">
                                    <p>Booster</p>
                                </div>
                                <div class="card-body setting_up_price__card__body setting_up_price__card__premium">
                                    <i class="fa fa-star"></i>
                                    <input type="text" value="{{$centerPrice->booster_premium}}" name="booster_premium">
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
