<div id="lf-unfavorited-{{$chart->id}}" class="laravel-follow-icon"
     onclick="lfFavorite('{{$chart->id}}', '{{route('favorite.chart')}}')"
     title="Mark as favorite"
     @if($isDisplay) @else style="display:none;"@endif>
    <i class="fa fa-star-o"></i>
</div>