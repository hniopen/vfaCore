@extends('front-office-layouts.page-with-top-nav')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Page Favorited Charts
            <small>Example 1.0</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Custom</a></li>
            <li class="active">Favorited Charts</li>
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
    <script language="JavaScript">
        $(document).ready(function () {
            {{--$(".follow-chart").each(function (i, element) {--}}
                {{--$(element).click(function () {--}}
                    {{--var chartId = $(this).val();--}}
                    {{--var baseUrl;--}}
                    {{--var status = $.trim($(this).html());--}}
                    {{--if(status.toLowerCase() === 'follow'){--}}
                        {{--baseUrl = '{{route('favorite.chart')}}';--}}
                    {{--}--}}
                    {{--else{--}}
                        {{--baseUrl = '{{route('unfavorite.chart')}}';--}}
                    {{--}--}}
                    {{--ajaxGetRequest(baseUrl+'?chart_id='+chartId, function(response){--}}
                        {{--if(status.toLowerCase() === 'follow'){--}}
                            {{--$(element).html('Unfollow');--}}
                        {{--}--}}
                        {{--else{--}}
                            {{--$(element).html('Follow');--}}
                        {{--}--}}
                        {{--window.location.reload(true);--}}
                    {{--});--}}
                {{--});--}}
            {{--});--}}

        });
    </script>
@append
