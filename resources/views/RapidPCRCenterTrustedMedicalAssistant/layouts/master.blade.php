<!DOCTYPE html>
<html>

<head>
    @include('RapidPCRCenterTrustedMedicalAssistant.layouts.includes.head')
</head>


<body class="fixed-left">
    @if(Auth::check())
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
    @endif

    @include('RapidPCRCenterTrustedMedicalAssistant.layouts.includes.navbar')
    <div>
        @yield('content')
    </div>

    @include('RapidPCRCenterTrustedMedicalAssistant.layouts.includes.footer')

    @include('RapidPCRCenterTrustedMedicalAssistant.layouts.includes.foot')
</body>

</html>
