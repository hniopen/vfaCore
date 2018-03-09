<div id="lf-favorited-{{$chart->id}}" class="laravel-follow-icon"
     onclick="lfUnfavorite('{{$chart->id}}', '{{route('unfavorite.chart')}}')"
     title="Unmark as favorite"
     @if($isDisplay) @else style="display:none;"@endif>
    <i class="fa fa-star"></i>
</div>