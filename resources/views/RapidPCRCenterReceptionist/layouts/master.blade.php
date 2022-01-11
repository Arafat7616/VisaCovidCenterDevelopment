<!DOCTYPE html>
<html>

<head>
    @include('RapidPCRCenterReceptionist.layouts.includes.head')
</head>


<body class="fixed-left">
    @if(Auth::check())
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
    @endif

    @include('RapidPCRCenterReceptionist.layouts.includes.navbar')
    <div>
        @yield('content')
    </div>

    @include('RapidPCRCenterReceptionist.layouts.includes.footer')

    @include('RapidPCRCenterReceptionist.layouts.includes.foot')
</body>

</html>
