@extends('Administrator.layouts.master')

@push('title')
    Services Name
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
                <div class="card page-wrapper w-100" style="margin-bottom: 100px" >
                    <form class="mt-2" action="{{route('administrator.synchronize.rulesUpdate')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @include('Others.toaster_message')
                        <div class="row">
                            @foreach ($synchronizes as $key => $synchronize)
                                <div class="col-lg-4 col-md-4" >
                                    <input style="margin: 8px;" @if( check_center_and_synchronize_role($center->id,$synchronize->id) )  checked @endif id="synchronize_{{ $synchronize->id }}" type="checkbox" value="{{ $synchronize->id }}" name="synchronizes[]">
                                    <label for="synchronize_{{ $synchronize->id }}"> {{ $synchronize->synchronize_rule }} </label>
                                </div>
                            @endforeach
                        </div>
                        <div class="row">
                           <div class="mt-5 text-end">
                                <button type="submit" class="btn btn-success waves-effect waves-light">Update</button>
                           </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')

@endpush
