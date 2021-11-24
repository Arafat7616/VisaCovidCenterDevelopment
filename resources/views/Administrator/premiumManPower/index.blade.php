@extends('Administrator.layouts.master')

@push('title')
Regular Man Power
@endpush

@push('css')
<link rel="stylesheet" href="{{ asset('assets/manPowerSchedule-part/css/calender_14.css') }}">
<link rel="stylesheet" href="{{ asset('assets/manPowerSchedule-part/css/third-party-calendar/calendar.css') }}">

<!-- DataTables -->
<link href="{{ asset('assets/super-admin/plugins/datatables/jquery.dataTables.min.css') }}" rel="stylesheet"
    type="text/css" />
<link href="{{ asset('assets/super-admin/plugins/datatables/buttons.bootstrap.min.css') }}" rel="stylesheet"
    type="text/css" />
<link href="{{ asset('assets/super-admin/plugins/datatables/fixedHeader.bootstrap.min.css') }}" rel="stylesheet"
    type="text/css" />
<link href="{{ asset('assets/super-admin/plugins/datatables/responsive.bootstrap.min.css') }}" rel="stylesheet"
    type="text/css" />
<link href="{{ asset('assets/super-admin/plugins/datatables/dataTables.bootstrap.min.css') }}" rel="stylesheet"
    type="text/css" />
<link href="{{ asset('assets/super-admin/plugins/datatables/scroller.bootstrap.min.css') }}" rel="stylesheet"
    type="text/css" />

@endpush

@section('content')
<div class="my-3 p-3">
    <div class="card-body shadow " style="margin-bottom: 120px;">
        <div class="row">
            <h1 class="cal-header text-center">Regular Manpwoer Schedule <a class="btn btn-success"
                    href="{{ route('administrator.regular.create') }}">Add new</a></h1>
            <div>

                <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
                    cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Volunteer for PCR</th>
                            <th>PCR Available set</th>
                            <th>Volunteer for Vaccine</th>
                            <th>Vaccine Available set</th>
                            <th>Volunteer for Booster</th>
                            <th>Booster Available set</th>
                            <th>Date</th>
                            <th>PCT</th>
                            <th>Vaccine</th>
                            <th>Booster</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($manPowerSchedules as $manPowerSchedule)
                        <tr>
                            <td>{{ $manPowerSchedule->id }}</td>
                            <td>{{ $manPowerSchedule->volunteer_for_pcr }}</td>
                            <td>{{ $manPowerSchedule->pcr_available_set }}</td>
                            <td>{{ $manPowerSchedule->volunteer_for_vaccine }}</td>

                            <td>{{ $manPowerSchedule->vaccine_available_set }}</td>
                            <td>{{ $manPowerSchedule->volunteer_for_booster }}</td>
                            <td>{{ $manPowerSchedule->booster_available_set }}</td>
                            <td>{{ $manPowerSchedule->date }}</td>
                            <td>{{ $manPowerSchedule->pcr_time }}</td>
                            <td>{{ $manPowerSchedule->vaccine_time }}</td>
                            <td>{{ $manPowerSchedule->booster_time }}</td>
                            <td class="text-manPowerSchedule">
                                <a class="btn btn-info"
                                    href="{{ route('administrator.regular.edit', $manPowerSchedule->id) }}">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <button class="btn btn-danger" onclick="delete_function(this)" value="{{ route('administrator.regular.destroy', $manPowerSchedule->id) }}">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Volunteer for PCR</th>
                            <th>PCR Available set</th>
                            <th>Volunteer for Vaccine</th>
                            <th>Vaccine Available set</th>
                            <th>Volunteer for Booster</th>
                            <th>Booster Available set</th>
                            <th>Date</th>
                            <th>PCT</th>
                            <th>Vaccine</th>
                            <th>Booster</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>

        </div>
    </div>
</div>
@endsection

@push('script')
<script src="{{ asset('assets/center-part/js/third-party-calendar/calendar.js') }}"></script>

<!-- Datatables-->
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