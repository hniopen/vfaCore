<!DOCTYPE html>
<html>
<head>
    @include('front-office-partials.head')
</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-blue layout-top-nav">
<div class="wrapper">

    <header class="main-header">
        <nav class="navbar navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <a href="{{ url('/') }}" class="navbar-brand">{{ config('app.name', 'Laravel') }}</a>
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                        <i class="fa fa-bars"></i>
                    </button>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                    @include('front-office-partials.topbar')
                <!-- /.navbar-collapse -->
                <!-- Navbar Right Menu -->
                    @include('front-office-partials.nav-bar-right')
                <!-- /.navbar-custom-menu -->
            </div>
            <!-- /.container-fluid -->
        </nav>
    </header>
    <!-- Full Width Column -->
    <div class="content-wrapper">
        <div class="container">
            @yield('content')
        </div>
        <!-- /.container -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <div class="container">
            <div class="pull-right hidden-xs">
                <b>Version</b> 1.0
            </div>
            <strong>Copyright &copy; 2018 <a href="#">{{ trans('global.global_title') }}</a>.</strong> All rights reserved.
        </div>
        <!-- /.container -->
    </footer>
</div>
<!-- ./wrapper -->

<!-- Scripts -->

@include('front-office-partials.javascripts')
{{--@include('front-office-partials.javascripts-old')--}}
@yield('custom_loading_javascript'){{--For library loading--}}
@yield('custom_javascript'){{--Custom code--}}
</body>
</html>
