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
    <div class="d-flex align-items-start">
        @include('ImmigrationOfficer.layouts.includes.navbar')
        @yield('content')
    </div>
    @include('ImmigrationOfficer.layouts.includes.foot')
</body>

</html>
