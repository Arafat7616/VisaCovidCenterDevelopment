<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Page not found</title>
    <link rel="shortcut icon" href="{{ asset('assets/super-admin/images/favicon.ico') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<link rel="stylesheet" href="{{ asset('assets/center-part/css/bootstrap.min.css') }}">

    <style>
        /*====================== 404 page =======================*/
        .page_404 {
            padding: 40px 0;
            background: #fff;
            font-family: 'Arvo', serif;
        }

        .page_404 img {
            width: 100%;
        }

        .four_zero_four_bg {

            background-image: url(https://cdn.dribbble.com/users/285475/screenshots/2083086/dribbble_1.gif);
            height: 400px;
            background-position: center;
			/* background-repeat: no-repeat; */
        }


        .four_zero_four_bg h1 {
            font-size: 80px;
        }

        .four_zero_four_bg h3 {
            font-size: 80px;
        }

        .link_404 {
            color: #fff !important;
            padding: 10px 20px;
            background: #39ac31;
            margin: 20px 0;
            display: inline-block;
        }

        .contant_box_404 {
            margin-top: -50px;
        }

    </style>
</head>

<body>
    <section class="page_404">
        <div class="container">
            <div class="row">
                {{-- <div class="col-sm-12 "> --}}
                    <div class="col-12  text-center">
                        <div class="four_zero_four_bg">
                            <h1 class="text-center ">404</h1>
                        </div>
                        <div class="contant_box_404">
                            <h3 class="h2">
                                Look like you're lost
                            </h3>
                            <p>the page you are looking for not avaible!</p>
                            <a href="{{ url('/') }}" class="link_404">Go to Home</a>
                        </div>
					</div>
				{{-- </div> --}}
			</div>
		</div>
    </section>



    <!-- Start JS -->
    <script src="{{ asset('assets/center-part/js/bootstrap.bundle.min.js') }}"></script>
    <!-- End JS -->

    <script src="{{ asset('assets/helper.js') }}"></script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    @include('sweetalert::alert')
</body>

</html>
