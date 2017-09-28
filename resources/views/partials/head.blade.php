<meta charset="utf-8">
<title>
    {{ trans('global.global_title') }}
</title>

<meta http-equiv="X-UA-Compatible"
      content="IE=edge">
<meta content="width=device-width, initial-scale=1.0"
      name="viewport"/>
<meta http-equiv="Content-type"
      content="text/html; charset=utf-8">

<!-- Tell the browser to be responsive to screen width -->
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<!-- Font Awesome -->
<link rel="stylesheet" href="{{ url('css/bower_components/font-awesome.min/index.css') }}">
<!-- Ionicons -->
<link rel="stylesheet" href="{{ url('css/bower_components/ionicons.min/index.css') }}">
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<link href="{{ url('adminlte/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
<link rel="stylesheet"
      href="{{ url('adminlte/css') }}/select2.min.css"/>
<link href="{{ url('adminlte/css/AdminLTE.min.css') }}" rel="stylesheet">
<link href="{{ url('adminlte/css/skins/skin-blue.min.css') }}" rel="stylesheet">
<link rel="stylesheet"
      href="{{ url('css/bower_components/jquery-ui/index.css') }}">
<link rel="stylesheet"
      href="{{ url('css/bower_components/jquery.dataTables.min/index.css') }}"/>
<link rel="stylesheet"
      href="{{ url('css/bower_components/select.dataTables.min/index.css') }}"/>
<link rel="stylesheet"
      href="{{ url('css/bower_components/buttons.dataTables.min/index.css') }}"/>
<link rel="stylesheet"
      href="{{ url('css/bower_components/jquery-ui-timepicker-addon.min/index.css') }}"/>
<link rel="stylesheet"
      href="{{ url('css/bower_components/bootstrap-datepicker.standalone.min/index.css') }}"/>

@yield('css')