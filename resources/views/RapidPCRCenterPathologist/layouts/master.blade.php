<!DOCTYPE html>
<html>

<head>
    @include('RapidPCRCenterPathologist.layouts.includes.head')
</head>


<body class="fixed-left">
    @if(Auth::check())
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
    @endif

    @include('RapidPCRCenterPathologist.layouts.includes.navbar')
    <div>
        @yield('content')
    </div>

    @include('RapidPCRCenterPathologist.layouts.includes.footer')

    @include('RapidPCRCenterPathologist.layouts.includes.foot')
</body>

</html>
