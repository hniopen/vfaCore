@extends('front-office.follow-test.themes.type1')

@section('follow-body')
    <!-- /.box-header -->
    <div class="box-body">
        <div id="chart7"></div>
    </div>
    <!-- /.box-body -->
@overwrite

@section('follow_javascript')
    <script language="JavaScript">

        $(document).ready(function () {

            var chart7 = c3.generate({
                bindto: "#chart7",
                data: {
                    columns: [
                        ['data1', 300, 350, 300, 0, 0, 100],
                        ['data2', 130, 100, 140, 200, 150, 50]
                    ],
                    types: {
                        data1: 'step',
                        data2: 'area-step'
                    }
                }
            });



        });

    </script>
@append