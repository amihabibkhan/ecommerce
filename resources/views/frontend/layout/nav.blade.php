
<!-- Start Navbar Area -->
<div class="navbar-area">
    <!-- Menu For Mobile Device -->
    <div class="mobile-nav">
        <a href="{{ route('index') }}" class="logo">
            <img src="{{ asset('storage') }}/{{ get_option('logo') }}" alt="Logo">
        </a>
    </div>

    <!-- Menu For Desktop Device -->
    <div class="main-nav">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-md">
                <a class="navbar-brand" href="{{ route('index') }}">
                    <img src="{{ asset('storage') }}/{{ get_option('logo') }}" alt="Logo">
                </a>

                <div class="collapse navbar-collapse mean-menu">
                    <ul class="navbar-nav m-auto">
                        <li class="nav-item"> <a href="{{ route('index') }}" class="nav-link active"> মূলপাতা  </a> </li>
                        <li class="nav-item"> <a href="#" class="nav-link">সকল বই</a> </li>
                        <li class="nav-item"> <a href="#" class="nav-link"> কেনাকাটা </a> </li>
                        <li class="nav-item"> <a href="#" class="nav-link">অনুবাদক</a> </li>
                        <li class="nav-item"> <a href="#" class="nav-link">লেখক</a> </li>
                        <li class="nav-item"> <a href="#" class="nav-link">ব্লগ</a> </li>
                        <li class="nav-item"> <a href="#" class="nav-link">যোগাযোগ</a> </li>
                    </ul>

                    <!-- Start Other Option -->
                    <div class="others-option">
                        <div class="option-item">
                            <i class="search-btn bx bx-search"></i>
                            <i class="close-btn bx bx-x"></i>

                            <div class="search-overlay search-popup">
                                <div class='search-box'>
                                    <form class="search-form">
                                        <input class="search-input" name="search" placeholder="বই খুজুন" type="text">

                                        <button class="search-button" type="submit"><i class="bx bx-search"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="cart-icon">
                            <a href="{{ route('show_cart') }}">
                                <i class="flaticon-shopping-cart"></i>
                                <span>0</span>
                            </a>
                        </div>
                    </div>
                    <!-- End Other Option -->
                </div>
            </nav>
        </div>
    </div>

    <!-- Start Others Option For Responsive -->
    <div class="others-option-for-responsive">
        <div class="container">
            <div class="dot-menu">
                <div class="inner">
                    <div class="circle circle-one"></div>
                    <div class="circle circle-two"></div>
                    <div class="circle circle-three"></div>
                </div>
            </div>

            <div class="container">
                <div class="option-inner">
                    <div class="others-option justify-content-center d-flex align-items-center">
                        <div class="option-item">
                            <i class="search-btn bx bx-search"></i>
                            <i class="close-btn bx bx-x"></i>

                            <div class="search-overlay search-popup">
                                <div class='search-box'>
                                    <form class="search-form">
                                        <input class="search-input" name="search" placeholder="বই খুজুন" type="text">

                                        <button class="search-button" type="submit"><i class="bx bx-search"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="cart-icon">
                            <a href="{{ route('show_cart') }}">
                                <i class="flaticon-shopping-cart"></i>
                                <span>0</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Others Option For Responsive -->
</div>
<!-- End Navbar Area -->
