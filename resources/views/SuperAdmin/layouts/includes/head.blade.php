<meta charset="utf-8" />
<title> @stack('title') |  {{ config('app.name') }}</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta content="Admin Dashboard" name="description" />
<meta content="ThemeDesign" name="author" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />

<link rel="shortcut icon" href=" {{ asset('assets/super-admin/images/favicon.ico') }}">

<!-- DataTables -->
<link href=" {{ asset('assets/super-admin/plugins/datatables/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css" />
<link href=" {{ asset('assets/super-admin/plugins/datatables/responsive.bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
<link href=" {{ asset('assets/super-admin/plugins/datatables/dataTables.bootstrap.min.css') }}" rel="stylesheet" type="text/css"/>


<link href=" {{ asset('assets/super-admin/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
<link href=" {{ asset('assets/super-admin/css/icons.css') }}" rel="stylesheet" type="text/css">
<link href=" {{ asset('assets/super-admin/css/style.css') }}" rel="stylesheet" type="text/css">

@stack('css')
