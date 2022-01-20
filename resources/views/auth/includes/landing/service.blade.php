<section id="services" class="my-3">
    <div class="services-content wrapper mt-5">
        <h4 class="text-center">{{ get_static_option('service_title') }}</h4>
        <div class="d-flex justify-content-center align-items-center">
            <div class="line"></div>
        </div>
        <div class="container">
            <p class="text-center mt-3 text-muted">
                {{ get_static_option('service_description') }}
            </p>
        </div>
    </div>

    <div class="container section-margin">
        <div class="row row-cols-1 row-cols-md-4 g-4 pb-2">
            @foreach ($services as $service)
                <div class="col">
                    <div class="card h-100 p-3 mx-auto card-width">
                        <div class=" card-top-img d-flex justify-content-center align-items-center ">
                            <img src="{{ asset($service->image ?? get_static_option('no_image')) }}" class="card-img-top img-fluid card-icon my-3" alt="..." />
                        </div>

                        <div class="card-body text-center">
                            <h5 class="card-title mb-3 fw-bold">{{ $service->title }}</h5>
                            <p class="card-text text-muted">{{ $service->description }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>