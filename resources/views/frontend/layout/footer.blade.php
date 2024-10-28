
<!-- Start Footer Top Area -->
<footer class="footer-top-area pt-100 pb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="footer-widget">
                    <h3>যোগাযোগ</h3>

                    <ul class="address">
                        <li class="location">
                            <i class="bx bx-home-alt"></i>
                            {{ get_option('address') }}
                        </li>

                        <li>
                            <i class="bx bxs-envelope"></i>
                            <a href="mailto:{{ get_option('email_1') }}">{{ get_option('email_1') }}</a>
                            <a href="mailto:{{ get_option('email_2') }}">{{ get_option('email_2') }}</a>
                        </li>

                        <li>
                            <i class="bx bxs-phone-call"></i>
                            <a href="tel:{{ get_option('phone_1') }}">{{ get_option('phone_1') }}</a>
                            <a href="tel:{{ get_option('phone_2') }}">{{ get_option('phone_2') }}</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6">
                <div class="footer-widget">
                    <h3>গুরত্বপূর্ণ লিংক</h3>

                    <ul class="link">
                        <li>
                            <a href="{{ route('frontend.bookShop') }}">সকল বই</a>
                        </li>
                        <li>
                            <a href="{{ route('frontend.allWriters') }}">লেখক তালিকা</a>
                        </li>
                        <li>
                            <a href="#">প্রশ্নোত্তর</a>
                        </li>
                        <li>
                            <a href="#">নিয়মাবলি</a>
                        </li>
                        <li>
                            <a href="#">প্রাইভেসি পলেসি</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6">
                <div class="footer-widget">
                    <h3>জনপ্রিয় বই গুলো</h3>

                    <ul class="link">
                        <li>
                            <a href="#">সকাল থেকে সন্ধ্যা</a>
                        </li>
                        <li>
                            <a href="#">তোমার পথে জীবন দেব</a>
                        </li>
                        <li>
                            <a href="#">প্রভু তোমার রাহে</a>
                        </li>
                        <li>
                            <a href="#">সুবহে সাদিক পানে</a>
                        </li>
                        <li>
                            <a href="#">সেই যে ভোরের আলো</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6">
                <div class="footer-widget">
                    <h3>জনপ্রিয় লেখক</h3>

                    <ul class="link">
                        <li>
                            <a href="#">মুজাজ্জাজ নাঈম</a>
                        </li>
                        <li>
                            <a href="#">রুহুল আমিন</a>
                        </li>
                        <li>
                            <a href="#">তানভীর মাহতাব</a>
                        </li>
                        <li>
                            <a href="#">ফারহান সরকার</a>
                        </li>
                        <li>
                            <a href="#">ইসমাঈল খান</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- End Footer Top Area -->

<!-- Start Footer Bottom Area -->
<footer class="footer-bottom-area">
    <div class="container">
        <div class="copyright-wrap">
            <p>ফালাস্তিন &copy; ২০২৪ | ডেভেলপড বাই <a href="www.innovait.com.bd" target="_blank">ইনোভা আইটি</a></p>
        </div>
    </div>
</footer>
<!-- End Footer Bottom Area -->

<!-- Start Go Top Area -->
<div class="go-top">
    <i class='bx bx-chevrons-up'></i>
    <i class='bx bx-chevrons-up'></i>
</div>
<!-- End Go Top Area -->


<!-- Jquery-3.5.1.Slim.Min.JS -->
<script src="{{ asset('frontend') }}/js/jquery-3.5.1.slim.min.js"></script>
<!-- Popper JS -->
<script src="{{ asset('frontend') }}/js/popper.min.js"></script>
<!-- Bootstrap JS -->
<script src="{{ asset('frontend') }}/js/bootstrap.min.js"></script>
<!-- Meanmenu JS -->
<script src="{{ asset('frontend') }}/js/jquery.meanmenu.js"></script>
<!-- Wow JS -->
<script src="{{ asset('frontend') }}/js/wow.min.js"></script>
<!-- Owl Carousel JS -->
<script src="{{ asset('frontend') }}/js/owl.carousel.js"></script>
<!-- Owl Magnific JS -->
<script src="{{ asset('frontend') }}/js/jquery.magnific-popup.min.js"></script>
<!-- Nice Select JS -->
<script src="{{ asset('frontend') }}/js/jquery.nice-select.min.js"></script>
<!-- Parallax JS -->
<script src="{{ asset('frontend') }}/js/parallax.min.js"></script>
<!-- Appear JS -->
<script src="{{ asset('frontend') }}/js/jquery.appear.js"></script>
<!-- Odometer JS -->
<script src="{{ asset('frontend') }}/js/odometer.min.js"></script>
<!-- Form Validator JS -->
<script src="{{ asset('frontend') }}/js/form-validator.min.js"></script>
<!-- Contact JS -->
<script src="{{ asset('frontend') }}/js/contact-form-script.js"></script>
<!-- Ajaxchimp JS -->
<script src="{{ asset('frontend') }}/js/jquery.ajaxchimp.min.js"></script>
<!-- Custom JS -->
<script src="{{ asset('frontend') }}/js/custom.js"></script>
