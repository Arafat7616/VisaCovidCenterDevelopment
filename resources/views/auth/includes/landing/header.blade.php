<header class="sticky-top">
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img height="40px;" width="60px;" src="{{ asset(get_static_option('logo') ?? get_static_option('no_image')) }}" alt="logo" class="img-fluid header-logo" />
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link btn active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn" href="#services">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn" href="#works">How we work?</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle btn" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Administrator portals
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{ route('login') }}">Medical center portal</a></li>
                            <li><a class="dropdown-item" href="{{ route('login') }}">Govt. Portal</a></li>
                            <li><a class="dropdown-item" href="{{ route('login') }}">Immigration portal</a></li>
                            <li><a class="dropdown-item" href="{{ route('login') }}">Travel Agency</a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle btn" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Language
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Bangla</a></li>
                            <li><a class="dropdown-item" href="#">English</a></li>

                        </ul>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
</header>