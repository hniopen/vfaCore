<div class="col-md-4">
    <div class="box box-solid">
        <div class="box-header with-border">
            <i class="fa fa-text-width"></i>
            <h3 class="box-title">{{$chart->title}}</h3>
            <div class="box-tools pull-right">
                <div id="lf-favorite-icons-{{$chart->id}}">
                    @include(Config::get('follow-custom.button.favorited'), ['isDisplay' => Auth::user()->hasFavorited($chart)])
                    @include(Config::get('follow-custom.button.unfavorited'), ['isDisplay' => !Auth::user()->hasFavorited($chart)])
                </div>
            </div>
        </div>
        @yield('follow-body')
    </div>
    <!-- /.box -->
</div>

@section('custom_javascript')
    @yield('follow_javascript')

@overwrite
