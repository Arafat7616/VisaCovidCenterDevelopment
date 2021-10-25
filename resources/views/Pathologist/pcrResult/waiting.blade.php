@extends('Pathologist.layouts.master')

@push('title')
    Waiting List
@endpush

@push('css')
    <link rel="stylesheet" href="{{ asset('assets/center-part/css/accordion_table_16.css') }}">

    {{-- datatables --}}
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
    <div class="hero_pure">
        <!--Waiting Result-->
        <div class="tap_result_1" id="tap_result_1">
            <div class="container py-4">
                <div class="card page-wrapper" style="margin-bottom: 100px">
                    <div class="accordion-table-breadcrumb">
                        <div class="accordion-table-header ">
                            <div class="container">
                                <div class="row justify-content-between">
                                    <div class="col-4">
                                        <div class="accorion-link mt-2" id='active-div'>
                                            <a href="{{ route('pathologist.pcrResult.waiting') }}"
                                                class="accorion-btn breadcrumb-active">Waiting</a>
                                            <a href="{{ route('pathologist.pcrResult.published') }}"
                                                class="accorion-btn">Published</a>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        {{-- <div class="input-group">
                                            <input type="text" class="form-control" placeholder="ID/Name/Phone/Date">
                                            <div class="input-group-append">
                                                <button class="btn btn-secondary" type="button">
                                                    <i class="fa fa-search"></i>
                                                </button>
                                            </div>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <table class="table" id="datatable">
                        <thead class="new-reg-tbl-head">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Upload</th>
                                <th scope="col">Share</th>
                            </tr>
                        </thead>

                        <div class="scroll_new_ta">
                            <tbody class="scroll_new_ber">
                                @foreach ($pcrTests as $pcrTest)
                                    <tr>
                                        <td class="td_new pcr-test-id">{{ $pcrTest->id }}</td>
                                        <td class="td_new">{{ $pcrTest->user->name }}</td>
                                        <td class="td_new">{{ $pcrTest->user->phone }}</td>
                                        <td class="td_new">
                                            <button class="btn btn-success  open-modal">
                                                <i class="fa fa-upload"></i> Upload
                                            </button>
                                        </td>
                                        <td class="td_new">
                                            <a
                                                href="whatsapp://send?text={{ route('share.user', ['id' => Crypt::encrypt($pcrTest->user->id)]) }}">
                                                <img src="{{ asset('uploads/images/whatsapp.png' ?? get_static_option('no_image')) }}"
                                                    alt="" class="new-r-icon">
                                            </a>
                                            <a
                                                href="mailto:{{ route('share.user', ['id' => Crypt::encrypt($pcrTest->user->id)]) }}">
                                                <img src="{{ asset('uploads/images/gmail.png' ?? get_static_option('no_image')) }}"
                                                    alt="" class="new-r-icon">
                                            </a>
                                            <button class="btn btn-success copy-btn"
                                                value="{{ route('share.user', ['id' => Crypt::encrypt($pcrTest->user->id)]) }}">
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
                                    <th scope="col">Upload</th>
                                    <th scope="col">Share</th>
                                </tr>
                            </tfoot>
                        </div>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>

    <!-- modal div start -->
    <div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" style="max-width: 80%;" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 modal-bg">
                                <div class="profile-pic d-flex justify-content-center align-items-center">
                                    <img src="{{ asset(get_static_option('no_image')) }}" alt=""
                                        class="img-fluid profile-img-modal">
                                </div>
                                <!-- information start -->
                                <div class="modal-information my-4">
                                    <h5 class="text-center text-muted">Abdur Rahman</h5>
                                    <div class="container d-flex justify-content-center">
                                        <div class="all-info">
                                            <div class="my-3 row ">
                                                <small class="col-sm-4 ">Covid ID</small>
                                                <div class="col-sm-8">
                                                    <small>987 1234 123</small>
                                                </div>
                                            </div>

                                            <div class="mb-3 row ">
                                                <small class="col-sm-4 ">Passport</small>
                                                <div class="col-sm-8">
                                                    <small>2345 987 1234 123</small>
                                                </div>
                                            </div>
                                            <div class="mb-3 row ">
                                                <small class="col-sm-4 ">Phone</small>
                                                <div class="col-sm-8">
                                                    <small>880 182 700 7441</small>
                                                </div>
                                            </div>
                                            <div class="mb-3 row ">
                                                <small class="col-sm-4 ">Age</small>
                                                <div class="col-sm-8">
                                                    <small>35</small>
                                                </div>
                                            </div>
                                            <div class="mb-3 row ">
                                                <small class="col-sm-4 ">Date</small>
                                                <div class="col-sm-8">
                                                    <small>21-10-2021</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="container mt-2">
                                    <img src="{{ asset('assets/center-part/image/Illustrations/undraw_medicine_b1ol(1).svg') }}" class="img-fluid"
                                        alt="">
                                </div>
                                <form>
                                    <div class="my-5 row">
                                        <small for="inputPassword" class="col-sm-4 col-form-label">Test type:</small>
                                        <div class="col-sm-6">
                                            <select class="form-select" aria-label="Default select example">
                                                <option selected>Negative</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="my-3 row">
                                        <small for="inputPassword" class="col-sm-4 col-form-label">Test result:</small>
                                        <div class="col-sm-6">
                                            <select class="form-select" aria-label="Default select example">
                                                <option selected>RT-PCR</option>
                                                <option value="1">One</option>
                                                <option value="2">Two</option>
                                                <option value="3">Three</option>
                                            </select>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                    <button type="button" class="btn btn-success">Confirm</button>
                </div>
            </div>
        </div>
    </div>
    <!-- modal div ends -->
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
                var pcrId = $(this).parent().find('.pcr-test-id').text();
                $.ajax({
                    type: "GET",
                    url: "{{ url('pathologist/get-pcr-details') }}/" + pcrId,
                    success: function(res) {
                        if (res.type == 'success') {
                            // console.log(res.data.pcrTest);
                            $('.modal-name').html(res.data.user.name);
                            $('.modal-father-name').html(res.data.userInfo.father_name);
                            $('.modal-passport').html(res.data.userInfo.passport_no);
                            $('.modal-nid').html(res.data.userInfo.nid_no);
                            $('.modal-dob').html(res.data.userInfo.dob);
                            $('.modal-dob').html(res.data.userInfo.dob);
                            $('.modal-mobile').html(res.data.user.phone);
                            $('.modal-address').html(res.data.userInfo.present_address);
                            if (res.data.user.image) {
                                $('.new_registration__model__img').attr('src', '/' + res.data
                                    .user.image);
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
                                    .sample_clloection_date);
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
