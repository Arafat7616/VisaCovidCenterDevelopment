@extends('Administrator.layouts.master')

@push('title')
    Regular Man Power
@endpush

@push('css')
    <link rel="stylesheet" href="{{ asset('assets/center-part/css/calender_14.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/center-part/css/third-party-calendar/calendar.css') }}">
@endpush

@section('content')
    <div class="container container-bg-color my-3 ">
        <div class="card-body shadow " style="margin-bottom: 120px;">
            <div class="container">
                <div class="row">
                    <h1 class="cal-header">Manpwoer Schedule</h1>
                    <div class="cal-body ">
                        {{-- <div class="month">
                            August 2021
                            <button class="cal-left-l"><i class="fas fa-chevron-left"></i></button>
                            <button class="cal-right-r"><i class="fas fa-chevron-right"></i></button>
                        </div>

                        <table class="calender_14 ">
                            <tr class="cal-tr">
                                <td class="cal-td"> <button class="cal-btn"> Sat </button> </td>
                                <td class="cal-td"> <button class="cal-btn"> Sun </button> </td>
                                <td class="cal-td"> <button class="cal-btn"> Mon </button> </td>
                                <td class="cal-td"> <button class="cal-btn"> Tue </button> </td>
                                <td class="cal-td"> <button class="cal-btn"> Wed </button> </td>
                                <td class="cal-td"> <button class="cal-btn"> Thu </button> </td>
                                <td class="cal-td"> <button class="cal-btn"> Fri </button> </td>
                                <td class="cal-td"> <button class="cal-btn"> Sat </button> </td>
                                <td class="cal-td"> <button class="cal-btn"> Sun </button> </td>
                                <td class="cal-td"> <button class="cal-btn"> Mon </button> </td>
                                <td class="cal-td"> <button class="cal-btn"> Tue </button> </td>
                                <td class="cal-td"> <button class="cal-btn"> Wed </button> </td>
                                <td class="cal-td"> <button class="cal-btn"> Thu </button> </td>
                                <td class="cal-td"> <button class="cal-btn"> Fri </button> </td>
                            </tr>
                            <tr class="cal-tr">
                                <td class="cal-td"> <button class="cal-btn">
                                        <p class="cla-text"> </p>
                                </td>
                                <td class="cal-td"> <button class="cal-btn">
                                        <p class="cla-text">1 </p>
                                    </button> </td>
                                <td class="cal-td"> <button class="cal-btn">
                                        <p class="cla-text">2 </p>
                                    </button> </td>
                                <td class="cal-td"> <button class="cal-btn">
                                        <p class="cla-text">3 </p>
                                    </button> </td>
                                <td class="cal-td"> <button class="cal-btn">
                                        <p class="cla-text">4 </p>
                                    </button> </td>
                                <td class="cal-td"> <button class="cal-btn">
                                        <p class="cla-text">5 </p>
                                    </button> </td>
                                <td class="cal-td"> <button class="cal-btn">
                                        <p class="cla-text">6 </p>
                                    </button> </td>
                                <td class="cal-td"> <button class="cal-btn">
                                        <p class="cla-text">7 </p>
                                    </button> </td>
                                <td class="cal-td"> <button class="cal-btn">
                                        <p class="cla-text">8 </p>
                                    </button> </td>
                                <td class="cal-td"> <button class="cal-btn">
                                        <p class="cla-text">9 </p>
                                    </button> </td>
                                <td class="cal-td"> <button class="cal-btn">
                                        <p class="cla-text">10 </p>
                                    </button> </td>
                                <td class="cal-td"> <button class="cal-btn">
                                        <p class="cla-text">11 </p>
                                    </button> </td>
                                <td class="cal-td"> <button class="cal-btn">
                                        <p class="cla-text">12 </p>
                                    </button> </td>
                                <td class="cal-td"> <button class="cal-btn">
                                        <p class="cla-text">13 </p>
                                    </button> </td>
                            </tr>
                            <tr class="cal-tr">
                                <td class="cal-td"> <button class="cal-btn">
                                        <p class="cla-text">14 </p>
                                    </button> </td>
                                <td class="cal-td"> <button class="cal-btn">
                                        <p class="cla-text">15 </p>
                                    </button> </td>
                                <td class="cal-td"> <button class="cal-btn">
                                        <p class="cla-text">16 </p>
                                    </button> </td>
                                <td class="cal-td"> <button class="cal-btn">
                                        <p class="cla-text">17 </p>
                                    </button> </td>
                                <td class="cal-td"> <button class="cal-btn">
                                        <p class="cla-text">18 </p>
                                    </button> </td>
                                <td class="cal-td"> <button class="cal-btn">
                                        <p class="cla-text">19 </p>
                                    </button> </td>
                                <td class="cal-td"> <button class="cal-btn">
                                        <p class="cla-text">20 </p>
                                    </button> </td>
                                <td class="cal-td"> <button class="cal-btn">
                                        <p class="cla-text">21 </p>
                                    </button> </td>
                                <td class="cal-td"> <button class="cal-btn">
                                        <p class="cla-text">22 </p>
                                    </button> </td>
                                <td class="cal-td"> <button class="cal-btn">
                                        <p class="cla-text">23 </p>
                                    </button> </td>
                                <td class="cal-td"> <button class="cal-btn">
                                        <p class="cla-text">24 </p>
                                    </button> </td>
                                <td class="cal-td"> <button class="cal-btn">
                                        <p class="cla-text">25 </p>
                                    </button> </td>
                                <td class="cal-td"> <button class="cal-btn">
                                        <p class="cla-text">26 </p>
                                    </button> </td>
                                <td class="cal-td"> <button class="cal-btn">
                                        <p class="cla-text">27 </p>
                                    </button> </td>
                            </tr>
                            <tr class="cal-tr">
                                <td class="cal-td"> <button class="cal-btn">
                                        <p class="cla-text">28 </p>
                                    </button> </td>
                                <td class="cal-td"> <button class="cal-btn">
                                        <p class="cla-text">29 </p>
                                    </button> </td>
                                <td class="cal-td"> <button class="cal-btn">
                                        <p class="cla-text">30 </p>
                                    </button> </td>
                                <td class="cal-td"> <button class="cal-btn">
                                        <p class="cla-text">31 </p>
                                    </button> </td>
                                <td class="cal-td"> <button class="cal-btn">
                                        <p class="cla-text"> </p>
                                    </button> </td>
                                <td class="cal-td"> <button class="cal-btn">
                                        <p class="cla-text"> </p>
                                    </button> </td>
                                <td class="cal-td"> <button class="cal-btn">
                                        <p class="cla-text"> </p>
                                    </button> </td>
                                <td class="cal-td"> <button class="cal-btn">
                                        <p class="cla-text"> </p>
                                    </button> </td>
                                <td class="cal-td"> <button class="cal-btn">
                                        <p class="cla-text"> </p>
                                    </button> </td>
                                <td class="cal-td"> <button class="cal-btn">
                                        <p class="cla-text"> </p>
                                    </button> </td>
                                <td class="cal-td"> <button class="cal-btn">
                                        <p class="cla-text"> </p>
                                    </button> </td>
                                <td class="cal-td"> <button class="cal-btn">
                                        <p class="cla-text"> </p>
                                    </button> </td>
                                <td class="cal-td"> <button class="cal-btn">
                                        <p class="cla-text"> </p>
                                    </button> </td>
                                <td class="cal-td"> <button class="cal-btn">
                                        <p class="cla-text"> </p>
                                    </button> </td>
                            </tr>

                        </table> --}}
                        <div class="calendar calendar-first p-5" id="calendar_first">
                            <div class="calendar_header">
                                <button class="switch-month switch-left"> <i class="fa fa-chevron-left"></i></button>
                                <h2></h2>
                                <button class="switch-month switch-right"> <i class="fa fa-chevron-right"></i></button>
                            </div>
                            <div class="calendar_weekdays"></div>
                            <div class="calendar_content"></div>
                        </div>
                    </div>
                    <form action="">
                        <div class="cal-slot row ">
                            <div class="cal-morning-slot">
                                <p class="morning">Morning Slot</p>
                                <div class="cal-morn-in">
                                    <input type="time" class="cal-morn-in-left" id="morningSlotStart" @if($manPowerShedule) value="{{ $manPowerShedule->morning_starting_time }}" @endif name="morningSlotStart"> -
                                    <input type="time" class="cal-morn-in-left" id="morningSlotEnd" @if($manPowerShedule) value="{{ $manPowerShedule->morning_ending_time }}" @endif name="morningSlotEnd">
                                </div>
                                @php
                                    if($manPowerShedule){
                                        $morning_starting_time = \Carbon\Carbon::createFromFormat('H:i', $manPowerShedule->morning_starting_time);
                                        $morning_ending_time = \Carbon\Carbon::createFromFormat('H:i', $manPowerShedule->morning_ending_time);
                                        $morning_slot_minutes = $morning_starting_time->diffInMinutes($morning_ending_time);
                                    }
                                @endphp
                                <p class="cal-footer">Working period: <span id="totalMorningSlotTime">{{ $morning_slot_minutes ?? '' }}</span> Minutes</p>
                            </div>

                            <div class="cal-day-slot">
                                <p class="day">Day Slot</p>
                                <div class="cal-day-in">
                                    <input type="time" class="cal-morn-day-right" id="daySlotStart" @if($manPowerShedule) value="{{ $manPowerShedule->day_starting_time }}" @endif name="daySlotStart"> -
                                    <input type="time" class="cal-morn-day-right" id="daySlotEnd" @if($manPowerShedule) value="{{ $manPowerShedule->day_ending_time }}" @endif name="daySlotEnd">
                                </div>
                                @php
                                    if($manPowerShedule){
                                        $day_starting_time = \Carbon\Carbon::createFromFormat('H:i', $manPowerShedule->day_starting_time);
                                        $day_ending_time = \Carbon\Carbon::createFromFormat('H:i', $manPowerShedule->day_ending_time);
                                        $day_slot_minutes = $day_starting_time->diffInMinutes($day_ending_time);
                                    }
                                @endphp
                                <p class="cal-footer">Working period: <span id="totalDaySlotTime">{{ $day_slot_minutes ?? '' }}</span> Minutes</p>

                            </div>
                        </div>
                        <div class="cal-min-slot row">
                            <ul class="total">
                                <li class="cal-min-l">Total minutes</li>
                                @php
                                    if($manPowerShedule){
                                        $totalDayMinutes = $morning_slot_minutes + $day_slot_minutes;
                                        $totalManMinutePerDay = $totalDayMinutes*get_total_volenteers();
                                    }
                                @endphp
                                <li class="cal-min-r totalMinute" id="totalMinute">{{ $totalDayMinutes ?? '' }}</li>
                            </ul>
                            <ul class="total">
                                <li class="cal-min-l">Total man minutes per day</li>
                                <li class="cal-min-r totalManMinutePerDay" id="totalManMinutePerDay">{{ $totalManMinutePerDay ?? '' }}</li>
                            </ul>
                        </div>
                        <div class="cal-service-slot row">
                            <table class="t-cal">
                                <tr class="cal-mx-x">
                                    <td class="cal-x-y">
                                        <p class="p-mx"> <b>Service</b> </p>
                                    </td>
                                    <td class="cal-x-y">
                                        <p class="p-mx"> <small>Estimated time</small><br><b>Per Process</b> </p>
                                    </td>
                                    <td class="cal-x-y">
                                        <p class="p-mx"><b>Number of Volunteer</b> </p>
                                    </td>
                                    <td class="cal-x-y">
                                        <p class="p-mx"> <small>Max service</small><br><b>Per day</b> </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="cal-x-y">
                                        <p class="p-mx"> PCR </p>
                                    </td>
                                    <td class="cal-x-y">
                                        <p class="p-mxx"><input type="number" class="cal-min-t" id="timeForPcr" @if($manPowerShedule) value="{{ $manPowerShedule->pcr_time }}" @endif name="timeForPcr"> <small class="s-cx">min</small></p>
                                    </td>
                                    <td class="cal-x-y">
                                        <p class="p-mxx"><input type="number" class="cal-min-t" id="volunteerForPcr" @if($manPowerShedule) value="{{ $manPowerShedule->volunteer_for_pcr }}" @endif name="volunteerForPcr"></p>
                                    </td>
                                    <td class="cal-x-y">
                                        @if($manPowerShedule)
                                            <p class="p-mx"> {{ get_max_service_per_day($manPowerShedule->pcr_time, $manPowerShedule->volunteer_for_pcr) }} </p>
                                        @else
                                            <p class="p-mx">0</p>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td class="cal-x-y">
                                        <p class="p-mx"> Vaccine </p>
                                    </td>
                                    <td class="cal-x-y">
                                        <p class="p-mxx"> <input type="number" class="cal-min-t" id="timeForVaccine" @if($manPowerShedule) value="{{ $manPowerShedule->vaccine_time }}" @endif name="timeForVaccine"> <small class="s-cx">min</small></p>
                                    </td>
                                    <td class="cal-x-y">
                                        <p class="p-mxx"><input type="number" class="cal-min-t" id="volunteerForVaccine" @if($manPowerShedule) value="{{ $manPowerShedule->volunteer_for_vaccine }}" @endif name="volunteerForVaccine"></p>
                                    </td>
                                    <td class="cal-x-y">
                                        @if($manPowerShedule)
                                            <p class="p-mx"> {{ get_max_service_per_day($manPowerShedule->vaccine_time, $manPowerShedule->volunteer_for_vaccine) }} </p>
                                        @else
                                            <p class="p-mx">0</p>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td class="cal-x-y">
                                        <p class="p-mx"> Booster </p>
                                    </td>
                                    <td class="cal-x-y">
                                        <p class="p-mxx"> <input type="number" class="cal-min-t" id="timeForBooster" @if($manPowerShedule) value="{{ $manPowerShedule->booster_time }}" @endif name="timeForBooster"> <small class="s-cx">min</small> </p>
                                    </td>
                                    <td class="cal-x-y">
                                        <p class="p-mxx"><input type="number" class="cal-min-t" id="volunteerForBooster" @if($manPowerShedule) value="{{ $manPowerShedule->volunteer_for_booster }}" @endif name="volunteerForBooster"></p>
                                    </td>
                                    <td class="cal-x-y">
                                        @if($manPowerShedule)
                                            <p class="p-mx"> {{ get_max_service_per_day($manPowerShedule->booster_time, $manPowerShedule->volunteer_for_booster) }} </p>
                                        @else
                                            <p class="p-mx">0</p>
                                        @endif
                                    </td>
                                </tr>
                                {{-- <tr class="cal-mx-x-i">
                                    <td></td>
                                    <td>
                                        <p class="p-mx">Average service per day </p>
                                    </td>
                                    <td></td>
                                    <td>
                                        <p class="p-mx">249 </p>
                                    </td>
                                </tr> --}}
                                <tr class="cal-mx-x-p">
                                    <td></td>
                                    <td>
                                        <p class="p-mx">Want to service per day </p>
                                    </td>
                                    <td></td>
                                    <td>
                                        <p class="p-mx y-s" id="wantToServePerDay"></p>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="check-cal">
                            <input id="isDefault" name="isDefault" type="checkbox" class="check-x"> Set this as default for everyday<br>
                        </div>
                        <div class="cal-save">
                            <button class="cal-x-btn schedule-save-btn">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script src="{{ asset('assets/center-part/js/third-party-calendar/calendar.js') }}"></script>
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

                console.log(formData);

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
                            '                        <div class="card-body text-center p-5">\n' +
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
    </script>
@endpush
