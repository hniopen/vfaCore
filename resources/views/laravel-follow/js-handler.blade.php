<script language="JavaScript">
    // ##########################
    // Laravel follow handler
    // ##########################

    // ######### Favorite #######
    function lfUnfavorite(chartId, item){
        var baseUrl = '{{route('unfavorite.chart')}}';
        var iconContainer = $("#lf-favorite-icons-"+chartId);
        var favoritedIcon = $("#lf-favorited-"+chartId);
        var unfavoritedIcon = $("#lf-unfavorited-"+chartId);
        ajaxGetRequest(baseUrl+'?chart_id='+chartId, function(response){
            favoritedIcon.hide();
            unfavoritedIcon.show();
        });
    }

    function lfFavorite(chartId, item){
        var baseUrl = '{{route('favorite.chart')}}';
        var iconContainer = $("#lf-favorite-icons-"+chartId);
        var favoritedIcon = $("#lf-favorited-"+chartId);
        var unfavoritedIcon = $("#lf-unfavorited-"+chartId);
        ajaxGetRequest(baseUrl+'?chart_id='+chartId, function(response){
            favoritedIcon.show();
            unfavoritedIcon.hide();
        });
    }

    $(document).ready(function () {

    });
</script>