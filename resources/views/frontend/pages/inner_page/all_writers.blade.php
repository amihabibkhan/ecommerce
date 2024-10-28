@extends('frontend.layouts.inner_layout')

@section('page_title')লেখক তালিকা@endsection

@section('inner_content')

    <!-- Start writer Area -->
    <section class="teachers-area ebeef5-bg-color pt-100 pb-70">
        <div class="container">
            <div class="section-title">
                <h2>আমাদের সকল লেখক</h2>
            </div>

            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <a href="{{ route('single_writer') }}">
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
                    <a href="{{ route('single_writer') }}">
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
                    <a href="{{ route('single_writer') }}">
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
                    <a href="{{ route('single_writer') }}">
                        <div class="single-teachers">
                            <img src="{{ asset('frontend') }}/img/teachers-img/teachers-img-4.jpg" alt="Image">

                            <div class="teachers-content">
                                <h3>মুজাজ্জাজ নাঈম</h3>
                                <span>আলেম ও গবেষক</span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <a href="{{ route('single_writer') }}">
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
                    <a href="{{ route('single_writer') }}">
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
                    <a href="{{ route('single_writer') }}">
                        <div class="single-teachers">
                            <img src="{{ asset('frontend') }}/img/teachers-img/teachers-img-4.jpg" alt="Image">

                            <div class="teachers-content">
                                <h3>মুজাজ্জাজ নাঈম</h3>
                                <span>আলেম ও গবেষক</span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <a href="{{ route('single_writer') }}">
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
                    <a href="{{ route('single_writer') }}">
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
                    <a href="{{ route('single_writer') }}">
                        <div class="single-teachers">
                            <img src="{{ asset('frontend') }}/img/teachers-img/teachers-img-4.jpg" alt="Image">

                            <div class="teachers-content">
                                <h3>মুজাজ্জাজ নাঈম</h3>
                                <span>আলেম ও গবেষক</span>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <a href="{{ route('single_writer') }}">
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
                    <a href="{{ route('single_writer') }}">
                        <div class="single-teachers">
                            <img src="{{ asset('frontend') }}/img/teachers-img/teachers-img-2.jpg" alt="Image">

                            <div class="teachers-content">
                                <h3>মোহাম্মদ আব্দুল্লাহ</h3>
                                <span>লেখক ও গবেষক</span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="text-center">
                <a href="#" class="default-btn">আরো দেখুন</a>
            </div>
        </div>
    </section>
    <!-- End writer Area -->

@endsection
