<footer id="footer" class="footer-section">
    <div class="footer py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4 class="text-light">{{ config('app.name') }}</h4>
                    <h5 class="text-light mt-1">{{ get_static_option('app_moto') }}</h5>
                    <p class="text-light mt-3">{{ get_static_option('footer_details') }}</p>
                </div>
            </div>

            <div class="row my-5">

                <div class="col-md-3 text-center mb-3">

                    <ul class="footer-links">
                        <h5 class="text-light mb-3">Links</h5>
                        <li><a href="{{ route('login') }}" class="footer-link text-light">Immigration portal</a></li>
                        <li class="my-3"><a href="{{ route('login') }}" class="footer-link text-light">Government portal</a></li>
                        <li class="my-3"><a href="{{ route('login') }}" class="footer-link text-light">Medical Center Administrator</a></li>
                        <li><a target="_blank" href="{{ get_static_option('download_btn_link') }}" class="footer-link text-light">Download App</a></li>
                    </ul>
                </div>
                <div class="col-md-3 mb-3">
                    <h5 class="text-light text-center mb-3">Contact us</h5>
                    <div class="icons text-center mt-3">
                        <a target="_blank" href="{{ get_static_option('app_facebook_link') }}"><i class="fab fa-facebook  bg-light p-2 rounded"></i></a>
                        <a target="_blank" href="{{ get_static_option('app_linkedin_link') }}" class="mx-3"><i class="fab fa-linkedin  p-2 bg-light rounded"></i></a>
                        <a target="_blank" href="mailto:{{ get_static_option('app_mail_address') }}"><i class="fas fa-envelope-square  bg-light p-2 rounded"></i></a>
                    </div>
                </div>
                <div class="col-md-6 text-center">
                    <h5 class="text-light mb-3">Subscribe</h5>
                    <div class="input-group mb-3 form-width mx-auto">
                        <input type="email" class="form-control " placeholder="Your Email" aria-label="Recipient's username" aria-describedby="basic-addon2">
                        <span class="input-group-text" id="basic-addon2"><a href="#"><i class="fas fa-arrow-right"></i></a></span>
                    </div>
                </div>

            </div>

            <div class="row text-center text-light">
                <div>
                    &copy;
                    <span id="copyright">
                        <script>
                            document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))

                        </script>
                    </span>
                    |<a style="text-decoration: none;" class="text-white" target="_blank" href="https://www.tfpbd.com/"> TFP Solution Limited, Bangladesh.</a>
                </div>
            </div>
        </div>
    </div>
</footer>>