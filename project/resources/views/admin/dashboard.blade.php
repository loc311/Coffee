@extends('admin_layout')
@section('admin_content')
<div>
<div class="col-sm-12" >
    <h2 style="text-align: center; color: #00A990;">Doanh thu trong ngày</h2>
    <div class="col-md-12 chart_agile_right">
        <div class="chart_agile_top">
            <div class="chart_agile_bottom">
                <div id="graph4"></div>
                <script>
                    Morris.Donut({
                        element: 'graph4',
                        data: [{
                                value: 70,
                                label: 'Trong ngày',
                                formatted: "{{$day.'.000'.' '.'VND'}}"
                            },

                        ],
                        formatter: function(x, data) {
                            return data.formatted;
                        }
                    });
                </script>

            </div>
        </div>
    </div>
</div>

<div class="col-sm-12">
    <h2 style="text-align: center; color: #00A990;">Doanh thu 7 ngày gần nhất</h2>

    <div class="col-md-12 chart_agile_right">
        <div class="chart_agile_top">
            <div class="chart_agile_bottom">
                <div id="graph1"></div>
                <script>
                    Morris.Donut({
                        element: 'graph1',
                        data: [{
                                value: 70,
                                label: '7 ngày',
                                formatted: "{{$week.'.000'.' '.'VND'}}"
                            },

                        ],
                        formatter: function(x, data) {
                            return data.formatted;
                        }
                    });
                </script>

            </div>
        </div>
    </div>

</div>
<div class="col-sm-12">
    <h2 style="text-align: center; color: #00A990;">Doanh thu trong tháng</h2>
    <div>
        
        <div class="col-md-12 chart_agile_right">
            <div class="chart_agile_top">
                <div class="chart_agile_bottom">
                    <div id="graph"></div>
                    <script>
                        Morris.Donut({
                            element: 'graph',
                            data: [{
                                    value: 70,
                                    label: 'Trong tháng',
                                    formatted: "{{$month.'.000'.' '.'VND'}}"
                                },

                            ],
                            formatter: function(x, data) {
                                return data.formatted;
                            }
                        });
                    </script>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection