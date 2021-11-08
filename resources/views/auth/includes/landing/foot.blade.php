<!-- Start JS -->
<script src="{{ asset('assets/center-part/js/bootstrap.bundle.min.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="{{ asset('assets/center-part/js/landing-page.js') }}"></script>
<!-- End JS -->

<script src="{{ asset('assets/helper.js') }}"></script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
@include('sweetalert::alert')
{{-- @include('Others.sweetalert-js'); --}}

@stack('datatables')
@stack('script')
