@extends('Receptionist.layouts.master')

@push('title')
    users
@endpush

@push('css')

@endpush

@section('content')
    <div class="container py-4 ">
        <div class="card page-wrapper-rg-n">
            <div class="page-wrapper-rg-np">
                <nav aria-label="">
                    <div class="row breadcrumb-new">
                        <div class="col-12">
                            <div class="search-boxn">
                                <table>
                                    <tr class="search-boxn">
                                        <td class="td_new1"><input id="searchInput" type="text"
                                                class="form-control i-new-r" placeholder="ID/Name/Phone/Email"></td>
                                        <td class="td_new3"><button class="search-new-r"><i
                                                    class="fa fa-search form-control-feedback-new"></i></button></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </nav>

                <table class="table">
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
                                    <td class="td_new">{{ $user->id }}</td>
                                    <td class="td_new">{{ $user->name }}</td>
                                    <td class="td_new">{{ $user->phone }}</td>
                                    <td class="td_new">{{ $user->email }}</td>
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
                    </div>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        $(document).ready(function() {
            $('#searchInput').keyup(function(){
                var searchInput = $(this).val();
                if (searchInput) {
                    $.ajax({
                        type: "GET",
                        url: "{{ url('receptionist/user-filter') }}/" + searchInput,
                        success: function(res) {
                            console.log(res.data.length);
                            if(res.data.length == 0){
                                $('.scroll_new_ber').html("<h2 class='text-center text-warning'>No data found !</h2>");
                            }else{
                                for (var i = 0; i < res.data.length; i++) {
                                    console.log(res.data[i]);
                                    var data;
                                    data += "<tr>";
                                    data += "<td class='td_new'>" + res.data[i].id + "</td>";
                                    data += "<td class='td_new'>" + res.data[i].name + "</td>";
                                    data += "<td class='td_new'>" + res.data[i].phone + "</td>";
                                    data += "<td class='td_new'>" + res.data[i].email + "</td>";
                                    data += "<td class='td_new'>";
                                    // data += "<a href='whatsapp://send?text="/share/user/"++"'>";
                                    data += "</a>";
                                    data += "</td>";

                                    $('.scroll_new_ber').html(data);


                                    // <tr>

                                    //     <td class="td_new">
                                    //         <a href="whatsapp://send?text={{ route('share.user', ['id' => Crypt::encrypt($user->id)]) }}">
                                    //             <img src="{{ asset('uploads/images/whatsapp.png' ?? get_static_option('no_image')) }}"
                                    //                 alt="" class="new-r-icon">
                                    //         </a>
                                    //         <a href="mailto:{{ route('share.user', ['id' => Crypt::encrypt($user->id)]) }}">
                                    //             <img src="{{ asset('uploads/images/gmail.png' ?? get_static_option('no_image')) }}"
                                    //                 alt="" class="new-r-icon">
                                    //         </a>
                                    //         <button class="btn btn-success copy-btn"
                                    //             value="{{ route('share.user', ['id' => Crypt::encrypt($user->id)]) }}">
                                    //             <i class="fa fa-copy"></i> Copy
                                    //         </button>
                                    //     </td>
                                    // </tr>
                                }
                            }


                        }
                    });
                }
            });
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
