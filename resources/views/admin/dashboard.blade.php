@extends('layouts.app')

{{--@section('page_title') Welcome to Dashboard  @endsection--}}
@section('main_content')

    <h4 class="m-0 text-muted">Order Status</h4><hr>
    <div class="row">

        <div class="col-xl-3 col-lg-4 col-sm-6">
            <a href="{{ url('order_processing?status=1') }}" class="text-muted">
                <div class="card-box widget-box-one">
                    <i class="{{ ($orderStatus[0]->pendings->count() > 0) ? 'text-danger fa-spin' : '' }} far fa-pause-circle widget-one-icon"></i>
                    <div class="wigdet-one-content">
                        <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="Pending Orders">Pending Orders</p>
                        <h2>{{ $orderStatus[0]->pendings->count() }} <small><i class="mdi text-success"></i></small></h2>
                        <p class="text-muted m-0">
                            <b>TK. {{ $orderStatus[0]->pendings->sum('total') }}</b>
                        </p>
                    </div>
                </div>
            </a>
        </div><!-- end col -->

        <div class="col-xl-3 col-lg-4 col-sm-6">
            <a href="{{ url('order_processing?status=2') }}" class="text-muted">
                <div class="card-box widget-box-one">
                    <i class="{{ ($orderStatus[1]->processings->count() > 0) ? 'text-info' : '' }} mdi mdi-car-convertible widget-one-icon"></i>
                    <div class="wigdet-one-content">
                        <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="Processing Orders">Processing Orders</p>
                        <h2>{{ $orderStatus[1]->processings->count() }}  <small><i class="mdi text-danger"></i></small></h2>
                        <p class="text-muted m-0">
                            <b>TK. {{ $orderStatus[1]->processings->sum('total') }}</b>
                        </p>
                    </div>
                </div>
            </a>
        </div><!-- end col -->

        <div class="col-xl-3 col-lg-4 col-sm-6">
            <a href="{{ url('order_processing?status=3') }}" class="text-muted">
                <div class="card-box widget-box-one">
                    <i class="mdi mdi-close widget-one-icon"></i>
                    <div class="wigdet-one-content">
                        <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="Canceled Orders">Canceled Orders</p>
                        <h2>{{ $orderStatus[2]->cancels->count() }}  <small><i class="mdi text-success"></i></small></h2>
                        <p class="text-muted m-0">
                            <b>TK. {{ $orderStatus[2]->cancels->sum('total') }}</b>
                        </p>
                    </div>
                </div>
            </a>
        </div><!-- end col -->

        <div class="col-xl-3 col-lg-4 col-sm-6">
            <a href="{{ url('order_processing?status=4') }}" class="text-muted">
                <div class="card-box widget-box-one">
                    <i class="mdi mdi-check-all widget-one-icon"></i>
                    <div class="wigdet-one-content">
                        <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="Delivered Orders">Delivered Orders</p>
                        <h2>{{ $orderStatus[3]->deliverts->count() }}  <small><i class="mdi text-danger"></i></small></h2>
                        <p class="text-muted m-0">
                            <b>TK. {{ $orderStatus[3]->deliverts->sum('total') }}</b>
                        </p>
                    </div>
                </div>
            </a>
        </div><!-- end col -->
    </div>

    <h4 class="m-0 text-muted">Stock Information</h4><hr>
    <div class="row">
        <div class="col-xl-3 col-lg-4 col-sm-6">
            <a href="{{ url('manage_products') }}" class="text-muted">
                <div class="card-box widget-box-one">
                    <i class="mdi mdi-account-multiple widget-one-icon"></i>
                    <div class="wigdet-one-content">
                        <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="Products">Products</p>
                        <h2>{{ $data['products'] }}  <small><i class="mdi text-danger"></i></small></h2>
                    </div>
                </div>
            </a>
        </div><!-- end col -->

        <div class="col-xl-3 col-lg-4 col-sm-6">
            <a href="{{ url('manage_brands') }}" class="text-muted">
                <div class="card-box widget-box-one">
                    <i class="mdi mdi-account-multiple widget-one-icon"></i>
                    <div class="wigdet-one-content">
                        <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="brands">brands</p>
                        <h2>{{ $data['brands'] }}  <small><i class="mdi text-danger"></i></small></h2>
                    </div>
                </div>
            </a>
        </div><!-- end col -->

        <div class="col-xl-3 col-lg-4 col-sm-6">
            <a href="{{ url('manage_main_category') }}" class="text-muted">
                <div class="card-box widget-box-one">
                    <i class="mdi mdi-account-multiple widget-one-icon"></i>
                    <div class="wigdet-one-content">
                        <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="Main Categories">Main Categories</p>
                        <h2>{{ $data['main_categories'] }}  <small><i class="mdi text-danger"></i></small></h2>
                    </div>
                </div>
            </a>
        </div><!-- end col -->

        <div class="col-xl-3 col-lg-4 col-sm-6">
            <a href="{{ url('manage_category') }}" class="text-muted">
                <div class="card-box widget-box-one">
                    <i class="mdi mdi-account-multiple widget-one-icon"></i>
                    <div class="wigdet-one-content">
                        <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="categories">categories</p>
                        <h2>{{ $data['categories'] }}  <small><i class="mdi text-danger"></i></small></h2>
                    </div>
                </div>
            </a>
        </div><!-- end col -->

        <div class="col-xl-3 col-lg-4 col-sm-6">
            <a href="{{ url('manage_sub_category') }}" class="text-muted">
                <div class="card-box widget-box-one">
                    <i class="mdi mdi-account-multiple widget-one-icon"></i>
                    <div class="wigdet-one-content">
                        <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="Sub Categories">Sub Categories</p>
                        <h2>{{ $data['sub_categories'] }}  <small><i class="mdi text-danger"></i></small></h2>
                    </div>
                </div>
            </a>
        </div><!-- end col -->

        <div class="col-xl-3 col-lg-4 col-sm-6">
            <a href="{{ url('manage_tags') }}" class="text-muted">
                <div class="card-box widget-box-one">
                    <i class="mdi mdi-account-multiple widget-one-icon"></i>
                    <div class="wigdet-one-content">
                        <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="Tags">Tags</p>
                        <h2>{{ $data['tags'] }}  <small><i class="mdi text-danger"></i></small></h2>
                    </div>
                </div>
            </a>
        </div><!-- end col -->

        <div class="col-xl-3 col-lg-4 col-sm-6">
            <a href="{{ url('manage_publications') }}" class="text-muted">
                <div class="card-box widget-box-one">
                    <i class="mdi mdi-account-multiple widget-one-icon"></i>
                    <div class="wigdet-one-content">
                        <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="publications">publications</p>
                        <h2>{{ $data['publications'] }}  <small><i class="mdi text-danger"></i></small></h2>
                    </div>
                </div>
            </a>
        </div><!-- end col -->

        <div class="col-xl-3 col-lg-4 col-sm-6">
            <a href="{{ url('manage_writer') }}" class="text-muted">
                <div class="card-box widget-box-one">
                    <i class="mdi mdi-account-multiple widget-one-icon"></i>
                    <div class="wigdet-one-content">
                        <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="writers">writers</p>
                        <h2>{{ $data['writers'] }}  <small><i class="mdi text-danger"></i></small></h2>
                    </div>
                </div>
            </a>
        </div><!-- end col -->

{{--        <div class="col-xl-3 col-lg-4 col-sm-6">--}}
{{--            <a href="{{ url('manage_translator') }}" class="text-muted">--}}
{{--                <div class="card-box widget-box-one">--}}
{{--                    <i class="mdi mdi-account-multiple widget-one-icon"></i>--}}
{{--                    <div class="wigdet-one-content">--}}
{{--                        <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="translators">translators</p>--}}
{{--                        <h2>{{ $data['translators'] }}  <small><i class="mdi text-danger"></i></small></h2>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </a>--}}
{{--        </div><!-- end col -->--}}






    </div>



    <h4 class="m-0 text-muted">User Statistics</h4><hr>
    <div class="row">
        @if(auth()->user()->role_id == 1)
        <div class="col-xl-3 col-lg-4 col-sm-6">
            <a href="{{ url('manage_user?role_id=1') }}" class="text-muted">
                <div class="card-box widget-box-one">
                    <i class="mdi mdi-account-multiple widget-one-icon"></i>
                    <div class="wigdet-one-content">
                        <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="Super Admins">Super Admins</p>
                        <h2>{{ $roles[0]->super_admins->count() }}  <small><i class="mdi text-danger"></i></small></h2>
                        <p class="text-muted m-0">
                            <b>Last 30 Days: {{ $roles[0]->super_admins->where('created_at','>=',now()->subdays(30))->count() }}</b>
                        </p>
                    </div>
                </div>
            </a>
        </div><!-- end col -->
        @endif

        @if(auth()->user()->role_id == 1)
        <div class="col-xl-3 col-lg-4 col-sm-6">
            <a href="{{ url('manage_user?role_id=2') }}" class="text-muted">
                <div class="card-box widget-box-one">
                    <i class="mdi mdi-account-multiple widget-one-icon"></i>
                    <div class="wigdet-one-content">
                        <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="Managers">Managers</p>
                        <h2>{{ $roles[1]->managers->count() }}  <small><i class="mdi text-danger"></i></small></h2>
                        <p class="text-muted m-0">
                            <b>Last 30 Days: {{ $roles[1]->managers->where('created_at','>=',now()->subdays(30))->count() }}</b>
                        </p>
                    </div>
                </div>
            </a>
        </div><!-- end col -->
        @endif

        @if(auth()->user()->role_id <= 2)
        <div class="col-xl-3 col-lg-4 col-sm-6">
            <a href="{{ url('manage_user?role_id=4') }}" class="text-muted">
                <div class="card-box widget-box-one">
                    <i class="mdi mdi-account-multiple widget-one-icon"></i>
                    <div class="wigdet-one-content">
                        <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="Editors">Editors</p>
                        <h2>{{ $roles[3]->editors->count() }}  <small><i class="mdi text-danger"></i></small></h2>
                        <p class="text-muted m-0">
                            <b>Last 30 Days: {{ $roles[3]->editors->where('created_at','>=',now()->subdays(30))->count() }}</b>
                        </p>
                    </div>
                </div>
            </a>
        </div><!-- end col -->
        @endif


        <div class="col-xl-3 col-lg-4 col-sm-6">
            <a href="{{ url('manage_user?role_id=3') }}" class="text-muted">
                <div class="card-box widget-box-one">
                    <i class="mdi mdi-account-multiple widget-one-icon"></i>
                    <div class="wigdet-one-content">
                        <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="General Users">General Users</p>
                        <h2>{{ $roles[2]->general_users->count() }}  <small><i class="mdi text-danger"></i></small></h2>
                        <p class="text-muted m-0">
                            <b>Last 30 Days: {{ $roles[2]->general_users->where('created_at','>=',now()->subdays(30))->count() }}</b>
                        </p>
                    </div>
                </div>
            </a>
        </div><!-- end col -->



    </div>


{{--    <div class="row">--}}
{{--        <div class="col-xl-4">--}}
{{--            <div class="card-box">--}}

{{--                <h4 class="header-title m-t-0">Daily Sales</h4>--}}

{{--                <div class="widget-chart text-center">--}}
{{--                    <div id="morris-donut-example" class="morris-charts" style="height: 245px;"></div>--}}
{{--                    <ul class="list-inline chart-detail-list m-b-0">--}}
{{--                        <li class="list-inline-item">--}}
{{--                            <h5 class="text-danger"><i class="fa fa-circle m-r-5"></i>Series A</h5>--}}
{{--                        </li>--}}
{{--                        <li class="list-inline-item">--}}
{{--                            <h5 class="text-success"><i class="fa fa-circle m-r-5"></i>Series B</h5>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div><!-- end col -->--}}

{{--        <div class="col-xl-4">--}}
{{--            <div class="card-box">--}}

{{--                <h4 class="header-title m-t-0">Statistics</h4>--}}
{{--                <div id="morris-bar-example" class="text-center morris-charts" style="height: 280px;"></div>--}}
{{--            </div>--}}
{{--        </div><!-- end col -->--}}

{{--        <div class="col-xl-4">--}}
{{--            <div class="card-box">--}}

{{--                <h4 class="header-title m-t-0">Total Revenue</h4>--}}
{{--                <div id="morris-line-example" class="text-center morris-charts" style="height: 280px;"></div>--}}
{{--            </div>--}}
{{--        </div><!-- end col -->--}}

{{--    </div>--}}
    <!-- end row -->



@endsection

@section('plugin_css')
    <!--Morris Chart CSS -->
    <link rel="stylesheet" href="{{ asset('admin') }}/plugins/morris/morris.css">
@endsection

@section('javascript')
    <!-- Counter js  -->
    <script src="{{ asset('admin') }}/plugins/waypoints/jquery.waypoints.min.js"></script>
    <script src="{{ asset('admin') }}/plugins/counterup/jquery.counterup.min.js"></script>

    <!--Morris Chart-->
    <script src="{{ asset('admin') }}/plugins/morris/morris.min.js"></script>
    <script src="{{ asset('admin') }}/plugins/raphael/raphael-min.js"></script>

    <!-- Dashboard init -->
    <script src="{{ asset('admin') }}/pages/jquery.dashboard.js"></script>
@endsection
