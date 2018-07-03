@extends('front-office.follow-test.themes.type1')

@section('follow-body')
    <!-- /.box-header -->
    <div class="box-body">
        <div id="chart2"></div>
    </div>
    <!-- /.box-body -->
@overwrite

@section('follow_javascript')
    <script language="JavaScript">

        $(document).ready(function () {
            var chart2 = c3.generate({
                bindto: "#chart2",
                data: {
                    columns: [
                        ['data1', 300, 350, 300, 0, 0, 120],
                        ['data2', 130, 100, 140, 200, 150, 50]
                    ],
                    types: {
                        data1: 'area-spline',
                        data2: 'area-spline'
                        // 'line', 'spline', 'step', 'area', 'area-step' are also available to stack
                    },
                    groups: [['data1', 'data2']]
                }
            });
        });

    </script>
@append