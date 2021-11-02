<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title> @stack('title') |  {{ config('app.name') }}</title>

<link rel="shortcut icon" href=" {{ asset('assets/super-admin/images/favicon.ico') }}">
<link rel="stylesheet" href="{{ asset('assets/center-part/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/center-part/css/style.css') }}">
<link rel="stylesheet" href="{{ asset('assets/center-part/css/header.css') }}">
<link rel="stylesheet" href="{{ asset('assets/center-part/css/footer.css') }}">
<link rel="stylesheet" href="{{ asset('assets/center-part/css/account_12.css') }}">
<link rel="stylesheet" href="{{ asset('assets/center-part/css/accordion_table_16.css') }}">
<link rel="stylesheet" href="{{ asset('assets/center-part/css/new_registration_38.css') }}">
<link rel="stylesheet" href="{{ asset('assets/center-part/css/result-publish-tab.css') }}">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
{{-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous"> --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">



@stack('datatableCSS')

<link href=" {{ asset('assets/super-admin/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
<link href=" {{ asset('assets/super-admin/css/icons.css') }}" rel="stylesheet" type="text/css">
<link href=" {{ asset('assets/super-admin/css/style.css') }}" rel="stylesheet" type="text/css">

@stack('css')
