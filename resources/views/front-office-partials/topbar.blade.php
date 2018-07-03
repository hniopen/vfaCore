@inject('request', 'Illuminate\Http\Request')
<div class="collapse navbar-collapse pull-left" id="navbar-collapse">
    <ul class="nav navbar-nav">
        <li class="{{ $request->segment(1) == 'home' ? 'active' : '' }}"><a href="/home">Home <span class="sr-only">(current)</span></a></li>
        {{--<li><a href="/page2">Another page</a></li>--}}
        @can('feature-flag', 'feature_vfa_dashboard')
        <li class="{{ $request->segment(1) == 'page3' || $request->segment(1) == 'page4' ? 'dropdown active' : 'dropdown' }}">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Custom charts<span class="caret"></span></a>

            <ul class="dropdown-menu" role="menu">
                <li><a href="/page3">All custom charts</a></li>
                <li><a href="/page4">My favorite custom charts</a></li>
            </ul>
        </li>
        @endcan
        {{--<li class="dropdown">--}}
            {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <span class="caret"></span></a>--}}
            {{--<ul class="dropdown-menu" role="menu">--}}
                {{--<li><a href="#">Action</a></li>--}}
                {{--<li><a href="#">Another action</a></li>--}}
                {{--<li><a href="#">Something else here</a></li>--}}
                {{--<li class="divider"></li>--}}
                {{--<li><a href="#">Separated link</a></li>--}}
                {{--<li class="divider"></li>--}}
                {{--<li><a href="#">One more separated link</a></li>--}}
            {{--</ul>--}}
        {{--</li>--}}
    </ul>
    <form class="navbar-form navbar-left" role="search">
        <div class="form-group">
            <input type="text" class="form-control" id="navbar-search-input" placeholder="Search">
        </div>
    </form>
</div>