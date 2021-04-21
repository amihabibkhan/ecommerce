@extends('layouts.app')

{{--@section('page_title') Welcome to Dashboard  @endsection--}}
@section('main_content')

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
    <!-- end row -->


    <div class="row">
        <div class="col-xl-4">
            <div class="card-box">

                <h4 class="header-title m-t-0">Daily Sales</h4>

                <div class="widget-chart text-center">
                    <div id="morris-donut-example" class="morris-charts" style="height: 245px;"></div>
                    <ul class="list-inline chart-detail-list m-b-0">
                        <li class="list-inline-item">
                            <h5 class="text-danger"><i class="fa fa-circle m-r-5"></i>Series A</h5>
                        </li>
                        <li class="list-inline-item">
                            <h5 class="text-success"><i class="fa fa-circle m-r-5"></i>Series B</h5>
                        </li>
                    </ul>
                </div>
            </div>
        </div><!-- end col -->

        <div class="col-xl-4">
            <div class="card-box">

                <h4 class="header-title m-t-0">Statistics</h4>
                <div id="morris-bar-example" class="text-center morris-charts" style="height: 280px;"></div>
            </div>
        </div><!-- end col -->

        <div class="col-xl-4">
            <div class="card-box">

                <h4 class="header-title m-t-0">Total Revenue</h4>
                <div id="morris-line-example" class="text-center morris-charts" style="height: 280px;"></div>
            </div>
        </div><!-- end col -->

    </div>
    <!-- end row -->


    <div class="row">
        <div class="col-xl-6">
            <div class="card-box">
                <h4 class="header-title m-t-0 m-b-30">Recent Users</h4>

                <div class="table-responsive">
                    <table class="table table-hover table-centered m-0">
                        <thead>
                        <tr>
                            <th></th>
                            <th>User Name</th>
                            <th>Phone</th>
                            <th>Location</th>
                            <th>Date</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th>
                                <img src="{{ asset('admin') }}//images/users/avatar-1.jpg" alt="user" class="thumb-sm rounded-circle" />
                            </th>
                            <td>
                                <h5 class="m-0">Louis Hansen</h5>
                                <p class="m-0 text-muted font-13"><small>Web designer</small></p>
                            </td>
                            <td>+12 3456 789</td>
                            <td>USA</td>
                            <td>07/08/2016</td>
                        </tr>

                        <tr>
                            <th>
                                <img src="{{ asset('admin') }}//images/users/avatar-2.jpg" alt="user" class="thumb-sm rounded-circle" />
                            </th>
                            <td>
                                <h5 class="m-0">Craig Hause</h5>
                                <p class="m-0 text-muted font-13"><small>Programmer</small></p>
                            </td>
                            <td>+89 345 6789</td>
                            <td>Canada</td>
                            <td>29/07/2016</td>
                        </tr>

                        <tr>
                            <th>
                                <img src="{{ asset('admin') }}//images/users/avatar-3.jpg" alt="user" class="thumb-sm rounded-circle" />
                            </th>
                            <td>
                                <h5 class="m-0">Edward Grimes</h5>
                                <p class="m-0 text-muted font-13"><small>Founder</small></p>
                            </td>
                            <td>+12 29856 256</td>
                            <td>Brazil</td>
                            <td>22/07/2016</td>
                        </tr>

                        <tr>
                            <th>
                                <img src="{{ asset('admin') }}//images/users/avatar-4.jpg" alt="user" class="thumb-sm rounded-circle" />
                            </th>
                            <td>
                                <h5 class="m-0">Bret Weaver</h5>
                                <p class="m-0 text-muted font-13"><small>Web designer</small></p>
                            </td>
                            <td>+00 567 890</td>
                            <td>USA</td>
                            <td>20/07/2016</td>
                        </tr>

                        <tr>
                            <th>
                                <img src="{{ asset('admin') }}//images/users/avatar-5.jpg" alt="user" class="thumb-sm rounded-circle" />
                            </th>
                            <td>
                                <h5 class="m-0">Mark</h5>
                                <p class="m-0 text-muted font-13"><small>Web design</small></p>
                            </td>
                            <td>+91 123 456</td>
                            <td>India</td>
                            <td>07/07/2016</td>
                        </tr>

                        </tbody>
                    </table>

                </div> <!-- table-responsive -->
            </div> <!-- end card -->
        </div>
        <!-- end col -->

        <div class="col-xl-6">
            <div class="card-box">
                <h4 class="header-title m-t-0 m-b-30">Recent Users</h4>

                <div class="table-responsive">
                    <table class="table table-hover table-centered m-0">
                        <thead>
                        <tr>
                            <th></th>
                            <th>User Name</th>
                            <th>Phone</th>
                            <th>Location</th>
                            <th>Date</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th>
                                <span class="avatar-sm-box bg-success">L</span>
                            </th>
                            <td>
                                <h5 class="m-0">Louis Hansen</h5>
                                <p class="m-0 text-muted font-13"><small>Web designer</small></p>
                            </td>
                            <td>+12 3456 789</td>
                            <td>USA</td>
                            <td>07/08/2016</td>
                        </tr>

                        <tr>
                            <th>
                                <span class="avatar-sm-box bg-primary">C</span>
                            </th>
                            <td>
                                <h5 class="m-0">Craig Hause</h5>
                                <p class="m-0 text-muted font-13"><small>Programmer</small></p>
                            </td>
                            <td>+89 345 6789</td>
                            <td>Canada</td>
                            <td>29/07/2016</td>
                        </tr>

                        <tr>
                            <th>
                                <span class="avatar-sm-box bg-brown">E</span>
                            </th>
                            <td>
                                <h5 class="m-0">Edward Grimes</h5>
                                <p class="m-0 text-muted font-13"><small>Founder</small></p>
                            </td>
                            <td>+12 29856 256</td>
                            <td>Brazil</td>
                            <td>22/07/2016</td>
                        </tr>

                        <tr>
                            <th>
                                <span class="avatar-sm-box bg-pink">B</span>
                            </th>
                            <td>
                                <h5 class="m-0">Bret Weaver</h5>
                                <p class="m-0 text-muted font-13"><small>Web designer</small></p>
                            </td>
                            <td>+00 567 890</td>
                            <td>USA</td>
                            <td>20/07/2016</td>
                        </tr>

                        <tr>
                            <th>
                                <span class="avatar-sm-box bg-orange">M</span>
                            </th>
                            <td>
                                <h5 class="m-0">Mark</h5>
                                <p class="m-0 text-muted font-13"><small>Web design</small></p>
                            </td>
                            <td>+91 123 456</td>
                            <td>India</td>
                            <td>07/07/2016</td>
                        </tr>

                        </tbody>
                    </table>

                </div> <!-- table-responsive -->
            </div> <!-- end card -->
        </div>
        <!-- end col -->

    </div>

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
