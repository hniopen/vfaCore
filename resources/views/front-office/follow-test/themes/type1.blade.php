<div class="col-md-4">
    <div class="box box-solid">
        <div class="box-header with-border">
            <i class="fa fa-text-width"></i>
            <h3 class="box-title">{{$chart->title}}</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-default follow-chart" value="{{$chart->id}}">
                    @if (Auth::user()->hasFavorited($chart))
                        Unfollow
                    @else
                        Follow
                    @endif
                </button>
            </div>
        </div>
        @yield('follow-body')
    </div>
    <!-- /.box -->
</div>

@section('custom_javascript')
    @yield('follow_javascript')

@overwrite
