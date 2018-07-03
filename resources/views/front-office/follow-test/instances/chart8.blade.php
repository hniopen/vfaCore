@extends('front-office.follow-test.themes.type1')

@section('follow-body')
    <!-- /.box-header -->
    <div class="box-body">
        <div id="chart8"></div>
    </div>
    <!-- /.box-body -->
@overwrite

@section('follow_javascript')
    <script language="JavaScript">

        $(document).ready(function () {

            var chart8 = c3.generate({
                bindto: "#chart8",
                data: {
                    columns: [
                        ['data1', -30, 200, 200, 400, -150, 250],
                        ['data2', 130, 100, -100, 200, -150, 50],
                        ['data3', -230, 200, 200, -300, 250, 250]
                    ],
                    type: 'bar',
                    groups: [
                        ['data1', 'data2']
                    ]
                },
                grid: {
                    y: {
                        lines: [{value:0}]
                    }
                }
            });

            setTimeout(function () {
                chart8.groups([['data1', 'data2', 'data3']])
            }, 1000);

            setTimeout(function () {
                chart8.load({
                    columns: [['data4', 100, -50, 150, 200, -300, -100]]
                });
            }, 1500);

            setTimeout(function () {
                chart8.groups([['data1', 'data2', 'data3', 'data4']])
            }, 2000);




        });

    </script>
@append