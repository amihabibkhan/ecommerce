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
        .single-shop .shop-img ul {
             -webkit-transform: none;
             transform: none;
             -webkit-transition: none;
             transition: none;
        }
    </style>

    <div class="single-shop" style="background: #f3f3f3;">
        <div class="shop-img mb-0" style="padding: 15px;">

            <a href="{{ route('frontend.singleProduct', $product->slug) }}" class="d-block" style="position: relative">
            @if($product->main_image)
                    <img src="{{ img($product->main_image) }}" style="width: 100%" alt="Image">
                @else
                <div class="not_image">
                    <span>
                        <b>{{ $product->title }}</b>
                        <br>
                        {{ $product['writer']['name'] }}
                    </span>
                </div>
            @endif
            </a>
                <ul>
                    <li>
                        <a href="#product_view{{ $product->id }}" data-toggle="modal">
                            <i class="bx bx-show-alt"></i>
                        </a>
                    </li>
                    <li>
                        @if(!exists_in_cart($product->id))
                            <button class="add_to_cart" data-operate="addition" data-id="{{ $product->id }}" data-qty="1" style="background-color: transparent; padding: 0" href="#">
                                <i class="bx bx-cart"></i>
                            </button>
                        @else
                            <button style="background-color: transparent; padding: 0" href="#" disabled>
                                <i class="bg-success text-light bx bx-cart"></i>
                            </button>
                        @endif
                    </li>
                </ul>

        </div>
        <div style="width: 100%;height: 50px !important;overflow: hidden">
            <h3 style="font-size: 16px; margin-top: 0; font-weight: 700; color: #0baf01">
                <a href="{{ route('frontend.singleProduct', $product->slug) }}">{{ $product->title }}</a>
            </h3>
        </div>
        <div style="width: 100%; height: 25px; overflow: hidden">
            <h4 style="font-size: 12px; margin: 5px 0;">{{ $product['writer']['name'] }}</h4>
        </div>
        <div style="display:flex; background-color: black; justify-content: space-between;">
            <div style="background-color: #b5f2f7; flex: 1; font-weight: bold; font-family: 'Rubik', sans-serif; color: #3c3a00; padding: 2px 0">
                @if($product->sale_price != null)
                    <del style="font-size: 12px; color: #888888">TK.{{ $product->regular_price }}</del> TK. {{ $product->sale_price }}
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
                                    <img src="{{ img($product->main_image) }}" style="width: 100%" alt="Image">
                                @else
                                    <div class="not_image">
                                        <span>
                                            <b>{{ $product->title }}</b>
                                            <br>
                                            {{ $product['writer']['name'] }}

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


                            @if(!exists_in_cart($product->id))
                                <button class="add_to_cart default-btn" data-operate="addition" data-id="{{ $product->id }}" data-qty="1" href="#">
                                    কার্টে যুক্ত করুন<i class="bx bx-cart"></i>
                                </button>
                            @else
                                <button class="btn btn-success" href="#" disabled>
                                    অলরেডি ‍যুক্ত আছে<i class="bg-success text-light bx bx-cart"></i>
                                </button>
                            @endif

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
