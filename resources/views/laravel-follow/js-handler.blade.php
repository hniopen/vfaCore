<script language="JavaScript">
    // ##########################
    // Laravel follow handler
    // ##########################

    // ######### Favorite #######
    $(document).ready(function () {
        $(".lf-favorite").each(function (i, element) {
            $(element).click(function () {
                var chartId = $(this).val();
                var baseUrl;
                var status = $.trim($(this).html());
                if(status.toLowerCase() == 'favorite'){
                    baseUrl = '{{route('favorite.chart')}}';
                }
                else{
                    baseUrl = '{{route('unfavorite.chart')}}';
                }
                ajaxGetRequest(baseUrl+'?chart_id='+chartId, function(response){
                    if(status.toLowerCase() === 'favorite'){
                        $(element).html('unfavorite');
                        {{--$(element).html(@include(Config::get('follow-custom.button.unfavorite')));--}}
                    }
                    else{
                        $(element).html('favorite');
                        {{--$(element).html(@include(Config::get('follow-custom.button.favorite')));--}}
                    }

                });
            });
        });
    });
</script>