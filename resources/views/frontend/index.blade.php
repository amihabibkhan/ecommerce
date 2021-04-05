@extends('frontend.layout.frontend_layout')

@section('css')
    <link rel="stylesheet" href="{{ asset('frontend/plugins/slider/css/jquery.animateSlider.css') }}">
@endsection

@section('main_content')
    <style>
        .slider_parent{
            position: relative;
        }
        .slider_parent .prev_arrow,
        .slider_parent .next_arrow{
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            z-index: 1;
            height: 50px;
            width: 50px;
            border-radius: 50%;
            background-color: white;
            color: #000;
            cursor: pointer;
            line-height: 50px;
            text-align: center;
            opacity: .3;
            transition: all .5s;
        }
        .slider_parent:hover .prev_arrow,
        .slider_parent:hover .next_arrow{
            opacity: 1;
        }
        .slider_parent .prev_arrow{
            left: 30px;
        }
        .slider_parent .next_arrow{
            right: 30px;
        }
        .home_slider{
            position: relative;
        }
        .home_slider ul.slick-dots{
            position: absolute;
            bottom: 30px;
            left: 50%;
            transform: translateX(-50%);
        }
        .home_slider ul.slick-dots li{
            float: left;
        }
        .home_slider ul.slick-dots li button{
            color: transparent;
            height: 10px;
            width: 20px;
            background-color: #fbca0c;
            margin-right: 10px;
            transition: all .5s;
            border-radius: 10px;
            border: 1px solid black;
        }
        .home_slider ul.slick-dots li.slick-active button{
            width: 40px;
        }
        .home_slider .single_slider{
            height: 400px;
            overflow: hidden;
        }
        .home_slider .single_slider img{
            width: 100%;
            transform: translateY(-50%);
        }
    </style>

    <ul class="anim-slider">

        <!-- Slide No1 -->
        <li class="anim-slide">
            <p class="slider_text_1">সবচেয়ে বেশি চলছে</p>
            <h1 class="slider_sub_title_1">প্রিয়জনদেরকে গিফট করুন</h1>
            <h2 class="slider_main_title_1">প্রোডাক্টিভ মুসলিম</h2>
            <a href="#" class="slider_button_1">বিস্তারিত দেখুন</a>
            <img src="assets/img/book.png" class="slider_book_1" alt="">
        </li>

        <!-- Slide No1 -->
        <li class="anim-slide">
            <p class="slider_text_2">সবচেয়ে বেশি চলছে</p>
            <h1 class="slider_sub_title_2">প্রিয়জনদেরকে গিফট করুন কারণ সকাল থেকে </h1>
            <h2 class="slider_main_title_2">প্রোডাক্টিভ মুসলিম</h2>
            <a href="#" class="slider_button_2">বিস্তারিত দেখুন</a>
            <img src="assets/img/book2.png" class="slider_book_2" alt="">
        </li>

        <!-- Slide No1 -->
        <li class="anim-slide">
            <p class="slider_text_1">সবচেয়ে বেশি চলছে</p>
            <h1 class="slider_sub_title_1">প্রিয়জনদেরকে গিফট করুন</h1>
            <h2 class="slider_main_title_1">প্রোডাক্টিভ মুসলিম</h2>
            <a href="#" class="slider_button_1">বিস্তারিত দেখুন</a>
            <img src="assets/img/book3.png" class="slider_book_1" alt="">
        </li>


        <!-- Arrows -->
        <nav class="anim-arrows">
            <span class="anim-arrows-prev"></span>
            <span class="anim-arrows-next"></span>
        </nav>
        <!-- Dynamically created dots -->

    </ul>






{{--    --}}{{-- normal slider start --}}
{{--    <div class="slider_parent">--}}
{{--        <i class="fas fa-arrow-left prev_arrow"></i>--}}
{{--        <i class="fas fa-arrow-right next_arrow"></i>--}}
{{--        <div class="home_slider">--}}
{{--            @foreach($sliders as $single_slider)--}}
{{--            <div class="single_slider">--}}
{{--                <img src="{{ asset('storage') }}/{{ $single_slider->image }}" alt="{{ $single_slider->title }}">--}}
{{--            </div>--}}
{{--            @endforeach--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    --}}{{-- normal slider end --}}






    @foreach($sections as $section)
        @if($section->type == 1 || $section->type == 2)
            {{-- its a category or sub category section--}}

            <section class="teachers-area d-flex {{ ($loop->index + 1) % 2 == 0 ? 'ebeef5-bg-color' : '' }} justify-content-center pt-70 pb-70">
                <div class="custom_container">
                    <div class="section-title" style="max-width: 100%; text-align: left; margin-bottom: 30px; border-bottom: 1px solid beige; padding-bottom: 10px;">
                        <h2 style="font-size: 26px;">{{ $section->section_title }}</h2>
                    </div>
                    <div class="row justify-content-center">

                        @if($section->type == 1)
                            {{-- its a category not a sub category --}}
                            @foreach($section->category->get_products as $product)
                                <div class="col-lg-3 col-xl-2 col-md-4 col-6">
                                    <x-product :product="$product"/>
                                </div>
                            @endforeach
                        @else
                            {{-- its a sub category not a category--}}
                            @foreach($section->sub_category->get_products as $product)
                                <div class="col-lg-3 col-xl-2 col-md-4 col-6">
                                    <x-product :product="$product"/>
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <div class="text-center">
                        @if($section->type == 1)
                            <a href="{{ route('frontend.singleCategory', $section->category->slug) }}" class="default-btn">সকল বই</a>
                        @else
                            <a href="{{ route('frontend.bookShop') }}?topics%5B%5D={{$section->sub_category->id}}" class="default-btn">সকল বই</a>
                        @endif
                    </div>
                </div>
            </section>
        @endif

        @if($section->type == 3)
            {{-- its a writer section --}}
            <section class="teachers-area ebeef5-bg-color d-flex justify-content-center py-5">
                <div class="custom_container">
                    <div class="section-title" style="max-width: 100%; text-align: left; margin-bottom: 30px; border-bottom: 1px solid white; padding-bottom: 10px;">
                        <h2 style="font-size: 26px;">{{ $section->section_title }}</h2>
                    </div>

                    <div class="row">
                        @foreach($writers as $writer)
                            <div class="col-lg-4 col-xl-3 col-sm-6">
                                <x-writer :writer="$writer" />
                            </div>
                        @endforeach
                    </div>
                    <div class="text-center">
                        <a href="{{ route('frontend.allWriters') }}" class="default-btn">লেখকবৃন্দদের তালিকা</a>
                    </div>
                </div>
            </section>
        @endif

        @if($section->type == 4)
            {{-- its an offer area --}}
            <section class="discover-area ebeef5-bg-color ptb-70">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-4">
                            <div class="discover-content">
                                <h2> এই সপ্তাহের অফার </h2>

                                <p>প্রতি সপ্তাহে আমাদের অফার ‍গুলো গ্রহণ করে অফারের বই গুলো কিনে ফেলুন দুর্দান্ত সব মূল্য ছাড়ে! </p>

                                <ul>
                                    <li>
                                        <span>1</span>
                                        পছন্দ করুন
                                    </li>
                                    <li>
                                        <span>2</span>
                                        অর্ডার করুন
                                    </li>
                                    <li>
                                        <span>3</span>
                                        বইটি গ্রহণ করুন
                                    </li>
                                    <li>
                                        <span>4</span>
                                        পেমেন্ট করুন
                                    </li>
                                </ul>
                                <div class="mt-5">
                                    <a href="{{ route('frontend.allOffer') }}" class="default-btn">সবগুলো দেখুন</a>
                                </div>
                            </div>
                        </div>


                        <div class="col-lg-8">
                            <div class="row">
                                @forelse($offers as $offer)
                                <div class="col-md-6">
                                    <x-offer-item :offer="$offer" />
                                </div>
                                @empty
                                    <div class="col-12">
                                        <h3 class="text-center">এই সপ্তাহের অফারে কোন প্রডাক্ট পাওয়া যায়নি</h3>
                                    </div>
                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>

            </section>
            <!-- End Offer Area -->
        @endif
    @endforeach


@endsection

@section('javascript')

{{--    <script src="{{ asset('frontend/plugins/slick_slider/slick.min.js') }}"></script>--}}
    <script src="{{ asset('frontend/plugins/slider/js/jquery.animateSlider.js') }}"></script>

    <script>
        $(function(){
            var container_width = $('#get_width').width();
            $('.mega_menu').width(container_width);

            $('.home_slider').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                autoplay: true,
                autoplaySpeed: 2000,
                dots: true,
                arrows: true,
                prevArrow: '.prev_arrow',
                nextArrow: '.next_arrow',
            });

            $(".anim-slider").animateSlider(
                {
                    autoplay	:true,
                    interval	:10000,
                    animations 	:
                        {
                            0	: 	//Slide No1
                                {
                                    ".slider_text_1"	:
                                        {
                                            show   	  : "bounceIn",
                                            hide 	  : "flipOutX",
                                            delayShow : "delay1s"
                                        },
                                    ".slider_sub_title_1":
                                        {
                                            show 	  : "fadeInUpBig",
                                            hide 	  : "fadeOutDownBig",
                                            delayShow : "delay1-5s"
                                        },
                                    ".slider_main_title_1" 	:
                                        {
                                            show   	  : "bounceInRight",
                                            hide 	  : "fadeOutRightBig",
                                            delayShow : "delay2s"
                                        },
                                    ".slider_button_1":
                                        {
                                            show 	  : "bounceInUp",
                                            hide 	  : "fadeOutLeftBig",
                                            delayShow : "delay3s"
                                        },
                                    ".slider_book_1" :{
                                        show 	  : "bounceInUp",
                                        hide 	  : "fadeOutLeftBig",
                                        delayShow : "delay2-5s"
                                    }
                                },
                            1	: //Slide No2
                                {
                                    ".slider_text_2"	:
                                        {
                                            show   	  : "bounceIn",
                                            hide 	  : "flipOutX",
                                            delayShow : "delay1s"
                                        },
                                    ".slider_sub_title_2":
                                        {
                                            show 	  : "fadeInUpBig",
                                            hide 	  : "fadeOutDownBig",
                                            delayShow : "delay1-5s"
                                        },
                                    ".slider_main_title_2" 	:
                                        {
                                            show   	  : "bounceInRight",
                                            hide 	  : "fadeOutRightBig",
                                            delayShow : "delay2s"
                                        },
                                    ".slider_button_2":
                                        {
                                            show 	  : "bounceInUp",
                                            hide 	  : "fadeOutLeftBig",
                                            delayShow : "delay3s"
                                        },
                                    ".slider_book_2" :{
                                        show 	  : "bounceInUp",
                                        hide 	  : "fadeOutLeftBig",
                                        delayShow : "delay2-5s"
                                    }
                                },
                            2	: //Slide No3
                                {
                                    ".slider_text_1"	:
                                        {
                                            show   	  : "bounceIn",
                                            hide 	  : "flipOutX",
                                            delayShow : "delay1s"
                                        },
                                    ".slider_sub_title_1":
                                        {
                                            show 	  : "fadeInUpBig",
                                            hide 	  : "fadeOutDownBig",
                                            delayShow : "delay1-5s"
                                        },
                                    ".slider_main_title_1" 	:
                                        {
                                            show   	  : "bounceInRight",
                                            hide 	  : "fadeOutRightBig",
                                            delayShow : "delay2s"
                                        },
                                    ".slider_button_1":
                                        {
                                            show 	  : "bounceInUp",
                                            hide 	  : "fadeOutLeftBig",
                                            delayShow : "delay3s"
                                        },
                                    ".slider_book_1" :{
                                        show 	  : "bounceInUp",
                                        hide 	  : "fadeOutLeftBig",
                                        delayShow : "delay2-5s"
                                    }
                                }
                        }
                });

        });


    </script>
@endsection
