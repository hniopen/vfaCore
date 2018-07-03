// ##########################
// Laravel follow handler
// ##########################

// ######### Favorite #######
function lfUnfavorite(chartId, baseUrl){
    var iconContainer = $("#lf-favorite-icons-"+chartId);
    var favoritedIcon = $("#lf-favorited-"+chartId);
    var unfavoritedIcon = $("#lf-unfavorited-"+chartId);
    ajaxGetSingleData(baseUrl+'?chart_id='+chartId, function(response){
        favoritedIcon.hide();
        unfavoritedIcon.show();
    });
}

function lfFavorite(chartId, baseUrl){
    var iconContainer = $("#lf-favorite-icons-"+chartId);
    var favoritedIcon = $("#lf-favorited-"+chartId);
    var unfavoritedIcon = $("#lf-unfavorited-"+chartId);
    ajaxGetSingleData(baseUrl+'?chart_id='+chartId, function(response){
        favoritedIcon.show();
        unfavoritedIcon.hide();
    });
}