@extends('frontend.layouts.inner_layout')

@section('page_title')যোগাযোগ@endsection

@section('inner_content')

    <!-- Start Contact Info Area -->
    <section class="contact-info-area pt-100 pb-70">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-sm-6">
                    <div class="single-contact-info">
                        <i class="flaticon-call"></i>
                        <h3>আমাদেরকে ফোন করুন</h3>
                        <a href="tel:+1(514)312-5678">ফোন :+1 (514) 312-5678</a>
                        <a href="tel:+1(514)312-6688">টেলিফোন :+1 (514) 312-6688</a>
                    </div>
                </div>

                <div class="col-lg-4 col-sm-6">
                    <div class="single-contact-info">
                        <i class="flaticon-pin"></i>
                        <h3>আমাদের অফিস</h3>
                        <a href="#">২২৫, এলিফ্যান্ট রোড, কাটাবন, ঢাকা - ১২০৫</a>
                    </div>
                </div>

                <div class="col-lg-4 col-sm-6 offset-sm-3 offset-lg-0">
                    <div class="single-contact-info">
                        <i class="flaticon-email"></i>
                        <h3>ই-মেইল করুন</h3>
                        <a href="mailto:hello@eduon.com">hello@eduon.com</a>
                        <a href="mailto:public@eduon.com">public@eduon.com</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Contact Info Area -->

    <!-- Start Contact Area -->
    <section class="main-contact-area pb-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="contact-wrap contact-pages mb-0">
                        <div class="contact-form">
                            <div class="section-title">
                                <h2>আমাদেরকে লিখুন</h2>
                                <p>যে কোন মন্তব্য বা পরামর্শের জন্য আমাদেরকে লিখুন।<br> জিঞ্জাসা, মন্তব্য, পরামর্শ।</p>

                            </div>
                            <form id="contactForm">
                                <div class="row">
                                    <div class="col-lg-6 col-sm-6">
                                        <div class="form-group">
                                            <label>আপনার নাম</label>
                                            <input type="text" name="name" id="name" class="form-control" required data-error="Please enter your name">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-sm-6">
                                        <div class="form-group">
                                            <label>ই-মেইল এড্রেস</label>
                                            <input type="email" name="email" id="email" class="form-control" required data-error="Please enter your email">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>বিষয়</label>
                                            <input type="text" name="msg_subject" id="msg_subject" class="form-control" required data-error="Please enter your subject">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>বিস্তারিত</label>
                                            <textarea name="message" class="form-control" id="message" cols="30" rows="10" required data-error="Write your message"></textarea>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12">
                                        <button type="submit" class="default-btn btn-two">
                                            পাঠিয়ে দিন
                                        </button>
                                        <div id="msgSubmit" class="h3 text-center hidden"></div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Contact Area -->

@endsection
