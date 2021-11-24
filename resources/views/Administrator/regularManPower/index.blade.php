@extends('Administrator.layouts.master')

@push('title')
Regular Man Power
@endpush

@push('css')
<link rel="stylesheet" href="{{ asset('assets/manPowerShedule-part/css/calender_14.css') }}">
<link rel="stylesheet" href="{{ asset('assets/manPowerShedule-part/css/third-party-calendar/calendar.css') }}">

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
            <h1 class="cal-header text-center">Regular Manpwoer Schedule <a class="btn btn-success" href="{{ route('administrator.regular.create') }}">Add new</a></h1>
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
                        @foreach($manPowerShedules as $manPowerShedule)
                        <tr>
                            <td>{{ $manPowerShedule->id }}</td>
                            <td>{{ $manPowerShedule->volunteer_for_pcr }}</td>
                            <td>{{ $manPowerShedule->pcr_available_set }}</td>
                            <td>{{ $manPowerShedule->volunteer_for_vaccine }}</td>

                            <td>{{ $manPowerShedule->vaccine_available_set }}</td>
                            <td>{{ $manPowerShedule->volunteer_for_booster }}</td>
                            <td>{{ $manPowerShedule->booster_available_set }}</td>
                            <td>{{ $manPowerShedule->date }}</td>
                            <td>{{ $manPowerShedule->pcr_time }}</td>
                            <td>{{ $manPowerShedule->vaccine_time }}</td>
                            <td>{{ $manPowerShedule->booster_time }}</td>
                            <td class="text-manPowerShedule">
                                {{-- @if ($manPowerShedule->status == 0)
                                <button class="btn btn-success" onclick="activeNow(this)"
                                    value="{{ route('superAdmin.managemanPowerShedule.activeNow', $manPowerShedule->id) }}">
                                    <i class="mdi mdi-check"></i>
                                </button>
                                @elseif($manPowerShedule->status == 1)
                                <button class="btn btn-danger" onclick="inactiveNow(this)"
                                    value="{{ route('superAdmin.managemanPowerShedule.inactiveNow', $manPowerShedule->id) }}">
                                    <i class="mdi mdi-close"></i>
                                </button>
                                @endif

                                <button class="btn btn-danger" onclick="deleteNow(this)"
                                    value="{{ route('superAdmin.managemanPowerShedule.deleteNow', $manPowerShedule->id) }}">
                                    <i class="fa fa-trash"></i>
                                </button>
                                <a class="btn btn-info"
                                    href="{{ route('superAdmin.managemanPowerShedule.profile', $manPowerShedule->id) }}">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a class="btn btn-info"
                                    href="{{ route('superAdmin.managemanPowerShedule.edit', $manPowerShedule->id) }}">
                                    <i class="fa fa-edit"></i>
                                </a> --}}
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
<script src="{{ asset('assets/manPowerShedule-part/js/third-party-calendar/calendar.js') }}"></script>
<script>
    $(document).ready(function() {
            // schedule-save-btn clicked
            $('.schedule-save-btn').on('click', function(event) {
                event.preventDefault();
                var todayDate = $('.today').text()

                var formData = new FormData();
                formData.append('todayDate', todayDate);
                formData.append('morningSlotStart', $('#morningSlotStart').val());
                formData.append('morningSlotEnd', $('#morningSlotEnd').val());
                formData.append('daySlotStart', $('#daySlotStart').val());
                formData.append('daySlotEnd', $('#daySlotEnd').val());
                formData.append('timeForPcr', $('#timeForPcr').val());
                formData.append('timeForVaccine', $('#timeForVaccine').val());
                formData.append('timeForBooster', $('#timeForBooster').val());
                formData.append('volunteerForPcr', $('#volunteerForPcr').val());
                formData.append('volunteerForVaccine', $('#volunteerForVaccine').val());
                formData.append('volunteerForBooster', $('#volunteerForBooster').val());
                formData.append('fromDate', $('#fromDate').val());
                formData.append('toDate', $('#toDate').val());               

                $.ajax({
                    method: 'POST',
                    url: "{{ url('administrator/regular/store') }}",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(res) {
                        if (res.type == 'success') {
                            Swal.fire({
                                icon: res.type,
                                title: 'Updated !',
                                text: res.message,
                                // footer: 'PCR result uploaded successfully!'
                            });
                            setTimeout(function() {
                                location.reload();
                            }, 800);
                        } else {
                            Swal.fire({
                                icon: res.type,
                                title: 'Oops...',
                                text: res.message,
                                // footer: 'Something went wrong!'
                            });
                        }
                    },
                    error: function(xhr) {
                        var errorMessage = '<div class="card bg-danger">\n' +
                            '                        <div class="card-body text-manPowerShedule p-5">\n' +
                            '                            <span class="text-white">';
                        $.each(xhr.responseJSON.errors, function(key, value) {
                            errorMessage += ('' + value + '<br>');
                        });
                        errorMessage += '</span>\n' +
                            '                        </div>\n' +
                            '                    </div>';
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            footer: errorMessage
                        });
                    },
                });
            });
        });


        // Auto wantToServePerDay Calculation
        function wantToServePerDay() {
            var maxPcrServe = parseInt(document.getElementById('max-pcr-serve').innerHTML);
            var maxVaccineServe = parseInt(document.getElementById('max-vaccine-serve').innerHTML);
            var maxBoosterServe = parseInt(document.getElementById('max-booster-serve').innerHTML);
            var wantToServePerDay = maxPcrServe + maxVaccineServe + maxBoosterServe;
            document.getElementById('wantToServePerDay').innerHTML = wantToServePerDay;
        }

        wantToServePerDay();

        function setMaxPcrService() {
            var timeForPcr = parseInt(document.getElementById('timeForPcr').value);
            var volunteerForPcr = parseInt(document.getElementById('volunteerForPcr').value);
            var totalMinute = parseInt(document.getElementById('totalMinute').innerHTML);
            var manPowerMinuteForPcr = totalMinute * volunteerForPcr;
            document.getElementById('max-pcr-serve').innerHTML = parseInt(manPowerMinuteForPcr / timeForPcr) ;
            wantToServePerDay();
            setTotalManMinutePerDay()
        }

        function setMaxVaccineService() {
            var timeForVaccine = parseInt(document.getElementById('timeForVaccine').value);
            var volunteerForVaccine = parseInt(document.getElementById('volunteerForVaccine').value);
            var totalMinute = parseInt(document.getElementById('totalMinute').innerHTML);
            var manPowerMinuteForVaccine = totalMinute * volunteerForVaccine;
            document.getElementById('max-vaccine-serve').innerHTML = parseInt(manPowerMinuteForVaccine / timeForVaccine) ;
            wantToServePerDay();
            setTotalManMinutePerDay();
        }

        function setMaxBoosterService() {
            var timeForBooster = parseInt(document.getElementById('timeForBooster').value);
            var volunteerForBooster = parseInt(document.getElementById('volunteerForBooster').value);
            var totalMinute = parseInt(document.getElementById('totalMinute').innerHTML);
            var manPowerMinuteForBooster = totalMinute * volunteerForBooster;
            document.getElementById('max-booster-serve').innerHTML = parseInt(manPowerMinuteForBooster / timeForBooster) ;
            wantToServePerDay();
            setTotalManMinutePerDay();
        }

        function setTotalManMinutePerDay() {
            var volunteerForPcr     = parseInt(document.getElementById('volunteerForPcr').value);
            var volunteerForVaccine = parseInt(document.getElementById('volunteerForVaccine').value);
            var volunteerForBooster = parseInt(document.getElementById('volunteerForBooster').value);
            var totalMinute         = document.getElementById('totalMinute').innerHTML;
            var totalVolunteer = volunteerForPcr+volunteerForVaccine+volunteerForBooster;
            document.getElementById('totalManMinutePerDay').innerHTML = totalMinute * totalVolunteer;

        }

        function setTotalMinute() {
            var totalMorningSlotTime = parseInt(document.getElementById('totalMorningSlotTime').innerHTML);
            var totalDaySlotTime = parseInt(document.getElementById('totalDaySlotTime').innerHTML);
            document.getElementById('totalMinute').innerHTML = totalMorningSlotTime + totalDaySlotTime;
            

        }

        function setMorningSlotTime() {
            var morningSlotStart = document.getElementById('morningSlotStart').value;
            var morningSlotEnd = document.getElementById('morningSlotEnd').value;

            //create minute format          
            var timeStart = new Date("01/01/2007 " + morningSlotStart).getMinutes();
            var timeEnd = new Date("01/01/2007 " + morningSlotEnd).getMinutes();
            var minuteDifferent = timeEnd - timeStart;
            var timeStart = new Date("01/01/2007 " + morningSlotStart).getHours();
            var timeEnd = new Date("01/01/2007 " + morningSlotEnd).getHours();
            var hourDifferent = timeEnd - timeStart;
            var actualMinute = (hourDifferent * 60) + minuteDifferent;
            document.getElementById('totalMorningSlotTime').innerHTML = actualMinute;
            setMaxPcrService();
            setMaxVaccineService();
            setMaxBoosterService();
            setTotalMinute();
            setTotalManMinutePerDay()

        }

        function setDaySlotTime() {
            var daySlotStart = document.getElementById('daySlotStart').value;
            var daySlotEnd = document.getElementById('daySlotEnd').value;

            //create minute format          
            var timeStart = new Date("01/01/2007 " + daySlotStart).getMinutes();
            var timeEnd = new Date("01/01/2007 " + daySlotEnd).getMinutes();
            var minuteDifferent = timeEnd - timeStart;
            var timeStart = new Date("01/01/2007 " + daySlotStart).getHours();
            var timeEnd = new Date("01/01/2007 " + daySlotEnd).getHours();
            var hourDifferent = timeEnd - timeStart;
            var actualMinute = (hourDifferent * 60) + minuteDifferent;
            document.getElementById('totalDaySlotTime').innerHTML = actualMinute;
            setMaxPcrService();
            setMaxVaccineService();
            setMaxBoosterService();
            setTotalMinute();
            setTotalManMinutePerDay()
        }
</script>
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