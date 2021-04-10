<!doctype html>
<html lang="zxx">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <meta property="og:title" content="@yield('title', 'BIKIRONSHOP')">
    <meta property="og:description" content="@yield('description', 'BIKIRONSHOP Product')">
    <meta property="og:url" content="{{ Request::url() }}">
    <meta property="og:image" content="@yield('image')">
    <meta property="product:brand" content="@yield('brand', 'BIKIRONSHOP')">
    <meta property="product:availability" content="@yield('availability', 'in stock')">
    <meta property="product:condition" content="New">
    <meta property="product:price:amount" content="@yield('price', '0')">
    <meta property="product:price:currency" content="BDT">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/bootstrap.min.css">
    <!-- Owl Theme Default CSS -->
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/owl.theme.default.min.css">
    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/owl.carousel.min.css">
    <!-- Owl Magnific CSS -->
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/magnific-popup.css">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/animate.css">
    <!-- Boxicons CSS -->
    <link rel="stylesheet" href="{{ asset('frontend') }}/icons/css/boxicons.min.css">
    <!-- <link href='https://unpkg.com/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.6.19/dist/css/uikit.min.css" />

    <link rel="stylesheet" href="{{ asset('frontend') }}/plugins/slider/css/jquery.animateSlider.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/plugins/slider/css/font-awesome.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/plugins/slider/css/normalize.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/plugins/slider/css/demo1.css">
    <link rel="stylesheet" href="{{ asset('admin/plugins/toastr/toastr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/offer.css') }}">

    @yield('css')

    <!-- Flaticon CSS -->
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/flaticon.css">
    <!-- Meanmenu CSS -->
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/meanmenu.css">
    <!-- Nice Select CSS -->
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/nice-select.css">
    <!-- Odometer CSS-->
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/odometer.css">
    <!-- Style CSS -->
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/style.css">
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/my.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{ asset('frontend') }}/css/responsive.css">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('frontend') }}/img/favicon.png">
    <!-- Title -->
    <title>বিকিরণ শপ :: Bikiron Shop</title>
    <style>
        .teachers-area::before{
            content: unset;
        }
    </style>

    {{-- instantjs for algolia--}}
    <script src="https://cdn.jsdelivr.net/npm/algoliasearch@4.5.1/dist/algoliasearch-lite.umd.js" integrity="sha256-EXPXz4W6pQgfYY3yTpnDa3OH8/EPn16ciVsPQ/ypsjk=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/instantsearch.js@4.8.3/dist/instantsearch.production.min.js" integrity="sha256-LAGhRRdtVoD6RLo2qDQsU2mp+XVSciKRC8XPOBWmofM=" crossorigin="anonymous"></script>
    <!-- Facebook Pixel Code -->
    <script>
        !function(f,b,e,v,n,t,s)
        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
            n.callMethod.apply(n,arguments):n.queue.push(arguments)};
            if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
            n.queue=[];t=b.createElement(e);t.async=!0;
            t.src=v;s=b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t,s)}(window, document,'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '130776775568255');
        fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
                   src="https://www.facebook.com/tr?id=130776775568255&ev=PageView&noscript=1"
        /></noscript>
    <!-- End Facebook Pixel Code -->
    @livewireStyles
</head>

<body>
{{--<!-- Start Preloader Area -->--}}
{{--<div class="loader-wrapper">--}}
{{--    <div class="loader">--}}
{{--        <div class="dot-wrap">--}}
{{--            <span class="dot"></span>--}}
{{--            <span class="dot"></span>--}}
{{--            <span class="dot"></span>--}}
{{--            <span class="dot"></span>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
{{--<!-- End Preloader Area -->--}}



<!-- Load Facebook SDK for JavaScript -->
<div id="fb-root"></div>
<script>
    window.fbAsyncInit = function() {
        FB.init({
            xfbml            : true,
            version          : 'v9.0'
        });
    };

    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/bn_IN/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

<!-- Your Chat Plugin code -->
<div class="fb-customerchat"
     attribution=setup_tool
     page_id="2258326131078463"
     theme_color="#fa3c4c"
     logged_in_greeting="আসসালামু আলাইকুম। বিকিরণ লাইভ চ্যাটে স্বাগতম। দয়া করে আপনার প্রশ্ন করুন।"
     logged_out_greeting="আসসালামু আলাইকুম। বিকিরণ লাইভ চ্যাটে স্বাগতম। দয়া করে আপনার প্রশ্ন করুন।">
</div>




<header>
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-2 col-6">
                <div class="logo">
                    <a href="{{ route('index') }}">
                        <img src="{{ asset('storage') }}/{{ get_option('logo') }}" alt="BIKIRON SHOP">
                    </a>
                </div>
            </div>
            <div class="col-lg-7 mb-4 mb-lg-0 order-3 order-lg-2 d-flex">
                <form action="{{ route('frontend.bookShop') }}" class="align-self-center search_form" style="flex: 1;">
                    <div class="input-group mb-0">
                        <input type="text" name="search" onblur="close_search()" onfocus="start_search()" id="search_input" class="search_field form-control" placeholder="">
                        <div class="input-group-append">
                            <button class="btn search_button" type="submit" id="button-addon2">সার্চ করুন</button>
                        </div>
                    </div>
                    <div class="search_result d-none" id="hits"></div>
                </form>
            </div>


            <script>
                function close_search(){
                    document.getElementById('hits').classList.add('d-none')
                }
                function start_search(){
                    document.getElementById('hits').classList.remove('d-none')
                }
                const algoliaClient = algoliasearch(
                    '{{ config("scout.algolia.id") }}',
                    'a3306e7956f83141adc475124b8a185e'
                );

                const searchClient = {
                    search(requests) {
                        if (requests.every(({ params }) => !params.query)) {
                            return Promise.resolve({
                                results: requests.map(() => ({
                                    hits: [],
                                    nbHits: 0,
                                    nbPages: 0,
                                })),
                            });
                        }

                        return algoliaClient.search(requests);
                    },
                };

                const search = instantsearch({
                    indexName: 'products',
                    searchClient,
                    searchFunction(helper) {
                        const container = document.querySelector('#hits');
                        container.style.display = helper.state.query === '' ? 'none' : '';

                        helper.search();
                    }
                });

                search.addWidgets([
                    {
                        init(opts) {
                            const helper = opts.helper;
                            const input = document.querySelector('#search_input');
                            input.addEventListener('input', ({currentTarget}) => {
                                helper.setQuery(currentTarget.value) // update the parameters
                                    .search(); // launch the query
                            });
                        }
                    },
                    {
                        render(options) {
                            const results = options.results;
                            // read the hits from the results and transform them into HTML.
                            document.querySelector('#hits').innerHTML = results.hits
                                .map(
                                    hit => `<a href='{{ url('/product') }}/${hit.slug}'>
                                                <div>
                                                    <img src='{{ asset('storage') }}/${hit.main_image}'/>
                                                </div>
                                                <div>
                                                <p>${hit.title}</p>
                                                <p>প্রোডাক্ট কোড: ${hit.product_code}</p>
                                                </div>
                                            </a>`
                                )
                                .join('');
                        },
                    }
                ]);
                search.start();

            </script>









            <div class="col-lg-2 col-6 order-2 order-lg-3 d-flex justify-content-end">
                <div class="cart-icon align-self-center">
                    <a href="{{ route('show_cart') }}">
                        <i class="flaticon-shopping-cart"></i>
                        <span style="color: black; font-weight: bold; padding: 2px" class="cart_quantity">{{ count($cart) }}</span>
                    </a>
                </div>
                <div class="cart-icon account_icon  align-self-center">
                    <a href="{{ route('login') }}" class="user_icon">
                        <i class="bx bx-user"></i>
                    </a>
                </div>
                <div class="cart-icon d-block d-lg-none menu_button align-self-center">
                    <a href="javascript(0)" data-toggle="collapse" data-target="#my_nav">
                        <i class="bx bx-menu"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</header>

{{-- menu start --}}
<div class="nav_container">
    <div class="container" id="get_width">
        <nav class="navbar custom-nav navbar-expand-lg navbar-light">
            <div class="collapse navbar-collapse" id="my_nav">
                <ul class="navbar-nav mx-auto">
                    @foreach($main_menu as $single_menu)
                        @if($single_menu->id == 1)
                            @continue
                        @endif
                        <li class="nav-item {{ Request::segment(1) == 'book' && $single_menu->id == 2 ? 'active' : '' }}
                            @if(Request::segment(2) == $single_menu->slug)
                            active
                            @endif
                            ">
                            <a class="nav-link" href="{{ $single_menu->id == 2 ? route('frontend.bookShop'): route('frontend.singleMainCategory', $single_menu->slug) }}">{{ $single_menu->title }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </nav>
    </div>
</div>
<div class="container d-none d-lg-block sub_nav_container">
    <div class="sub_nav">
        <ul>
            @if(Request::segment(1) == 'book' || Request::routeIs('index'))
                <li class="has_menu" id="writer_menu"><a href="{{ route('frontend.allWriters') }}">লেখক</a></li>
                <li class="has_menu" id="subject_menu"><a href="{{ route('frontend.bookShop') }}">বিষয়</a></li>
                <li class="has_menu" id="publication_menu"><a href="{{ route('frontend.allPublications') }}">প্রকাশনী</a></li>
                @foreach($book_menu as $single_item)
                    @if($loop->index == 4)
                        @break
                    @endif
                    <li><a href="{{ route('frontend.singleCategory', $single_item->slug) }}">{{ $single_item->title }}</a></li>
                @endforeach
            @endif

            @foreach($main_menu as $single_menu)
                @if($single_menu->id == 1)
                    @continue
                @endif
                @if(Request::segment(2) == $single_menu->slug)
                    @foreach($single_menu->categories as $single_item)
                        @if($loop->index == 6)
                            @break
                        @endif
                        <li><a href="{{ route('frontend.singleCategory', $single_item->slug) }}">{{ $single_item->title }}</a></li>
                    @endforeach
                @endif
            @endforeach
        </ul>
    </div>


    <div class="sub_dropdown">
        <div class="mega_menu" id="writer_mega_menu">
            <div class="row">
                @foreach($menu_writers as $single_writer)
                    <div class="col-md-3">
                        <ul><li><a href="{{ route('frontend.singleWriter', $single_writer->slug) }}">{{ $single_writer->name }}</a></li> </ul>
                    </div>
                @endforeach
                <div class="col-md-3">
                    <ul><li><a href="{{ route('frontend.allWriters') }}">সকল লেখক</a></li> </ul>
                </div>
            </div>
        </div>
        <div class="mega_menu" id="publication_mega_menu">
            <div class="row">
                @foreach($menu_pubs as $single_pubs)
                    <div class="col-md-3">
                        <ul><li><a href="{{ route('frontend.singlePublication', $single_pubs->slug) }}">{{ $single_pubs->name }}</a></li> </ul>
                    </div>
                @endforeach
                <div class="col-md-3">
                    <ul><li><a href="{{ route('frontend.allPublications') }}">সকল প্রকাশনী</a></li> </ul>
                </div>
            </div>
        </div>
        <div class="mega_menu" id="suject_mega_menu">
            <div class="row">
                @foreach($menu_topics as $single_topic)
                    <div class="col-md-3">
                        <ul><li><a href="{{ route('frontend.bookShop') }}?topics%5B%5D={{ $single_topic->id }}">{{ $single_topic->title }}</a></li> </ul>
                    </div>
                @endforeach
                <div class="col-md-3">
                    <ul><li><a href="{{ route('frontend.bookShop') }}">আরও বিষয়</a></li> </ul>
                </div>
            </div>
        </div>
    </div>
</div>

@yield('main_content')

<!-- Start Footer Top Area -->
<footer class="footer-top-area pt-100 pb-70">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="footer-widget">
                    <h3>যোগাযোগ</h3>

                    <ul class="address">
                        <li class="location">
                            <i class="bx bx-home-alt"></i>
                            {{ get_option('address') }}
                        </li>

                        <li>
                            <i class="bx bxs-envelope"></i>
                            <a href="mailto:{{ get_option('email_1') }}">{{ get_option('email_1') }}</a>
                            <a href="mailto:{{ get_option('email_2') }}">{{ get_option('email_2') }}</a>
                        </li>

                        <li>
                            <i class="bx bxs-phone-call"></i>
                            <a href="tel:{{ get_option('phone_1') }}">{{ get_option('phone_1') }}</a>
                            <a href="tel:{{ get_option('phone_2') }}">{{ get_option('phone_2') }}</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6">
                <div class="footer-widget">
                    <h3>গুরত্বপূর্ণ লিংক</h3>

                    <ul class="link">
                        <li>
                            <a href="{{ route('frontend.bookShop') }}">সকল বই</a>
                        </li>
                        <li>
                            <a href="{{ route('frontend.allWriters') }}">লেখক তালিকা</a>
                        </li>
                        <li>
                            <a href="#">প্রশ্নোত্তর</a>
                        </li>
                        <li>
                            <a href="#">নিয়মাবলি</a>
                        </li>
                        <li>
                            <a href="#">প্রাইভেসি পলেসি</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6">
                <div class="footer-widget">
                    <h3>নতুন বই গুলো</h3>

                    <ul class="link">
                        @foreach($footer_books as $single_book)
                            <li>
                                <a href="{{ route('frontend.singleProduct', $single_book->slug) }}">{{ $single_book->title }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6">
                <div class="footer-widget">
                    <h3>জনপ্রিয় লেখক</h3>

                    <ul class="link">
                        @foreach($footer_writers as $single_writer)
                            <li>
                                <a href="{{ route('frontend.singleWriter', $single_writer->slug) }}">{{ $single_writer->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- End Footer Top Area -->

<!-- Start Footer Bottom Area -->
<footer class="footer-bottom-area">
    <div class="container">
        <div class="copyright-wrap">
            <p>বিকিরণশপ &copy; ২০২০ | ডেভেলপড বাই <a href="http://legenditinstitute.com/" target="_blank">লিজেন্ড আইটি</a></p>
        </div>
    </div>
</footer>
<!-- End Footer Bottom Area -->

<!-- Start Go Top Area -->
<div class="go-top">
    <i class='bx bx-chevrons-up'></i>
    <i class='bx bx-chevrons-up'></i>
</div>
<!-- End Go Top Area -->


<style>
    .remove {
        margin-left: 50px;
        width: 30px;
        height: 30px;
        line-height: 34px;
        display: inline-block;
        background-color: var(--white-color);
        border-radius: 50%;
        font-size: 20px;
        -webkit-transition: var(--transition);
        transition: var(--transition);
        color: #444 !important;
        -webkit-box-shadow: var(--box-shadow);
        box-shadow: var(--box-shadow);
        float: right;
    }
    .remove:hover {
        background-color: #ff0000;
        color: #fff !important;
    }
</style>
<div id="cart-offcanvas" uk-offcanvas="flip: true; overlay: true">
    <div class="uk-offcanvas-bar bg-light text-dark px-3">
        <button class="text-dark uk-offcanvas-close" type="button" uk-close></button>
        <p style="border-bottom: 2px solid #333">শপিং কার্ট</p>
        <hr>
            @livewire('offcanvas-cart')
        <table class="uk-table uk-table-small">
            <tr>
                <td>
                    <b>সর্বমোট</b>
                </td>
                <td class="text-right">
                    <b class="intotal">{{ $total = \Gloudemans\Shoppingcart\Facades\Cart::subtotal(0, '', '')  }}/-</b>
                </td>
            </tr>
            <tr>
                <td>
                    <a href="{{ route('checkout_page') }}" class="default-btn two btn-block px-0">কিনে ফেলুন</a>
                </td>
                <td>
                    <a href="{{ route('show_cart') }}" class="btn btn-secondary two btn-lg btn-block px-0">কার্ট দেখুন</a>
                </td>
            </tr>
        </table>
    </div>
</div>


<script>
    window.addEventListener('showCartOffcanvas', event => {
        UIkit.offcanvas("#cart-offcanvas").show();
    });
</script>
<!-- Jquery-3.5.1.Slim.Min.JS -->
<script src="{{ asset('frontend') }}/js/jquery-3.5.1.slim.min.js"></script>
<!-- Popper JS -->
<script src="{{ asset('frontend') }}/js/popper.min.js"></script>
<!-- Bootstrap JS -->
<script src="{{ asset('frontend') }}/js/bootstrap.min.js"></script>
<!-- Meanmenu JS -->
<script src="{{ asset('frontend') }}/js/jquery.meanmenu.js"></script>
<!-- Wow JS -->
<script src="{{ asset('frontend') }}/js/wow.min.js"></script>
<!-- Owl Carousel JS -->
<script src="{{ asset('frontend') }}/js/owl.carousel.js"></script>
<!-- Owl Magnific JS -->
<script src="{{ asset('frontend') }}/js/jquery.magnific-popup.min.js"></script>
<!-- Nice Select JS -->
<script src="{{ asset('frontend') }}/js/jquery.nice-select.min.js"></script>
<!-- Parallax JS -->
<script src="{{ asset('frontend') }}/js/parallax.min.js"></script>
<!-- Appear JS -->
<script src="{{ asset('frontend') }}/js/jquery.appear.js"></script>
<!-- Odometer JS -->
<script src="{{ asset('frontend') }}/js/odometer.min.js"></script>
<!-- Form Validator JS -->
<script src="{{ asset('frontend') }}/js/form-validator.min.js"></script>
<!-- Contact JS -->
<script src="{{ asset('frontend') }}/js/contact-form-script.js"></script>
<!-- Ajaxchimp JS -->
<script src="{{ asset('frontend') }}/js/jquery.ajaxchimp.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/typed.js/1.1.1/typed.min.js"></script>
<script src="{{ asset('admin/plugins/toastr/toastr.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/uikit@3.6.19/dist/js/uikit.min.js"></script>
@livewireScripts



{!! Toastr::message() !!}
<script>
    @if($errors->any())
    @foreach($errors->all() as $error)
    toastr.error('{{ $error }}', 'Error', {
        closeButton: true,
        progressBar: true
    });
    @endforeach
    @endif
</script>


<script>
    $(function () {
        var div_width = $('.shop-img').width();
        var div_height = div_width * 150 /100;
        $('.not_image').css({ 'height' : div_height + 'px'});

        var div_width = $('.get_writer_width').width();
        $('.not_image_writer').css({ 'height' : div_width + 'px'});

        $('#subject_menu').hover(function(){
            $('#suject_mega_menu').addClass('mega_menu_show');
        },function(){
            $('#suject_mega_menu').removeClass('mega_menu_show');
        });

        $('#publication_menu').hover(function(){
            $('#publication_mega_menu').addClass('mega_menu_show');
        },function(){
            $('#publication_mega_menu').removeClass('mega_menu_show');
        });

        $('#writer_menu').hover(function(){
            $('#writer_mega_menu').addClass('mega_menu_show');
        },function(){
            $('#writer_mega_menu').removeClass('mega_menu_show');
        });


        // search bar typed
        $("#search_input").typed({
            strings: ["Search by books (ex: প্রোডাক্টিভ মুসলিম, প্যারাডক্সিক্যাল সাজিদ)", "Search by publisher (ex: গার্ডিয়ান, আঙ্গিনা, রাইজ পাবলিকেশন্স)", "Search by writer (ex: হামিদ সিরাজী, রুহুল আমিন, আরিফ আজাদ)"],
            typeSpeed: 80,
            startDelay: 1200,
            backSpeed: -2000,
            backDelay: 0,
            loop: true,
            loopCount: false,
            showCursor: true,
            cursorChar: "|",
            contentType: 'html',
            attr: 'placeholder'
        });
    });
</script>
<!-- Custom JS -->
<script src="{{ asset('frontend') }}/js/custom.js"></script>


@yield('javascript')
@stack('footer_javascript')
<script>
        $(document).on('click','.add_to_cart',function(e){
            var element  = $(this);
            var id = $(this).data('id');
            var qty = $(this).data('qty');
            $.ajax({
                method: 'POST',
                url: "{{ route('add_to_cart') }}",
                headers: {
                    'X-CSRF-TOKEN': "{{csrf_token()}}"
                },
                beforeSend: function(){
                    element.attr('disabled',1);
                    element.html('<i class="fas fa-spinner"></i>');
                },
                data: {product_id: id, qty: qty},
                success:function(result){
                    $(".cart_quantity").text(result.quantity);
                    element.html('<i class="text-success fas fa-check"></i>');
                    // UIkit.offcanvas("#cart-offcanvas").show();
                    $("#showCartOffcanvas" ).trigger( "click" );
                },
                error:function(){
                    alert('error');
                }
            });
        });
</script>



<script>
    $(document).on('click','.remove',function(e){
        e.preventDefault();
        var element  = $(this);
        var coupon_code = "{{ $coupon_code ?? '' }}";
        var rowId = $(this).data('rawid');
        $.ajax({
            method: 'POST',
            url: "{{ route('remove_cart_item') }}",
            headers: {
                'X-CSRF-TOKEN': "{{csrf_token()}}"
            },
            beforeSend: function(){
                element.attr('disabled',1);
            },
            data: {rowId: rowId,coupon_code: coupon_code},
            success:function(result){
                $(".cart-item_"+result.rowId).fadeOut();
                $(".cart-item_"+result.rowId).remove();

                $(".cart_quantity").text(result.quantity);

                $("#subtotal").text(result.subtotal+"/-");
                $("#total").text(result.total+"/-");
                $("#discount").text(result.discount+"/-");
                $(".intotal").text(result.intotal+"/-");
                $("#intotal").text(result.intotal+"/-");
            },
            error:function(){

            }
        });
    });
</script>

</body>
</html>
