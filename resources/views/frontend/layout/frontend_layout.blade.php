<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta property="og:title" content="@yield('title', 'FALASTIN')">
    <meta property="og:description" content="@yield('description', 'FALASTIN Product')">
    <meta property="og:url" content="{{ Request::url() }}">
    <meta property="og:image" content="@yield('image')">
    <meta property="product:brand" content="@yield('brand', 'FALASTIN')">
    <meta property="product:availability" content="@yield('availability', 'in stock')">
    <meta property="product:condition" content="New">
    <meta property="product:price:amount" content="@yield('price', '0')">
    <meta property="product:price:currency" content="BDT">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('frontend_2') }}/css/bootstrap.min.css">

    <!-- fontawesome CSS -->
    <link rel="stylesheet" href="{{ asset('frontend_2') }}/css/all.min.css">

    <!-- slick slider css-->
    <link rel="stylesheet" href="{{ asset('frontend_2') }}/plugins/slick-slider/slick.css">

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('frontend_2') }}/css/style.css">

    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{ asset('frontend_2') }}/css/responsive.css">

    @yield('css')

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('storage') }}/{{ get_option('logo') }}">

    <!-- Title -->
    <title>ফালাস্তিন :: Falastin</title>
</head>
<body>

<!-- header top start -->
<div class="header-top">
    <div class="container">
        <div class="row">
            <div class="col-4 col-md-2">
                <img src="{{ asset('storage') }}/{{ get_option('logo') }}" class="header-top__logo" alt="Falastin logo">
            </div>
            <div class="col-md-7 order-4 order-md-2">
                <form action="" class="header-top__search-form">
                    <input type="text" class="form-control" placeholder="বইয়ের নাম দিয়ে সার্চ করুন...">
                    <button class="header-top__search-form__button"><i class="fas fa-search"></i></button>
                </form>
            </div>
            <div class="col-2 col-md-1 order-2 order-md-3 text-center">
                <a href="{{ route('show_cart') }}" class="header-top__cart">
                    <i class="fas fa-shopping-basket"></i>
                    <span class="header-top__cart__badge">{{ count($cart) }}</span>
                </a>
            </div>
            <div class="col-6 col-md-2 order-3 order-md-4 text-right ">
                <a href="{{ route('login') }}" class="header-top__login-button">লগইন/রেজিস্টার</a>
            </div>
        </div>
    </div>
</div>
<!-- header top end -->

<!-- main navbar start -->
<nav class="main-menu">
    <div class="container">
        <div class="main-menu__arrows">
            <i class="fas fa-angle-left"></i>
            <i class="fas fa-angle-right"></i>
        </div>
        <ul class="main-menu__slider">
            <li class="main-menu--active"><a href="#">হোম</a></li>
            <li><a href="all_books.html">সকল বই</a></li>
            <li><a href="#">বিষয় সমূহ</a></li>
            <li><a href="#">লেখক</a></li>
            <li><a href="#">প্রকাশক</a></li>
            <li><a href="#">প্রি-অর্ডার</a></li>
            <li><a href="#">প্যাকেজ</a></li>
            <li><a href="#">বিষয় সমূহ</a></li>
            <li><a href="#">লেখক</a></li>
            <li><a href="#">প্রকাশক</a></li>
            <li><a href="#">প্রি-অর্ডার</a></li>
            <li><a href="#">প্যাকেজ</a></li>
            <li><a href="#">বিষয় সমূহ</a></li>
            <li><a href="#">লেখক</a></li>
            <li><a href="#">প্রকাশক</a></li>
            <li><a href="#">প্রি-অর্ডার</a></li>
            <li><a href="#">প্যাকেজ</a></li>
            <li><a href="#">বিষয় সমূহ</a></li>
            <li><a href="#">লেখক</a></li>
            <li><a href="#">প্রকাশক</a></li>
            <li><a href="#">প্রি-অর্ডার</a></li>
            <li><a href="#">প্যাকেজ</a></li>
        </ul>
    </div>
</nav>
<!-- main navbar end -->

@yield('main_content')

<!-- footer start -->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <h2 class="footer__about-title">বিকিরণ শপ</h2>
                <p class="footer__about-description">আমাদের ব্যপারে সংক্ষিপ্ত কথা বলে দিচ্ছি এখানে। তাই আর কোন কথা বলবেন না কিন্তু। আমরা খুব ভালো মানুষ বঝেছেন? না বুঝলে কি আর করার আছে? আমি তো চেষ্টা কম করলাম না।</p>
                <a href="tel:8801770496249" class="footer__social-media"><i class="fas fa-phone"></i></a>
                <a href="" class="footer__social-media"><i class="fab fa-facebook-f"></i></a>
                <a href="" class="footer__social-media"><i class="fab fa-youtube"></i></a>
                <a href="" class="footer__social-media"><i class="fas fa-envelope"></i></a>
            </div>
            <div class="col-lg-3 col-md-6">
                <h3 class="footer__section-subtitle">জনপ্রিয় লেখক</h3>
                @foreach($footer_writers as $single_writer)
                    <a class="footer__link-item" href="{{ route('frontend.singleWriter', $single_writer->slug) }}">{{ $single_writer->name }}</a>
                @endforeach
            </div>
            <div class="col-lg-3 col-md-6">
                <h3 class="footer__section-subtitle">নতুন প্রকাশিত</h3>
                    @foreach($footer_books as $single_book)
                        <a href="{{ route('frontend.singleProduct', $single_book->slug) }}" class="footer__link-item">{{ $single_book->title }}</a>
                    @endforeach
            </div>
            <div class="col-lg-2 col-md-6">
                <h3 class="footer__section-subtitle">গুরুত্বপূর্ণ লিংক</h3>
                <a class="footer__link-item" href="{{ route('frontend.bookShop') }}">সকল বই</a>
                <a class="footer__link-item" href="{{ route('frontend.allWriters') }}">লেখক তালিকা</a>
                <a class="footer__link-item" href="#">প্রশ্নোত্তর</a>
                <a class="footer__link-item" href="#">নিয়মাবলি</a>
                <a class="footer__link-item" href="#">প্রাইভেসি পলেসি</a>
            </div>
        </div>
    </div>
</footer>
<!-- footer end -->

<!-- copyright start -->
<div class="copyright">
    <p>Copyright &copy; 2024 | All right reserved | Developed by <a href="https://innovait.com.bd/">INNOVA IT</a></p>
</div>
<!-- copyright end -->




<!--  JS  -->
<script src="{{ asset('frontend_2') }}/js/jquery-3.5.1.slim.min.js"></script>
<script src="{{ asset('frontend_2') }}/js/bootstrap.bundle.min.js"></script>

<!-- slick slider -->
<script src="{{ asset('frontend_2') }}/plugins/slick-slider/slick.min.js"></script>

<!-- custom JS -->
<script src="{{ asset('frontend_2') }}/js/custom.js"></script>


<script src="{{ asset('admin/plugins/toastr/toastr.min.js') }}"></script>

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

@yield('javascript')

</body>
</html>
