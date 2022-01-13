@extends('RapidPCRCenterAdministrator.layouts.master')

@push('title')
    Trusted Medical Assistants
@endpush

@push('css')

@endpush

@section('content')
    <div class="trusted_medical_assistants mb-5">
        <div class="container">
            <div class="row">
                @include('Others.toaster_message')
            </div>
            <div class="row row-cols-1 row-cols-md-4 g-4">
                @if($trustedPeoples->count() > 0)
                    @foreach($trustedPeoples as $people)
                    <div class="col">
                        <div class="card h-100 shadow-sm">
                            <div class="card-body text-center">
                                <img class="trusted_medical_assistants__image" src="{{ asset( $people->image ?? get_static_option('user') ) }}" alt="">
                                <div class="trusted_medical_assistants__details">
                                    <h5 class="card-title trusted_medical_assistants__name">{{$people->name}}</h5>
                                    <h6>{{$people->user_type}}</h6>
                                    <h6>ID: {{$people->id}}</h6>
                                    <h6>Contact: {{$people->phone}}</h6>
                                </div>
                            </div>
                            <div class="card-footer text-center">
                                <a class="btn btn-sm btn-success" href="{{route('rapidPcrCenterAdministrator.trustedPeople.edit', $people->id)}}"><i class="fa fa-edit"></i> Edit</a>
                                <button class="btn btn-sm btn-danger" onclick="delete_function(this)" value="{{ route('rapidPcrCenterAdministrator.trustedPeople.destroy', $people->id) }}"><i class="fa fa-trash"></i> Delete </button>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @endif
                <div class="col">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body trusted_medical_assistants__add">
                            <a href="{{route('rapidPcrCenterAdministrator.trustedPeople.create')}}" class="trusted_medical_assistants__add__icon">
                                <i class="fa fa-user-plus"></i>
                            </a>
                        </div>
                        <div class="card-footer">
                            <small class="text-center trusted_medical_assistants__add__text">
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
