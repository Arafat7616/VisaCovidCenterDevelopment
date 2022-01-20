<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">

<meta name="csrf-token" content="{{ csrf_token() }}">

<link rel="shortcut icon" href="{{ asset(get_static_option('favicon') ?? get_static_option('no_image')) }}">

<link rel="stylesheet" href="{{ asset('assets/center-part/css/bootstrap.min.css') }}">

<link rel="stylesheet" href="{{ asset('assets/bd-govt/css/style.css') }}">
<link rel="stylesheet" href="{{ asset('assets/bd-govt/css/login.css') }}">




<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<title> @stack('title') |  {{ config('app.name') }}</title>

@stack('css')
