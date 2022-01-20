<!DOCTYPE html>
<html>

<head>
    @include('TrustedMedicalAssistant.layouts.includes.head')
</head>


<body class="fixed-left">
    @if(Auth::check())
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
    @endif

    @include('TrustedMedicalAssistant.layouts.includes.navbar')
    <div>
        @yield('content')
    </div>

    @include('TrustedMedicalAssistant.layouts.includes.footer')

    @include('TrustedMedicalAssistant.layouts.includes.foot')
</body>

</html>
