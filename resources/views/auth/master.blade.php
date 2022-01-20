<!DOCTYPE html>
<html>

    <head>
        @include('auth.includes.head')
    </head>

    <body>
        @if (Auth::check())
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        @endif

        @include('auth.includes.logo-navbar')

        @yield('content')

        @include('auth.includes.footer')
        @include('auth.includes.foot')
    </body>

</html>
