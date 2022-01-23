@extends('RapidPCRCenterPathologist.layouts.master')

@push('title')
    Published List
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
                                            <a href="{{ route('rapidPcrCenterPathologist.pcrResult.waiting') }}"
                                                class="accorion-btn">Waiting</a>
                                            <a href="{{ route('rapidPcrCenterPathologist.pcrResult.published') }}"
                                                class="accorion-btn breadcrumb-active">Published</a>
                                        </div>
                                    </div>
                                    <div class="col-4">

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
                                <th scope="col">Edit</th>
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
                                                <i class="fa fa-edit"></i> Edit
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
                                    <th scope="col">Edit</th>
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
    <div class="modal fade " id="modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                    <img height="200px;" width="200px;" src="{{ asset(get_static_option('no_image')) }}"
                                        alt="" class="img-fluid profile-img-modal model__img">
                                </div>
                                <!-- information start -->
                                <div class="modal-information my-4">
                                    <h5 class="text-center text-muted modal-name"></h5>
                                    <div class="container d-flex justify-content-center">
                                        <div class="all-info">
                                            <div class="my-3 row ">
                                                <small class="col-sm-4">PCR Test ID</small>
                                                <div class="col-sm-8">
                                                    <small class="modal-pcr-test-id"></small>
                                                </div>
                                            </div>

                                            <div class="mb-3 row ">
                                                <small class="col-sm-4 ">Passport</small>
                                                <div class="col-sm-8">
                                                    <small class="modal-passport"></small>
                                                </div>
                                            </div>
                                            <div class="mb-3 row ">
                                                <small class="col-sm-4 ">Phone</small>
                                                <div class="col-sm-8">
                                                    <small class="modal-phone"></small>
                                                </div>
                                            </div>
                                            <div class="mb-3 row ">
                                                <small class="col-sm-4 ">Date of Birth</small>
                                                <div class="col-sm-8">
                                                    <small class="modal-dob"></small>
                                                </div>
                                            </div>
                                            <div class="mb-3 row ">
                                                <small class="col-sm-4 ">Test date </small>
                                                <div class="col-sm-8">
                                                    <small class="modal-test-date"></small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="container mt-2">
                                    <img src="{{ asset('assets/center-part/image/Illustrations/undraw_medicine_b1ol(1).svg') }}"
                                        class="img-fluid" alt="">
                                </div>
                                <form>
                                    <div class="my-5 row">
                                        <small for="testType" class="col-sm-4 col-form-label">Test type:</small>
                                        <div class="col-sm-6">
                                            <select disabled class="form-select" name="testType" id="testType"
                                                class="testType">
                                                <option>Select One</option>
                                                <option id="premium" value="premium">Premium</option>
                                                <option id="normal" value="normal">Normal</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="my-3 row">
                                        <small for="testResult" class="col-sm-4 col-form-label">Test result:</small>
                                        <div class="col-sm-6">
                                            <select class="form-select" name="testResult" id="testResult">
                                                <option disabled selected>Select One</option>
                                                <option id="negative" value="negative">Negative</option>
                                                <option id="positive" value="positive">Positive</option>
                                            </select>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success confirm-upload-result">Confirm</button>
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
                var pcrId = $(this).parent().parent().find('.pcr-test-id').text();
                $.ajax({
                    type: "GET",
                    url: "{{ url('rapid-pcr-center-pathologist/pcr-result/get-pcr-details') }}/" + pcrId,
                    success: function(res) {
                        if (res.type == 'success') {
                            // res.data.user
                            if (res.data.user) {
                                $('.modal-name').html(res.data.user.name);
                                if (res.data.user.image) {
                                    $('.model__img').attr('src', '/' + res.data.user.image);
                                } else {
                                    $('.model__img').attr('src', '/uploads/images/setting/no-image.png');
                                }
                            }
                            // res.data.pcrTest
                            if (res.data.pcrTest) {
                                $('.modal-pcr-test-id').html(res.data.pcrTest.id);
                                $('.modal-test-date').html(res.data.pcrTest.date_of_pcr_test);
                                $('.modal-test-date').html(res.data.pcrTest.date_of_pcr_test);
                                if (res.data.pcrTest.registration_type == 'normal') {
                                    $('#normal').attr('selected', true);
                                } else if (res.data.pcrTest.registration_type == 'premium') {
                                    $('#premium').attr('selected', true);
                                }

                                if (res.data.pcrTest.rapid_pcr_result == 'negative') {
                                    $('#negative').attr('selected', true);
                                } else if (res.data.pcrTest.rapid_pcr_result == 'positive') {
                                    $('#positive').attr('selected', true);
                                }
                            }

                            if (res.data.userInfo) {
                                $('.modal-passport').html(res.data.userInfo.passport_no);
                                $('.modal-dob').html(res.data.userInfo.dob);
                                $('.modal-phone').html(res.data.user.phone);
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
            $('.confirm-upload-result').click(function() {
                // update result positive /negative
                var pcrId = $('.modal-pcr-test-id').text();

                var formData = new FormData();
                formData.append('testResult', $('#testResult').val());

                $.ajax({
                    method: 'POST',
                    url: "{{ url('rapid-pcr-center-pathologist/pcr-result/update') }}/" + pcrId,
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
