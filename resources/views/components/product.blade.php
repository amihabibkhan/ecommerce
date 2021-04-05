<div>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <style>
        .not_image{
            border: 1px solid #dddddd;
            position: relative;
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
    </style>

    <div class="single-shop" style="background: #f3f3f3;">
        <div class="shop-img mb-0" style="padding: 15px;">

            <a href="{{ route('frontend.singleProduct', $product->slug) }}" class="d-block" style="position: relative">
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
            </a>

            <form action="{{ route('add_to_cart') }}" method="POST">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <input type="hidden" name="qty" value="1">
                <ul>
                    <li>
                        <a href="#product_view{{ $product->id }}" data-toggle="modal">
                            <i class="bx bx-show-alt"></i>
                        </a>
                    </li>
                    <li>
                        <button style="background-color: transparent; padding: 0" href="#">
                            <i class="bx bx-cart"></i>
                        </button>
                    </li>
                </ul>
            </form>

        </div>
        <h3 style="font-size: 16px; margin-top: 0; font-weight: 700; color: #0baf01">
            <a href="{{ route('frontend.singleProduct', $product->slug) }}">{{ $product->title }}</a>
        </h3>
        <h4 style="font-size: 16px; margin: 5px 0;">{{ @$product->writer->name }}</h4>
        <div style="display:flex; background-color: black; justify-content: space-between;">
            <div style="background-color: #b5f2f7; flex: 1; font-weight: bold; font-family: 'Rubik', sans-serif; color: #3c3a00; padding: 2px 0">
                @if($product->sale_price != null)
                    <del>TK{{ $product->regular_price }}</del> TK. {{ $product->sale_price }}
                @else
                    TK. {{ $product->regular_price }}
                @endif
            </div>
{{--            <div style="background-color: #ffdf93; flex: 1; color: black; padding: 2px 0">--}}
{{--                @if($product->stock == 1)--}}
{{--                    স্টকে আছে--}}
{{--                @else--}}
{{--                    স্টকে নেই--}}
{{--                @endif--}}
{{--            </div>--}}
        </div>
    </div>



    <style>
        .modal{
            z-index: 9999!important;
            transition: all .5s;
            top: -50px !important;
        }
        .modal.show{
            top: 0 !important;
        }
    </style>
    <div class="modal product-view-one" id="product_view{{ $product->id }}">
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
                    </div>

                    <div class="col-lg-8 col-md-6">
                        <div class="product-content">
                            <h3>
                                <a href="#">{{ $product->title }}</a>
                            </h3>

                            <div class="price">
                                @if($product->sale_price != null)
                                    <del>TK{{ $product->regular_price }}</del> TK. {{ $product->sale_price }}
                                @else
                                    TK. {{ $product->regular_price }}
                                @endif
                            </div>

                            <ul class="product-info mb-2">
                                <li>
                                    {!! Str::limit($product->description, 200) !!}
                                </li>
                                <li>
                                    <span>স্টক:</span>
                                    @if($product->stock == 1)
                                        স্টকে আছে
                                    @else
                                        স্টকে নেই
                                    @endif
                                </li>
                            </ul>

                            <form action="{{ route('add_to_cart') }}" method="POST">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <div class="product-add-to-cart">
                                    <div class="input-counter">
                                            <span class="minus-btn">
                                                <i class="bx bx-minus"></i>
                                            </span>

                                        <input name="qty" type="text" value="1">

                                        <span class="plus-btn">
                                                <i class="bx bx-plus"></i>
                                            </span>
                                    </div>

                                    <button type="submit" class="default-btn">
                                        অর্ডার করুন
                                        <i class="flaticon-right"></i>
                                    </button>
                                </div>
                            </form>

                            <div class="share-this-product">
                                <h3>বইটি শেয়ার করুন</h3>

                                <ul>
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
