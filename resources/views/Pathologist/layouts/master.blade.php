<!DOCTYPE html>
<html>

<head>
    @include('Pathologist.layouts.includes.head')
</head>


<body class="fixed-left">
    @if(Auth::check())
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
    @endif

    @include('Pathologist.layouts.includes.navbar')
    <div>
        @yield('content')
    </div>

    @include('Pathologist\layouts\includes\footer')

    @include('Pathologist.layouts.includes.foot')
</body>

</html>
