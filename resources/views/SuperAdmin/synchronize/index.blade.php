@extends('SuperAdmin.layouts.master')

@push('title')
    Synchronize Rules
@endpush
@push('datatableCSS')

@endpush

@section('content')
    <style>
        td,
        th {
            text-align: center;
        }
        .input-fild-group {
            display: flex;
            gap: 10px;
        }
        .panel-body {
            height: 100%;
            overflow-y: scroll;
            padding-bottom: 15px;
        }
    </style>

    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-header-title">
                        <h4 class="pull-left page-title">All Synchronize Rule</h4>
                        <ol class="breadcrumb pull-right">
                            <li><a href="{{route('superAdmin.dashboard')}}">Dashboard</a></li>
                            <li class="active">All Synchronize Rule</li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-12">
                    <form id="lostPasportForm" action="{{ route('superAdmin.synchronize.store') }}" method="POST">
                        @include('Others.message')
                        @csrf
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <h3 class="panel-title text-white">All Synchronize Rules</h3>

                            </div>
                            <div class="panel-body">

                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>#SL</th>
                                            <th>Synchronize Rule</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody id="synchronize_rules">
                                        @if(isset($synchronizes[0]))
                                            @foreach ($synchronizes as $key => $synchronize)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>
                                                        <input type="text" name="synchronize_rule[]"
                                                            value="{{$synchronize->synchronize_rule}}" class="form-control">
                                                        <input type="hidden" name="id[]" value="{{ $synchronize->id }}" class="form-control">
                                                    </td>
                                                    <td>
                                                        <select class="form-select form-control" name="status[]">
                                                            <option @if($synchronize->status == 1) selected @endif value="1" class="text-capitalize">Active</option>
                                                            <option @if($synchronize->status == 0) selected @endif value="0" class="text-capitalize">Inactive</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        @if (!isset($key))
                                                            <a class="btn btn-danger text-white"
                                                                onclick="removeItem($(this))"><i
                                                                    class="fa fa-times"></i></a>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="5" class="text-center">
                                                <a class="btn btn-success text-white" onclick="newItem()"><i
                                                        class="fa fa-plus"></i>&nbsp; Add More</a>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="panel-footer bg-defult" style="padding: 10px">

                                <button class="btn btn-success" type="submit" id="btnLostPassport">SAVE</button>

                            </div>
                        </div>
                    </form>
                </div>
            </div> <!-- End Row -->
        </div>
    </div>
    <script>
        // Synchronize
        function newItem() {
            $('#synchronize_rules').append(
                '<tr>' +
                '<td></td>' +
                '<td>' +
                '<input type="text" name="synchronize_rule[]" class="form-control">' +
                '<input type="hidden" name="id[]" value="" class="form-control">' +
                '</td>' +
                '<td>' +
                    '<select class="form-select form-control" name="status[]">'+
                    '<option selected value="1" class="text-capitalize">Active</option>'+
                    '<option value="0" class="text-capitalize">Inactive</option>'+
                    '</select>' +
                '</td>' +
                '<td>' +
                '<a class="btn btn-danger text-white" onclick="removeItem($(this))"><i class="fa fa-times"></i></a>' +
                '</td>' +
                '</tr>'
            );
        }
        function removeItem(element) {
            var count = 0;
            $.each($('#synchronize_rules tr'), function(index, val) {
                count++;
            });

            if (count > 1) {
                element.parent().parent().remove();
                maintainSerialRenew();
            }
        }
    </script>
    @if (session()->has('success'))
        <script type="text/javascript">
            $(document).ready(function() {
                // notify('{{ session()->get('success') }}','success');
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: '{{ Session::get('success') }}',
                    showConfirmButton: false,
                    timer: 1500
                })
            });
        </script>
    @endif
@endsection

@push('css')
@endpush

@push('datatableJS')

@endpush

@push('script')

@endpush
