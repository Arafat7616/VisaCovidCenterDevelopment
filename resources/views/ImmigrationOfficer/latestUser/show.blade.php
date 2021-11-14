@extends('ImmigrationOfficer.layouts.master')

@push('title')
Dashboard
@endpush

@push('css')

@endpush

@section('content')
<div class="tab-content w-100 ">
    <div>
        <!--================= first container start===================== -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    <div class="card w-75 my-3">
                        <img src="{{ asset($latestImmigration->passedUser->image ?? get_static_option('no_image')) }}" class="card-img-top img-fluid spy-card" alt="User Image">
                        <div class="card-body">
                            <div class="card-title">
                                <h6 class="text-muted info-font">Name</h6>
                                <h5 class="info-font">{{ $latestImmigration->passedUser->name }}</h5>
                                <h6 class="text-muted info-font">Passport</h6>
                                <h5 class="info-font">{{ $latestImmigration->passedUser->userInfo->passport_no }}</h5>
                            </div>
                            <h6 class="text-muted">Status</h6>
                            <div class="text-center">
                                <button class="btn {{ $latestImmigration->passedUser->vaccination->date_of_first_dose ? 'btn-success' : 'btn-danger' }}">Vaccine-1</button>
                                <button class="btn {{ $latestImmigration->passedUser->vaccination->date_of_second_dose ? 'btn-success' : 'btn-danger' }} m-1">Vaccine-2</button>
                                <button class="btn {{ $latestImmigration->passedUser->booster->date ? 'btn-success' : 'btn-danger' }} m-1">Booster</button>
                                <button class="btn {{ $latestImmigration->passedUser->pcrTest->pcr_result == 'negative' ? 'btn-success' : 'btn-danger' }}">PCR</button>
                            </div>
                            <div class="nav nav-tabs " id="nav-tab" role="tablist">
                                <button class="btn w-100 btn-primary my-2 " id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">
                                    <span class="mx-2"><i class="fa fa-bars"></i></span>Details
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 tab-content" id="nav-tabContent">
                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                        <div class="card  shadow details-card my-3 mx-0 ">
                            <div class="card-body">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-8 d-flex">
                                            <img src="{{ asset($latestImmigration->passedUser->image ?? get_static_option('no_image')) }}" height="100px" width="100px" alt="">
                                            <div class="information-card p-2">
                                                <h3 class="info-font">{{ $latestImmigration->passedUser->name }}</h3>
                                                <h5 class="info-font">{{ $latestImmigration->passedUser->userInfo->present_address }}</h5>
                                                <h6 class="info-font">{{ $latestImmigration->passedUser->phone }}</h6>
                                            </div>
                                        </div>
                                        <div class="col-md-4 d-flex justify-content-center mt-1">
                                            <div class="content ">
                                                <img height="80px;" width="80px;" src="{{ asset(get_static_option('logo') ?? get_static_option('no_image')) }}" alt="">
                                                <div class="qr mt-3">
                                                    {!! QrCode::size(160)->generate(route('share.user', ['id' => Crypt::encrypt($latestImmigration->passedUser->id)])) !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr class="new3">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-4 details-card-info d-flex justify-content-center align-items-center">
                                            <h3>Vaccine 1</h3>
                                        </div>
                                        <div class="col-md-8 details-card-info">
                                            <div class="row">
                                                <div class="col-md-8 p-2">
                                                    @if($latestImmigration->passedUser->vaccination->date_of_first_dose)
                                                    <h6>{{ $latestImmigration->passedUser->vaccination->name_of_vaccine }}</h6>
                                                    <h6>Received at : {{ $latestImmigration->passedUser->vaccination->center->name }}</h6>
                                                    <h6>{{ Carbon\Carbon::parse($latestImmigration->passedUser->vaccination->date_of_first_dose)->format('d M Y') }}</h6>
                                                    @endif
                                                </div>
                                                <div class="col-md-4 ">
                                                    @if ($latestImmigration->passedUser->vaccination->date_of_first_dose)
                                                        <img src="{{ asset('assets/immigration/img/Spy/vaccine-success.png') }}" alt="First dose taken" height="80px" width="80px">
                                                    @else
                                                        <img src="{{ asset('assets/immigration/img/Spy/vaccine-error.png') }}" alt="First dose not taken" height="80px" width="80px">
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row my-2">
                                        <div class="col-md-4 details-card-info2 d-flex justify-content-center align-items-center">
                                            <h3>Vaccine 2</h3>
                                        </div>
                                        <div class="col-md-8 details-card-info2">
                                            <div class="row">
                                                <div class="col-md-8 p-2">
                                                    @if($latestImmigration->passedUser->vaccination->date_of_second_dose)
                                                    <h6>{{ $latestImmigration->passedUser->vaccination->name_of_vaccine }}</h6>
                                                    <h6>Received at : {{ $latestImmigration->passedUser->vaccination->center->name }}</h6>
                                                    <h6>{{ Carbon\Carbon::parse($latestImmigration->passedUser->vaccination->date_of_second_dose)->format('d M Y') }}</h6>                                                        
                                                    @endif
                                                </div>
                                                <div class="col-md-4 ">
                                                    @if ($latestImmigration->passedUser->vaccination->date_of_second_dose)
                                                        <img src="{{ asset('assets/immigration/img/Spy/vaccine-success.png') }}" alt="Second dose taken" height="80px" width="80px">
                                                    @else
                                                        <img src="{{ asset('assets/immigration/img/Spy/vaccine-error.png') }}" alt="Second dose not taken" height="80px" width="80px">
                                                    @endif                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row my-2">
                                        <div class="col-md-4 details-card-info3 d-flex justify-content-center align-items-center">
                                            <h3>Booster</h3>
                                        </div>
                                        <div class="col-md-8 details-card-info3">
                                            <div class="row">
                                                <div class="col-md-8 p-2">
                                                    @if ($latestImmigration->passedUser->booster)
                                                    <h6>{{ $latestImmigration->passedUser->booster->name_of_vaccine }}</h6>
                                                    <h6>Received at : {{ $latestImmigration->passedUser->booster->center->name }}</h6>
                                                    <h6>{{ Carbon\Carbon::parse($latestImmigration->passedUser->booster->date)->format('d M Y') }}</h6>
                                                    @endif
                                                </div>
                                                <div class="col-md-4 ">
                                                    @if ($latestImmigration->passedUser->booster->date)
                                                    <img src="{{ asset('assets/immigration/img/Spy/booster-success.png') }}" alt="Booster Taken" height="80px" width="80px">
                                                    @else
                                                    <img src="{{ asset('assets/immigration/img/Spy/booster-error.png') }}" alt="Booster Not Taken" height="80px" width="80px">
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row my-2">
                                        <div class="col-md-4 details-card-info4 d-flex justify-content-center align-items-center">
                                            <h3>PCR</h3>
                                        </div>
                                        <div class="col-md-8 details-card-info4">
                                            <div class="row">
                                                <div class="col-md-8 p-2">
                                                    @if($latestImmigration->passedUser->pcrTest)
                                                        @if($latestImmigration->passedUser->pcrTest->pcr_result == 'negative')
                                                        <h6>Negative</h6>
                                                        @elseif($latestImmigration->passedUser->pcrTest->pcr_result == 'positive')
                                                        <h6>Positive</h6>
                                                        @else
                                                        <h6>Result Not Published</h6>
                                                        @endif
                                                        <h6>Received at : {{ $latestImmigration->passedUser->pcrTest->center->name }}</h6>
                                                        <h6>{{ Carbon\Carbon::parse($latestImmigration->passedUser->pcrTest->date_of_result_publish)->format('d M Y') }}</h6>
                                                    @endif

                                                </div>
                                                <div class="col-md-4 ">
                                                    @if ($latestImmigration->passedUser->pcrTest->pcr_result == 'negative')
                                                    <img src="{{ asset('assets/immigration/img/Spy/pcr-success.png') }}" alt="Pass" height="80px" width="80px">
                                                    @else
                                                    <img src="{{ asset('assets/immigration/img/Spy/pcr-error.png') }}" alt="Fail" height="80px" width="80px">
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--================= first container end===================== -->
    </div>
</div>
<script>
    /* When the user clicks on the button, 
    toggle between hiding and showing the dropdown content */
    function myFunction() {
        document.getElementById("myDropdown").classList.toggle("show");
    }

    // Close the dropdown if the user clicks outside of it
    window.onclick = function(event) {
        if (!event.target.matches('.dropbtn')) {
            var dropdowns = document.getElementsByClassName("dropdown-content");
            var i;
            for (i = 0; i < dropdowns.length; i++) {
                var openDropdown = dropdowns[i];
                if (openDropdown.classList.contains('show')) {
                    openDropdown.classList.remove('show');
                }
            }
        }
    }

</script>
{{-- <div>
        This is dashboard page
    </div> --}}
@endsection

@push('script')

@endpush
