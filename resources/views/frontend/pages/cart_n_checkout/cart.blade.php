@extends('frontend.layout.frontend_layout')

@section('main_content')
    <x-inner-page-banner :title="$title = 'কার্ট'" />
    <!-- Start Cart Area -->
    <section class="cart-area ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-12">
                    <div class="cart-wraps">
                        <div class="cart-table table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th scope="col">ইমেইজ</th>
                                    <th scope="col">নাম</th>
                                    <th scope="col">মূল্য</th>
                                    <th scope="col">সংখ্যা</th>
                                    <th scope="col">সর্বমোট</th>
                                    <th scope="col">বাদ দিন</th>
                                </tr>
                                </thead>

                                <tbody>
                                @forelse($cart as $single_cart_item)
                                    <tr>
                                        <td class="product-thumbnail">
                                            <a href="#" style="background-color: #fde9e9; padding: 12px">
                                                <img src="{{ asset('storage') }}/{{ $single_cart_item->options->image }}" alt="Image">
                                            </a>
                                        </td>

                                        <td class="product-name">
                                            <a href="{{ route('frontend.singleProduct', $single_cart_item->options->slug) }}">{{ $single_cart_item->name }}</a>
                                        </td>

                                        <td class="product-price">
                                            <span class="unit-amount">{{ $single_cart_item->price }} TK.</span>
                                        </td>

                                        <td class="product-quantity">
                                            <div class="input-counter">
                                                <form action="{{ route('update_cart') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" value="{{ $single_cart_item->rowId }}" name="rowId">
                                                    <input type="text" style="padding-right: 39px" name="qty" value="{{ $single_cart_item->qty }}">
                                                    <button type="submit" class="update-btn">
                                                        <i class='bx bx-check'></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>

                                        <td>
                                            <span class="subtotal-amount">{{ $single_cart_item->subtotal }}</span>
                                        </td>
                                        <td class="product-subtotal">
                                            <a href="{{ route('remove_cart_item', $single_cart_item->rowId) }}" onclick="return confirm('Are you sure to remove this item?')" class="remove" style="float: unset;margin-left: 0">
                                                <i class="bx bx-x"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr><td colspan="6">কার্টে কোন প্রডাক্ট নেই</td></tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>

                        @if(count($cart) > 0)
                            <div class="coupon-cart">
                                @if($coupon)
                                    <div style="margin-bottom: 10px; font-weight: 700">"{{ $coupon->offer_title }}" কুপনটি যোগ হয়েছে।</div>
                                @endif
                                <div class="row">
                                    <div class="col-lg-8 col-sm-7">
                                        <div class="form-group mb-0">
                                            <form action="{{ route('show_cart') }}" method="get">
                                                <input type="text" class="form-control" name="coupon_code" placeholder="কুপন কোড দিন">

                                                <button type="submit" class="default-btn">কুপন এপ্লাই করুন</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @else
                            <a href="{{ route('frontend.bookShop') }}" style="color: black" class="default-btn">কেনাকাটা করুন</a>
                        @endif
                    </div>
                </div>

                <div class="col-lg-4">
                    <h3 class="cart-checkout-title mt-0">একনজরে</h3>
                    <div class="cart-totals">
                        <ul>
                            <li>সাবটোটাল <span>{{ \Gloudemans\Shoppingcart\Facades\Cart::subtotal(0) }}/-</span></li>
                            <li>মোট <span>{{ $total = \Gloudemans\Shoppingcart\Facades\Cart::subtotal(0, '', '')  }}/-</span></li>
                            <li>ডিসকাউন্ট <span>{{ $discount = $coupon ? ($coupon->discount_amount ? $coupon->discount_amount : ($total * $coupon->discount_percent / 100)) : 0 }}/-</span></li>
                            <li><b>সর্বমোট</b> <span><b>{{ $total - $discount }}/-</b></span></li>
                        </ul>

                        <a href="{{ route('checkout_page') }}{{ $coupon ? '?coupon_code=' . $coupon->coupon_code : ''}}" class="default-btn two">
                            কিনে ফেলুন
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Cart Area -->

@endsection
