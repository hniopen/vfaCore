@extends('front-office-layouts.page-with-top-nav')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            My Shiny custom page
            <small>Example 1.0</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Custom</a></li>
            <li class="active">My Shiny custom page</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="callout callout-info">
            <h4>Tip!</h4>

            <p>Add the layout-top-nav class to the body tag to get this layout. This feature can also be used with a
                sidebar! So use this class if you want to remove the custom dropdown menus from the navbar and use regular
                links instead.</p>
        </div>
        <div class="callout callout-danger">
            <h4>Warning!</h4>

            <p>The construction of this layout differs from the normal one. In other words, the HTML markup of the navbar
                and the content will slightly differ than that of the normal layout.</p>
        </div>
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Blank Box</h3>
            </div>
            <div class="box-body">
                The great content goes here
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </section>
    <!-- /.content -->
@endsection

@section('custom_javascript')
    <script language="JavaScript">
        $(document).ready(function () {


        });
    </script>
    @endsection
