<!DOCTYPE html>
<html>

<head>
    @include('RapidPCRCenterAdministrator.layouts.includes.head')
</head>


<body class="fixed-left">
    @if(Auth::check())
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
    @endif

    @include('RapidPCRCenterAdministrator.layouts.includes.navbar')
    <div>
        @yield('content')
    </div>

    @include('RapidPCRCenterAdministrator.layouts.includes.footer')

    @include('RapidPCRCenterAdministrator.layouts.includes.foot')
</body>

</html>
