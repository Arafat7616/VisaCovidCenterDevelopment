@extends('Administrator.layouts.master')

@push('title')
    Regular Man Power
@endpush

@push('css')
    <link rel="stylesheet" href="{{ asset('assets/center-part/css/calender_14.css') }}">
   <link rel="stylesheet" href="{{ asset('assets/center-part/css/third-party-calender/calender.css') }}">
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
                                    <input type="time" class="cal-morn-in-left" placeholder="9:45 AM"> -
                                    <input type="time" class="cal-morn-in-left" placeholder="12:00 PM">
                                </div>
                                <p class="cal-footer">Working period: 545 Minutes</p>
                            </div>

                            <div class="cal-day-slot">
                                <p class="day">Day Slot</p>
                                <div class="cal-day-in">
                                    <input type="time" class="cal-morn-day-right" placeholder="9:45 AM"> -
                                    <input type="time" class="cal-morn-day-right" placeholder="12:00 PM">
                                </div>
                                <p class="cal-footer">Working period: 135 Minutes</p>

                            </div>
                        </div>
                        <div class="cal-min-slot row">
                            <ul class="total">
                                <li class="cal-min-l">Total minutes</li>
                                <li class="cal-min-r">815</li>
                            </ul>
                            <ul class="total">
                                <li class="cal-min-l">Total volunteers on center</li>
                                <li class="cal-min-r"><input type="text" class="cal-min-t" placeholder="5"></li>
                            </ul>
                            <ul class="total">
                                <li class="cal-min-l">Total man minutes per day</li>
                                <li class="cal-min-r">4075</li>
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
                                        <p class="p-mx"> <small>Max service</small><br><b>Per day</b> </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="cal-x-y">
                                        <p class="p-mx"> PCR </p>
                                    </td>
                                    <td class="cal-x-y">
                                        <p class="p-mxx">20 <small class="s-cx">min</small></p>
                                    </td>
                                    <td class="cal-x-y">
                                        <p class="p-mx"> 204 </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="cal-x-y">
                                        <p class="p-mx"> Vaccine </p>
                                    </td>
                                    <td class="cal-x-y">
                                        <p class="p-mxx"> 15 <small class="s-cx">min</small></p>
                                    </td>
                                    <td class="cal-x-y">
                                        <p class="p-mx"> 272 </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="cal-x-y">
                                        <p class="p-mx"> Booster </p>
                                    </td>
                                    <td class="cal-x-y">
                                        <p class="p-mxx"> 15 <small class="s-cx">min</small> </p>
                                    </td>
                                    <td class="cal-x-y">
                                        <p class="p-mx"> 272 </p>
                                    </td>
                                </tr>
                                <tr class="cal-mx-x-i">
                                    <td></td>
                                    <td>
                                        <p class="p-mx">Average service per day </p>
                                    </td>
                                    <td>
                                        <p class="p-mx">249 </p>
                                    </td>
                                </tr>
                                <tr class="cal-mx-x-p">
                                    <td></td>
                                    <td>
                                        <p class="p-mx">Want to service per day </p>
                                    </td>
                                    <td>
                                        <p class="p-mx y-s">230 </p>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="check-cal">
                            <input type="checkbox" checked="checked" value="Bike" class="check-x"> Set this as
                            default
                            for everyday<br>
                        </div>
                        <div class="cal-save">
                            <button class="cal-x-btn">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script src="{{ asset('assets/center-part/js/third-party-calender/calender.js') }}"></script>
    <script>

    </script>
@endpush
