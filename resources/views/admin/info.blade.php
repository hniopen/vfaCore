@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Dashboard</h1>
    </section>
    <div class="clearfix"></div>
    <div class="content">
        @can('dwsync_create_project')
        <div class="panel panel-default">
            <div class="panel-body">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-yellow">
                            <div class="inner">
                                <h3 id="count_user">0</h3>

                                <p>Registered Users</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-users"></i>
                            </div>
                            <a href="#" class="small-box-footer">
                                More info <i class="fa fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-green">
                            <div class="inner">
                                <h3 id="count_idnr">0</h3>

                                <p>Dw Identification numbers</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-list"></i>
                            </div>
                            <a href="#" class="small-box-footer">
                                More info <i class="fa fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-red">
                            <div class="inner">
                                <h3 id="count_questionnaire">0</h3>

                                <p>DW Questionnaires</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-clone"></i>
                            </div>
                            <a href="#" class="small-box-footer">
                                More info <i class="fa fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div><!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-aqua">
                            <div class="inner">
                                <h3 id="count_data_q">0</h3>

                                <p>Pulled submissions <br> [Questionnaires only]</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-database"></i>
                            </div>
                            <a href="#" class="small-box-footer">
                                More info <i class="fa fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                    <!-- ./col -->
                </div>
                <!-- /.row -->
            </div>
        </div>
        @else
            <div>Nothing to show yet !</div>
        @endcan
    </div>
@endsection

@section('custom_javascript')
    <script language="JavaScript">
        $(document).ready(function () {
            ajaxGetSingleData('{{route('admin.user.count')}}', function(result){
                $("#count_user").html(result['value']);
            });
            @if(View::exists('dwsync::dwsync_menu'))
            ajaxGetSingleData('{{URL::to('dwsync/count/project/if/Q')}}', function (result) {
                $("#count_questionnaire").html(result['value']);
            });

            ajaxGetSingleData('{{URL::to('dwsync/count/project/if/I')}}', function (result) {
                $("#count_idnr").html(result['value']);
            });

            ajaxGetSingleData('{{URL::to('dwsync/count/data/if/Q')}}', function (result) {
                $("#count_data_q").html(result['value']);
            });
            @endif



        });
    </script>
    @endsection
