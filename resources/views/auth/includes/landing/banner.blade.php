<section id="home">
    <div class="contaner-fluid top-banner wrapper p-4">
        <div class="container">
            <div class="row">
                <div class="col-md-6 d-flex justify-content-center align-items-center">
                    <div class="left-items">
                        <h4 class="typeText">{{ get_static_option('banner_highlight') }}</h4>
                        <h2>{{ get_static_option('banner_title') }}</h2>
                        <p class="mt-3 text-muted">
                            {{ get_static_option('banner_description') }}
                        </p>
                        <div class="my-4">
                            <a target="_blank" href="{{ get_static_option('download_btn_link') ?? '#' }}" class="download-btn pulse">Download Our App</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <img src="{{ asset(get_static_option('banner_image') ?? 'assets/center-part/image/landing/banner.png') }}" alt="" class="img-fluid" />
                </div>
            </div>
        </div>
    </div>
</section>