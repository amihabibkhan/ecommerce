@extends('frontend.layout.frontend_layout')

@section('main_content')
    <x-inner-page-banner :title="$title = 'চেক আউট'" />
    <!-- Start Checkout Area -->
    <section class="checkout-area ptb-100">
        <div class="container">
            <form method="POST" action="{{ route('order_management.store') }}">
                @csrf
                <input type="hidden" name="coupon_code" value="{{ $coupon ? $coupon->coupon_code : '' }}">
                <div class="row">
                    <div class="col-lg-8 col-md-12">
                        <div class="billing-details">
                            <h3 class="title">বিলিং এবং শিপিং তথ্য</h3>

                            <div class="mb-4">
                                <input type="checkbox" name="account_create" id="account_create" onchange="createAccount()"> নতুন অ্যাকাউন্ট তৈরি করতে টিক দিন। অ্যাকাউন্ট তৈরি করে আপনি পরবর্তীতে দ্রুত কেনাকাটা করতে পারবেন এবং সবগুলি অর্ডারের সম্পর্কে বিস্তারিত দেখতে পারবেন অথবা ইতিমধ্যে অ্যাকাউন্ট তৈরি করে থাকলে
                                <a href="{{ route('login') }}" style="color: black"><b>লগইন করুন</b></a>
                            </div>

                            <div class="mb-4 d-none" id="password_field">
                                পাসওয়ার্ড দিয়ে এই অর্ডারটি সম্পন্ন করুন তাতে নতুন অ্যাকাউন্ট তৈরি হবে। পরবর্তী অর্ডারে ইমেইল অ্যাড্রেস এবং পাসওয়ার্ড দিয়ে লগইন করতে পারবেন।
                                <input type="password" name="password" class="form-control mt-2" placeholder="পাসওয়ার্ড দিন">
                            </div>

                            <script>
                                function createAccount(){
                                    var classCheck = document.getElementById('password_field').classList;
                                    if(classCheck.contains('d-none')){
                                        classCheck.remove('d-none')
                                    }else{
                                        classCheck.add('d-none')
                                    }
                                }
                            </script>

                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label>নাম <span class="required">*</span></label>
                                        <input type="text" name="name" value="{{ auth()->check() ? auth()->user()->name : old('name') }}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label>ই-মেইল এড্রেস <span class="required">*</span></label>
                                        <input type="email" name="email" value="{{ auth()->check() ? auth()->user()->email : old('email') }}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label>ফোন নাম্বার <span class="required">*</span></label>
                                        <input type="text" name="phone" value="{{ auth()->check() ? auth()->user()->phone : old('phone') }}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-group">
                                        <label>জরুরী ফোন</label>
                                        <input type="text" name="emergency_phone" value="{{ old('emergency_phone') }}" class="form-control">
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label>জেলা <span class="required">*</span></label>

                                        <div class="select-box">
                                            <select class="form-control" name="district_id" id="dnice_select">
                                                @foreach($districts as $single_district)
                                                    <option value="{{ $single_district->id }}">{{ $single_district->bn_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-lg-12 col-md-6">
                                    <div class="form-group">
                                        <label>পূর্ণ ঠিকানা <span class="required">*</span></label>
                                        <input type="text" name="full_address" class="form-control">
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12">
                                    <div class="form-group">
                                        <label>অন্যান্য তথ্য (Optional)</label>
                                        <textarea name="note" id="notes" style="font-family: 'Hind Siliguri'" cols="30" rows="8" class="form-control" placeholder="অর্ডার বা পণ্য ডেলিভারি সংক্রান্ত আরো কোনো তথ্য থাকলে দিন"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-12">
                        <div class="order-details">
                            <div class="cart-totals">
                                <h3 class="cart-checkout-title mt-0">একনজরে</h3>
                                <div class="cart-totals">
                                    <ul>
                                        <li>সাবটোটাল <span ><b id="sub_total">{{ \Gloudemans\Shoppingcart\Facades\Cart::subtotal(0, '', '') }}</b>/-</span></li>
                                        <li>ডেলিভারি চার্জ <span><b id="delivery_charge">0</b>/-</span></li>
                                        <li>মোট <span><b id="total">{{ $total = \Gloudemans\Shoppingcart\Facades\Cart::subtotal(0, '', '') }}</b>/-</span></li>
                                        <li>ডিসকাউন্ট <span><b id="discount">{{ $discount = $coupon ? ($coupon->discount_amount ? $coupon->discount_amount : ($total * $coupon->discount_percent / 100)) : 0 }}</b>/-</span></li>
                                        <li><b>সর্বমোট</b> <span><b id="grand_total">{{ $total - $discount }}</b>/-</span></li>
                                    </ul>
                                </div>
                            </div>

                            <script>
                                function changeShiping(cost){
                                    var sub_total = parseFloat(document.getElementById('sub_total').innerText);
                                    var discount = parseFloat(document.getElementById('discount').innerText);
                                    var delivery_charge = document.getElementById('delivery_charge').innerText = parseFloat(cost);
                                    document.getElementById('total').innerText = sub_total + delivery_charge;
                                    document.getElementById('grand_total').innerText = (sub_total + delivery_charge) - discount;
                                }
                            </script>

                            <div class="order-details">
                                <div class="cart-totals">
                                    <h3 class="cart-checkout-title mt-0">শিপিং মেথড</h3>
                                    <div class="p-4 pb-2">
                                        @foreach($couriers as $single_courier)
                                            <div class="custom-control custom-radio mb-2">
                                                <input type="radio" onchange="changeShiping({{ $single_courier->cost }})" value="{{ $single_courier->id }}" {{ $single_courier->cost == 0 ? 'checked' : '' }} class="custom-control-input" id="shiping{{ $single_courier->id }}" name="courier_id" required>
                                                <label class="custom-control-label" for="shiping{{ $single_courier->id }}">{{ $single_courier->system }} ({{ $single_courier->cost }} TK)</label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <div class="faq-accordion">
                                <h3>পেমেন্ট মেথড</h3>

                                <ul class="accordion">

                                    <li class="accordion-item">
                                        <a class="accordion-title" href="javascript:void(0)">
                                            ক্যাশ অন ডেলিভারি
                                        </a>

                                        <p class="accordion-content">
                                            আপনার দরজায় প্রোডাক্ট পৌছে যাবে। আপনি প্রোডাক্টটি বুঝে নিবেন এবং নির্ধারিত মূল্য পরিশোধ করবেন।
                                        </p>
                                    </li>

                                    <li class="accordion-item">
                                        <a class="accordion-title" href="javascript:void(0)">
                                            বিকাশ
                                        </a>

                                        <p class="accordion-content">
                                            আমরা খুব দ্রতই বিকাশ পেমেন্ট গেটওয়ে এড করব। সাময়িক অসুবিধার জন্য দুঃখিত।
                                        </p>
                                    </li>

                                    <li class="place-order">
                                        <button type="submit" class="default-btn two">
                                            অর্ডার করুন
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!-- End Checkout Area -->

@endsection


@section('javascript')

    <script>
        $(function(){
            $('#dnice_select').niceSelect('destroy');
        })
    </script>

@endsection
