@extends('RapidPCRCenterReceptionist.layouts.master')

@push('title')
    Create New Trusted Medical Assistant
@endpush

@push('css')
    <link rel="stylesheet" href="{{asset('assets/center-part/css/administrator_profile_6.css')}}">
@endpush

@section('content')
    <div class="administrator__profile py-5">
        <div class="container">
            <div class="administrator__profile__card shadow-sm">
                <div class="row">
                    <div class="col-4">
                        <div class="row">
                            <div class="col-3 administrator__profile__card__content">
                                <h6>Name</h6>
                                <h6>Gender</h6>
                                <h6>Father</h6>
                                <h6>Passport</h6>
                                <h6>NID</h6>
                            </div>
                            <div class="col-9">
                                <h6>{{$user->name}}</h6>
                                <h6>{{$userInfo->gender}}</h6>
                                <h6>{{$userInfo->father_name}}</h6>
                                <h6>{{$userInfo->passport_no}}</h6>
                                <h6>{{$userInfo->nid_no}}</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="row">
                            <div class="col-3">
                                <h6>Birth Date</h6>
                                <h6>Location</h6>
                                <h6>Mobile</h6>
                                <h6>Address</h6>
                            </div>
                            <div class="col-9">
                                <h6>{{$userInfo->dob}}</h6>
                                <h6>{{$userInfo->country}}</h6>
                                <h6>{{$user->phone}}</h6>
                                <h6>{{$userInfo->present_address}}</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <img class="administrator__profile__img img-fluid" src="{{ asset($user->image ?? get_static_option('user')) }}" alt="">
                    </div>
                </div>
            </div>
            <div class="administrator__profile__password">
                <div class="row">
                    <form action="{{route('rapidPcrCenterReceptionist.infoUpdate')}}" method="POST">
                        @csrf
                        @method('put')
                        <div class="col-4 float-start">
                            <div class="row">
                                <div class="col-4"><p>Create Email</p></div>
                                <div class="col-8"><input type="email" name="email" value="{{old('email')}}" class="form-control @error('email') is-invalid @enderror" placeholder="Enter Email"></div>
                            </div>
                            @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-4 float-start">
                            <div class="row">
                                <div class="col-5"><p>Create Password</p></div>
                                <div class="col-7"><input type="password" name="password" class="form-control @error('password') is-invalid @enderror" value="{{old('password')}}" autocomplete="new-password" placeholder="*******"> </div>
                            </div>
                            @error('password')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-4 float-end">
                            <div class="row">
                                <div class="col-5"><p>Confirm Password</p></div>
                                <div class="col-7"><input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" autocomplete="new-password" placeholder="********"></div>
                                <input type="hidden" name="phone" value="{{$user->phone}}">
                            </div>
                            @error('password_confirmation')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                </div>
            </div>

            <div class="text-center">
                <button type="submit" class="administrator__profile__button">Next</button>
            </div>
            </form>
        </div>
    </div>
@endsection
