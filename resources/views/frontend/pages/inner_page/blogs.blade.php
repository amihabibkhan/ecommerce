@extends('frontend.layouts.inner_layout')

@section('page_title')ব্লগ@endsection

@section('inner_content')

    <!-- Start Left Sidebar Area -->
    <div class="left-sidebar-area ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="widget-sidebar">
                        <div class="sidebar-widget search">
                            <form class="search-form">
                                <input class="form-control" name="search" placeholder="খুজুন" type="text">
                                <button class="search-button" type="submit">
                                    <i class="bx bx-search"></i>
                                </button>
                            </form>
                        </div>

                        <div class="sidebar-widget categories">
                            <h3>ক্যাটাগরি সমূহ</h3>

                            <ul>
                                <li>
                                    <a href="#">শিক্ষা</a>
                                </li>
                                <li>
                                    <a href="#">সাহিত্য</a>
                                </li>
                                <li>
                                    <a href="#">সংস্কৃতি</a>
                                </li>
                                <li>
                                    <a href="#">অনলাইন</a>
                                </li>
                                <li>
                                    <a href="#">লেখক কথা</a>
                                </li>
                                <li>
                                    <a href="#">ভর্তি পরীক্ষা</a>
                                </li>
                                <li>
                                    <a href="#">পরিসেবা</a>
                                </li>
                                <li>
                                    <a href="#">গ্রাজুয়েশন</a>
                                </li>
                            </ul>
                        </div>

                        <div class="sidebar-widget popular-post">
                            <h3 class="widget-title">জনপ্রিয় পোস্ট গুলো</h3>

                            <div class="post-wrap">

                                <div class="item">
                                    <a href="{{ route('blog_details') }}" class="thumb">
                                        <span class="fullimage cover" style="background-image: url({{ asset('frontend/img/single-blog/popular-img-1.jpg') }})" role="img"></span>
                                    </a>

                                    <div class="info">
                                        <h4 class="title">
                                            <a href="{{ route('blog_details') }}">সকাল থেকে সন্ধ্যা পর্যন্ত বৃষ্টি, সকাল থেকে সন্ধ্যা পর্যন্ত বৃষ্টি</a>

                                            <span class="date">২০-০৭-২০২০</span>
                                        </h4>
                                    </div>
                                </div>

                                <div class="item">
                                    <a href="{{ route('blog_details') }}" class="thumb">
                                        <span class="fullimage cover" style="background-image: url({{ asset('frontend/img/single-blog/popular-img-2.jpg') }})" role="img"></span>
                                    </a>

                                    <div class="info">
                                        <h4 class="title">
                                            <a href="{{ route('blog_details') }}">সকাল থেকে সন্ধ্যা পর্যন্ত বৃষ্টি, সকাল থেকে সন্ধ্যা পর্যন্ত বৃষ্টি</a>

                                            <span class="date">২০-০৭-২০২০</span>
                                        </h4>
                                    </div>
                                </div>

                                <div class="item">
                                    <a href="{{ route('blog_details') }}" class="thumb">
                                        <span class="fullimage cover" style="background-image: url({{ asset('frontend/img/single-blog/popular-img-3.jpg') }})" role="img"></span>
                                    </a>

                                    <div class="info">
                                        <h4 class="title">
                                            <a href="{{ route('blog_details') }}">সকাল থেকে সন্ধ্যা পর্যন্ত বৃষ্টি, সকাল থেকে সন্ধ্যা পর্যন্ত বৃষ্টি</a>

                                            <span class="date">২০-০৭-২০২০</span>
                                        </h4>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="sidebar-widget tags">
                            <h3>ট্যাগ</h3>

                            <ul>
                                <li>
                                    <a href="#">শিক্ষা</a>
                                </li>
                                <li>
                                    <a href="#">প্রতিষ্ঠান</a>
                                </li>
                                <li>
                                    <a href="#">বিশ্ববিদ্যালয়</a>
                                </li>
                                <li>
                                    <a href="#">গণিত</a>
                                </li>
                                <li>
                                    <a href="#">ডিজাইন</a>
                                </li>
                                <li>
                                    <a href="#">প্রশিক্ষণ</a>
                                </li>
                                <li>
                                    <a href="#">সাধারণ</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-8">
                    <div class="row">


                        <div class="col-lg-6 col-md-6">
                            <div class="single-news">
                                <a href="{{ route('blog_details') }}">
                                    <img src="{{ asset('frontend') }}/img/news-img/news-img-1.jpg" alt="Image">
                                </a>

                                <div class="news-content">
                                    <span class="tag">গবেষণা</span>

                                    <a href="{{ route('blog_details') }}">
                                        <h3>এটি একটি গবেষণা পত্র শুরু হলো যা একটি ডেমো টেক্সট </h3>
                                    </a>

                                    <p>এ পর্যন্ত অনেক মানুষ রিসার্চে অংশ গ্রহণ করলেও গবেষণার কাজ খুব একটা না আগানোর কারণে আমরা কিছুই বুঝতে পারতেছি না।</p>

                                    <ul class="lessons">
                                        <li><a href="#">এডমিন</a></li>
                                        <li class="float">১৩/০৭/২০২০</li>
                                    </ul>
                                </div>
                            </div>
                        </div>


                        <div class="col-lg-6 col-md-6">
                            <div class="single-news">
                                <a href="{{ route('blog_details') }}">
                                    <img src="{{ asset('frontend') }}/img/news-img/news-img-1.jpg" alt="Image">
                                </a>

                                <div class="news-content">
                                    <span class="tag">গবেষণা</span>

                                    <a href="{{ route('blog_details') }}">
                                        <h3>এটি একটি গবেষণা পত্র শুরু হলো যা একটি ডেমো টেক্সট </h3>
                                    </a>

                                    <p>এ পর্যন্ত অনেক মানুষ রিসার্চে অংশ গ্রহণ করলেও গবেষণার কাজ খুব একটা না আগানোর কারণে আমরা কিছুই বুঝতে পারতেছি না।</p>

                                    <ul class="lessons">
                                        <li><a href="#">এডমিন</a></li>
                                        <li class="float">১৩/০৭/২০২০</li>
                                    </ul>
                                </div>
                            </div>
                        </div>


                        <div class="col-lg-6 col-md-6">
                            <div class="single-news">
                                <a href="{{ route('blog_details') }}">
                                    <img src="{{ asset('frontend') }}/img/news-img/news-img-1.jpg" alt="Image">
                                </a>

                                <div class="news-content">
                                    <span class="tag">গবেষণা</span>

                                    <a href="{{ route('blog_details') }}">
                                        <h3>এটি একটি গবেষণা পত্র শুরু হলো যা একটি ডেমো টেক্সট </h3>
                                    </a>

                                    <p>এ পর্যন্ত অনেক মানুষ রিসার্চে অংশ গ্রহণ করলেও গবেষণার কাজ খুব একটা না আগানোর কারণে আমরা কিছুই বুঝতে পারতেছি না।</p>

                                    <ul class="lessons">
                                        <li><a href="#">এডমিন</a></li>
                                        <li class="float">১৩/০৭/২০২০</li>
                                    </ul>
                                </div>
                            </div>
                        </div>


                        <div class="col-lg-6 col-md-6">
                            <div class="single-news">
                                <a href="{{ route('blog_details') }}">
                                    <img src="{{ asset('frontend') }}/img/news-img/news-img-1.jpg" alt="Image">
                                </a>

                                <div class="news-content">
                                    <span class="tag">গবেষণা</span>

                                    <a href="{{ route('blog_details') }}">
                                        <h3>এটি একটি গবেষণা পত্র শুরু হলো যা একটি ডেমো টেক্সট </h3>
                                    </a>

                                    <p>এ পর্যন্ত অনেক মানুষ রিসার্চে অংশ গ্রহণ করলেও গবেষণার কাজ খুব একটা না আগানোর কারণে আমরা কিছুই বুঝতে পারতেছি না।</p>

                                    <ul class="lessons">
                                        <li><a href="#">এডমিন</a></li>
                                        <li class="float">১৩/০৭/২০২০</li>
                                    </ul>
                                </div>
                            </div>
                        </div>


                        <div class="col-lg-6 col-md-6">
                            <div class="single-news">
                                <a href="{{ route('blog_details') }}">
                                    <img src="{{ asset('frontend') }}/img/news-img/news-img-1.jpg" alt="Image">
                                </a>

                                <div class="news-content">
                                    <span class="tag">গবেষণা</span>

                                    <a href="{{ route('blog_details') }}">
                                        <h3>এটি একটি গবেষণা পত্র শুরু হলো যা একটি ডেমো টেক্সট </h3>
                                    </a>

                                    <p>এ পর্যন্ত অনেক মানুষ রিসার্চে অংশ গ্রহণ করলেও গবেষণার কাজ খুব একটা না আগানোর কারণে আমরা কিছুই বুঝতে পারতেছি না।</p>

                                    <ul class="lessons">
                                        <li><a href="#">এডমিন</a></li>
                                        <li class="float">১৩/০৭/২০২০</li>
                                    </ul>
                                </div>
                            </div>
                        </div>


                        <div class="col-lg-6 col-md-6">
                            <div class="single-news">
                                <a href="{{ route('blog_details') }}">
                                    <img src="{{ asset('frontend') }}/img/news-img/news-img-1.jpg" alt="Image">
                                </a>

                                <div class="news-content">
                                    <span class="tag">গবেষণা</span>

                                    <a href="{{ route('blog_details') }}">
                                        <h3>এটি একটি গবেষণা পত্র শুরু হলো যা একটি ডেমো টেক্সট </h3>
                                    </a>

                                    <p>এ পর্যন্ত অনেক মানুষ রিসার্চে অংশ গ্রহণ করলেও গবেষণার কাজ খুব একটা না আগানোর কারণে আমরা কিছুই বুঝতে পারতেছি না।</p>

                                    <ul class="lessons">
                                        <li><a href="#">এডমিন</a></li>
                                        <li class="float">১৩/০৭/২০২০</li>
                                    </ul>
                                </div>
                            </div>
                        </div>


                        <div class="col-lg-12 col-md-12">
                            <div class="pagination-area">
                                <!--
                                <a href="#" class="prev page-numbers">
                                    <i class="bx bx-chevron-left"></i>
                                </a>
                                -->
                                <span class="page-numbers current" aria-current="page">1</span>
                                <a href="#" class="page-numbers">2</a>
                                <a href="#" class="page-numbers">3</a>
                                <a href="#" class="page-numbers">4</a>

                                <a href="#" class="next page-numbers">
                                    <i class="bx bx-chevron-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Left Sidebar Area -->

@endsection
