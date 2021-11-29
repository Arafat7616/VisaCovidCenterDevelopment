<!DOCTYPE html>
<html>

<head>
    @include('BdGovt.layouts.includes.head')
</head>


<body class="fixed-left">
    @if(Auth::check())
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    @endif

    <!-- Begin page -->
    <div id="wrapper">

        <!-- Top Bar Start -->
        @include('BdGovt.layouts.includes.topbar')
        <!-- Top Bar End -->
        <!-- ========== Left Sidebar Start ========== -->

        @include('BdGovt.layouts.includes.navbar')
        <!-- Left Sidebar End -->

        <!-- Start right Content here -->

        <div class="content-page">
            <!-- Start content -->
            @yield('content')
            @include('BdGovt.layouts.includes.footer')
        </div>
        <!-- End Right content here -->
    </div>
    <!-- END wrapper -->
    <!-- jQuery  -->
    @include('BdGovt.layouts.includes.foot')
</body>

</html>
