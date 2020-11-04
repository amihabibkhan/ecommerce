<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
    <meta name="author" content="Coderthemes">

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

</head>


<body class="fixed-left">

<!-- Begin page -->
<div id="wrapper">

    <!-- Top Bar Start -->
    <div class="topbar">

        <!-- LOGO -->
        <div class="topbar-left">
            <a href="{{ route('home') }}" class="logo"><span>Adm<span>in</span></span><i class="mdi mdi-layers"></i></a>
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
                            <form role="search" class="app-search">
                                <input type="text" placeholder="Search..."
                                       class="form-control">
                                <a href=""><i class="fa fa-search"></i></a>
                            </form>
                        </li>
                    </ul>

                    <!-- Right(Notification) -->
                    <ul class="nav navbar-right">
                        <li>
                            <a href="#" class="right-menu-item dropdown-toggle" data-toggle="dropdown">
                                <i class="mdi mdi-bell"></i>
                                <span class="badge up badge-success badge-pill">4</span>
                            </a>

                            <ul class="dropdown-menu dropdown-menu-right arrow-dropdown-menu arrow-menu-right dropdown-lg user-list notify-list">
                                <li>
                                    <h5>Notifications</h5>
                                </li>
                                <li>
                                    <a href="#" class="user-list-item">
                                        <div class="icon bg-info">
                                            <i class="mdi mdi-account"></i>
                                        </div>
                                        <div class="user-desc">
                                            <span class="name">New Signup</span>
                                            <span class="time">5 hours ago</span>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="user-list-item">
                                        <div class="icon bg-danger">
                                            <i class="mdi mdi-comment"></i>
                                        </div>
                                        <div class="user-desc">
                                            <span class="name">New Message received</span>
                                            <span class="time">1 day ago</span>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="user-list-item">
                                        <div class="icon bg-warning">
                                            <i class="mdi mdi-settings"></i>
                                        </div>
                                        <div class="user-desc">
                                            <span class="name">Settings</span>
                                            <span class="time">1 day ago</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="all-msgs text-center">
                                    <p class="m-0"><a href="#">See all Notification</a></p>
                                </li>
                            </ul>
                        </li>


                        <li class="dropdown user-box">
                            <a href="" class="dropdown-toggle waves-effect user-link" data-toggle="dropdown" aria-expanded="true">
                                <img src="{{ asset('admin') }}/images/users/avatar-1.jpg" alt="user-img" class="rounded-circle user-img">
                            </a>

                            <ul class="dropdown-menu dropdown-menu-right arrow-dropdown-menu arrow-menu-right user-list notify-list">
                                <li>
                                    <h5>Hi, John</h5>
                                </li>
                                <li><a href="javascript:void(0)" class="dropdown-item"><i class="ti-user m-r-5"></i> Profile</a></li>
                                <li><a href="javascript:void(0)" class="dropdown-item"><i class="ti-settings m-r-5"></i> Settings</a></li>
                                <li><a href="javascript:void(0)" class="dropdown-item"><i class="ti-lock m-r-5"></i> Lock screen</a></li>
                                <li><a href="javascript:void(0)" class="dropdown-item"><i class="ti-power-off m-r-5"></i> Logout</a></li>
                            </ul>
                        </li>

                    </ul> <!-- end navbar-right -->
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
                    {{-- products --}}
                    <li class="has_sub">
                        <a href="javascript:void(0);" class="waves-effect"><i class=" mdi mdi-cube"></i><span> Products </span> <span class="menu-arrow"></span></a>
                        <ul class="list-unstyled">
                            <li><a href="{{ route('manage_products.create') }}">Add New</a></li>
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
                        <div class="page-title-box">
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


@yield('javascript')

</body>
</html>
