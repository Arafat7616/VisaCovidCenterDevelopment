@extends('ImmigrationOfficer.layouts.master')

@push('title')
Dashboard
@endpush


@push('css')
{{-- <link rel="stylesheet" href="{{ asset('assets/center-part/css/accordion_table_42.css') }}"> --}}

{{-- datatables --}}
<link href="{{ asset('assets/super-admin/plugins/datatables/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/super-admin/plugins/datatables/buttons.bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/super-admin/plugins/datatables/fixedHeader.bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/super-admin/plugins/datatables/responsive.bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/super-admin/plugins/datatables/dataTables.bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/super-admin/plugins/datatables/scroller.bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
<style>
    .table-main-div {
        width: 100%;
        padding: 0 40px 0 40px;
    }

    .new-reg-tbl-head {
        background: #1166B6 0% 0% no-repeat padding-box;
        border-radius: 5px;
        opacity: 1;
        color: white;
        height: 60px;
    }

</style>
@endpush

@section('content')
<div class="table-main-div">
    <table class="table table-responsive" id="datatable-buttons">
        <thead class="new-reg-tbl-head">
            <tr>
                <th scope="col">SL.</th>
                <th scope="col">Date & time</th>
                <th scope="col">Name</th>
                <th scope="col">Passport</th>
                <th scope="col">Vaccine First Dose</th>
                <th scope="col">Vaccine Second Dose</th>
                <th scope="col">Booster</th>
                <th scope="col">PCR</th>
                <th scope="col">Action</th>
            </tr>
        </thead>

        <div>
            <tbody>
                @foreach ($immigrationPasses as $immigrationPasse)
                <tr>
                    <td class="td_new pcr-test-id">{{ $immigrationPasse->id }}</td>
                    <td class="td_new">{{ Carbon\Carbon::parse($immigrationPasse->date)->format('h:i:A d M Y') }}</td>
                    <td class="td_new">{{ $immigrationPasse->passedUser->name }}</td>
                    <td class="td_new">{{ $immigrationPasse->passedUser->userInfo->passport_no }}</td>
                    <td class="td_new">
                        @if($immigrationPasse->passedUser->vaccination)
                        @if($immigrationPasse->passedUser->vaccination->date_of_first_dose)
                        <button class="btn btn-success">Pass</button>
                        @else
                        <button class="btn btn-danger">Fail</button>
                        @endif
                        @else
                        <button class="btn btn-danger">Fail</button>
                        @endif
                    </td>
                    <td class="td_new">
                        @if($immigrationPasse->passedUser->vaccination)
                        @if($immigrationPasse->passedUser->vaccination->date_of_second_dose)
                        <button class="btn btn-success">Pass</button>
                        @else
                        <button class="btn btn-danger">Fail</button>
                        @endif
                        @else
                        <button class="btn btn-danger">Fail</button>
                        @endif


                    </td>
                    <td class="td_new">
                        @if($immigrationPasse->passedUser->booster)
                        @if($immigrationPasse->passedUser->booster->date)
                        <button class="btn btn-success">Pass</button>
                        @else
                        <button class="btn btn-danger">Fail</button>
                        @endif
                        @else
                        <button class="btn btn-danger">Fail</button>
                        @endif
                    </td>
                    <td class="td_new">
                        @if($immigrationPasse->passedUser->pcrTest)
                        @if($immigrationPasse->passedUser->pcrTest->pcr_result == 'negative')
                        <button class="btn btn-success">Pass</button>
                        @else
                        <button class="btn btn-danger">Fail</button>
                        @endif
                        @else
                        <button class="btn btn-danger">Fail</button>
                        @endif
                    </td>
                    <td class="td_new">                      
                        <a href="" class="btn btn-info"> <i class="fa fa-eye"></i> View</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot class="new-reg-tbl-head">
                <th scope="col">SL.</th>
                <th scope="col">Date & time</th>
                <th scope="col">Name</th>
                <th scope="col">Passport</th>
                <th scope="col">Vaccine First Dose</th>
                <th scope="col">Vaccine Second Dose</th>
                <th scope="col">Booster</th>
                <th scope="col">PCR</th>
                <th scope="col">Action</th>
            </tfoot>
        </div>
    </table>
</div>
@endsection

@push('script')
{{-- datatables --}}
<script src="{{ asset('assets/super-admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/super-admin/plugins/datatables/dataTables.bootstrap.js') }}"></script>
<script src="{{ asset('assets/super-admin/plugins/datatables/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/super-admin/plugins/datatables/buttons.bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/super-admin/plugins/datatables/jszip.min.js') }}"></script>
<script src="{{ asset('assets/super-admin/plugins/datatables/pdfmake.min.js') }}"></script>
<script src="{{ asset('assets/super-admin/plugins/datatables/vfs_fonts.js') }}"></script>
<script src="{{ asset('assets/super-admin/plugins/datatables/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/super-admin/plugins/datatables/buttons.print.min.js') }}"></script>
<script src="{{ asset('assets/super-admin/plugins/datatables/dataTables.fixedHeader.min.js') }}"></script>
<script src="{{ asset('assets/super-admin/plugins/datatables/dataTables.keyTable.min.js') }}"></script>
<script src="{{ asset('assets/super-admin/plugins/datatables/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/super-admin/plugins/datatables/responsive.bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/super-admin/plugins/datatables/dataTables.scroller.min.js') }}"></script>
<!-- Datatable init js -->
<script src="{{ asset('assets/super-admin/pages/datatables.init.js') }}"></script>
@endpush
