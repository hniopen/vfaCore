function ajaxGetRequest(url, onSuccess) {
    console.log("URL : " + url);
    $.ajax({
        type: 'get',
        url: url,
        dataType: 'json',
        data: {},
        success: function (data, textStatus) {
            console.log("Get single Data " + JSON.stringify(data));
            onSuccess(data);
        },
        error: function (xhr, textStatus, errorThrown) {
            var message = 'Error : ' + xhr.responseText;
            console.log("Error when loading : " + url);
            return 0;
        }
    });
}

