<section id="works" class="my-5">
    <div class="services-content wrapper mt-5">
        <h4 class="text-center">{{ get_static_option('how_we_work_title') }}</h4>
        <div class="d-flex justify-content-center align-items-center">
            <div class="line"></div>
        </div>
        <div class="container">
            <p class="text-center mt-3 text-muted">{{ get_static_option('how_we_work_description') }}</p>
        </div>
    </div>
    <div class="container section-margin">
        <div class="row row-cols-1 row-cols-md-3 g-4 pb-2">
            @foreach ($weWorks as $weWork)
            <div class="col">
                <div class="h-100 p-3 mx-auto card-width">
                    <div class=" card-top-img d-flex justify-content-center align-items-center ">
                        <div class="num d-flex justify-content-center align-items-center">
                            {{ $loop->iteration }}
                        </div>
                    </div>
                    <div class="card-body text-center">
                        <h5 class="card-title mb-3 fw-bold step">{{ $weWork->title }}</h5>
                        <p class="card-text text-muted">{{ $weWork->description }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
