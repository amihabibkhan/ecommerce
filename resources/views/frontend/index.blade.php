@extends('frontend.layout.frontend-layout')

@section('main_content')
    <!-- Start Baanner Are -->
    <section class="my_banner">
        <img src="{{ asset('frontend') }}/img/banner-img/banner-1.jpg" style="width: 100%;" alt="">
    </section>
    <!-- End Banner Area -->

    <!-- Start Books Area -->
    <section class="teachers-area d-flex justify-content-center ebeef5-bg-color pt-100 pb-70">
        <div class="custom_container">
            <div class="section-title">
                <span>বই</span>
                <h2>আমাদের লেটেস্ট বই গুলো</h2>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-2 col-md-4 col-sm-6 col-6">
                    <div class="single-teachers">
                        <a href="#" style="padding: 0 3px">
                            <img src="{{ asset('frontend') }}/img/books/1.jpg" class="w-100" alt="Image">
                            <h3 class="mt-3">সাকিবুর রাহাত</h3>
                        </a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6 col-6">
                    <div class="single-teachers">
                        <a href="#" style="padding: 0 3px">
                            <img src="{{ asset('frontend') }}/img/books/2.jpg" class="w-100" alt="Image">
                            <h3 class="mt-3">সাকিবুর রাহাত</h3>
                        </a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6 col-6">
                    <div class="single-teachers">
                        <a href="#" style="padding: 0 3px">
                            <img src="{{ asset('frontend') }}/img/books/3.jpg" class="w-100" alt="Image">
                            <h3 class="mt-3">সাকিবুর রাহাত</h3>
                        </a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6 col-6">
                    <div class="single-teachers">
                        <a href="#" style="padding: 0 3px">
                            <img src="{{ asset('frontend') }}/img/books/4.jpg" class="w-100" alt="Image">
                            <h3 class="mt-3">সাকিবুর রাহাত</h3>
                        </a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6 col-6">
                    <div class="single-teachers">
                        <a href="#" style="padding: 0 3px">
                            <img src="{{ asset('frontend') }}/img/books/5.jpg" class="w-100" alt="Image">
                            <h3 class="mt-3">সাকিবুর রাহাত</h3>
                        </a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6 col-6">
                    <div class="single-teachers">
                        <a href="#" style="padding: 0 3px">
                            <img src="{{ asset('frontend') }}/img/books/1.jpg" class="w-100" alt="Image">
                            <h3 class="mt-3">সাকিবুর রাহাত</h3>
                        </a>
                    </div>
                </div>
            </div>
            <div class="text-center">
                <a href="#" class="default-btn">সকল বই</a>
            </div>
        </div>
    </section>
    <!-- End Books Area -->

    <!-- Start Education Area -->
    <section class="education-area " style="background-color: #e4e4e3">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-lg-6">
                    <div class="education-img pt-5 d-flex justify-content-center align-items-center text-center">
                        <img src="{{ asset('frontend') }}/img/education-img.png" alt="Image">
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="education-content ptb-100">
                        <span class="top-title">রাবেয়া খাতুন এর</span>
                        <h2>লেখক <span>হতে </span>চাই!</h2>
                        <p>তরুণ অনুবাদক আলী আহমাদ মাবরুরের এটি দ্বিতীয় অনুবাদ গ্রন্থ। গ্রন্থটি ইসলামি নৈতিকতার সেই ব্যাপকতর দৃষ্টিভঙ্গি উপস্থাপন করেছে; যা ব্যক্তিগত, ধর্মীয়, সামাজিক, অর্থনৈতিক ও রাজনৈতিক সকল দিককে আচ্ছাদিত করে। ইসলামি নৈতিকতা শুধুমাত্র </p>
                        <p> মুসলিম সমাজের জন্য সীমাবদ্ধ নয; বরং এটি মানব সমাজে ব্যাপকভাবে বিস্তৃত। ইসলাম সকল মানুষের উৎপত্তিকে একক</p>

                        <ul>
                            <li>
                                <i class="bx bx-check"></i>
                                এই মাসের বেস্ট সেলার
                            </li>
                            <li>
                                <i class="bx bx-check"></i>
                                লেখক হতে চাইলে পড়ুন
                            </li>
                            <li>
                                <i class="bx bx-check"></i>
                                অসাধরণ বাচনভঙ্গি
                            </li>
                            <li>
                                <i class="bx bx-check"></i>
                                সম্পূর্ণ অফসেট পেপার
                            </li>
                            <li>
                                <i class="bx bx-check"></i>
                                ভোর বেলার স্বপ্ন পূরণ
                            </li>
                        </ul>

                        <a href="#" class="default-btn">
                            বিস্তারিত দেখুন
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Education Area -->

    <!-- Start Achieve Area -->
    <section class="achieve-area f5f6fa-bg-color pt-100 pb-70">
        <div class="container">
            <div class="section-title">
                <h2>খুব সহজ</h2>
            </div>

            <div class="row">
                <div class="col-lg-4 col-sm-6">
                    <div class="single-achieve">
                        <div class="achieve-shape shape-1">
                            <img src="{{ asset('frontend') }}/img/achieve-shape/achieve-shape-1.png" alt="Image">
                        </div>

                        <h3>বই খুজুন</h3>
                        <p>আমাদের ওয়েবসাইটে আপনার পছন্দের বইটি খুজে বের করুন। প্রয়োজনে সার্চ অপশন ব্যবহার করুন। লেখকের নাম দিয়ে বা ক্যাটাগরি অনুযায়ীও সার্চ করতে পারবেন।</p>
                    </div>
                </div>

                <div class="col-lg-4 col-sm-6">
                    <div class="single-achieve">
                        <div class="achieve-shape shape-2">
                            <img src="{{ asset('frontend') }}/img/achieve-shape/achieve-shape-2.png" alt="Image">
                        </div>

                        <h3>অর্ডার করুন</h3>
                        <p>পছন্দের বইটি অর্ডার করে ফেলুন। অর্ডার করার আগে বইটির কিছু অংশ পড়ে নিতে পারেন। যে কোন সমস্যায় আমাদের সাথে যোগাযোগ করুন।</p>
                    </div>
                </div>

                <div class="col-lg-4 col-sm-6">
                    <div class="single-achieve">
                        <div class="achieve-shape shape-3">
                            <img src="{{ asset('frontend') }}/img/achieve-shape/achieve-shape-3.png" alt="Image">
                        </div>

                        <h3>বুঝে নিন</h3>
                        <p>অর্ডারের পর সবচেয়ে দ্রুত সময়ে আমরা চেষ্টা করব আপনার হাতে বইটি পৌছে দিতে ইনশাল্লাহ। অনলাইনে অথবা বই হাতে পেয়ে মূল্য পরিশোধ করুন।</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Achieve Area -->


    <!-- Start writer Area -->
    <section class="teachers-area ebeef5-bg-color pt-100 pb-70">
        <div class="container">
            <div class="section-title">
                <span>লেখক</span>
                <h2>আমাদের জনপ্রিয় লেখকগণ</h2>
            </div>

            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <a href="#">
                        <div class="single-teachers">
                            <img src="{{ asset('frontend') }}/img/teachers-img/teachers-img-1.jpg" alt="Image">

                            <div class="teachers-content">
                                <h3>সাকিবুর রাহাত</h3>
                                <span>কবি ও সাহিত্যিক</span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <a href="#">
                        <div class="single-teachers">
                            <img src="{{ asset('frontend') }}/img/teachers-img/teachers-img-2.jpg" alt="Image">

                            <div class="teachers-content">
                                <h3>মোহাম্মদ আব্দুল্লাহ</h3>
                                <span>লেখক ও গবেষক</span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <a href="#">
                        <div class="single-teachers">
                            <img src="{{ asset('frontend') }}/img/teachers-img/teachers-img-3.jpg" alt="Image">

                            <div class="teachers-content">
                                <h3>রুহুল আমিন</h3>
                                <span>সফটওয়্যার ইঞ্জিনিয়ার</span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <a href="#">
                        <div class="single-teachers">
                            <img src="{{ asset('frontend') }}/img/teachers-img/teachers-img-4.jpg" alt="Image">

                            <div class="teachers-content">
                                <h3>মুজাজ্জাজ নাঈম</h3>
                                <span>আলেম ও গবেষক</span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="text-center">
                <a href="#" class="default-btn">লেখকবৃন্দদের তালিকা</a>
            </div>
        </div>
    </section>
    <!-- End writer Area -->

    <!-- Start Subscribe Area -->
    <section class="subscribe-area ebeef5-bg-color ptb-100" style="background-color: rgb(245, 245, 245);">
        <div class="container">
            <div class="subscribe-wrap">
                <h2>সাবস্ক্রাইব করুন</h2>
                <p>পরবর্তী বই প্রকাশের সকল আপডেট পেতে সাবস্ক্রাইব করুন</p>

                <form class="newsletter-form" data-toggle="validator">
                    <input type="text" class="form-control" placeholder="আপনার ফোন নাম্বার দিন" name="phone" required autocomplete="off">

                    <button class="default-btn" type="submit">
                        সাবস্ক্রাইব করুন
                    </button>

                    <div id="validator-newsletter" class="form-result"></div>
                </form>
                <div class="subscribe-img">
                    <img src="{{ asset('frontend') }}/img/subscribe-img.png" alt="Image">
                </div>
            </div>
        </div>
    </section>
    <!-- End Subscribe Area -->
@endsection
