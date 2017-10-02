<div class="box box-success" id="syncData">
    <div class="box-header">
        <h4>Sync data from DW</h4>
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
                    <input type="text" class="form-control pull-right" id="syncDataTime">
                </div>
                <!-- /.input group -->
            </div>
        </div>
        <div class="row" style="padding-left: 20px">
            <button class="btn btn-success" id="btnCheck" onclick="ajaxSyncFromDw();">Run sync</button>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <div class="box box-success">
            <div class="box-header">
                <h4>Pull status</h4>
            </div>
            <div id="pullStatus">

            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="box box-warning">
            <div class="box-header">
                <h4>Sync Result</h4>
            </div>
            <div class="box-body">
                <textarea id="syncResult" readonly style="width: 100%; min-height: 300px"></textarea>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(function () {
        $("#syncDataTime").daterangepicker({
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

    function statusProcessSyncActions(_actionBoxId){
        var btnCheck = $(_actionBoxId).find("#btnCheck");
        btnCheck.addClass('disabled');
        $("#syncResult").text("");
    }
    function statusFinishSyncActions_withoutError(_actionBoxId){
        var btnCheck = $(_actionBoxId).find("#btnCheck");
        btnCheck.removeClass('disabled');
    }
    function statusFinishSyncActions_withError(_actionBoxId){
        var btnCheck = $(_actionBoxId).find("#btnCheck");
        btnCheck.removeClass('disabled');
    }

    function ajaxSyncFromDw() {
        var _actionBoxId = "#syncData";
        var _idQuestion = '{{$dwProject->id}}';
        var url = '{{route('dwsync.dwProjects.sync', '__id__')}}';
        url = url.replace("__id__", _idQuestion);
        console.log("URL : " + url);
        hideNotif();
        statusProcessSyncActions(_actionBoxId);
        $.ajax({
            type: 'get',
            url: url,
            dataType: 'json',
            data: {},
            success: function (data, textStatus) {
                console.log("Data " + JSON.stringify(data));
                var resultJson = data['result'] ? JSON.stringify(data['result']) : "No result";
                var resultSubmissions = data['submissions'] ? JSON.stringify(data['submissions']) : "No submissions";
                var message = data['message']['text'];// + " <br> " + data['submissions']['status'] ;
                $("#syncResult").text(resultJson);
                $("#pullStatus").html(formatQuestionsHtmlFromStatus(data['submissions']['status']));
                statusFinishSyncActions_withoutError(_actionBoxId);
                notifSuccess(message);
            },
            error: function (xhr, textStatus, errorThrown) {
                var message = 'Error : ' + xhr.responseText;
                statusFinishSyncActions_withError(_actionBoxId);
                notifError(message);
            }
        });
    }

    function formatQuestionsHtmlFromStatus(tStatus){
        var vHtml = "<table class='table table-responsive'><thead><th>Status</th><th>Number</th></thead><tbody>";
        for(var sts in tStatus){
            vHtml += "<tr><td>"+sts+"</td><td>" + tStatus[sts] + "</td></tr>";
        }
        vHtml += "</table>";
        return vHtml;
    }
</script>