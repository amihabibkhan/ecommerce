@extends('frontend.layout.frontend_layout')

@section('main_content')


    <ul class="anim-slider">

        <!-- Slide No1 -->
        <li class="anim-slide">
            <p class="slider_text_1">সবচেয়ে বেশি চলছে</p>
            <h1 class="slider_sub_title_1">প্রিয়জনদেরকে গিফট করুন</h1>
            <h2 class="slider_main_title_1">প্রোডাক্টিভ মুসলিম</h2>
            <a href="#" class="slider_button_1">বিস্তারিত দেখুন</a>
            <img src="{{ asset('frontend') }}/img/book.png" class="slider_book_1" alt="">
        </li>

        <!-- Slide No1 -->
        <li class="anim-slide">
            <p class="slider_text_2">সবচেয়ে বেশি চলছে</p>
            <h1 class="slider_sub_title_2">প্রিয়জনদেরকে গিফট করুন </h1>
            <h2 class="slider_main_title_2">প্রোডাক্টিভ মুসলিম</h2>
            <a href="#" class="slider_button_2">বিস্তারিত দেখুন</a>
            <img src="{{ asset('frontend') }}/img/book2.png" class="slider_book_2" alt="">
        </li>

        <!-- Slide No1 -->
        <li class="anim-slide">
            <p class="slider_text_1">সবচেয়ে বেশি চলছে</p>
            <h1 class="slider_sub_title_1">প্রিয়জনদেরকে গিফট করুন</h1>
            <h2 class="slider_main_title_1">প্রোডাক্টিভ মুসলিম</h2>
            <a href="#" class="slider_button_1">বিস্তারিত দেখুন</a>
            <img src="{{ asset('frontend') }}/img/book3.png" class="slider_book_1" alt="">
        </li>


        <!-- Arrows -->
        <nav class="anim-arrows">
            <span class="anim-arrows-prev"></span>
            <span class="anim-arrows-next"></span>
        </nav>
        <!-- Dynamically created dots -->

    </ul>

    {{-- slider end here --}}


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
                            <div class="col-lg-2 col-md-3 col-sm-4 col-6">
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
    <script>
        $(function(){
            var container_width = $('#get_width').width();
            $('.mega_menu').width(container_width);
        });

    </script>

    <script src="{{ asset('frontend') }}/plugins/slider/js/modernizr.js"></script>
    <!-- Load the plugin -->
    <script src="{{ asset('frontend') }}/plugins/slider/js/jquery.animateSlider.js"></script>
    <script>
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
    </script>
@endsection
