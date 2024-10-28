<!doctype html>
<html lang="zxx">
<head>
    @include('frontend.layout.header')
    <!-- Title -->
    <title>@yield('page_title', 'ফালাস্তিন')</title>
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

@include('frontend.layout.nav')

@yield('main_content')

{{-- footer include --}}

@include('frontend.layout.footer')

</body>
</html>
