@extends('BdGovt.layouts.master')
@push('title')
Administrator list
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
                    <h4 class="pull-left page-title">Administrator list</h4>
                    <ol class="breadcrumb pull-right">
                        <li><a href="{{route('bdGovt.dashboard')}}">Dashboard</a></li>
                        <li><a href="javascript:void(0)">Manage User's</a></li>
                        <li class="active">Administrator list</li>
                    </ol>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Administrator list</h3>
                    </div>
                    <div class="panel-body">
                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                           <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Image</th>
                                    <th>Passport NO.</th>
                                    <th>NID NO.</th>
                                    <th>Status</th>
                                    <th>Gneder</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->phone }}</td>
                                    <td>
                                        @if ($user->image)
                                        <a href="{{ asset($user->image) }}" target="_blank">
                                            <img height="70px;" src="{{ asset($user->image) }}" width="70px;" class="rounded-circle" />
                                        </a>
                                        @else
                                        <abbr title="Sorry There in no picture">
                                            <img class="rounded-circle" height="70px;" src="{{ asset(get_static_option('no_image')) }}" width="70px;" />
                                        </abbr>
                                        @endif
                                    </td>
                                    <td>{{ $user->userInfo->passport_no }}</td>
                                    <td>{{ $user->userInfo->nid_no }}</td>
                                    <td>
                                        @if ($user->status == 0)
                                        <span class="badge badge-danger">Inactive</span>
                                        @elseif($user->status == 1)
                                        <span class="badge badge-success">Active</span>
                                        @endif
                                    </td>
                                    <td>{{ $user->userInfo->gender }}</td>
                                    <td class="text-center">
                                        @if ($user->status == 0)
                                        <button class="btn btn-success" onclick="activeNow(this)" value="{{ route('bdGovt.manageUser.activeNow', $user->id) }}">
                                            <i class="mdi mdi-check"></i>
                                        </button>
                                        @elseif($user->status == 1)
                                        <button class="btn btn-danger" onclick="inactiveNow(this)" value="{{ route('bdGovt.manageUser.inactiveNow', $user->id) }}">
                                            <i class="mdi mdi-close"></i>
                                        </button>
                                        @endif

                                        <button class="btn btn-danger" onclick="deleteNow(this)" value="{{ route('bdGovt.manageUser.deleteNow', $user->id) }}">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                        <a class="btn btn-info" href="{{ route('bdGovt.manageUser.profile', $user->id) }}">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                       
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Image</th>
                                    <th>Passport NO.</th>
                                    <th>NID NO.</th>
                                    <th>Status</th>
                                    <th>Gneder</th>
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
    function activeNow(objButton) {
        var url = objButton.value;
        // alert(objButton.value)
        Swal.fire({
            title: 'Are you sure?'
            , text: "You won't be able to revert this!"
            , icon: 'warning'
            , showCancelButton: true
            , confirmButtonColor: '#3085d6'
            , cancelButtonColor: '#d33'
            , confirmButtonText: 'Yes, Active !'
        }).then((result) => {
            if (result.isConfirmed) {

                $.ajax({
                    method: 'POST'
                    , url: url
                    , headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    , }
                    , success: function(data) {
                        if (data.type == 'success') {
                            Swal.fire(
                                'Activated !', 'This account has been Activated. ' + data.message, 'success'
                            )
                            setTimeout(function() {
                                location.reload();
                            }, 800); //
                        } else {
                            Swal.fire(
                                'Wrong !', 'Something going wrong. ' + data.message, 'warning'
                            )
                        }
                    }
                , })
            }
        })
    }

    function inactiveNow(objButton) {
        var url = objButton.value;
        // alert(objButton.value)
        Swal.fire({
            title: 'Are you sure?'
            , text: "You won't be able to revert this!"
            , icon: 'warning'
            , showCancelButton: true
            , confirmButtonColor: '#3085d6'
            , cancelButtonColor: '#d33'
            , confirmButtonText: 'Yes, Inactive !'
        }).then((result) => {
            if (result.isConfirmed) {

                $.ajax({
                    method: 'POST'
                    , url: url
                    , headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    , }
                    , success: function(data) {
                        if (data.type == 'success') {
                            Swal.fire(
                                'Inactivated !', 'This account has been Inactivated. ' + data.message, 'success'
                            )
                            setTimeout(function() {
                                location.reload();
                            }, 800); //
                        } else {
                            Swal.fire(
                                'Wrong !', 'Something going wrong. ' + data.message, 'warning'
                            )
                        }
                    }
                , })
            }
        })
    }

    function deleteNow(objButton) {
        var url = objButton.value;
        // alert(objButton.value)
        Swal.fire({
            title: 'Are you sure?'
            , text: "You won't be able to revert this!"
            , icon: 'warning'
            , showCancelButton: true
            , confirmButtonColor: '#3085d6'
            , cancelButtonColor: '#d33'
            , confirmButtonText: 'Yes, Delete !'
        }).then((result) => {
            if (result.isConfirmed) {

                $.ajax({
                    method: 'POST'
                    , url: url
                    , headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    , }
                    , success: function(data) {
                        if (data.type == 'success') {
                            Swal.fire(
                                'Deleted !', 'This account has been Deleted. ' + data.message, 'success'
                            )
                            setTimeout(function() {
                                location.reload();
                            }, 800); //
                        } else {
                            Swal.fire(
                                'Wrong !', 'Something going wrong. ' + data.message, 'warning'
                            )
                        }
                    }
                , })
            }
        })
    }

</script>
@endpush
