<div class="col-md-4">
    <div class="box box-solid">
        <div class="box-header with-border">
            <i class="fa fa-text-width"></i>
            <h3 class="box-title">{{$chart->title}}</h3>
            <div class="box-tools pull-right">
                <button class="btn btn-default lf-favorite" value="{{$chart->id}}">
                    @if (Auth::user()->hasFavorited($chart))
                        @include(Config::get('follow-custom.button.favorited'))
                    @else
                        @include(Config::get('follow-custom.button.unfavorited'))
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
