<div class="box box-primary" id="fromSubmissions">
    <div class="box-header">
        <h4>Pull from existing submissions</h4>
    </div>
    <div class="box-body">
        <div class="">
            <!-- Date and time range -->
            <div class="form-group">
                <label>Date and time range:</label>

                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fa fa-clock-o"></i>
                    </div>
                    <input type="text" class="form-control pull-right" id="pullQuestionTime">
                </div>
                <!-- /.input group -->
            </div>
        </div>
        <div class="row" style="padding-left: 20px">
            <button class="btn btn-default" id="btnCheck" onclick="ajaxCheckQuestionsFromDwSubmissions();">Check</button>
            <button class="btn btn-default btn-success" id="btnInsert" style="display: none" onclick="ajaxInsertQuestionsFromDwSubmissions();">Inserts questions</button>
        </div>
    </div>
</div>
<div class="box box-primary" id="fromXform">
    <div class="box-header">
        <h4>Pull from xform</h4>
    </div>
    <div class="box-body">
        <div class="row" style="padding-left: 20px">
            <button class="btn btn-default" id="btnCheck" onclick="ajaxCheckQuestionsFromDwXform()">Check</button>
            <button class="btn btn-default btn-success" id="btnInsert" style="display: none" onclick="ajaxInsertQuestionsFromDwXform();">Inserts questions</button>
        </div>
    </div>
</div>
<div class="box box-primary" id="fromXlsform">
    <div class="box-header">
        <h4>Pull from xlsform</h4>
    </div>
    <div class="box-body">
        <div class="row">
            <!-- Xlsform Field -->
            <div class="form-group col-sm-6">
                {!! Form::label('xlsformFileId', 'Xlsform File:') !!}
                {!! Form::file('xlsform', $attributes = array()) !!}
            </div>
        </div>
        <div class="row" style="padding-left: 20px">
            <button class="btn btn-default" id="btnCheck" onclick="">Check</button>
            <button class="btn btn-default btn-success" id="btnInsert" style="display: none">Inserts questions</button>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="box box-success">
            <div class="box-header">
                <h4>Found questions</h4>
            </div>
            <div id="foundQuesitons">

            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="box box-warning">
            <div class="box-header">
                <h4>Result</h4>
            </div>
            <div class="box-body">
                <textarea id="result" readonly style="width: 100%; min-height: 300px"></textarea>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    var questionsFromSubmissions = [];
    var questionsFromXform = [];
    $(function () {
        $("#pullQuestionTime").daterangepicker({
            timePicker: true,
            timePickerIncrement: 30,
            format: 'MM/DD/YYYY h:mm A'
        });
    });

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

    function statusProcessCheckActions(_actionBoxId){
        var btnCheck = $(_actionBoxId).find("#btnCheck");
        var btnInsert = $(_actionBoxId).find("#btnInsert");
        btnCheck.addClass('disabled');
        btnInsert.addClass('disabled');
        $("#result").text("");
        $("#foundQuesitons").html("");
    }
    function statusProcessInsertActions(_actionBoxId){
        var btnCheck = $(_actionBoxId).find("#btnCheck");
        var btnInsert = $(_actionBoxId).find("#btnInsert");
        btnCheck.addClass('disabled');
        btnInsert.addClass('disabled');
    }
    function statusFinishCheckActions_withoutError(_actionBoxId){
        var btnCheck = $(_actionBoxId).find("#btnCheck");
        var btnInsert = $(_actionBoxId).find("#btnInsert");
        btnCheck.removeClass('disabled');
        btnInsert.show();
        btnInsert.removeClass('disabled');
    }
    function statusFinishInsertActions_withoutError(_actionBoxId){
        var btnCheck = $(_actionBoxId).find("#btnCheck");
        var btnInsert = $(_actionBoxId).find("#btnInsert");
        btnCheck.removeClass('disabled');
        btnInsert.removeClass('disabled');
    }
    function statusFinishCheckActions_withError(_actionBoxId){
        var btnCheck = $(_actionBoxId).find("#btnCheck");
        var btnInsert = $(_actionBoxId).find("#btnInsert");
        btnCheck.removeClass('disabled');
        btnInsert.hide();
    }
    function statusFinishInsertActions_withError(_actionBoxId){
        var btnCheck = $(_actionBoxId).find("#btnCheck");
        var btnInsert = $(_actionBoxId).find("#btnInsert");
        btnCheck.removeClass('disabled');
        btnInsert.removeClass('disabled');
    }

    //From submissions [
    function ajaxCheckQuestionsFromDwSubmissions() {
        var _actionBoxId = "#fromSubmissions";
        var _idQuestion = '{{$dwProject->id}}';
        var url = '{{route('dwsync.dwProjects.checkFromSubmissions', '__id__')}}';
        url = url.replace("__id__", _idQuestion);
        console.log("URL : " + url);
        hideNotif();
        statusProcessCheckActions(_actionBoxId);
        $.ajax({
            type: 'get',
            url: url,
            dataType: 'json',
            data: {},
            success: function (data, textStatus) {
                console.log("Data " + JSON.stringify(data));
                var result = data['result'] ? JSON.stringify(data['result']) : "No result";
                var questions = data['questions'] ? data['questions'] : [];
                var message = "Success checking for "+data['message']['text'];
                $("#result").text(result);
                $("#foundQuesitons").html(formatQuestionsHtmlFromSubmissions(questions));
                statusFinishCheckActions_withoutError(_actionBoxId);
                notifSuccess(message);
                questionsFromSubmissions = questions;
            },
            error: function (xhr, textStatus, errorThrown) {
                var message = 'Error : ' + xhr.responseText;
                statusFinishCheckActions_withError(_actionBoxId);
                notifError(message);
            }
        });
    }

    function formatQuestionsHtmlFromSubmissions(question){
        var vHtml = "<table class='table table-responsive'><thead><th>#</th><th>QuestionId</th></thead><tbody>";
        for(var i=0; i < question.length; i++){
            vHtml += "<tr><td>"+(i+1)+"</td><td>" + question[i] + "</td></tr>";
        }
        vHtml += "</table>";
        return vHtml;
    }

    function ajaxInsertQuestionsFromDwSubmissions() {
        var _actionBoxId = "#fromSubmissions";
        var _idQuestion = '{{$dwProject->id}}';
        var url = '{{route('dwsync.dwProjects.insertFromSubmissions')}}';
        console.log("URL : " + url);
        hideNotif();
        statusProcessInsertActions(_actionBoxId);
        $.ajax({
            type: 'post',
            url: url,
            dataType: 'json',
            data: {_token: "{{ csrf_token() }}", projectId :_idQuestion, questions:questionsFromSubmissions},
            success: function (data, textStatus) {
                console.log("Data " + JSON.stringify(data));
                var message = data['message']['text'];
                statusFinishInsertActions_withoutError(_actionBoxId);
                notifSuccess(message);
            },
            error: function (xhr, textStatus, errorThrown) {
                var message = 'Error : ' + xhr.responseText;
                statusFinishInsertActions_withError(_actionBoxId);
                notifError(message);
            }
        });
    }
    //]--- From Submissions

    //From Xform [
    function ajaxCheckQuestionsFromDwXform() {
        var _actionBoxId = "#fromXform";
        var _idQuestion = '{{$dwProject->id}}';
        var url = '{{route('dwsync.dwProjects.checkFromXform', '__id__')}}';
        url = url.replace("__id__", _idQuestion);
        console.log("URL : " + url);
        hideNotif();
        statusProcessCheckActions(_actionBoxId);
        $.ajax({
            type: 'get',
            url: url,
            dataType: 'json',
            data: {},
            success: function (data, textStatus) {
                console.log("Data " + JSON.stringify(data));
                var result = data['result'] ? JSON.stringify(data['result']) : "No result";
                var questions = data['questions'] ? data['questions'] : [];
                var message = "Success checking for "+data['message']['text'];
                $("#result").text(result);
                $("#foundQuesitons").html(formatQuestionsHtmlFromXform(questions));
                statusFinishCheckActions_withoutError(_actionBoxId);
                notifSuccess(message);
                questionsFromXform = questions;
            },
            error: function (xhr, textStatus, errorThrown) {
                var message = 'Error : ' + xhr.responseText;
                statusFinishCheckActions_withError(_actionBoxId);
                notifError(message);
            }
        });
    }

    function formatQuestionsHtmlFromXform(question){
        var vHtml = "<table class='table table-responsive'><thead><th>#</th><th>QuestionId</th><th>Label</th><th>Type</th></thead><tbody>";
        var i = 1;
        for(var key in question){
            vHtml += "<tr><td>"+i+"</td><td>" + key + "</td><td>"+question[key].label+"</td><td>"+question[key].type+"</td></tr>";
            i++;
        }
        vHtml += "</table>";
        return vHtml;
    }

    function ajaxInsertQuestionsFromDwXform() {
        var _actionBoxId = "#fromXform";
        var _idQuestion = '{{$dwProject->id}}';
        var url = '{{route('dwsync.dwProjects.insertFromXform')}}';
        console.log("URL : " + url);
        hideNotif();
        statusProcessInsertActions(_actionBoxId);
        $.ajax({
            type: 'post',
            url: url,
            dataType: 'json',
            data: {_token: "{{ csrf_token() }}", projectId :_idQuestion, questions:questionsFromXform},
            success: function (data, textStatus) {
                console.log("Data " + JSON.stringify(data));
                var message = data['message']['text'];
                statusFinishInsertActions_withoutError(_actionBoxId);
                notifSuccess(message);
            },
            error: function (xhr, textStatus, errorThrown) {
                var message = 'Error : ' + xhr.responseText;
                statusFinishInsertActions_withError(_actionBoxId);
                notifError(message);
            }
        });
    }
</script>