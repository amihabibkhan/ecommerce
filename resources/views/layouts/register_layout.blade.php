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
    <title>FALASTIN SHOP</title>

    <!-- App css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin') }}/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('admin') }}/css/icons.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('admin') }}/css/style.css" />


    <script src="{{ asset('admin') }}/js/modernizr.min.js"></script>

    <style>
        .account-pages {
            box-shadow: 0 0px 24px 0 rgba(0, 0, 0, 0.2), 0 1px 0px 0 rgba(0, 0, 0, 0.02) !important;
        }
    </style>

</head>

<body class="bg-transparent">

<!-- HOME -->
<section>
    <div class="container-alt">
        <div class="row">
            <div class="col-sm-12">

                 @yield('main_content')

            </div>
        </div>
    </div>
</section>
<!-- END HOME -->

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

<!-- App js -->
<script src="{{ asset('admin') }}/js/jquery.core.js"></script>
<script src="{{ asset('admin') }}/js/jquery.app.js"></script>

</body>
</html>
