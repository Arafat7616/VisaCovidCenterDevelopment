<!DOCTYPE html>
<html>

<head>
    @include('SuperAdmin.layouts.includes.head')
</head>


<body class="fixed-left">

    <!-- Begin page -->
    <div id="wrapper">

        <!-- Top Bar Start -->
        @include('SuperAdmin.layouts.includes.topbar')
        <!-- Top Bar End -->
        <!-- ========== Left Sidebar Start ========== -->

        @include('SuperAdmin.layouts.includes.navbar')
        <!-- Left Sidebar End -->

        <!-- Start right Content here -->

        <div class="content-page">
            <!-- Start content -->
            @yield('content')
            @include('SuperAdmin\layouts\includes\footer')
        </div>
        <!-- End Right content here -->
    </div>
    <!-- END wrapper -->
    <!-- jQuery  -->
    @include('SuperAdmin.layouts.includes.foot')
</body>

</html>
