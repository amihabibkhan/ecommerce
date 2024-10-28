@extends('frontend.layouts.inner_layout')

@section('page_title')কার্ট@endsection

@section('inner_content')

    <!-- Start Cart Area -->
    <section class="cart-area ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <form>
                        <div class="cart-wraps">
                            <div class="cart-table table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th scope="col">কভার পেইজ</th>
                                        <th scope="col">বইয়ের নাম</th>
                                        <th scope="col">মূল্য</th>
                                        <th scope="col">সংখ্যা</th>
                                        <th scope="col">সর্বমোট</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    <tr>
                                        <td class="product-thumbnail">
                                            <a href="#" style="background-color: #fde9e9; padding: 12px">
                                                <img src="{{ asset('frontend') }}/img/books/1.jpg" alt="Image">
                                            </a>
                                        </td>

                                        <td class="product-name">
                                            <a href="#">ইসরাইলের ‍বুকে ফিলিস্তিন</a>
                                        </td>

                                        <td class="product-price">
                                            <span class="unit-amount">৳২৯০.০০</span>
                                        </td>

                                        <td class="product-quantity">
                                            <div class="input-counter">
														<span class="minus-btn">
															<i class='bx bx-minus' ></i>
														</span>
                                                <input type="text" value="1">
                                                <span class="plus-btn">
															<i class='bx bx-plus' ></i>
														</span>
                                            </div>
                                        </td>

                                        <td class="product-subtotal">
                                            <span class="subtotal-amount">৳২৯০.০০</span>

                                            <a href="#" class="remove">
                                                <i class="bx bx-x"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="product-thumbnail">
                                            <a href="#" style="background-color: #fde9e9; padding: 12px">
                                                <img src="{{ asset('frontend') }}/img/books/1.jpg" alt="Image">
                                            </a>
                                        </td>

                                        <td class="product-name">
                                            <a href="#">ইসরাইলের ‍বুকে ফিলিস্তিন</a>
                                        </td>

                                        <td class="product-price">
                                            <span class="unit-amount">৳২৯০.০০</span>
                                        </td>

                                        <td class="product-quantity">
                                            <div class="input-counter">
														<span class="minus-btn">
															<i class='bx bx-minus' ></i>
														</span>
                                                <input type="text" value="1">
                                                <span class="plus-btn">
															<i class='bx bx-plus' ></i>
														</span>
                                            </div>
                                        </td>

                                        <td class="product-subtotal">
                                            <span class="subtotal-amount">৳২৯০.০০</span>

                                            <a href="#" class="remove">
                                                <i class="bx bx-x"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="product-thumbnail">
                                            <a href="#" style="background-color: #fde9e9; padding: 12px">
                                                <img src="{{ asset('frontend') }}/img/books/1.jpg" alt="Image">
                                            </a>
                                        </td>

                                        <td class="product-name">
                                            <a href="#">ইসরাইলের ‍বুকে ফিলিস্তিন</a>
                                        </td>

                                        <td class="product-price">
                                            <span class="unit-amount">৳২৯০.০০</span>
                                        </td>

                                        <td class="product-quantity">
                                            <div class="input-counter">
														<span class="minus-btn">
															<i class='bx bx-minus' ></i>
														</span>
                                                <input type="text" value="1">
                                                <span class="plus-btn">
															<i class='bx bx-plus' ></i>
														</span>
                                            </div>
                                        </td>

                                        <td class="product-subtotal">
                                            <span class="subtotal-amount">৳২৯০.০০</span>

                                            <a href="#" class="remove">
                                                <i class="bx bx-x"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="product-thumbnail">
                                            <a href="#" style="background-color: #fde9e9; padding: 12px">
                                                <img src="{{ asset('frontend') }}/img/books/1.jpg" alt="Image">
                                            </a>
                                        </td>

                                        <td class="product-name">
                                            <a href="#">ইসরাইলের ‍বুকে ফিলিস্তিন</a>
                                        </td>

                                        <td class="product-price">
                                            <span class="unit-amount">৳২৯০.০০</span>
                                        </td>

                                        <td class="product-quantity">
                                            <div class="input-counter">
														<span class="minus-btn">
															<i class='bx bx-minus' ></i>
														</span>
                                                <input type="text" value="1">
                                                <span class="plus-btn">
															<i class='bx bx-plus' ></i>
														</span>
                                            </div>
                                        </td>

                                        <td class="product-subtotal">
                                            <span class="subtotal-amount">৳২৯০.০০</span>

                                            <a href="#" class="remove">
                                                <i class="bx bx-x"></i>
                                            </a>
                                        </td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>

                            <div class="coupon-cart">
                                <div class="row">
                                    <div class="col-lg-8 col-sm-7">
                                        <div class="form-group mb-0">
                                            <input type="text" class="form-control" placeholder="কুপন কোড দিন">

                                            <a href="#" class="default-btn">কুপন এপ্লাই করুন</a>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-sm-5 text-right">
                                        <a href="#" class="default-btn update">
                                            কার্ট আপডেট করুন
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="col-lg-4">
                    <h3 class="cart-checkout-title">একনজরে</h3>
                    <div class="cart-totals">
                        <ul>
                            <li>সাবটোটাল <span>৩২০০.০০/-</span></li>
                            <li>ডেলিভারি চার্জ <span>৪০.০০/-</span></li>
                            <li>মোট <span>৩২৪০.০০/-</span></li>
                            <li>ডিসকাউন্ট <span>২৪০.০০/-</span></li>
                            <li><b>সর্বমোট</b> <span><b>৩০০০.০০/-</b></span></li>
                        </ul>

                        <a href="#" class="default-btn two">
                            কিনে ফেলুন
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Cart Area -->

@endsection
