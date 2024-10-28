@extends('frontend.layouts.inner_layout')

@section('page_title')রুহুল আমিন@endsection

@section('inner_content')

    <style>
        .course_overview ul{
            padding-left: 10px;
            margin-bottom: 15px;
            margin-top: 15px;
        }
        .course_overview ul li{
            position: relative;
            padding-left: 35px;
            margin-bottom: 15px;
        }
        .course_overview ul li:before {
            font-family: 'Font Awesome\ 5 Free';
            content: "\f00c";
            display: inline-block;
            padding-right: 15px;
            vertical-align: middle;
            font-weight: 900;
            color: #ffb607;
        }
        .course_overview blockquote {
            background: #f9f9f9;
            border-left: 10px solid #ccc;
            margin: 1.5em 10px;
            padding: 0.5em 10px;
            quotes: "\201C""\201D""\2018""\2019";
        }
        .course_overview blockquote:before {
            color: #ccc;
            content: open-quote;
            font-size: 4em;
            line-height: 0.1em;
            margin-right: 0.25em;
            vertical-align: -0.4em;
        }
        .course_overview blockquote p {
            display: inline;
        }
        .course_overview ol {
            list-style: none;
            counter-reset: item;
        }
        .course_overview ol li {
            counter-increment: item;
            margin-bottom: 15px;
        }
        .course_overview ol li:before {
            margin-right: 15px;
            content: counter(item);
            background: #ffb607;
            color: white;
            width: 1.2em;
            text-align: center;
            display: inline-block;
            border-top-left-radius: 50%;
            border-bottom-right-radius: 50%;
        }
    </style>

    <!-- Start Single Event Area -->
    <section class="single-event-area ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 order-2 order-md-1">
                    <div class="course_overview">
                        <h2 class="text-center"><strong>রুহুল আমিন সম্পর্কে</strong></h2>
                        <p>রুহুল আমিন হাবিব একজন প্রফেশনাল ওয়েব ডেভেলপার এবং সফটওয়্যার ইঞ্জিনিয়ার। সে এই সেক্টরে প্রায় পাঁচ বছর যাবৎ কাজ করছে। পাশাপাশি সে একজন ফিল্ম ডিরেক্টর। ইতিমধ্যেই সে জাতীয় পর্যায়ে ফিল্ম এওয়ার্ড পেয়েছে।রুহুল আমিন হাবিব একজন প্রফেশনাল ওয়েব ডেভেলপার এবং সফটওয়্যার ইঞ্জিনিয়ার। সে এই সেক্টরে প্রায় পাঁচ বছর যাবৎ কাজ করছে। পাশাপাশি সে একজন ফিল্ম ডিরেক্টর। ইতিমধ্যেই সে জাতীয় পর্যায়ে ফিল্ম এওয়ার্ড পেয়েছে।রুহুল আমিন হাবিব একজন প্রফেশনাল ওয়েব ডেভেলপার এবং সফটওয়্যার ইঞ্জিনিয়ার। সে এই সেক্টরে প্রায় পাঁচ বছর যাবৎ কাজ করছে। পাশাপাশি সে একজন ফিল্ম ডিরেক্টর। ইতিমধ্যেই সে জাতীয় পর্যায়ে ফিল্ম এওয়ার্ড পেয়েছে।</p>
                        <h3>একজন ফিল্ম ডিরেক্টর</h3>
                        <p>রুহুল আমিন হাবিব একজন প্রফেশনাল ওয়েব ডেভেলপার এবং সফটওয়্যার ইঞ্জিনিয়ার। সে এই সেক্টরে প্রায় পাঁচ বছর যাবৎ কাজ করছে। পাশাপাশি সে একজন ফিল্ম ডিরেক্টর। ইতিমধ্যেই সে জাতীয় পর্যায়ে ফিল্ম এওয়ার্ড পেয়েছে।রুহুল আমিন হাবিব একজন প্রফেশনাল ওয়েব ডেভেলপার এবং সফটওয়্যার ইঞ্জিনিয়ার। সে এই সেক্টরে প্রায় পাঁচ বছর যাবৎ কাজ করছে। পাশাপাশি সে একজন ফিল্ম ডিরেক্টর। ইতিমধ্যেই সে জাতীয় পর্যায়ে ফিল্ম এওয়ার্ড পেয়েছে।রুহুল আমিন হাবিব একজন প্রফেশনাল ওয়েব ডেভেলপার এবং সফটওয়্যার ইঞ্জিনিয়ার। সে এই সেক্টরে প্রায় পাঁচ বছর যাবৎ কাজ করছে। পাশাপাশি সে একজন ফিল্ম ডিরেক্টর। ইতিমধ্যেই সে জাতীয় পর্যায়ে ফিল্ম এওয়ার্ড পেয়েছে।রুহুল আমিন হাবিব একজন প্রফেশনাল ওয়েব ডেভেলপার এবং সফটওয়্যার ইঞ্জিনিয়ার। সে এই সেক্টরে প্রায় পাঁচ বছর যাবৎ কাজ করছে। পাশাপাশি সে একজন ফিল্ম ডিরেক্টর। ইতিমধ্যেই সে জাতীয় পর্যায়ে ফিল্ম এওয়ার্ড পেয়েছে।</p>
                        <blockquote>
                            <p>রুহুল আমিন হাবিব একজন প্রফেশনাল ওয়েব ডেভেলপার এবং সফটওয়্যার ইঞ্জিনিয়ার। সে এই সেক্টরে প্রায় পাঁচ বছর যাবৎ কাজ করছে। পাশাপাশি সে একজন ফিল্ম ডিরেক্টর। ইতিমধ্যেই সে জাতীয় পর্যায়ে ফিল্ম এওয়ার্ড পেয়েছে।রুহুল আমিন হাবিব একজন প্রফেশনাল ওয়েব ডেভেলপার এবং সফটওয়্যার ইঞ্জিনিয়ার। সে এই সেক্টরে প্রায় পাঁচ বছর যাবৎ কাজ করছে। পাশাপাশি সে একজন ফিল্ম ডিরেক্টর। ইতিমধ্যেই সে জাতীয় পর্যায়ে ফিল্ম এওয়ার্ড পেয়েছে।</p>
                        </blockquote>
                        <p>রুহুল আমিন হাবিব একজন প্রফেশনাল ওয়েব ডেভেলপার এবং সফটওয়্যার ইঞ্জিনিয়ার। সে এই সেক্টরে প্রায় পাঁচ বছর যাবৎ কাজ করছে। পাশাপাশি সে একজন ফিল্ম ডিরেক্টর। ইতিমধ্যেই সে জাতীয় পর্যায়ে ফিল্ম এওয়ার্ড পেয়েছে।রুহুল আমিন হাবিব একজন প্রফেশনাল ওয়েব ডেভেলপার এবং সফটওয়্যার ইঞ্জিনিয়ার। সে এই সেক্টরে প্রায় পাঁচ বছর যাবৎ কাজ করছে। পাশাপাশি সে একজন ফিল্ম ডিরেক্টর। ইতিমধ্যেই সে জাতীয় পর্যায়ে ফিল্ম এওয়ার্ড পেয়েছে।</p>
                        <p><strong>তার কাজের পরিধি</strong></p>
                        <ul>
                            <li>গ্রাফিক্স ডিজাইন</li>
                            <li>ওয়ব ডিজাইন</li>
                            <li>ওয়েব ডেভেলপমেন্ট</li>
                            <li>এপ্স ডেভেলপমেন্ট</li>
                            <li>ভিডিও এডিটিং</li>
                            <li>সিনেমাটোগ্রাফি</li>
                        </ul>
                        <p>&nbsp;</p>
                        <p>রুহুল আমিন হাবিব একজন প্রফেশনাল ওয়েব ডেভেলপার এবং সফটওয়্যার ইঞ্জিনিয়ার। সে এই সেক্টরে প্রায় পাঁচ বছর যাবৎ কাজ করছে। পাশাপাশি সে একজন ফিল্ম ডিরেক্টর। ইতিমধ্যেই সে জাতীয় পর্যায়ে ফিল্ম এওয়ার্ড পেয়েছে।রুহুল আমিন হাবিব একজন প্রফেশনাল ওয়েব ডেভেলপার এবং সফটওয়্যার ইঞ্জিনিয়ার। সে এই সেক্টরে প্রায় পাঁচ বছর যাবৎ কাজ করছে। পাশাপাশি সে একজন ফিল্ম ডিরেক্টর। ইতিমধ্যেই সে জাতীয় পর্যায়ে ফিল্ম এওয়ার্ড পেয়েছে।রুহুল আমিন হাবিব একজন প্রফেশনাল ওয়েব ডেভেলপার এবং সফটওয়্যার ইঞ্জিনিয়ার। সে এই সেক্টরে প্রায় পাঁচ বছর যাবৎ কাজ করছে। পাশাপাশি সে একজন ফিল্ম ডিরেক্টর। ইতিমধ্যেই সে জাতীয় পর্যায়ে ফিল্ম এওয়ার্ড পেয়েছে।</p>
                    </div>
                </div>

                <div class="col-lg-4 order-1 order-md-2">
                    <div class="single-teachers">
                        <img style="width: 100%" src="http://legenditinstitute.com/storage/instructor/O9wAmeihR1ols2Kx7aO5iexF7Oim7tBaEw7Qw90g.jpeg" alt="Image">

                        <div class="teachers-content">
                            <ul>
                                <li>
                                    <a href="fb.com" title="Facebook Profile Link" target="_blank"><i class="bx bxl-facebook"></i></a>
                                </li>
                                <li>
                                    <a href="twitter" title="Twitter Profile Link" target="_blank"><i class="bx bxl-twitter"></i></a>
                                </li>
                                <li>
                                    <a href="web" title="Website Address Link" target="_blank"><i class="bx bx-globe"></i></a>
                                </li>
                                <li>
                                    <a href="git" title="Github Link" target="_blank"><i class="bx bxl-github"></i></a>
                                </li>
                            </ul>

                            <h3>রুহুল আমিন</h3>
                            <span>সফটওয়্যার ইঞ্জিনিয়ার</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Single Event Area -->

@endsection
