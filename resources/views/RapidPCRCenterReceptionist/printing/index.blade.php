@extends('RapidPCRCenterReceptionist.layouts.master')

@push('title')
    Printing
@endpush

@push('css')
    <link rel="stylesheet" href="{{ asset('assets/center-part/css/Accordion-42.css') }}">

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
    <div class="container py-4">
        <div class="card page-wrapper">
            @foreach ($pcrTestsOrderByDate as $pcrTestOrderByDate)
                <div class="accordion" id="accordionExample{{ $loop->iteration }}">
                    <div class="accordion-item table-accordion-item">
                        <h2 class="accordion-header" id="heading{{ $loop->iteration }}">
                            <button class="accordion-button table-accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapse{{ $loop->iteration }}" aria-expanded="true"
                                aria-controls="collapse{{ $loop->iteration }}">
                                
                                <span
                                    class="table-accordion-date">{{ Carbon\Carbon::parse($pcrTestOrderByDate->first()->result_published_date)->format('d/m/Y') }}</span>
                                <span class="table-accordion-people">{{ $pcrTestOrderByDate->count() }} People</span>
                            </button>
                        </h2>
                        <div id="collapse{{ $loop->iteration }}"
                            class="accordion-collapse collapse @if ($loop->iteration == 1) show @endif"
                            aria-labelledby="heading{{ $loop->iteration }}"
                            data-bs-parent="#accordionExample{{ $loop->iteration }}">
                            <div class="accordion-body table-accordion-body">
                                <table class="table accordion-table" id="datatable">
                                    <thead>
                                        <tr>
                                            <th scope="col"> <input type="checkbox" class="custom-control-input"
                                                    id="customCheck1" checked></th>
                                            <th scope="col">ID</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Phone</th>
                                            <th scope="col">Share</th>
                                            <th scope="col">Print</th>
                                            <th scope="col">View</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pcrTestOrderByDate as $pcrTest)
                                            <tr class="table-row">
                                                <td><input type="checkbox" class="custom-control-input" id="customCheck1">
                                                </td>
                                                <td>{{ $pcrTest->user_id }}</td>
                                                <td>{{ $pcrTest->user->name }}</td>
                                                <td>{{ $pcrTest->user->phone }}</td>
                                                <td>
                                                    <a href="whatsapp://send?text={{ route('share.user', ['id' => Crypt::encrypt($pcrTest->user_id)]) }}">
                                                        <img src="{{ asset('uploads/images/whatsapp.png' ?? get_static_option('no_image')) }}"
                                                            alt="" class="new-r-icon">
                                                    </a>
                                                    <a href="mailto:{{ route('share.user', ['id' => Crypt::encrypt($pcrTest->user_id)]) }}">
                                                        <img src="{{ asset('uploads/images/gmail.png' ?? get_static_option('no_image')) }}"
                                                            alt="" class="new-r-icon">
                                                    </a>
                                                    <button class="btn btn-success copy-btn"
                                                        value="{{ route('share.user', ['id' => Crypt::encrypt($pcrTest->user_id)]) }}">
                                                        <i class="fa fa-copy"></i> Copy
                                                    </button>
                                                </td>
                                                <td class="text-center">
                                                    <a href="{{ route('rapidPcrCenterReceptionist.printing.generatePDF', $pcrTest->user_id) }}">
                                                        <i class="fa fa-print"></i>
                                                    </a>
                                                </td>
                                                <td class="text-center">
                                                    <a href="{{ route('share.user', ['id' => Crypt::encrypt($pcrTest->user_id)]) }}"><i class="fa fa-eye text-dark"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th scope="col"> <input type="checkbox" class="custom-control-input"
                                                    id="customCheck1" checked></th>
                                            <th scope="col">ID</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Phone</th>
                                            <th scope="col">Share</th>
                                            <th scope="col">Print</th>
                                            <th scope="col">View</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
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
        });
    </script>
@endpush
