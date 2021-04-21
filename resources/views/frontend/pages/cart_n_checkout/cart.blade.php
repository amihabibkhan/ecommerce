@extends('frontend.layout.frontend_layout')

@section('main_content')
    <style>
        .minus-cart {
            position: absolute;
            top: 0;
            left: 0;
            border: 1px solid #cfcfcf;
            cursor: pointer;
            color: var(--body-color);
            width: 40px;
            height: 100%;
            line-height: 48px;
            -webkit-transition: var(--transition);
            transition: var(--transition);
            font-size: 20px;
        }
        .plus-cart {
            position: absolute;
            top: 0;
            right: 0;
            border: 1px solid #cfcfcf;
            cursor: pointer;
            color: var(--body-color);
            width: 40px;
            height: 100%;
            line-height: 48px;
            -webkit-transition: var(--transition);
            transition: var(--transition);
            font-size: 20px;
        }
        .cursor-not-allowed {
            background: #cac6c6;
            cursor: none;
        }
    </style>
{{--    <x-inner-page-banner :title="$title = 'কার্ট'" />--}}
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
                                    <th scope="col" style="width: 200px;">নাম</th>
                                    <th scope="col">মূল্য</th>
                                    <th scope="col">সংখ্যা</th>
                                    <th scope="col">সর্বমোট</th>
                                    <th scope="col">বাদ দিন</th>
                                </tr>
                                </thead>

                                <tbody>
                                @forelse($cart as $single_cart_item)
                                    <tr class="cart-item_{{ $single_cart_item->rowId }}">
                                        <td class="product-thumbnail">
                                            <a href="#" style="background-color: #fde9e9; padding: 12px">
                                                <img src="{{ img($single_cart_item->options->image)  }}" alt="Image">
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
                                                <span class="product-qty minus-cart {{ $single_cart_item->qty <= 1 ? 'cursor-not-allowed' : '' }} minus-{{ $single_cart_item->rowId }}" data-type="substruct" data-rowid="{{ $single_cart_item->rowId }}">
                                                    <i class='bx bx-minus' ></i>
                                                </span>
                                                <input type="text" value="{{ $single_cart_item->qty }}" readonly id="qty_{{ $single_cart_item->rowId }}">
                                                <span class="product-qty plus-cart" data-type="addition" data-rowid="{{ $single_cart_item->rowId }}">
                                                    <i class='bx bx-plus' ></i>
                                                </span>
                                            </div>
                                        </td>

                                        <td>
                                            <span class="subtotal-amount subtotal_single_{{ $single_cart_item->rowId }}">{{ $single_cart_item->subtotal }}</span>
                                        </td>
                                        <td class="product-subtotal">
                                            <a href="#" class="remove" data-rawid="{{ $single_cart_item->rowId }}" style="float: unset;margin-left: 0">
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

                    </div>

                </div>

                <div class="col-lg-4">
                    <h3 class="cart-checkout-title mt-0">একনজরে</h3>
                    <div class="cart-totals">
                        <ul>
                            <li>সাবটোটাল <span id="subtotal">{{ \Gloudemans\Shoppingcart\Facades\Cart::subtotal(0) }}/-</span></li>
                            <li>মোট <span id="total">{{ $total = \Gloudemans\Shoppingcart\Facades\Cart::subtotal(0, '', '')  }}/-</span></li>
                            <li>ডিসকাউন্ট <span id="discount">{{ $discount = $coupon ? ($coupon->discount_amount ? $coupon->discount_amount : ($total * $coupon->discount_percent / 100)) : 0 }}/-</span></li>
                            <li><b>সর্বমোট</b> <span><b id="intotal">{{ $total - $discount }}/-</b></span></li>
                        </ul>

                        <a href="{{ route('checkout_page') }}{{ $coupon ? '?coupon_code=' . $coupon->coupon_code : ''}}" class="default-btn two">
                            কিনে ফেলুন
                        </a>
                    </div>

                    @if(count($cart) > 0)
                        <div class="coupon-cart">
                            @if($coupon)
                                <div style="margin-bottom: 10px; font-weight: 700">"{{ $coupon->offer_title }}" কুপনটি যোগ হয়েছে।</div>
                            @endif
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group mb-0">
                                        <form action="{{ route('show_cart') }}" method="get">
                                            <input type="text" class="form-control" name="coupon_code" placeholder="কুপন কোড দিন">

                                            <button type="submit" class="default-btn px-2">এপ্লাই করুন</button>
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
        </div>
    </section>
    <!-- End Cart Area -->
    <div class="container">
        <div class="section-title" style="max-width: 100%; text-align: left; margin-bottom: 30px; border-bottom: 1px solid white; padding-bottom: 10px;">
            <h2 style="font-size: 26px;">যে পণ্যগুলি দেখেছেন</h2>
        </div>
        @livewire('visited-product')
    </div>
@endsection
@push('footer_javascript')

    <script>
        $(document).on('click','.product-qty',function(e){
            e.preventDefault();
            var element  = $(this);
            var type = $(this).data('type');
            var rowid = $(this).data('rowid');
            var value = $("#qty_"+rowid).val();
            var coupon_code = "{{ $coupon_code ?? '' }}";
            $.ajax({
                method: 'POST',
                url: "{{ route('update_cart') }}",
                headers: {
                    'X-CSRF-TOKEN': "{{csrf_token()}}"
                },
                beforeSend: function(){
                    element.attr('disabled',1);
                },
                data: {rowid: rowid,type:type,value:value,coupon_code:coupon_code},
                success:function(result){
                    if(result.msg == 'success'){

                        if(result.current_pro_qty < 2){
                            $(".minus-"+rowid).addClass('cursor-not-allowed');
                        }else{
                            $(".minus-"+rowid).removeClass('cursor-not-allowed');
                        }

                        $("#qty_"+rowid).val(result.current_pro_qty);
                        $(".subtotal_single_"+rowid).text(result.subtotal_single);

                        $(".cart_quantity").text(result.quantity);

                        $("#subtotal").text(result.subtotal+"/-");
                        $("#total").text(result.total+"/-");
                        $("#discount").text(result.discount+"/-");
                        $("#intotal").text(result.intotal+"/-");
                    }
                },
                error:function(){
                    // alert('error');
                }
            });
        });
    </script>
@endpush
