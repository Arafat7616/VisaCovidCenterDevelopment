<!DOCTYPE html>
<html>

<head>
    @include('Administrator.layouts.includes.head')
</head>


<body class="fixed-left">
    @if(Auth::check())
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
    @endif

    @include('Administrator.layouts.includes.navbar')
    <div>
        @yield('content')
    </div>

    @include('Administrator.layouts.includes.footer')

    @include('Administrator.layouts.includes.foot')
</body>

</html>
