@extends('front-office-layouts.page-with-top-nav')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Page Charts List
            <small>Example 1.0</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Custom</a></li>
            <li class="active">Charts List</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            @foreach ($charts as $chart)
                @include($chart->blade, ['chart'=>$chart])
            @endforeach
            <!-- ./col -->
        </div>
    </section>
    <!-- /.content -->
@endsection


@section('custom_javascript')
    @yield('follow_javascript')

@overwrite
