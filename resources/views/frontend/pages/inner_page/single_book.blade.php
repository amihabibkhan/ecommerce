@extends('frontend.layouts.inner_layout')

@section('page_title')ফিলিস্তিনের বুকে ইসরাইল@endsection

@section('inner_content')

    <!-- Start Product Details Area -->
    <section class="product-details-area ptb-100">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-4 col-md-12">
                    <div class="product-details-image" style="padding: 30px">
                        <img src="{{ asset('frontend') }}/img/books/1.jpg" style="width: 100%" alt="Image">
                    </div>
                </div>

                <div class="col-lg-8 col-md-12">
                    <div class="product-details-desc">
                        <h3>ফিলিস্তিনের বুকে ইসরাইল <br><a href="" style="color: #ffb607; font-size: 18px">আসাদ পারভেজ</a></h3>

                        <div class="price">
                            <span class="new-price"><del style="margin-right: 10px; color: red">৳২৯০</del> ৳২৫০</span>
                        </div>

                        <div class="product-review">
                            <div class="rating">
                                <i class='bx bxs-star'></i>
                                <i class='bx bxs-star'></i>
                                <i class='bx bxs-star'></i>
                                <i class='bx bxs-star'></i>
                                <i class='bx bxs-star-half'></i>
                            </div>
                            <a href="#" class="rating-count">৫টি রিভিউ</a>
                        </div>

                        <p>বই এর একটি সংক্ষিপ্ত বর্ণনা এখানে দেওয়া হলো। বই এর একটি সংক্ষিপ্ত বর্ণনা এখানে দেওয়া হলো।  বই এর একটি সংক্ষিপ্ত বর্ণনা এখানে দেওয়া হলো। বই এর একটি সংক্ষিপ্ত বর্ণনা এখানে দেওয়া হলো। বই এর একটি সংক্ষিপ্ত বর্ণনা এখানে দেওয়া হলো। বই এর একটি সংক্ষিপ্ত বর্ণনা এখানে দেওয়া হলো। বই এর একটি সংক্ষিপ্ত বর্ণনা এখানে দেওয়া হলো। বই এর একটি সংক্ষিপ্ত বর্ণনা এখানে দেওয়া হলো।</p>

                        <ul class="product-summery pb-3">
                            <li style="font-weight: normal">স্টকে ৫১টি বই রয়েছে</li>
                        </ul>

                        <ul class="social-wrap">
                            <li>
                                <span>বইটি শেয়ার করুন:</span>
                            </li>
                            <li>
                                <a href="#" target="_blank">
                                    <i class="bx bxl-twitter"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" target="_blank">
                                    <i class="bx bxl-instagram"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#" target="_blank">
                                    <i class="bx bxl-facebook"></i>
                                </a>
                            </li>
                        </ul>

                        <div class="product-add-to-cart">
                            <h3>সংখ্যা:</h3>
                            <div class="input-counter">
									<span class="minus-btn">
										<i class='bx bx-minus' ></i>
									</span>
                                <input type="text" value="1">
                                <span class="plus-btn">
										<i class='bx bx-plus' ></i>
									</span>
                            </div>
                        </div>

                        <button type="submit" class="default-btn mr-md-3" >
                            কার্টে ফেলুন
                        </button>
                        <button type="submit" class="default-btn default-outline" data-toggle="modal" data-target="#readSomething">
                            একটু পড়ে দেখুন
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" style="background-color: #000000bd" id="readSomething" tabindex="-1" role="dialog" aria-labelledby="readSomething" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                <div class="modal-content" style="border-radius: 0">
                                    <div class="modal-header" style="background-color: red; border-radius: 0; border-bottom: 0;">
                                        <h5 style="color: #fff" class="modal-title" id="exampleModalLongTitle">ফিলিস্তিনের বুকে ইসরাইল</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body" style="background-color: #545454">
                                        <div style="max-height: 80vh; overflow-y: scroll">
                                            <img src="{{ asset('frontend') }}/img/pages/1.jpg" style="margin-bottom: 15px; width: 100%" alt="">
                                            <img src="{{ asset('frontend') }}/img/pages/2.jpg" style="margin-bottom: 15px; width: 100%" alt="">
                                            <img src="{{ asset('frontend') }}/img/pages/3.jpg" style="margin-bottom: 15px; width: 100%" alt="">
                                            <img src="{{ asset('frontend') }}/img/pages/4.jpg" style="margin-bottom: 15px; width: 100%" alt="">
                                            <img src="{{ asset('frontend') }}/img/pages/5.jpg" style="margin-bottom: 15px; width: 100%" alt="">
                                            <img src="{{ asset('frontend') }}/img/pages/6.jpg" style="margin-bottom: 15px; width: 100%" alt="">
                                            <img src="{{ asset('frontend') }}/img/pages/7.jpg" style="margin-bottom: 15px; width: 100%" alt="">
                                            <img src="{{ asset('frontend') }}/img/pages/8.jpg" style="margin-bottom: 15px; width: 100%" alt="">
                                            <img src="{{ asset('frontend') }}/img/pages/9.jpg" style="margin-bottom: 15px; width: 100%" alt="">
                                            <img src="{{ asset('frontend') }}/img/pages/10.jpg" style="margin-bottom: 15px; width: 100%" alt="">
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
                                .products-details-tab-content ul{
                                    padding-left: 10px;
                                    margin-bottom: 15px;
                                    margin-top: 15px;
                                }
                                .products-details-tab-content ul li{
                                    position: relative;
                                    padding-left: 35px;
                                    margin-bottom: 15px;
                                }
                                .products-details-tab-content ul li:before {
                                    font-family: 'Font Awesome\ 5 Free';
                                    content: "\f00c";
                                    display: inline-block;
                                    padding-right: 15px;
                                    vertical-align: middle;
                                    font-weight: 900;
                                    color: #ffb607;
                                }
                                .products-details-tab-content blockquote {
                                    background: #f9f9f9;
                                    border-left: 10px solid #ccc;
                                    margin: 1.5em 10px;
                                    padding: 0.5em 10px;
                                    quotes: "\201C""\201D""\2018""\2019";
                                }
                                .products-details-tab-content blockquote:before {
                                    color: #ccc;
                                    content: open-quote;
                                    font-size: 4em;
                                    line-height: 0.1em;
                                    margin-right: 0.25em;
                                    vertical-align: -0.4em;
                                }
                                .products-details-tab-content blockquote p {
                                    display: inline;
                                }
                                .products-details-tab-content ol {
                                    list-style: none;
                                    counter-reset: item;
                                }
                                .products-details-tab-content ol li {
                                    counter-increment: item;
                                    margin-bottom: 15px;
                                }
                                .products-details-tab-content ol li:before {
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
                                    <div class="tabs_item">
                                        <div class="products-details-tab-content">
                                            <h3 class="mb-2">বর্ণনা</h3>
                                            <p>এখান থেকে বর্ণনা দেওয়া হলো তাই আপনি এখান থেকে বর্ণনা দেওয়া হবে তাই কিনা বলুন যদি তা না পারেন তাহলে কিন্তু আপনি আর পারলেন না কেন কি হয়েছে। এখান থেকে বর্ণনা দেওয়া হলো তাই আপনি এখান থেকে বর্ণনা দেওয়া হবে তাই কিনা বলুন যদি তা না পারেন তাহলে কিন্তু আপনি আর পারলেন না কেন কি হয়েছে। এখান থেকে বর্ণনা দেওয়া হলো তাই আপনি এখান থেকে বর্ণনা দেওয়া হবে তাই কিনা বলুন যদি তা না পারেন তাহলে কিন্তু আপনি আর পারলেন না কেন কি হয়েছে। এখান থেকে বর্ণনা দেওয়া হলো তাই আপনি এখান থেকে বর্ণনা দেওয়া হবে তাই কিনা বলুন যদি তা না পারেন তাহলে কিন্তু আপনি আর পারলেন না কেন কি হয়েছে। এখান থেকে বর্ণনা দেওয়া হলো তাই আপনি এখান থেকে বর্ণনা দেওয়া হবে তাই কিনা বলুন যদি তা না পারেন তাহলে কিন্তু আপনি আর পারলেন না কেন কি হয়েছে। এখান থেকে বর্ণনা দেওয়া হলো তাই আপনি এখান থেকে বর্ণনা দেওয়া হবে তাই কিনা বলুন যদি তা না পারেন তাহলে কিন্তু আপনি আর পারলেন না কেন কি হয়েছে। </p>
                                            <ul>
                                                <li>সুন্দর একটি বই তাই অসাধারণ</li>
                                                <li>সুন্দর একটি বই তাই অসাধারণ</li>
                                                <li>সুন্দর একটি বই তাই অসাধারণ</li>
                                                <li>সুন্দর একটি বই তাই অসাধারণ</li>
                                                <li>সুন্দর একটি বই তাই অসাধারণ</li>
                                            </ul>
                                            <blockquote><p>এখান থেকে বর্ণনা দেওয়া হলো তাই আপনি এখান থেকে বর্ণনা দেওয়া হবে তাই কিনা বলুন যদি তা না পারেন তাহলে কিন্তু আপনি আর পারলেন না কেন কি হয়েছে। এখান থেকে বর্ণনা দেওয়া হলো তাই আপনি এখান থেকে বর্ণনা দেওয়া হবে তাই কিনা বলুন যদি তা না পারেন তাহলে কিন্তু আপনি আর পারলেন না কেন কি হয়েছে। এখান থেকে বর্ণনা দেওয়া হলো তাই আপনি এখান থেকে বর্ণনা দেওয়া হবে তাই কিনা বলুন যদি তা না পারেন তাহলে কিন্তু আপনি আর পারলেন না কেন কি হয়েছে। এখান থেকে বর্ণনা দেওয়া হলো তাই আপনি এখান থেকে বর্ণনা দেওয়া হবে তাই কিনা বলুন যদি তা না পারেন তাহলে কিন্তু আপনি আর পারলেন না কেন কি হয়েছে। এখান থেকে বর্ণনা দেওয়া হলো তাই আপনি এখান থেকে বর্ণনা দেওয়া হবে তাই কিনা বলুন যদি তা না পারেন তাহলে কিন্তু আপনি আর পারলেন না কেন কি হয়েছে। এখান থেকে বর্ণনা দেওয়া হলো তাই আপনি এখান থেকে বর্ণনা দেওয়া হবে তাই কিনা বলুন যদি তা না পারেন তাহলে কিন্তু আপনি আর পারলেন না কেন কি হয়েছে। </p></blockquote>
                                        </div>
                                    </div>

                                    <div class="tabs_item">
                                        <div class="products-details-tab-content">
                                            <div class="product-review-form">
                                                <h3>পাঠক রিভিউ</h3>

                                                <div class="review-title">
                                                    <div class="rating">
                                                        <i class='bx bxs-star'></i>
                                                        <i class='bx bxs-star'></i>
                                                        <i class='bx bxs-star'></i>
                                                        <i class='bx bxs-star'></i>
                                                        <i class='bx bxs-star'></i>
                                                    </div>
                                                    <p>মোট রিভিউ ৪৫ টি</p>
                                                </div>

                                                <div class="review-comments">
                                                    <div class="review-item">
                                                        <div class="rating">
                                                            <i class='bx bxs-star'></i>
                                                            <i class='bx bxs-star'></i>
                                                            <i class='bx bxs-star'></i>
                                                            <i class='bx bxs-star'></i>
                                                            <i class='bx bxs-star'></i>
                                                        </div>
                                                        <h3>অসাধারণ</h3>
                                                        <span><strong>ইসমাইল</strong> রিভিউ দিয়েছেন <strong>২৪ জুলাই, ২০২০</strong></span>
                                                        <p>এটি একটি অসাধরাণ রিভিউ তাই রিভিউ হয়ে গেলে কোন সমস্যা আছে কি না। না থাকলে তো কোন কথাই নাই। এটি একটি অসাধরাণ রিভিউ তাই রিভিউ হয়ে গেলে কোন সমস্যা আছে কি না। না থাকলে তো কোন কথাই নাই। এটি একটি অসাধরাণ রিভিউ তাই রিভিউ হয়ে গেলে কোন সমস্যা আছে কি না। না থাকলে তো কোন কথাই নাই। </p>
                                                    </div>
                                                    <div class="review-item">
                                                        <div class="rating">
                                                            <i class='bx bxs-star'></i>
                                                            <i class='bx bxs-star'></i>
                                                            <i class='bx bxs-star'></i>
                                                            <i class='bx bxs-star'></i>
                                                            <i class='bx bxs-star'></i>
                                                        </div>
                                                        <h3>অসাধারণ</h3>
                                                        <span><strong>ইসমাইল</strong> রিভিউ দিয়েছেন <strong>২৪ জুলাই, ২০২০</strong></span>
                                                        <p>এটি একটি অসাধরাণ রিভিউ তাই রিভিউ হয়ে গেলে কোন সমস্যা আছে কি না। না থাকলে তো কোন কথাই নাই। এটি একটি অসাধরাণ রিভিউ তাই রিভিউ হয়ে গেলে কোন সমস্যা আছে কি না। না থাকলে তো কোন কথাই নাই। এটি একটি অসাধরাণ রিভিউ তাই রিভিউ হয়ে গেলে কোন সমস্যা আছে কি না। না থাকলে তো কোন কথাই নাই। </p>
                                                    </div>
                                                </div>

                                                <div class="review-form">
                                                    <h3>রিভিউ দিন</h3>

                                                    <form>
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
                                                                    <label>রিভিউ টাইটেল</label>
                                                                    <input type="text" id="review-title" name="review-title" class="form-control">
                                                                </div>
                                                            </div>

                                                            <div class="col-lg-12 col-md-12">
                                                                <div class="form-group">
                                                                    <label>বিস্তারিত (সর্বোচ্চ ১৫০০ শব্দে)</label>
                                                                    <textarea name="review-body" id="review-body" cols="30" rows="8" class="form-control"></textarea>
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
@endsection
