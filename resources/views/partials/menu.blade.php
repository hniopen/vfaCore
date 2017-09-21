@inject('request', 'Illuminate\Http\Request')
<li class="{{ $request->segment(2) == 'home' || $request->segment(2) == '' ? 'active' : '' }}">
    <a href="{{ url('/admin/home') }}">
        <i class="fa fa-wrench"></i>
        <span class="title">@lang('global.app_dashboard')</span>
    </a>
</li>

@can('manage_users')
    <li class="treeview">
        <a href="#">
            <i class="fa fa-users"></i>
            <span class="title">@lang('global.user-management.title')</span>
            <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
        </a>
        <ul class="treeview-menu">

            <li class="{{ $request->segment(2) == 'permissions' ? 'active active-sub' : '' }}">
                <a href="{{ route('admin.permissions.index') }}">
                    <i class="fa fa-briefcase"></i>
                    <span class="title">
                                @lang('global.permissions.title')
                            </span>
                </a>
            </li>
            <li class="{{ $request->segment(2) == 'roles' ? 'active active-sub' : '' }}">
                <a href="{{ route('admin.roles.index') }}">
                    <i class="fa fa-briefcase"></i>
                    <span class="title">
                                @lang('global.roles.title')
                            </span>
                </a>
            </li>
            <li class="{{ $request->segment(2) == 'users' ? 'active active-sub' : '' }}">
                <a href="{{ route('admin.users.index') }}">
                    <i class="fa fa-user"></i>
                    <span class="title">
                                @lang('global.users.title')
                            </span>
                </a>
            </li>
        </ul>
    </li>
@endcan


<li class="treeview">
    <a href="#">
        <i class="fa fa-exchange"></i>
        <span class="title">DW Sync</span>
        <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
    </a>
    <ul class="treeview-menu">

        <li class="{{ Request::is('dwEntityTypes*') ? 'active active-sub' : '' }}">
            <a href="{!! route('dwsync.dwEntityTypes.index') !!}"><i class="fa fa-list-ul"></i><span>Dw Entity Types</span></a>
        </li>

        <li class="{{ Request::is('dwProjects*') ? 'active active-sub' : '' }}">
            <a href="{!! route('dwsync.dwProjects.index') !!}"><i class="fa fa-list-ol"></i><span>Dw Projects</span></a>
        </li>

        <li class="{{ Request::is('dwQuestions*') ? 'active active-sub' : '' }}">
            <a href="{!! route('dwsync.dwQuestions.index') !!}"><i class="fa fa-list-alt"></i><span>Dw Questions</span></a>
        </li>

    </ul>
</li>

<li class="{{ $request->segment(1) == 'change_password' ? 'active' : '' }}">
    <a href="{{ route('auth.change_password') }}">
        <i class="fa fa-key"></i>
        <span class="title">Change password</span>
    </a>
</li>

{{--<li>--}}
    {{--<a href="#logout" onclick="$('#logout').submit();">--}}
        {{--<i class="fa fa-arrow-left"></i>--}}
        {{--<span class="title">@lang('global.app_logout')</span>--}}
    {{--</a>--}}
{{--</li>--}}

{{--{!! Form::open(['route' => 'auth.logout', 'style' => 'display:none;', 'id' => 'logout']) !!}--}}
{{--<button type="submit">@lang('global.logout')</button>--}}
{{--{!! Form::close() !!}--}}

<li class="{{ $request->segment(2) == 'generator_builder' ? 'active active-sub' : '' }}">
    <a href="{{ route('generator') }}">
        <i class="fa fa-user"></i>
        <span class="title">@lang('CRUD Generator')</span>
    </a>
</li>
<li class="{{ $request->segment(2) == 'settings' ? 'active active-sub' : '' }}">
    <li class="{{ Request::is('settings*') ? 'active' : '' }}">
        <a href="{!! route('admin.settings.index') !!}"><i class="fa fa-edit"></i><span>Settings</span></a>
    </li>
</li>





<li class="{{ Request::is('teachers*') ? 'active' : '' }}">
    <a href="{!! route('teachers.index') !!}"><i class="fa fa-edit"></i><span>Teachers</span></a>
</li>


<li class="{{ Request::is('students*') ? 'active' : '' }}">
    <a href="{!! route('students.index') !!}"><i class="fa fa-edit"></i><span>Students</span></a>
</li>

