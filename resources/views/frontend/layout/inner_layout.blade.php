@extends('frontend.layouts.frontend-layout')

@section('main_content')

    <!-- Start Page Title Area -->
    <div class="page-title-area" style="background-image: url('{{ asset('frontend') }}/img/banner-img/inner-bg.png'); background-size: unset; background-repeat: no-repeat; background-position-x: right; background-position-y: bottom; background-color: #330033">
        <div class="container">
            <div class="page-title-content">
                <h2 style="color: #fff">@yield('page_title')</h2>
                <ul>
                    <li>
                        <a href="{{ route('index') }}" style="color: #fff">
                            মূলপাতা
                        </a>
                    </li>

                    <li class="active">@yield('page_title')</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- End Page Title Area -->

    @yield('inner_content')
@endsection
