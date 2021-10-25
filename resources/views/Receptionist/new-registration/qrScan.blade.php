@extends('Receptionist.layouts.master')

@push('title')
    Scan QR code
@endpush

@push('css')
    <link rel="stylesheet" href="{{asset('assets/center-part/css/qr_scan_7.css')}}">
@endpush

@section('content')
    <div class="qr_scan py-5">
        <div class="container">
            <div class="qr_scan__body text-center">
                @php
                    $user = Session::get('user');
                    $phone = $user->phone;
                    $centerId = $user->center_id;
                    $info = $phone."_".$centerId;

                @endphp
                <div>
                    {!! QrCode::size(200)->generate($info); !!}
                </div>
                <img class="qr_scan__img img-fluid" src="{{asset('assets/image/qr/qr_img.png')}}" alt="">
                <p class="qr_scan__qr-title">Scan This QR With The trusted app</p>
            </div>

            <div class="qr_scan__button">
                <a class="qr_scan__button__link" href="{{route('receptionist.info')}}">Refresh</a>
                <p class="qr_scan__button__title">Refresh after submitting scan result</p>
            </div>
        </div>
    </div>
@endsection
