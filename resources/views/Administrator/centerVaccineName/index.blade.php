@extends('Administrator.layouts.master')

@push('title')
    Vaccine Name
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
                    <div>
                        <a class="btn btn-success my-3" href="{{route('administrator.centerVaccine.create')}}"><i class="fa fa-plus"></i>Create New</a>
                    </div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Name</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($vaccineNames as $vaccineName)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td class="text-capitalize">{{$vaccineName->vaccineName}}</td>
                                    <td>{{$vaccineName->status ? 'Active' : 'InActive'}}</td>
                                    <td>
                                        <a class="btn btn-sm btn-warning" href="{{route('administrator.centerVaccine.edit', $vaccineName->id)}}"><i class="fa fa-edit"></i></a>
                                        <a class="btn btn-sm btn-danger" href="{{route('administrator.centerVaccine.destroy', $vaccineName->id)}}"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')

@endpush
