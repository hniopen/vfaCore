<script type="text/javascript" src="{{ asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{asset('bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script type="text/javascript" src="{{asset('bower_components/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
<script type="text/javascript" src="{{asset('bower_components/datatables.net-buttons/js/buttons.flash.min.js')}}"></script>
<script src="{{asset('js/bower_components/jszip.min/index.js')}}"></script>
<script src="{{asset('js/bower_components/pdfmake.min/index.js')}}"></script>
<script src="{{asset('js/bower_components/vfs_fonts/vfs_fonts.js')}}"></script>
<script type="text/javascript" src="{{asset('bower_components/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
<script type="text/javascript" src="{{asset('bower_components/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
<script type="text/javascript" src="{{asset('bower_components/datatables.net-buttons/js/buttons.colVis.min.js')}}"></script>
<script type="text/javascript" src="{{asset('bower_components/datatables.net-select/js/dataTables.select.min.js')}}"></script>

<script type="text/javascript" src="{{asset('bower_components/jquery-ui/jquery-ui.min.js')}}"></script>

<script type="text/javascript" src="{{asset('bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{asset('bower_components/select2/dist/js/select2.full.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('custom_fix/adminlte_main.js') }}"></script>
<script type="text/javascript" src="{{asset('bower_components/moment/min/moment.min.js') }}"></script>
<script type="text/javascript" src="{{asset('bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js') }}"></script>

<script type="text/javascript" src="{{asset('bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
<script type="text/javascript" src="{{asset('bower_components/fastclick/lib/fastclick.js') }}"></script>
<script type="text/javascript" src="{{asset('bower_components/AdminLTE/dist/js/app.js') }}"></script>
<script type="text/javascript" src="{{asset('bower_components/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
<script type="text/javascript" src="{{asset('bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.js') }}"></script>
<link href="{{ asset('bower_components/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet">
<link href="{{ asset('bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker3.min.css') }}" rel="stylesheet">
<script type="text/javascript" src="{{asset('bower_components/inputmask/dist/min/inputmask/inputmask.date.extensions.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('bower_components/AdminLTE/plugins/input-mask/jquery.inputmask.date.extensions.js') }}"></script>

<script>
    window._token = '{{ csrf_token() }}';
</script>



@yield('javascript')
@yield('scripts') {{--used by infyom template --}}