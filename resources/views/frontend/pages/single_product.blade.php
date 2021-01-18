@extends('frontend.layout.frontend_layout')

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <style>
        .not_image{
            border: 1px solid #dddddd;
            position: relative;
            height: 500px;
            background-image: linear-gradient( 45deg, #ffd280, #b5f2f7, #ffffbc, #c5fdf8);
        }
        .not_image span{
            position: absolute;
            width: 100%;
            top: 50%;
            transform: translateY(-50%);
            color: black;
            left: 0;
        }

        .review_button{
            background-color: green;
            border-color: red;
        }
        .review_button:hover{
            background-color: transparent;
            color: red;
            border-color: red !important;
        }
        .ratings_input{
            position: relative;
            display: inline-block;
            margin-right: 5px;
        }
        .ratings_input i{
            color: #ff7200;
            position: relative;
            z-index: 0;
            font-size: 30px;
            transition: .2s;
        }
        .ratings_input i::after {
            position: absolute;
            content: '\f005';
            font-weight: 900;
            font-family: 'Font Awesome 5 Free';
            top: 0;
            left: 0;
            font-size: 30px;
            color: transparent;
        }
        .ratings_input:hover i::after{
            color: #ff7200;
        }
        .ratings_input input{
            position: absolute;
            cursor: pointer;
            z-index: 2;
            top: 50%;
            left: 50%;
            height: 30px;
            width: 30px;
            transform: translate(-50%,-50%);
            opacity: 0;
        }
    </style>
    <script src="{{ asset('frontend') }}/js/jquery-3.5.1.slim.min.js"></script>
@endsection


@section('main_content')

    <x-inner-page-banner :title="$product->title" />

    <!-- Start Product Details Area -->
    <section class="product-details-area" style="padding: 50px 0">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-12">
                    <div class="product-details-image" style="padding: 30px">
                        @if($product->main_image)
                            <img src="{{ asset('storage') }}/{{ $product->main_image }}" style="width: 100%" alt="Image">
                        @else
                            <div class="not_image">
                                <span>
                                    <b>{{ $product->title }}</b>
                                    <br>
                                    {{ @$product->writer->name }}
                                </span>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="col-lg-8 col-md-12">
                    <div class="product-details-desc">
                        <h3 class="mb-1">{{ $product->title }} </h3>
                        <div class="mb-1">লেখক:
                            @if($product->writer_id)
                                <a href="{{ route('frontend.singleWriter', @$product->writer->slug ) }}"> {{ @$product->writer->name }} </a></div>
                            @endif
                        <div class="mb-1">প্রকাশণী:
                            @if($product->publication_id)
                                <a href="{{ route('frontend.singlePublication', @$product->publication->slug ) }}"> {{ @$product->publication->name }} </a>
                            @endif
                        </div>
                        <div class="mb-1">বিষয়:
                        @foreach($product->categories as $single_category)
                                <a href="#"> {{ $single_category->title }}</a>,
                        @endforeach
                        @foreach($product->sub_categories as $single_category)
                                <a href="#"> {{ $single_category->title }}</a>,
                        @endforeach
                        </div>
                        <div class="mb-1">পৃষ্ঠা: {{ $product->total_page }}</div>
                        <div class="mb-1">সংস্করণ: {{ $product->edition }}</div>
                        <div class="mb-1">কভার: {{ $product->cover }}</div>


                        <div class="price mb-0">
                            <span class="new-price">
                                @if($product->sale_price != null)
                                    <del style="margin-right: 10px; color: red">TK{{ $product->regular_price }}</del> TK. {{ $product->sale_price }}
                                @else
                                    TK. {{ $product->regular_price }}
                                @endif
                            </span>
                        </div>
                        <form action="{{ route('add_to_cart') }}" method="POST">
                            <div class="product-add-to-cart m-0">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <h3>সংখ্যা:</h3>
                                <div class="input-counter">
                                        <span class="minus-btn">
                                            <i class='bx bx-minus' ></i>
                                        </span>
                                    <input name="qty" type="text" value="1">
                                    <span class="plus-btn">
                                            <i class='bx bx-plus' ></i>
                                        </span>
                                </div>
                            </div>

                            <button type="submit" class="default-btn mr-md-3" >
                                কার্টে ফেলুন
                            </button>
                            <button type="button" class="default-btn default-outline" data-toggle="modal" data-target="#readSomething">
                                একটু পড়ে দেখুন
                            </button>
                        </form>

                        <ul class="social-wrap">
                            <li>
                                <span class="mr-0">বইটি শেয়ার করুন:</span>
                            </li>
                            <li>
                                <a href="{{ fb_share(route('frontend.singleProduct', $product->slug)) }}" target="_blank">
                                    <i class="bx bxl-facebook"></i>
                                </a>
                            </li>
                            <li>
                                <a href="{{ twitter_share(route('frontend.singleProduct', $product->slug)) }}" target="_blank">
                                    <i class="bx bxl-twitter"></i>
                                </a>
                            </li>
                            <li>
                                <a href="{{ share_to_mail($product->title, route('frontend.singleProduct', $product->slug)) }}" target="_blank">
                                    <i class="fas fa-envelope"></i>
                                </a>
                            </li>
                        </ul>

                        <!-- Modal -->
                        <div class="modal fade" style="background-color: #000000bd" id="readSomething" tabindex="-1" role="dialog" aria-labelledby="readSomething" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                <div class="modal-content" style="border-radius: 0">
                                    <div class="modal-header" style="background-color: red; border-radius: 0; border-bottom: 0;">
                                        <h5 style="color: #fff" class="modal-title m-0" id="exampleModalLongTitle">{{ $product->title }}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body" style="background-color: #545454">
                                        <div style="max-height: 80vh; overflow-y: scroll">
                                            @foreach($product->page_images as $single_page)
                                                <img src="{{ asset('storage') }}/{{ $single_page->path }}" style="margin-bottom: 15px; width: 100%" alt="">
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-lg-12 col-md-12">
                    <div class="tab products-details-tab">
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <ul class="tabs">
                                    <li>
                                        <a href="#">
                                            বিস্তারিত
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            রিভিউ
                                        </a>
                                    </li>
                                </ul>
                            </div>

                            <style>
                                .product_description ul{
                                    padding-left: 10px;
                                    margin-bottom: 15px;
                                    margin-top: 15px;
                                }
                                .product_description ul li{
                                    position: relative;
                                    padding-left: 35px;
                                    margin-bottom: 15px;
                                }
                                .product_description ul li:before {
                                    font-family: 'Font Awesome\ 5 Free';
                                    content: "\f00c";
                                    display: inline-block;
                                    padding-right: 15px;
                                    vertical-align: middle;
                                    font-weight: 900;
                                    color: #ffb607;
                                }
                                .product_description blockquote {
                                    background: #f9f9f9;
                                    border-left: 10px solid #ccc;
                                    margin: 1.5em 10px;
                                    padding: 0.5em 10px;
                                    quotes: "\201C""\201D""\2018""\2019";
                                }
                                .product_description blockquote:before {
                                    color: #ccc;
                                    content: open-quote;
                                    font-size: 4em;
                                    line-height: 0.1em;
                                    margin-right: 0.25em;
                                    vertical-align: -0.4em;
                                }
                                .product_description blockquote p {
                                    display: inline;
                                }
                                .product_description ol {
                                    list-style: none;
                                    counter-reset: item;
                                }
                                .product_description ol li {
                                    counter-increment: item;
                                    margin-bottom: 15px;
                                }
                                .product_description ol li:before {
                                    margin-right: 15px;
                                    content: counter(item);
                                    background: #ffb607;
                                    /*border-radius: 100%;*/
                                    color: white;
                                    width: 1.2em;
                                    text-align: center;
                                    display: inline-block;
                                    border-top-left-radius: 50%;
                                    border-bottom-right-radius: 50%;
                                }
                            </style>

                            <div class="col-lg-12 col-md-12">
                                <div class="tab_content">
                                    <div class="tabs_item product_description">
                                        {!! $product->description !!}
                                    </div>

                                    <div class="tabs_item">
                                        <div class="products-details-tab-content">
                                            <div class="product-review-form">
                                                <h3>পাঠক রিভিউ</h3>

                                                <ul class="rating-star d-flex">
                                                    @for($start_star = 1; $start_star <= floor($average_rating); $start_star ++)
                                                        <li>
                                                            <i style="color: #ffd607" class='bx bxs-star'></i>
                                                        </li>
                                                    @endfor
                                                    @if($average_rating - floor($average_rating) > 0)
                                                        <li>
                                                            <i style="color: #ffd607" class='bx bxs-star-half'></i>
                                                        </li>
                                                        @for($start_star = 1; $start_star <= (5 - (floor($average_rating) + 1)); $start_star ++)
                                                            <li>
                                                                <i style="color: #ffd607" class='bx bx-star'></i>
                                                            </li>
                                                        @endfor
                                                    @else
                                                        @for($start_star = 1; $start_star <= 5 - floor($average_rating); $start_star ++)
                                                            <li>
                                                                <i style="color: #ffd607" class='bx bx-star'></i>
                                                            </li>
                                                        @endfor
                                                    @endif
                                                </ul>

                                                <span>গড়ে {{ $average_rating }} স্টার রেটিং (মোট রেটিং {{ $total_review }})</span>


                                                <div class="review-comments">

                                                    @foreach($product->reviews as $review)
                                                        <div class="review-item">
                                                            <div class="rating">
                                                                @if($review->ratings)
                                                                    @for($star = 1; $star <= $review->ratings; $star ++)
                                                                        <i class='bx bxs-star'></i>
                                                                    @endfor
                                                                    @for($star = 1; $star<= 5 - $review->ratings ; $star ++)
                                                                        <i class='bx bx-star'></i>
                                                                    @endfor
                                                                @endif
                                                            </div>
                                                            <span><strong>{{ $review->name }}</strong></span>
                                                            <p>
                                                                {{ $review->review }}
                                                            </p>
                                                        </div>
                                                    @endforeach
                                                </div>

                                                <div class="review-form">
                                                    <h3>রিভিউ দিন</h3>

                                                    <form method="POST" action="{{ route('manage_review.store') }}">
                                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                        @csrf
                                                        <p>রেটিং দিন</p>
                                                        <div class="form-group d-flex">
                                                            <div class="ratings_input" id="rat_1">
                                                                <input type="radio" class="ratings" name="ratings" value="1">
                                                                <i class="far fa-star"></i>
                                                            </div>
                                                            <div class="ratings_input" id="rat_2">
                                                                <input type="radio" class="ratings" name="ratings" value="2">
                                                                <i class="far fa-star"></i>
                                                            </div>
                                                            <div class="ratings_input" id="rat_3">
                                                                <input type="radio" class="ratings" name="ratings" value="3">
                                                                <i class="far fa-star"></i>
                                                            </div>
                                                            <div class="ratings_input" id="rat_4">
                                                                <input type="radio" class="ratings" name="ratings" value="4">
                                                                <i class="far fa-star"></i>
                                                            </div>
                                                            <div class="ratings_input" id="rat_5">
                                                                <input type="radio" class="ratings" name="ratings" value="5">
                                                                <i class="far fa-star"></i>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-lg-6 col-md-6">
                                                                <div class="form-group">
                                                                    <label>আপনার নাম</label>
                                                                    <input type="text" id="name" name="name" class="form-control">
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-6 col-md-6">
                                                                <div class="form-group">
                                                                    <label>ই-মেইল এড্রেস</label>
                                                                    <input type="email" id="email" name="email" class="form-control">
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-12 col-md-12">
                                                                <div class="form-group">
                                                                    <label>বিস্তারিত (সর্বোচ্চ 1500 শব্দে)</label>
                                                                    <textarea name="review" id="review-body" style="height: 250px" class="form-control"></textarea>
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-12 col-md-12">
                                                                <button type="submit" class="btn default-btn two">রিভিউ সাবমিট করুন</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Product Details Area -->

    <script>
        $(function () {
            // ratings 1
            $("#rat_1").click(function(){
                // remove class
                $('#rat_1').find('i').removeClass('far');
                $('#rat_2').find('i').removeClass('fas');
                $('#rat_3').find('i').removeClass('fas');
                $('#rat_4').find('i').removeClass('fas');
                $('#rat_5').find('i').removeClass('fas');
                // add class
                $('#rat_1').find('i').addClass('fas');
                $('#rat_2').find('i').addClass('far');
                $('#rat_3').find('i').addClass('far');
                $('#rat_4').find('i').addClass('far');
                $('#rat_5').find('i').addClass('far');
            });
            // ratings 2
            $("#rat_2").click(function(){
                // remove class
                $('#rat_1').find('i').removeClass('far');
                $('#rat_2').find('i').removeClass('far');
                $('#rat_3').find('i').removeClass('fas');
                $('#rat_4').find('i').removeClass('fas');
                $('#rat_5').find('i').removeClass('fas');
                // add class
                $('#rat_1').find('i').addClass('fas');
                $('#rat_2').find('i').addClass('fas');
                $('#rat_3').find('i').addClass('far');
                $('#rat_4').find('i').addClass('far');
                $('#rat_5').find('i').addClass('far');
            });
            // ratings 3
            $("#rat_3").click(function(){
                // remove class
                $('#rat_1').find('i').removeClass('far');
                $('#rat_2').find('i').removeClass('far');
                $('#rat_3').find('i').removeClass('far');
                $('#rat_4').find('i').removeClass('fas');
                $('#rat_5').find('i').removeClass('fas');
                // add class
                $('#rat_1').find('i').addClass('fas');
                $('#rat_2').find('i').addClass('fas');
                $('#rat_3').find('i').addClass('fas');
                $('#rat_4').find('i').addClass('far');
                $('#rat_5').find('i').addClass('far');
            });
            // ratings 4
            $("#rat_4").click(function(){
                // remove class
                $('#rat_1').find('i').removeClass('far');
                $('#rat_2').find('i').removeClass('far');
                $('#rat_3').find('i').removeClass('far');
                $('#rat_4').find('i').removeClass('far');
                $('#rat_5').find('i').removeClass('fas');
                // add class
                $('#rat_1').find('i').addClass('fas');
                $('#rat_2').find('i').addClass('fas');
                $('#rat_3').find('i').addClass('fas');
                $('#rat_4').find('i').addClass('fas');
                $('#rat_5').find('i').addClass('far');
            });
            // ratings 5
            $("#rat_5").click(function(){
                // remove class
                $('#rat_1').find('i').removeClass('far');
                $('#rat_2').find('i').removeClass('far');
                $('#rat_3').find('i').removeClass('far');
                $('#rat_4').find('i').removeClass('far');
                $('#rat_5').find('i').removeClass('far');
                // add class
                $('#rat_1').find('i').addClass('fas');
                $('#rat_2').find('i').addClass('fas');
                $('#rat_3').find('i').addClass('fas');
                $('#rat_4').find('i').addClass('fas');
                $('#rat_5').find('i').addClass('fas');
            });
        });
    </script>
@endsection


