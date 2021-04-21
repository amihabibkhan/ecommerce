<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="BIKIRON SHOP">
    <meta name="author" content="RUHUL AMIN">

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('admin') }}/images/favicon.ico">

    <!-- App title -->
    <title>@yield('page_title', 'Dashboard') </title>

    <!-- date range picker -->
    <link href="{{ asset('admin/plugins') }}/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- Custom box css -->
    <link href="{{ asset('admin/plugins') }}/custombox/css/custombox.min.css" rel="stylesheet">


    @yield('plugin_css')

    <!-- App css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin') }}/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('admin') }}/css/icons.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('admin') }}/css/style.css" />

    <link rel="stylesheet" href="{{ asset('admin/plugins') }}/switchery/switchery.min.css">
    <link rel="stylesheet" href="{{ asset('admin/plugins/toastr/toastr.min.css') }}">

    <script src="{{ asset('admin') }}/js/modernizr.min.js"></script>

    <style>
        table tr td,
        table tr th{
            vertical-align: middle !important;
        }
        .cursor-pointer{
            cursor: pointer !important;
        }
    </style>
    @livewireStyles


</head>


<body class="fixed-left">

<!-- Begin page -->
<div id="wrapper">

    <!-- Top Bar Start -->
    <div class="topbar">

        <!-- LOGO -->
        <div class="topbar-left">
            @php $userName = auth()->user()->name @endphp
            <a href="{{ route('home') }}" class="logo"><span>{{ substr($userName,0,strlen($userName) / 2) }}<span>{{ substr($userName,strlen($userName) / 2) }}</span></span><i class="mdi mdi-layers"></i></a>
        </div>

        <!-- Button mobile view to collapse sidebar menu -->
        <div class="navbar navbar-default" role="navigation">
            <div class="container-fluid">

                <div class="clearfix">
                    <!-- Navbar-left -->
                    <ul class="nav navbar-left">
                        <li>
                            <button class="button-menu-mobile open-left waves-effect">
                                <i class="mdi mdi-menu"></i>
                            </button>
                        </li>
                        <li class="d-none d-sm-inline-block">
                            @yield('search')
{{--                            <form role="search" class="app-search">--}}
{{--                                <input type="text" placeholder="Search..."--}}
{{--                                       class="form-control">--}}
{{--                                <a href=""><i class="fa fa-search"></i></a>--}}
{{--                            </form>--}}
                        </li>
                    </ul>

                    <!-- Right(Notification) -->
                    <ul class="nav navbar-right">
                        <li>
                            @livewire('admin.notification')
                        </li>


                        <li class="dropdown user-box">
                            <a href="" class="dropdown-toggle waves-effect user-link" data-toggle="dropdown" aria-expanded="true">
                                <img src="{{ asset('admin') }}/images/users/avatar-1.jpg" alt="user-img" class="rounded-circle user-img">
                            </a>

                            <ul class="dropdown-menu dropdown-menu-right arrow-dropdown-menu arrow-menu-right user-list notify-list">
                                <li>
                                    <h5>Hi, {{ auth::user()->name }}</h5>
                                </li>
                                <li><a href="{{ route('settings') }}" class="dropdown-item"><i class="ti-user m-r-5"></i> Profile</a></li>
                                <li><a href="{{ route('settings') }}" class="dropdown-item"><i class="ti-settings m-r-5"></i> Settings</a></li>
                                <li>
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-item"><i class="ti-power-off m-r-5"></i> Logout</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </li>

                    </ul>
                    <!-- end navbar-right -->

                </div>

            </div><!-- end container -->
        </div><!-- end navbar -->
    </div>
    <!-- Top Bar End -->


    <!-- ========== Left Sidebar Start ========== -->
    <div class="left side-menu">
        <div class="sidebar-inner slimscrollleft">

            <!--- Sidemenu -->
            <div id="sidebar-menu">
                <ul>
                    <li>
                        <a href="{{ route('home') }}" class="waves-effect"><i class="mdi mdi-view-dashboard"></i><span> Dashboard </span> </a>
                    </li>


                    @if(auth::user()->role_id == 1 || auth::user()->role_id == 2 || auth::user()->role_id == 4)
                        {{-- products --}}
                        <li class="has_sub">
                            <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-cube"></i><span> Products </span> <span class="menu-arrow"></span></a>
                            <ul class="list-unstyled">
                                <li><a href="{{ route('manage_products.create') }}">Add New</a></li>
                                <li><a href="{{ route('manage_products.index') }}">All Products</a></li>
                            </ul>
                        </li>
                        {{-- categories --}}
                        <li class="has_sub">
                            <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-format-list-bulleted-type"></i><span> Categories </span> <span class="menu-arrow"></span></a>
                            <ul class="list-unstyled">
                                <li><a href="{{ route('manage_main_category.index') }}">Main Categories</a></li>
                                <li><a href="{{ route('manage_category.index') }}">Categories</a></li>
                                <li><a href="{{ route('manage_sub_category.index') }}">Sub Categories</a></li>
                            </ul>
                        </li>
                        <li class="menu-title">Attributes</li>
                        {{-- Books attributes --}}
                        <li class="has_sub">
                            <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-book-open-variant"></i><span> Book Attributes </span> <span class="menu-arrow"></span></a>
                            <ul class="list-unstyled">
                                <li><a href="{{ route('manage_writer.index') }}">Writers</a></li>
                                <li><a href="{{ route('manage_translator.index') }}">Translator</a></li>
                                <li><a href="{{ route('manage_publications.index') }}">Publications</a></li>
                                <li><a href="{{ route('manage_countries.index') }}">Countries</a></li>
                                <li><a href="{{ route('manage_languages.index') }}">Languages</a></li>
                            </ul>
                        </li>
                        {{-- others attributes --}}
                        <li class="has_sub">
                            <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-artstation"></i><span> Others Attributes </span> <span class="menu-arrow"></span></a>
                            <ul class="list-unstyled">
                                <li><a href="{{ route('manage_brands.index') }}">Brands</a></li>
                                <li><a href="{{ route('manage_colors.index') }}">Colors</a></li>
                                <li><a href="{{ route('manage_sizes.index') }}">Sizes</a></li>
                                <li><a href="{{ route('manage_tags.index') }}">Tags</a></li>
                            </ul>
                        </li>
                    @endif

                    @if(auth::user()->role_id == 1 || auth::user()->role_id == 2)
                        {{-- orders --}}
                        <li class="has_sub">
                            <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-google-analytics"></i><span>Analytics </span> <span class="menu-arrow"></span></a>
                            <ul class="list-unstyled">
                                <li><a href="{{ route('order_processing.index') }}?type=new">New Orders</a></li>
                                <li><a href="{{ route('order_processing.index') }}">All Orders</a></li>
                                <li><a href="{{ route('manage_offer.index') }}">Weekly Offer</a></li>
                                <li><a href="{{ route('manage_coupon.index') }}">Coupons</a></li>
                            </ul>
                        </li>

                    @endif

                    @if(auth::user()->role_id == 1)
                        <li class="menu-title">Others</li>

                        {{-- others attributes --}}
                        <li class="has_sub">
                            <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-artstation"></i><span> Site Controls </span> <span class="menu-arrow"></span></a>
                            <ul class="list-unstyled">
                                <li><a href="{{ route('manage_home_page.index') }}">Home Page</a></li>
                                <li><a href="{{ route('manage_slider.index') }}">Slider</a></li>
                                <li><a href="{{ route('manage_options.index') }}">Options</a></li>
                            </ul>
                        </li>
                        <li class="has_sub">
                            <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-star-box"></i><span> Reviews</span> <span class="menu-arrow"></span></a>
                            <ul class="list-unstyled">
                                <li><a href="{{ route('admin.viewReviews', 'pending') }}">Pending Reviews</a></li>
                                <li><a href="{{ route('admin.viewReviews', 'all') }}">All Review</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{ route('manage_user.index') }}" class="waves-effect"><i class="mdi mdi-view-dashboard"></i><span>User List</span> </a>
                        </li>
                    @endif

                    <li>
                        <a href="{{ route('index') }}" target="_blank" class="waves-effect"><i class="mdi mdi-view-dashboard"></i><span>Visit Website</span> </a>
                    </li>
                </ul>
            </div>
            <!-- Sidebar -->



















            <div class="clearfix"></div>

            <div class="help-box">
                <h5 class="text-muted m-t-0">For Help ?</h5>
                <p class=""><span class="text-custom">Email:</span> <br/> mrashk197@gmail.com</p>
                <p class="m-b-0"><span class="text-custom">Call:</span> <br/> (+880) 177 049 6249</p>
            </div>

        </div>
        <!-- Sidebar -left -->

    </div>
    <!-- Left Sidebar End -->



    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box py-2">
                            <h4 class="page-title">
                                @yield('page_title')
                            </h4>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <!-- end row -->


                @yield('main_content')

            </div> <!-- container -->

        </div> <!-- content -->

        <footer class="footer">
            {{ date('Y') }} © ECOMMERCE <span class="d-none d-sm-inline-block">Developed by <a target="_blank" href="//legenditinstitute.com/">LEGEND IT</a></span>
        </footer>
    </div>

</div>
<!-- END wrapper -->



<script>
    var resizefunc = [];
</script>


<!-- jQuery  -->
<script src="{{ asset('admin') }}/js/jquery.min.js"></script>
<script src="{{ asset('admin') }}/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('admin') }}/js/detect.js"></script>
<script src="{{ asset('admin') }}/js/fastclick.js"></script>
<script src="{{ asset('admin') }}/js/jquery.blockUI.js"></script>
<script src="{{ asset('admin') }}/js/waves.js"></script>
<script src="{{ asset('admin') }}/js/jquery.slimscroll.js"></script>
<script src="{{ asset('admin') }}/js/jquery.scrollTo.min.js"></script>
<script src="{{ asset('admin/plugins') }}/switchery/switchery.min.js"></script>
<!-- Modal-Effect -->
<script src="{{ asset('admin/plugins') }}/custombox/js/custombox.min.js"></script>
<script src="{{ asset('admin/plugins') }}/custombox/js/legacy.min.js"></script>
<!-- App js -->
<script src="{{ asset('admin') }}/js/jquery.core.js"></script>
<script src="{{ asset('admin') }}/js/jquery.app.js"></script>

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
@livewireScripts


@yield('javascript')
@stack('footer_javascript')

</body>
</html>
