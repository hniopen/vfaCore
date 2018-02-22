@inject('request', 'Illuminate\Http\Request')
<li class="{{ $request->segment(2) == 'home' || $request->segment(2) == '' ? 'active' : '' }}">
    <a href="{{ url('/admin/home') }}">
        <i class="fa fa-wrench"></i>
        <span class="title">@lang('global.app_dashboard')</span>
    </a>
</li>

@can('feature-flag', 'feature_acl')
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
@endcan

@if(View::exists('dwsync::dwsync_menu'))
    @can('feature-flag', 'feature_dw_sync')
        @can('dwsync_create_project', 'dwsync_sync_data', 'dwsync_see_data')
            @include('dwsync::dwsync_menu')
        @endcan
    @endcan
@endif

@if(View::exists('vfadashboard::vfadashboard_menu'))
    @can('feature-flag', 'feature_vfa_dashboard', 'manage_vfadashboard')
        @include('vfadashboard::vfadashboard_menu')
    @endcan
@endif

<li class="{{ $request->segment(1) == 'change_password' ? 'active' : '' }}">
    <a href="{{ route('auth.change_password') }}">
        <i class="fa fa-key"></i>
        <span class="title">Change password</span>
    </a>
</li>

<li class="{{ $request->segment(2) == 'feature_flags' ? 'active' : '' }}">
    <a href="{{ route('laravel-feature-flag.index') }}">
        <i class="fa fa-flag"></i>
        <span class="title">Feature flag</span>
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
@can('core_view_unreleased')
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
@endcan
