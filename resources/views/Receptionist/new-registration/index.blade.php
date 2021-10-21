@extends('Receptionist.layouts.master')

@push('title')
    New Registration
@endpush

@push('css')

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
                            <th scope="col">E-mail</th>
                            <th scope="col">Share</th>
                        </tr>
                    </thead>

                    <div class="scroll_new_ta">
                        <tbody class="scroll_new_ber">
                            @foreach ($users as $user)
                                <tr>
                                    <td class="td_new">{{ $user->id }}</td>
                                    <td class="td_new">{{ $user->name }}</td>
                                    <td class="td_new">{{ $user->phone }}</td>
                                    <td class="td_new">{{ $user->email }}</td>
                                    <td class="td_new">
                                        {{-- <a href="{{ route('share.user', ['id'=> Crypt::encrypt($user->id)]) }}"> --}}
                                        <a href="imo://{{ route('share.user', ['id'=> Crypt::encrypt($user->id)]) }}">
                                            <img src="{{ asset('uploads/images/imo.png' ?? get_static_option('no_image')) }}" alt="" class="new-r-icon">
                                        </a>
                                        <a href="whatsapp://send?text={{ route('share.user', ['id'=> Crypt::encrypt($user->id)]) }}">
                                            <img src="{{ asset('uploads/images/whatsapp.png' ?? get_static_option('no_image')) }}" alt="" class="new-r-icon">
                                        </a>
                                        <a href="mailto:{{ route('share.user', ['id'=> Crypt::encrypt($user->id)]) }}">
                                            <img src="{{ asset('uploads/images/gmail.png' ?? get_static_option('no_image')) }}" alt="" class="new-r-icon">
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </div>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('script')

@endpush
