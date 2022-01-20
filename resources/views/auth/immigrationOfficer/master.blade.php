<!DOCTYPE html>
<html>

    <head>
        @include('auth.immigrationOfficer.includes.head')
    </head>

    <body>
        @if (Auth::check())
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        @endif
        @yield('content')

        @include('auth.immigrationOfficer.includes.foot')
    </body>

</html>
