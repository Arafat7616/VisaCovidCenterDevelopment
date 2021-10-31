@extends('Administrator.layouts.master')

@push('title')
    Booster | Registered
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
                                    <div class="col-5">
                                        <div class="accorion-link mt-2" id='active-div'>
                                            <a href="{{ route('administrator.registered.pcr') }}" class="accorion-btn">PCR</a>
                                            <a href="{{ route('administrator.registered.vaccine.dose1') }}" class="accorion-btn">Vaccine Dose 1</a>
                                            <a href="{{ route('administrator.registered.vaccine.dose2') }}" class="accorion-btn">Vaccine Dose 2</a>
                                            <a href="{{ route('administrator.registered.booster') }}" class="accorion-btn breadcrumb-active">Booster</a>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="swap-bg  d-flex align-items-center justify-content-center">
                                            <span class="text-muted">Swap to</span>
                                            <input type="date" id="swapDate" name="swapDate" class="form-control h-25 w-50 mx-2">
                                            <a class="btn swap-btn swap-now-btn" href="#"><i class="fa fa-exchange swap-icon"></i></a>
        
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="row mb-3">
                                            <div class="col-6">
                                                <button type="button" class="btn btn-primary btn-block select-all">Select All</button>
                                            </div>
                                            <div class="col-6">
                                                <button type="button" class="btn btn-danger btn-block un-select-all">Un select all</button>
                                            </div>
                                            <br>
                                        </div>
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
                                <th scope="col">All</th>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Gender</th>
                                <th scope="col">Date</th>
                                <th scope="col">Share</th>
                            </tr>
                        </thead>

                        <div class="scroll_new_ta">
                            <tbody class="scroll_new_ber">
                                @foreach ($boosters as $booster)
                                    <tr>
                                        <td> 
                                            <input type="checkbox" class="demo-checkbox" name="id[]" id="id-{{ $booster->id }}" value="{{ $booster->id }}">
                                        </td>
                                        <td class="td_new booster-id">{{ $booster->id }}</td>
                                        <td class="td_new">{{ $booster->user->name }}</td>
                                        <td class="td_new">{{ $booster->user->phone }}</td>
                                        <td class="td_new">{{ $booster->user->userInfo->gender }}</td>
                                        <td class="td_new">{{ $booster->date }}</td>
                                        <td class="td_new">
                                            <a
                                                href="whatsapp://send?text={{ route('share.user', ['id' => Crypt::encrypt($booster->user->id)]) }}">
                                                <img src="{{ asset('uploads/images/whatsapp.png' ?? get_static_option('no_image')) }}"
                                                    alt="" class="new-r-icon">
                                            </a>
                                            <a
                                                href="mailto:{{ route('share.user', ['id' => Crypt::encrypt($booster->user->id)]) }}">
                                                <img src="{{ asset('uploads/images/gmail.png' ?? get_static_option('no_image')) }}"
                                                    alt="" class="new-r-icon">
                                            </a>
                                            <button class="btn btn-success copy-btn"
                                                value="{{ route('share.user', ['id' => Crypt::encrypt($booster->user->id)]) }}">
                                                <i class="fa fa-copy"></i> Copy
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot class="new-reg-tbl-head">
                                <tr>
                                    <th scope="col">All</th>
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Gender</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Share</th>
                                </tr>
                            </tfoot>
                        </div>
                    </table>
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

            $('.swap-now-btn').click(function (){
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, Swap it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        var date = $('#swapDate').val();
                        var ids = []
                        var checkboxes = document.querySelectorAll('input[type=checkbox]:checked')
                        for (var i = 0; i < checkboxes.length; i++) {
                            if (checkboxes[i].value != 'null'){
                                ids.push(checkboxes[i].value)
                            }
                        }
                        console.log()
                        $.ajax({
                            method: 'POST',
                            url: "{{ route('administrator.registered.booster.swap') }}",
                            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                            data: { 
                                boosters: ids,
                                date: date
                            },
                            dataType: 'JSON',
                            beforeSend: function (){
                                $(".swap-now-btn").prop("disabled",true);
                            },
                            complete: function (){
                                $(".swap-now-btn").prop("disabled",false);
                            },
                            success: function (response) {
                                if (response.type == 'success'){
                                    Swal.fire(
                                        'Updated !',
                                        'Date has been updated.',
                                        'success'
                                    ), setTimeout(function() {
                                        //your code to be executed after 1 second
                                        location.reload();
                                    }, 500); //1 second
                                }else{
                                    Swal.fire(
                                        'Sorry !',
                                        response.message,
                                        response.type
                                    )
                                }
                            },
                            error: function (xhr) {
                                var errorMessage = '<div class="card bg-danger">\n' +
                                    '                        <div class="card-body text-center p-5">\n' +
                                    '                            <span class="text-white">';
                                $.each(xhr.responseJSON.errors, function(key,value) {
                                    errorMessage +=(''+value+'<br>');
                                });
                                errorMessage +='</span>\n' +
                                    '                        </div>\n' +
                                    '                    </div>';
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    footer: errorMessage
                                })
                            },
                        })
                    }
                })
            });
        });
    </script>
@endpush
