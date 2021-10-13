@extends('SuperAdmin.layouts.master')

@push('title')
    Payment Method List
@endpush


@section('content')
    <div class="content">
        <div class="container">

            <div class="row">
                <div class="col-sm-12">
                    <div class="page-header-title">
                        <h4 class="pull-left page-title">All Payment Methods</h4>
                        <ol class="breadcrumb pull-right">
                            <li><a href="{{route('superAdmin.dashboard')}}">Dashboard</a></li>
                            <li class="active">All Payment Methods</li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>

            <div class="row m-b-15">
                <div class="col-sm-12">
                    <a class="btn btn-primary" href="{{route('superAdmin.payment.create')}}"><i class="fa fa-plus"></i> Create New Payment Method</a>
                </div>
            </div>


            <div class="row">
                <div class="col-sm-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">All Payment Method Table</h3>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-xs-12">
                                    <table id="datatable-buttons" class="table table-striped table-bordered">
                                        <thead>
                                        <tr>
                                            <th>#SL</th>
                                            <th>Name</th>
                                            <th>Image</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>

                                        </thead>
                                        <tbody>
                                        @foreach($paymentMethods as $paymentMethod)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{$paymentMethod->name}}</td>
                                                <td><img src="{{asset($paymentMethod->image)}}" alt="category Image" style="width: 110px;"></td>
                                                <td><span class="label {{$paymentMethod->status ? 'label-success':'label-warning'}}">{{$paymentMethod->status ? 'Active':'Inactive'}}</span></td>
                                                <td>
                                                    <a href="{{route('superAdmin.payment.edit', $paymentMethod->id)}}" class="btn btn-success"><i class="fa fa-edit"></i></a>
                                                    {{--<button class="btn btn-danger" type="button" onclick="delete_function({{$paymentMethod->id}})">
                                                        <i class="fa fa-trash-o"></i>
                                                    </button>--}}

                                                    <button class="btn btn-danger" onclick="delete_function(this)"
                                                            value="{{ route('superAdmin.payment.destroy', $paymentMethod) }}"><i
                                                            class="fa fa-trash"></i> </button>
                                                   {{-- <form id="delete_from_{{$paymentMethod->id}}" style="display: none" action="{{route('superAdmin.payment.destroy', $paymentMethod->id)}}" method="post">
                                                        @csrf
                                                        @method('delete')
                                                    </form>--}}

                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('css')
@endpush

@push('script')

    {{--<script type="text/javascript">
        function deletePaymentMethod(id)
        {
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            })
            swalWithBootstrapButtons.fire({
                title: 'Are you sure?',
                text: "You won't be able to delete this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    event.preventDefault();
                    document.getElementById('delete_from_'+id).submit();
                    swalWithBootstrapButtons.fire(
                        'Deleted!',
                        'Your data has been deleted',
                        'success'
                    )
                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                        'Cancelled',
                        'Your data is safe :)',
                        'error'
                    )
                }
            })
        }
    </script>--}}
@endpush
