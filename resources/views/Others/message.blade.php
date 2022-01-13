@if ($errors->any())
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li style="line-height: 42px;" >{{ $error }}</li>
            @endforeach
        </ul>
        {{-- <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button> --}}
    </div>
@endif

@if(Session::has('message'))
@include('Others.toaster_message')
@endif

{{-- @if(Session::has('message'))
    <div class="alert alert-success" role="alert">
        {{ Session::get('message') }}
    </div>
@endif --}}