@extends('BdGovt.layouts.master')
@push('title')
Premium | Booster
@endpush

@push('datatableCSS')
<!-- DataTables -->
<link href="{{ asset('assets/super-admin/plugins/datatables/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/super-admin/plugins/datatables/buttons.bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/super-admin/plugins/datatables/fixedHeader.bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/super-admin/plugins/datatables/responsive.bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/super-admin/plugins/datatables/dataTables.bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/super-admin/plugins/datatables/scroller.bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
@endpush

@push('css')

@endpush


@section('content')
<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="page-header-title">
                    <h4 class="pull-left page-title">Premium Booster list</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="{{route('bdGovt.dashboard')}}">Dashboard</a></li>
                        <li><a href="javascript:void(0)">Manage Booster</a></li>
                        <li class="active">Premium Booster list</li>
                    </ol>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title text-white">Premium Booster list</h3>
                    </div>
                    <div class="panel-body">
                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                           <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Gneder</th>
                                    <th>Image</th>
                                    <th>Vaccine Name</th>
                                    <th>Date</th>
                                    <th>Antibody Last date</th>
                                    <th>Share</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($boosters as $booster)
                                <tr>                                  
                                    <td class="td_new booster-test-id">{{ $booster->id }}</td>
                                    <td class="td_new">{{ $booster->user->name }}</td>
                                    <td class="td_new">{{ $booster->user->phone }}</td>
                                    <td class="td_new">{{ $booster->user->userInfo->gender }}</td>
                                    <td>
                                        @if ($booster->user->image)
                                        <a href="{{ asset($booster->user->image) }}" target="_blank">
                                            <img height="70px;" src="{{ asset($booster->user->image) }}" width="70px;" class="rounded-circle" />
                                        </a>
                                        @else
                                        <abbr title="Sorry There in no picture">
                                            <img class="rounded-circle" height="70px;" src="{{ asset(get_static_option('no_image')) }}" width="70px;" />
                                        </abbr>
                                        @endif
                                    </td>
                                    <td class="td_new">{{ $booster->name_of_vaccine }}</td>
                                    <td class="td_new">{{ $booster->date }}</td>
                                    <td class="td_new">{{ $booster->antibody_last_date }}</td>
                                    <td class="td_new">
                                        <a href="whatsapp://send?text={{ route('share.user', ['id' => Crypt::encrypt($booster->user->id)]) }}">
                                            <img style="height: 50px; width: 50px;" src="{{ asset('uploads/images/whatsapp.png' ?? get_static_option('no_image')) }}"
                                                alt="" class="new-r-icon">
                                        </a>
                                        <a href="mailto:{{ route('share.user', ['id' => Crypt::encrypt($booster->user->id)]) }}">
                                            <img style="height: 50px; width: 50px;" src="{{ asset('uploads/images/gmail.png' ?? get_static_option('no_image')) }}"
                                                alt="" class="new-r-icon">
                                        </a>
                                        <button class="btn btn-success copy-btn"
                                            value="{{ route('share.user', ['id' => Crypt::encrypt($booster->user->id)]) }}">
                                            <i class="fa fa-copy"></i> Copy
                                        </button>
                                    </td>
                                    <td class="td_new">
                                        <a href="{{ route('bdGovt.booster.premium.edit', $booster->id) }}"
                                        class="btn btn-info"><i class="fa fa-edit"></i> </a>

                                    <button class="btn btn-danger" onclick="delete_function(this)"
                                        value="{{ route('bdGovt.booster.premium.destroy', $booster) }}"><i
                                            class="fa fa-trash"></i> </button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Gneder</th>
                                    <th>Image</th>
                                    <th>Vaccine Name</th>
                                    <th>Date</th>
                                    <th>Antibody Last date</th>
                                    <th>Share</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div> <!-- End Row -->
    </div>
</div>
@endsection

@push('datatableJS')
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

@push('script')
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
