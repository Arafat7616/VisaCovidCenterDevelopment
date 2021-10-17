<!DOCTYPE html>
<html>

<head>
    @include('Volunteer.layouts.includes.head')
</head>


<body class="fixed-left">
    @if(Auth::check())
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
    @endif

    @include('Volunteer.layouts.includes.navbar')
    <div>
        @yield('content')
    </div>

    @include('Volunteer\layouts\includes\footer')

    @include('Volunteer.layouts.includes.foot')
</body>

</html>
