<!DOCTYPE html>
<html>

<head>
    @include('Receptionist.layouts.includes.head')
</head>


<body class="fixed-left">
    @if(Auth::check())
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
    @endif

    @include('Receptionist.layouts.includes.navbar')
    <div>
        @yield('content')
    </div>

    @include('Receptionist.layouts.includes.footer')

    @include('Receptionist.layouts.includes.foot')
</body>

</html>
