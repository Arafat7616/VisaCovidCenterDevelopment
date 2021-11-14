<!DOCTYPE html>
<html>

<head>
    @include('ImmigrationOfficer.layouts.includes.head')
</head>


<body class="fixed-left">
    @if(Auth::check())
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
    @endif

    @include('ImmigrationOfficer.layouts.includes.navbar')
    <div>
        @yield('content')
    </div>

    @include('ImmigrationOfficer\layouts\includes\footer')

    @include('ImmigrationOfficer.layouts.includes.foot')
</body>

</html>
