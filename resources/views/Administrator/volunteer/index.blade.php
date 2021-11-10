@extends('Administrator.layouts.master')

@push('title')
    Volunteer's
@endpush

@push('css')

@endpush

@section('content')
    <div class="volunteers mb-5">
        <div class="container">
            <div class="row">
                @if(Session::has('message'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('message') }}
                    </div>
                @endif
            </div>
            <div class="row row-cols-1 row-cols-md-4 g-4">
                @if($trustedPeoples->count() > 0)
                    @foreach($trustedPeoples as $people)
                    <div class="col">
                        <div class="card h-100 shadow-sm">
                            <div class="card-body text-center">
                                <img class="volunteers__image" src="{{ asset( $people->image ?? get_static_option('user') ) }}" alt="">
                                <div class="volunteers__details">
                                    <h5 class="card-title volunteers__name">{{$people->name}}</h5>
                                    <h6>{{$people->user_type}}</h6>
                                    <h6>ID: {{$people->id}}</h6>
                                    <h6>Contact: {{$people->phone}}</h6>
                                </div>
                            </div>
                            <div class="card-footer text-center">
                                <a class="btn btn-sm btn-success" href="{{route('administrator.trustedPeople.edit', $people->id)}}"><i class="fa fa-edit"></i> Edit</a>
                                <button class="btn btn-sm btn-danger" onclick="delete_function(this)" value="{{ route('administrator.trustedPeople.destroy', $people->id) }}"><i class="fa fa-trash"></i> Delete </button>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @endif
                <div class="col">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body volunteers__add">
                            <a href="{{route('administrator.trustedPeople.create')}}" class="volunteers__add__icon">
                                <i class="fa fa-user-plus"></i>
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
