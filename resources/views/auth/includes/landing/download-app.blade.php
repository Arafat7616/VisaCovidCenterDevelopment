<section class="section-margin">
    <div class="container">
        <div class="row bg-primary row-border">
            <div class="col-md-3 d-flex justify-content-center align-items-center">
                <img src="{{ asset(get_static_option('download_image') ?? 'assets/center-part/image/landing/app.png') }}" class="img-fluid app-logo" alt="" />
            </div>
            <div class="col-md-6 d-flex justify-content-center align-items-center">
                <div class="text-light">
                    <h1 class="info">{{ get_static_option('download_highlight') }}</h1>
                    <h1 class="info">{{ get_static_option('download_title') }}</h1>
                </div>
            </div>
            <div class="col-md-3 d-flex justify-content-center align-items-center">
                <a target="_blank" href="{{ get_static_option('download_btn_link') ?? '#' }}" class="download-btn-2 my-2 text-center">Download</a>
            </div>
        </div>
    </div>
</section>