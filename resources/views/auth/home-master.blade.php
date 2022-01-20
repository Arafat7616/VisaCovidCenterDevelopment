<!DOCTYPE html>
<html>

    <head>
        @include('auth.includes.landing.head')
    </head>

    <body>
        @if (Auth::check())
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        @endif

        @yield('content')

  
        @include('auth.includes.landing.foot')
    </body>

</html>
