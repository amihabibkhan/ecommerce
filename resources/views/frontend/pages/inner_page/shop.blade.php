@extends('frontend.layouts.inner_layout')

@section('page_title')কেনাকাটা@endsection

@section('inner_content')

    <!-- Start Shop Area -->
    <div class="shop-area ptb-100 d-flex justify-content-center">
        <div class="custom_container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shop-card-wrap">
                        <div class="showing-result mr-0">
                            <div class="row align-items-center justify-content-between">

                                <div class="col-lg-3 col-sm-6 col-md-4">
                                    <div class="showing-top-bar-ordering">
                                        <select>
                                            <option value="0" disabled selected>সর্টিং করুন</option>
                                            <option value="1">নতুন প্রকাশিত</option>
                                            <option value="2">জনপ্রিয়</option>
                                            <option value="3">বেস্ট সেলার</option>
                                            <option value="4">দাম (কম থেকে বেশি)</option>
                                            <option value="5">দাম (বেশি থেকে কম)</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6 col-md-4">
                                    <div class="sidebar-widget search mb-0">
                                        <form class="search-form">
                                            <input class="form-control" name="search" placeholder="বইয়ের নাম দিয়ে সার্চ করুন" type="text">
                                            <button class="search-button" type="submit">
                                                <i class="bx bx-search"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row justify-content-center">

                            <div class="col-lg-3 col-xl-2 col-md-4 col-sm-6">
                                <div class="single-shop">
                                    <div class="shop-img">
                                        <img src="{{ asset('frontend') }}/img/books/1.jpg" style="width: 100%" alt="Image">

                                        <ul>
                                            <li>
                                                <a href="#">
                                                    <a href="#product-view-one" data-toggle="modal">
                                                        <i class="bx bx-show-alt"></i>
                                                    </a>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="bx bx-detail"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>

                                    <h3>ফিলিস্তিনের বুকে ইসরাইল</h3>
                                    <span> <del>৳২৯০</del> ৳২৫০</span>

                                    <a href="{{ route('cart') }}" class="default-btn">
                                        কার্টে ফেলুন
                                    </a>
                                </div>
                            </div>


                            <div class="col-lg-3 col-xl-2 col-md-4 col-sm-6">
                                <div class="single-shop">
                                    <div class="shop-img">
                                        <img src="{{ asset('frontend') }}/img/books/6.jpeg" style="width: 100%" alt="Image">

                                        <ul>
                                            <li>
                                                <a href="#">
                                                    <a href="#product-view-one" data-toggle="modal">
                                                        <i class="bx bx-show-alt"></i>
                                                    </a>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="bx bx-heart"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>

                                    <h3>ফিলিস্তিনের বুকে ইসরাইল</h3>
                                    <span> <del>৳২৯০</del> ৳২৫০</span>

                                    <a href="{{ route('cart') }}" class="default-btn">
                                        কার্টে ফেলুন
                                    </a>
                                </div>
                            </div>


                            <div class="col-lg-3 col-xl-2 col-md-4 col-sm-6">
                                <div class="single-shop">
                                    <div class="shop-img">
                                        <img src="{{ asset('frontend') }}/img/books/2.jpg" style="width: 100%" alt="Image">

                                        <ul>
                                            <li>
                                                <a href="#">
                                                    <a href="#product-view-one" data-toggle="modal">
                                                        <i class="bx bx-show-alt"></i>
                                                    </a>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="bx bx-heart"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>

                                    <h3>ফিলিস্তিনের বুকে ইসরাইল</h3>
                                    <span> <del>৳২৯০</del> ৳২৫০</span>

                                    <a href="{{ route('cart') }}" class="default-btn">
                                        কার্টে ফেলুন
                                    </a>
                                </div>
                            </div>


                            <div class="col-lg-3 col-xl-2 col-md-4 col-sm-6">
                                <div class="single-shop">
                                    <div class="shop-img">
                                        <img src="{{ asset('frontend') }}/img/books/3.jpg" style="width: 100%" alt="Image">

                                        <ul>
                                            <li>
                                                <a href="#">
                                                    <a href="#product-view-one" data-toggle="modal">
                                                        <i class="bx bx-show-alt"></i>
                                                    </a>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="bx bx-heart"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>

                                    <h3>ফিলিস্তিনের বুকে ইসরাইল</h3>
                                    <span> <del>৳২৯০</del> ৳২৫০</span>

                                    <a href="{{ route('cart') }}" class="default-btn">
                                        কার্টে ফেলুন
                                    </a>
                                </div>
                            </div>


                            <div class="col-lg-3 col-xl-2 col-md-4 col-sm-6">
                                <div class="single-shop">
                                    <div class="shop-img">
                                        <img src="{{ asset('frontend') }}/img/books/4.jpg" style="width: 100%" alt="Image">

                                        <ul>
                                            <li>
                                                <a href="#">
                                                    <a href="#product-view-one" data-toggle="modal">
                                                        <i class="bx bx-show-alt"></i>
                                                    </a>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="bx bx-heart"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>

                                    <h3>ফিলিস্তিনের বুকে ইসরাইল</h3>
                                    <span> <del>৳২৯০</del> ৳২৫০</span>

                                    <a href="{{ route('cart') }}" class="default-btn">
                                        কার্টে ফেলুন
                                    </a>
                                </div>
                            </div>


                            <div class="col-lg-3 col-xl-2 col-md-4 col-sm-6">
                                <div class="single-shop">
                                    <div class="shop-img">
                                        <img src="{{ asset('frontend') }}/img/books/5.jpg" style="width: 100%" alt="Image">

                                        <ul>
                                            <li>
                                                <a href="#">
                                                    <a href="#product-view-one" data-toggle="modal">
                                                        <i class="bx bx-show-alt"></i>
                                                    </a>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="bx bx-heart"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>

                                    <h3>ফিলিস্তিনের বুকে ইসরাইল</h3>
                                    <span> <del>৳২৯০</del> ৳২৫০</span>

                                    <a href="{{ route('cart') }}" class="default-btn">
                                        কার্টে ফেলুন
                                    </a>
                                </div>
                            </div>




                            <div class="col-lg-3 col-xl-2 col-md-4 col-sm-6">
                                <div class="single-shop">
                                    <div class="shop-img">
                                        <img src="{{ asset('frontend') }}/img/books/6.jpeg" style="width: 100%" alt="Image">

                                        <ul>
                                            <li>
                                                <a href="#">
                                                    <a href="#product-view-one" data-toggle="modal">
                                                        <i class="bx bx-show-alt"></i>
                                                    </a>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="bx bx-heart"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>

                                    <h3>ফিলিস্তিনের বুকে ইসরাইল</h3>
                                    <span> <del>৳২৯০</del> ৳২৫০</span>

                                    <a href="{{ route('cart') }}" class="default-btn">
                                        কার্টে ফেলুন
                                    </a>
                                </div>
                            </div>


                            <div class="col-lg-3 col-xl-2 col-md-4 col-sm-6">
                                <div class="single-shop">
                                    <div class="shop-img">
                                        <img src="{{ asset('frontend') }}/img/books/2.jpg" style="width: 100%" alt="Image">

                                        <ul>
                                            <li>
                                                <a href="#">
                                                    <a href="#product-view-one" data-toggle="modal">
                                                        <i class="bx bx-show-alt"></i>
                                                    </a>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="bx bx-heart"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>

                                    <h3>ফিলিস্তিনের বুকে ইসরাইল</h3>
                                    <span> <del>৳২৯০</del> ৳২৫০</span>

                                    <a href="{{ route('cart') }}" class="default-btn">
                                        কার্টে ফেলুন
                                    </a>
                                </div>
                            </div>


                            <div class="col-lg-3 col-xl-2 col-md-4 col-sm-6">
                                <div class="single-shop">
                                    <div class="shop-img">
                                        <img src="{{ asset('frontend') }}/img/books/3.jpg" style="width: 100%" alt="Image">

                                        <ul>
                                            <li>
                                                <a href="#">
                                                    <a href="#product-view-one" data-toggle="modal">
                                                        <i class="bx bx-show-alt"></i>
                                                    </a>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="bx bx-heart"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>

                                    <h3>ফিলিস্তিনের বুকে ইসরাইল</h3>
                                    <span> <del>৳২৯০</del> ৳২৫০</span>

                                    <a href="{{ route('cart') }}" class="default-btn">
                                        কার্টে ফেলুন
                                    </a>
                                </div>
                            </div>


                            <div class="col-lg-3 col-xl-2 col-md-4 col-sm-6">
                                <div class="single-shop">
                                    <div class="shop-img">
                                        <img src="{{ asset('frontend') }}/img/books/4.jpg" style="width: 100%" alt="Image">

                                        <ul>
                                            <li>
                                                <a href="#">
                                                    <a href="#product-view-one" data-toggle="modal">
                                                        <i class="bx bx-show-alt"></i>
                                                    </a>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="bx bx-heart"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>

                                    <h3>ফিলিস্তিনের বুকে ইসরাইল</h3>
                                    <span> <del>৳২৯০</del> ৳২৫০</span>

                                    <a href="{{ route('cart') }}" class="default-btn">
                                        কার্টে ফেলুন
                                    </a>
                                </div>
                            </div>


                            <div class="col-lg-3 col-xl-2 col-md-4 col-sm-6">
                                <div class="single-shop">
                                    <div class="shop-img">
                                        <img src="{{ asset('frontend') }}/img/books/5.jpg" style="width: 100%" alt="Image">

                                        <ul>
                                            <li>
                                                <a href="#">
                                                    <a href="#product-view-one" data-toggle="modal">
                                                        <i class="bx bx-show-alt"></i>
                                                    </a>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="bx bx-heart"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>

                                    <h3>ফিলিস্তিনের বুকে ইসরাইল</h3>
                                    <span> <del>৳২৯০</del> ৳২৫০</span>

                                    <a href="{{ route('cart') }}" class="default-btn">
                                        কার্টে ফেলুন
                                    </a>
                                </div>
                            </div>




                            <div class="col-lg-3 col-xl-2 col-md-4 col-sm-6">
                                <div class="single-shop">
                                    <div class="shop-img">
                                        <img src="{{ asset('frontend') }}/img/books/6.jpeg" style="width: 100%" alt="Image">

                                        <ul>
                                            <li>
                                                <a href="#">
                                                    <a href="#product-view-one" data-toggle="modal">
                                                        <i class="bx bx-show-alt"></i>
                                                    </a>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="bx bx-heart"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>

                                    <h3>ফিলিস্তিনের বুকে ইসরাইল</h3>
                                    <span> <del>৳২৯০</del> ৳২৫০</span>

                                    <a href="{{ route('cart') }}" class="default-btn">
                                        কার্টে ফেলুন
                                    </a>
                                </div>
                            </div>


                            <div class="col-lg-3 col-xl-2 col-md-4 col-sm-6">
                                <div class="single-shop">
                                    <div class="shop-img">
                                        <img src="{{ asset('frontend') }}/img/books/2.jpg" style="width: 100%" alt="Image">

                                        <ul>
                                            <li>
                                                <a href="#">
                                                    <a href="#product-view-one" data-toggle="modal">
                                                        <i class="bx bx-show-alt"></i>
                                                    </a>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="bx bx-heart"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>

                                    <h3>ফিলিস্তিনের বুকে ইসরাইল</h3>
                                    <span> <del>৳২৯০</del> ৳২৫০</span>

                                    <a href="{{ route('cart') }}" class="default-btn">
                                        কার্টে ফেলুন
                                    </a>
                                </div>
                            </div>


                            <div class="col-lg-3 col-xl-2 col-md-4 col-sm-6">
                                <div class="single-shop">
                                    <div class="shop-img">
                                        <img src="{{ asset('frontend') }}/img/books/3.jpg" style="width: 100%" alt="Image">

                                        <ul>
                                            <li>
                                                <a href="#">
                                                    <a href="#product-view-one" data-toggle="modal">
                                                        <i class="bx bx-show-alt"></i>
                                                    </a>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="bx bx-heart"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>

                                    <h3>ফিলিস্তিনের বুকে ইসরাইল</h3>
                                    <span> <del>৳২৯০</del> ৳২৫০</span>

                                    <a href="{{ route('cart') }}" class="default-btn">
                                        কার্টে ফেলুন
                                    </a>
                                </div>
                            </div>


                            <div class="col-lg-3 col-xl-2 col-md-4 col-sm-6">
                                <div class="single-shop">
                                    <div class="shop-img">
                                        <img src="{{ asset('frontend') }}/img/books/4.jpg" style="width: 100%" alt="Image">

                                        <ul>
                                            <li>
                                                <a href="#">
                                                    <a href="#product-view-one" data-toggle="modal">
                                                        <i class="bx bx-show-alt"></i>
                                                    </a>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="bx bx-heart"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>

                                    <h3>ফিলিস্তিনের বুকে ইসরাইল</h3>
                                    <span> <del>৳২৯০</del> ৳২৫০</span>

                                    <a href="{{ route('cart') }}" class="default-btn">
                                        কার্টে ফেলুন
                                    </a>
                                </div>
                            </div>


                            <div class="col-lg-3 col-xl-2 col-md-4 col-sm-6">
                                <div class="single-shop">
                                    <div class="shop-img">
                                        <img src="{{ asset('frontend') }}/img/books/5.jpg" style="width: 100%" alt="Image">

                                        <ul>
                                            <li>
                                                <a href="#">
                                                    <a href="#product-view-one" data-toggle="modal">
                                                        <i class="bx bx-show-alt"></i>
                                                    </a>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="bx bx-heart"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>

                                    <h3>ফিলিস্তিনের বুকে ইসরাইল</h3>
                                    <span> <del>৳২৯০</del> ৳২৫০</span>

                                    <a href="{{ route('cart') }}" class="default-btn">
                                        কার্টে ফেলুন
                                    </a>
                                </div>
                            </div>




                            <div class="col-lg-3 col-xl-2 col-md-4 col-sm-6">
                                <div class="single-shop">
                                    <div class="shop-img">
                                        <img src="{{ asset('frontend') }}/img/books/6.jpeg" style="width: 100%" alt="Image">

                                        <ul>
                                            <li>
                                                <a href="#">
                                                    <a href="#product-view-one" data-toggle="modal">
                                                        <i class="bx bx-show-alt"></i>
                                                    </a>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="bx bx-heart"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>

                                    <h3>ফিলিস্তিনের বুকে ইসরাইল</h3>
                                    <span> <del>৳২৯০</del> ৳২৫০</span>

                                    <a href="{{ route('cart') }}" class="default-btn">
                                        কার্টে ফেলুন
                                    </a>
                                </div>
                            </div>


                            <div class="col-lg-3 col-xl-2 col-md-4 col-sm-6">
                                <div class="single-shop">
                                    <div class="shop-img">
                                        <img src="{{ asset('frontend') }}/img/books/2.jpg" style="width: 100%" alt="Image">

                                        <ul>
                                            <li>
                                                <a href="#">
                                                    <a href="#product-view-one" data-toggle="modal">
                                                        <i class="bx bx-show-alt"></i>
                                                    </a>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="bx bx-heart"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>

                                    <h3>ফিলিস্তিনের বুকে ইসরাইল</h3>
                                    <span> <del>৳২৯০</del> ৳২৫০</span>

                                    <a href="{{ route('cart') }}" class="default-btn">
                                        কার্টে ফেলুন
                                    </a>
                                </div>
                            </div>


                            <div class="col-lg-3 col-xl-2 col-md-4 col-sm-6">
                                <div class="single-shop">
                                    <div class="shop-img">
                                        <img src="{{ asset('frontend') }}/img/books/3.jpg" style="width: 100%" alt="Image">

                                        <ul>
                                            <li>
                                                <a href="#">
                                                    <a href="#product-view-one" data-toggle="modal">
                                                        <i class="bx bx-show-alt"></i>
                                                    </a>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="bx bx-heart"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>

                                    <h3>ফিলিস্তিনের বুকে ইসরাইল</h3>
                                    <span> <del>৳২৯০</del> ৳২৫০</span>

                                    <a href="{{ route('cart') }}" class="default-btn">
                                        কার্টে ফেলুন
                                    </a>
                                </div>
                            </div>


                            <div class="col-lg-3 col-xl-2 col-md-4 col-sm-6">
                                <div class="single-shop">
                                    <div class="shop-img">
                                        <img src="{{ asset('frontend') }}/img/books/4.jpg" style="width: 100%" alt="Image">

                                        <ul>
                                            <li>
                                                <a href="#">
                                                    <a href="#product-view-one" data-toggle="modal">
                                                        <i class="bx bx-show-alt"></i>
                                                    </a>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="bx bx-heart"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>

                                    <h3>ফিলিস্তিনের বুকে ইসরাইল</h3>
                                    <span> <del>৳২৯০</del> ৳২৫০</span>

                                    <a href="{{ route('cart') }}" class="default-btn">
                                        কার্টে ফেলুন
                                    </a>
                                </div>
                            </div>


                            <div class="col-lg-3 col-xl-2 col-md-4 col-sm-6">
                                <div class="single-shop">
                                    <div class="shop-img">
                                        <img src="{{ asset('frontend') }}/img/books/5.jpg" style="width: 100%" alt="Image">

                                        <ul>
                                            <li>
                                                <a href="#">
                                                    <a href="#product-view-one" data-toggle="modal">
                                                        <i class="bx bx-show-alt"></i>
                                                    </a>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="bx bx-heart"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>

                                    <h3>ফিলিস্তিনের বুকে ইসরাইল</h3>
                                    <span> <del>৳২৯০</del> ৳২৫০</span>

                                    <a href="{{ route('cart') }}" class="default-btn">
                                        কার্টে ফেলুন
                                    </a>
                                </div>
                            </div>



                            <div class="col-lg-3 col-xl-2 col-md-4 col-sm-6">
                                <div class="single-shop">
                                    <div class="shop-img">
                                        <img src="{{ asset('frontend') }}/img/books/6.jpeg" style="width: 100%" alt="Image">

                                        <ul>
                                            <li>
                                                <a href="#">
                                                    <a href="#product-view-one" data-toggle="modal">
                                                        <i class="bx bx-show-alt"></i>
                                                    </a>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="bx bx-heart"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>

                                    <h3>ফিলিস্তিনের বুকে ইসরাইল</h3>
                                    <span> <del>৳২৯০</del> ৳২৫০</span>

                                    <a href="{{ route('cart') }}" class="default-btn">
                                        কার্টে ফেলুন
                                    </a>
                                </div>
                            </div>


                            <div class="col-lg-3 col-xl-2 col-md-4 col-sm-6">
                                <div class="single-shop">
                                    <div class="shop-img">
                                        <img src="{{ asset('frontend') }}/img/books/2.jpg" style="width: 100%" alt="Image">

                                        <ul>
                                            <li>
                                                <a href="#">
                                                    <a href="#product-view-one" data-toggle="modal">
                                                        <i class="bx bx-show-alt"></i>
                                                    </a>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="bx bx-heart"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>

                                    <h3>ফিলিস্তিনের বুকে ইসরাইল</h3>
                                    <span> <del>৳২৯০</del> ৳২৫০</span>

                                    <a href="{{ route('cart') }}" class="default-btn">
                                        কার্টে ফেলুন
                                    </a>
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
    </div>
    <!-- End Shop Area -->

    <!-- Start Product View One Area -->
    <div class="modal fade product-view-one" id="product-view-one">
        <div class="modal-dialog">
            <div class="modal-content">
                <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">
							<i class="bx bx-x"></i>
						</span>
                </button>

                <div class="row align-items-center">
                    <div class="col-lg-4 col-md-6">
                        <div class="product-view-one-image">
                            <div class="item text-center">
                                <img src="{{ asset('frontend') }}/img/books/1.jpg" alt="Image">
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-8 col-md-6">
                        <div class="product-content">
                            <h3>
                                <a href="#">ফিলিস্তিনের বুকে ইসরাইল</a>
                            </h3>

                            <div class="price">
                                <del>৳২৯০</del> <span class="new-price">৳২৪০</span>
                            </div>

                            <div class="product-review">
                                <div class="rating">
                                    <i class="bx bxs-star"></i>
                                    <i class="bx bxs-star"></i>
                                    <i class="bx bxs-star"></i>
                                    <i class="bx bxs-star"></i>
                                    <i class="bx bxs-star"></i>
                                </div>
                                <a href="#" class="rating-count">৩টি রিভিউ</a>
                            </div>

                            <ul class="product-info mb-2">
                                <li>
                                    <p>বইটি সম্পর্কে সংক্ষেপে কিছু কথা বলতে চাইলে বলতে হবে এটি একটি বই এবং চমৎকার রকমের বই যার কোন তুলনা হইলেও হইতে পারে।</p>
                                </li>
                                <li>
                                    <span>স্টক:</span> <a href="#">স্টকে ৭টি বই আছে</a>
                                </li>
                            </ul>

                            <div class="product-add-to-cart">
                                <div class="input-counter">
                                        <span class="minus-btn">
											<i class="bx bx-minus"></i>
										</span>

                                    <input type="text" value="1">

                                    <span class="plus-btn">
											<i class="bx bx-plus"></i>
										</span>
                                </div>

                                <button type="submit" class="default-btn">
                                    কার্টে ফেলুন
                                    <i class="flaticon-right"></i>
                                </button>
                            </div>

                            <div class="share-this-product">
                                <h3>বইটি শেয়ার করুন</h3>

                                <ul>
                                    <li>
                                        <a href="#">
                                            <i class="bx bxl-facebook"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="bx bxl-twitter"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="bx bxl-instagram"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="bx bxl-linkedin"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Product View One Area -->

@endsection
