@extends('Administrator.layouts.master')

@push('title')
    Dashboard
@endpush

@push('css')

@endpush

@section('content')
    <div class="volunteers">
        <div class="container">
            <div class="row row-cols-1 row-cols-md-4 g-4">
                <div class="col">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body text-center">
                            <img class="volunteers__image" src="{{ asset('assets/center-part/image/volunteer/img.png') }}" alt="">
                            <div class="volunteers__details">
                                <h5 class="card-title volunteers__name">Jahid Hassan</h5>
                                <h6>Vaccinator</h6>
                                <h6>ID: 34085034</h6>
                                <h6>Contact: 0350358038503</h6>
                            </div>
                        </div>
                        <div class="card-footer text-center">
                            <a class="btn btn-sm btn-success" href="#"><i class="far fa-edit"></i> Edit</a>
                            <a class="btn btn-sm btn-danger" href="#"><i class="fas fa-trash-alt"></i> Delete</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body text-center">
                            <img class="volunteers__image" src="{{ asset('assets/center-part/image/volunteer/img.png') }}" alt="">
                            <div class="volunteers__details">
                                <h5 class="card-title volunteers__name">Arafat Hossen</h5>
                                <h6>Vaccinator</h6>
                                <h6>ID: 34085034</h6>
                                <h6>Contact: 0350358038503</h6>
                            </div>
                        </div>
                        <div class="card-footer text-center">
                            <a class="btn btn-sm btn-success" href="#"><i class="far fa-edit"></i> Edit</a>
                            <a class="btn btn-sm btn-danger" href="#"><i class="fas fa-trash-alt"></i> Delete</a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body volunteers__add">
                            <a href="#" class="volunteers__add__icon">
                                <i class="fas fa-user-plus"></i>
                            </a>
                        </div>
                        <div class="card-footer">
                            <small class="text-center volunteers__add__text">
                                <h5>Add Trusted People</h5>
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')

@endpush
