@extends('layouts.app')

@section('content')
    <!-- Include Required Prerequisites -->
    <script type="text/javascript" src="//cdn.jsdelivr.net/jquery/1/jquery.min.js"></script>
    <script type="text/javascript" src="{{ asset('/js/moment.min.js') }}"></script>

    <!-- Include Date Range Picker -->
    <script type="text/javascript" src="{{ url('adminlte/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <link href="{{ url('adminlte/plugins/daterangepicker/daterangepicker.css') }}" rel="stylesheet">

    <section class="content-header">
        <h1>
            Extra actions
        </h1>

    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                <div class="box-header">
                    <h4>Selected Dw Project</h4>
                </div>
                <div class="row" style="padding-left: 20px">
                    @include('dwsync.dw_projects.show_fields')
                    <div class="form-group col-sm-12">
                        <a href="{!! route('dwsync.dwProjects.index') !!}" class="btn btn-default pull-left"
                           style="margin-right: 5px;">Back</a>
                        <button class="btn btn-success pull-left"
                           style="margin-right: 5px;" onclick="setPanel('syncData');">Sync data</button>
                        <div class="dropdown pull-left" style="margin-right: 5px;">
                            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuPull"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                Pull questions
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuPull">
                                <li><a href="#/" onclick="setPanel('fromSubmissions');">From existing submissions</a></li>
                                @if($dwProject->formType != 'advanced')
                                    <li><a href="#/" onclick="setPanel('fromXform');">From xform</a></li>
                                @endif
                                @if($dwProject->formType == 'advanced')
                                    <li><a href="#/" onclick="setPanel('fromXls');">From xlsform (advanced)</a></li>
                                @endif
                                {{--<li role="separator" class="divider"></li>--}}
                                {{--<li><a href="#/">Separated link</a></li>--}}
                            </ul>
                        </div>
                        <div class="dropdown pull-left" style="margin-right: 5px;">
                            <button class="btn btn-danger dropdown-toggle" type="button" id="dropdownMenuRemove"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                Remove questions
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuRemove">
                                <li><a href="#/" onclick="setPanel('removeAll');ajaxCheckExistingQuestions();">Remove all related questions</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="alert alert-danger" id="notif_error" style="display: none">
            </div>
            <div class="alert alert-success" id="notif_success" style="display: none">
            </div>
        </div>
        <script type="text/javascript">
            var listActionPanels = ['fromSubmissions', 'fromXform', 'fromXls', 'removeAll', 'syncData'];

            //Set notif : used in extra_panels
            function hideNotif() {
                $("#notif_success").hide();
                $("#notif_error").hide();
            }
            function notifError(_msg) {
                $("#notif_error").html(_msg);
                $("#notif_error").show();
            }
            function notifSuccess(_msg) {
                $("#notif_success").html(_msg);
                $("#notif_success").show();
            }

            function setPanel(idPanel){
                console.log("panel : "+idPanel);
                for(var key in listActionPanels){
                    var panel = listActionPanels[key];
                    //actions panel
                    if(panel == idPanel){
                        $("#"+panel).show();
                        console.log("show : #"+panel);
                    }else{
                        $("#"+panel).hide();
                        console.log("hide : #"+panel);
                    }
                    //result panel
                    if(idPanel == 'syncData'){
                        $("#syncDataResult").show();
                        $("#pullResult").hide();
                    }else{
                        $("#syncDataResult").hide();
                        $("#pullResult").show();
                    }
                }
            }
        </script>
        @include('dwsync.dw_projects.extra_panels_pull')
        @include('dwsync.dw_projects.extra_panels_sync')
    </div>
@endsection
