<script src="{{asset('js/bower_components/jquery-1.11.3.min/jquery-1.11.3.min.js')}}"></script>
<script src="{{asset('js/bower_components/jquery.dataTables.min/index.js')}}"></script>
<script src="{{asset('js/bower_components/dataTables.buttons.min/index.js')}}"></script>
<script src="{{asset('js/bower_components/buttons.flash.min/index.js')}}"></script>
<script src="{{asset('js/bower_components/jszip.min/index.js')}}"></script>
<script src="{{asset('js/bower_components/pdfmake.min/index.js')}}"></script>
<script src="{{asset('js/bower_components/vfs_fonts/vfs_fonts.js')}}"></script>
<script src="{{asset('js/bower_components/buttons.html5.min/index.js')}}"></script>
<script src="{{asset('js/bower_components/buttons.print.min/index.js')}}"></script>
<script src="{{asset('js/bower_components/buttons.colVis.min/index.js')}}"></script>
<script src="{{asset('js/bower_components/dataTables.select.min/index.js')}}"></script>
<script src="{{asset('js/bower_components/jquery-ui.min/jquery-ui.min.js')}}"></script>
<script src="{{ url('adminlte/js') }}/bootstrap.min.js"></script>
<script src="{{ url('adminlte/js') }}/select2.full.min.js"></script>
<script src="{{ url('adminlte/js') }}/main.js"></script>

<script src="{{ url('adminlte/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
<script src="{{ url('adminlte/plugins/fastclick/fastclick.js') }}"></script>
<script src="{{ url('adminlte/js/app.min.js') }}"></script>
<script>
    window._token = '{{ csrf_token() }}';
</script>



@yield('javascript')
@yield('scripts') {{--used by infyom template --}}