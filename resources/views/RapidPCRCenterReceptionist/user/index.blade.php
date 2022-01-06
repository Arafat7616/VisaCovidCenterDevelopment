@extends('Receptionist.layouts.master')

@push('title')
    User's
@endpush

@push('css')
    <link rel="stylesheet" href="{{ asset('assets/center-part/css/new_registration_model_39.css') }}">

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
    <div class="container py-4 ">
        <div class="card page-wrapper-rg-n">
            <div class="page-wrapper-rg-np">
                <table class="table" id="datatable">
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
                                    <td class="td_new user-id open-modal">{{ $user->id }}</td>
                                    <td class="td_new open-modal">{{ $user->name }}</td>
                                    <td class="td_new open-modal">{{ $user->phone }}</td>
                                    <td class="td_new open-modal">{{ $user->email }}</td>
                                    <td class="td_new">
                                        <a
                                            href="whatsapp://send?text={{ route('share.user', ['id' => Crypt::encrypt($user->id)]) }}">
                                            <img src="{{ asset('uploads/images/whatsapp.png' ?? get_static_option('no_image')) }}"
                                                alt="" class="new-r-icon">
                                        </a>
                                        <a href="mailto:{{ route('share.user', ['id' => Crypt::encrypt($user->id)]) }}">
                                            <img src="{{ asset('uploads/images/gmail.png' ?? get_static_option('no_image')) }}"
                                                alt="" class="new-r-icon">
                                        </a>
                                        <button class="btn btn-success copy-btn"
                                            value="{{ route('share.user', ['id' => Crypt::encrypt($user->id)]) }}">
                                            <i class="fa fa-copy"></i> Copy
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot class="new-reg-tbl-head">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Phone</th>
                                <th scope="col">E-mail</th>
                                <th scope="col">Share</th>
                            </tr>
                        </tfoot>
                    </div>
                </table>
            </div>
        </div>
    </div>


    <div class="modal fade" id="modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="new_registration__model">
                        <div class="row">
                            <div class="col-4">
                                <div class="row">
                                    <div class="col-4 new_registration__model__content">
                                        <h6>Name</h6>
                                        <h6>Father</h6>
                                        <h6>Passport</h6>
                                        <h6>NID</h6>
                                    </div>
                                    <div class="col-8">
                                        <h6 class="modal-name"></h6>
                                        <h6 class="modal-father-name"></h6>
                                        <h6 class="modal-passport"></h6>
                                        <h6 class="modal-nid"></h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="row">
                                    <div class="col-4">
                                        <h6>Birth Date</h6>
                                        <h6>Phone</h6>
                                        <h6>Address</h6>
                                    </div>
                                    <div class="col-8">
                                        <h6 class="modal-dob"></h6>
                                        <h6 class="modal-mobile"></h6>
                                        <h6 class="modal-address"></h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4">
                                <img class="new_registration__model__img img-fluid"
                                    src="{{ asset(get_static_option('no_image')) }}" alt="">
                            </div>
                            <div class="new_registration__model__divider"></div>
                            <div class="row">
                                <div class="col-12 text-center pb-0">
                                    <h6 class="new_registration__title">Vaccine</h6>
                                </div>
                                <div class="col-4 p-0 ps-3">
                                    <h5 class="new_registration__head">Dose 1</h5>
                                    <div class="new_registration__body px-3">
                                        <span class="modal-vaccine-name"></span> <br>
                                        <span>Vaccine Center: <span class="modal-vaccine-center"></span></span> <br>
                                        <span>Served By: <span class="modal-first-serve-by"></span></span> <br>
                                        <span>Date: <span class="modal-first-date"></span></span>
                                    </div>
                                </div>
                                <div class="col-4 ps-0 pe-0">
                                    <h5 class="new_registration__head new_registration__border">Dose 2</h5>
                                    <div class="new_registration__body px-3">
                                        <span class="modal-vaccine-name"></span> <br>
                                        <span>Vaccine Center: <span class="modal-vaccine-center"></span></span> <br>
                                        <span>Served By: <span class="modal-second-serve-by"></span></span> <br>
                                        <span>Date: <span class="modal-second-date"></span></span>
                                    </div>
                                </div>
                                <div class="col-4 ps-0 pe-3">
                                    <h5 class="new_registration__head">Booster</h5>
                                    <div class="new_registration__body px-3">
                                        <span class="modal-booster-name"></span> <br>
                                        <span>Vaccine Center: <span class="modal-booster-center"></span></span> <br>
                                        <span>Served By: <span class="modal-booster-serve-by"></span></span> <br>
                                        <span>Date: <span class="modal-booster-date"></span></span>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-5">
                                <div class="col-12 text-center">
                                    <h6 class="new_registration__title">PCR</h6>
                                </div>
                                <div class="col-4 p-0 ps-3">
                                    <h5 class="new_registration__head">Date</h5>
                                    <div class="new_registration__body px-3">
                                        <span>Sample Collection: <span class="modal-sample-collection-date"></span></span>
                                        <br>
                                        <span>Tested Date: <span class="modal-date-of-pcr"></span></span> <br>
                                        <span>Result Published: <span class="modal-result-date"></span></span> <br>
                                    </div>
                                </div>
                                <div class="col-4 ps-0 pe-0">
                                    <h5 class="new_registration__head new_registration__border">Authorised</h5>
                                    <div class="new_registration__body px-3">
                                        <span>Medical Center: <span class="modal-pcr-center"> </span></span> <br>
                                        <span>Served By: <span class="modal-pcr-serve"></span></span> <br>
                                        <span>System: {{ config('app.name') }}</span>
                                    </div>
                                </div>
                                <div class="col-4 ps-0 pe-3">
                                    <h5 class="new_registration__head">Result</h5>
                                    <div class="new_registration__body px-3">
                                        <p class="text-danger modal-pcr-result"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row my-5">
                            <div class="new_registration__modal__bottom text-center d-flex align-items-center">
                                <div class="col-6">
                                    <p>{{ get_static_option('report_wish_tag') }}</p>
                                </div>
                                <div class="col-6 me-0">
                                    <img src="{{ asset(get_static_option('logo') ?? get_static_option('no_image')) }}"
                                        alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
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
    <script>
        $(document).ready(function() {
            $(".copy-btn").click(function() {
                var $temp = $("<input>");
                $("body").append($temp);
                var url = $(this).val();
                $temp.val(url).select();
                document.execCommand("copy");
                $temp.remove();
                $(this).text('Copied');

                Swal.fire(
                    'Copied !',
                    'Link has been copied.',
                    'success'
                );
            });

            $('.open-modal').click(function() {
                var userId = $(this).parent().find('.user-id').text();
                $.ajax({
                    type: "GET",
                    url: "{{ url('receptionist/user-get/') }}/" + userId,
                    success: function(res) {
                        if (res.type == 'success') {
                            // console.log(res.data.pcrTest);
                            $('.modal-name').html(res.data.user.name);
                            $('.modal-father-name').html(res.data.userInfo.father_name);
                            $('.modal-passport').html(res.data.userInfo.passport_no);
                            $('.modal-nid').html(res.data.userInfo.nid_no);
                            $('.modal-dob').html(res.data.userInfo.dob);
                            $('.modal-mobile').html(res.data.user.phone);
                            $('.modal-address').html(res.data.userInfo.present_address);

                            if (res.data.user.image) {
                                $('.new_registration__model__img').attr('src', '/' + res.data.user.image);
                            }else{
                                $('.new_registration__model__img').attr('src', '/uploads/images/setting/no-image.png');
                            }

                            // vaccination
                            if (res.data.vaccination) {
                                $('.modal-vaccine-name').html(res.data.vaccination
                                    .name_of_vaccine);
                                $('.modal-first-serve-by').html(res.data.vaccination
                                    .first_served_by_id);
                                $('.modal-second-serve-by').html(res.data.vaccination
                                    .second_served_by_id);
                                $('.modal-first-date').html(res.data.vaccination
                                    .date_of_first_dose);
                                $('.modal-second-date').html(res.data.vaccination
                                    .date_of_second_dose);
                                $('.modal-vaccine-center').html(res.data.vaccinationCenter
                                    .name);
                            }
                            // booster
                            if (res.data.booster) {
                                $('.modal-booster-name').html(res.data.booster.name_of_vaccine);
                                $('.modal-booster-center').html(res.data.boosterCenter.name);
                                $('.modal-booster-serve-by').html(res.data.booster
                                    .served_by_id);
                                $('.modal-booster-date').html(res.data.booster.date);
                            }
                            // pcrTest
                            if (res.data.pcrTest) {
                                $('.modal-sample-collection-date').html(res.data.pcrTest
                                    .sample_collection_date);
                                $('.modal-date-of-pcr').html(res.data.pcrTest.date_of_pcr_test);
                                $('.modal-result-date').html(res.data.pcrTest
                                    .result_published_date);
                                $('.modal-pcr-serve').html(res.data.pcrTest.tested_by);
                                $('.modal-pcr-center').html(res.data.pcrCenter.name);

                                if (res.data.pcrTest.pcr_result == 'positive') {
                                    $('.modal-pcr-result').text("Positive").removeClass(
                                        "text-success").addClass("text-danger")
                                } else if (res.data.pcrTest.pcr_result == 'negative') {
                                    $('.modal-pcr-result').text("Negative").removeClass(
                                        "text-danger").addClass("text-success");
                                }
                            }
                            $('#modal').modal('show');
                        } else {
                            Swal.fire({
                                icon: data.type,
                                title: 'Oops...',
                                text: data.message,
                                footer: 'Something went wrong!'
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
