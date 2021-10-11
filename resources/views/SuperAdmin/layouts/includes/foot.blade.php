<!-- Start JS -->
<script src="{{ asset('public/assets/super-admin/js/jquery.min.js') }}"></script>
<script src="{{ asset('public/assets/super-admin/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('public/assets/super-admin/js/modernizr.min.js') }}"></script>
<script src="{{ asset('public/assets/super-admin/js/detect.js') }}"></script>
<script src="{{ asset('public/assets/super-admin/js/fastclick.js') }}"></script>
<script src="{{ asset('public/assets/super-admin/js/jquery.slimscroll.js') }}"></script>
<script src="{{ asset('public/assets/super-admin/js/jquery.blockUI.js') }}"></script>
<script src="{{ asset('public/assets/super-admin/js/waves.js') }}"></script>
<script src="{{ asset('public/assets/super-admin/js/wow.min.js') }}"></script>
<script src="{{ asset('public/assets/super-admin/js/jquery.nicescroll.js') }}"></script>
<script src="{{ asset('public/assets/super-admin/js/jquery.scrollTo.min.js') }}"></script>

<script src="{{ asset('public/assets/super-admin/plugins/jquery-sparkline/jquery.sparkline.min.js') }}"></script>

<!-- Datatables-->
<script src="{{ asset('public/assets/super-admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('public/assets/super-admin/plugins/datatables/dataTables.bootstrap.js') }}"></script>
<script src="{{ asset('public/assets/super-admin/plugins/datatables/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('public/assets/super-admin/plugins/datatables/responsive.bootstrap.min.js') }}"></script>

<script src="{{ asset('public/assets/super-admin/pages/dashborad.js') }}"></script>

<script src="{{ asset('public/assets/super-admin/js/app.js') }}"></script>

<!-- End JS -->

<script src="{{ asset('assets/helper.js') }}"></script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
@include('sweetalert::alert')

@stack('script')
