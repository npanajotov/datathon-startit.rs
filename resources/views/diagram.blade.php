<!DOCTYPE html>
<html>
<head>
    <title>smoothed line | amCharts</title>
    <meta name="description" content="chart created using amCharts live editor" />

    <!-- amCharts javascript sources -->
    <script type="text/javascript" src="https://www.amcharts.com/lib/3/amcharts.js"></script>
    <script type="text/javascript" src="https://cdn.amcharts.com/lib/3/serial.js"></script>
    <script type="text/javascript" src="https://www.amcharts.com/lib/3/themes/patterns.js"></script>


    <!-- amCharts javascript code -->
    <script type="text/javascript">
        $.getJSON('http://10.120.200.167:8000/check', function(data) { // TODO: uzeti podatke sa distancma

            AmCharts.makeChart("chartdiv",
                {
                    "type": "serial",
                    "categoryField": "category",
                    "autoMarginOffset": 40,
                    "marginRight": 60,
                    "marginTop": 60,
                    "startDuration": 1,
                    "fontSize": 13,
                    "theme": "patterns",
                    "categoryAxis": {
                        "gridPosition": "start"
                    },
                    "trendLines": [],
                    "graphs": [
                        {
                            "balloonText": "[[title]] of [[category]]:[[value]]",
                            "bullet": "round",
                            "bulletSize": 10,
                            "id": "AmGraph-1",
                            "lineAlpha": 1,
                            "lineThickness": 3,
                            "title": "graph 1",
                            "type": "smoothedLine",
                            "valueField": "column-1"
                        }
                    ],
                    "guides": [],
                    "valueAxes": [
                        {
                            "id": "ValueAxis-1",
                            "title": ""
                        }
                    ],
                    "allLabels": [],
                    "balloon": {},
                    "titles": [],
                    "dataProvider": [// TODO: samo ubaci ovde json podatke sortirane po distanci. u ovaj column-1 i column-2 ide distanca, sve ce se ostalo samo odraditi
                        {
                            "category": "category 1", // TODO: upisati ime kladionice
                            "column-1": 100,//TODO: upisati ovde distance
                            "column-2": 5 // TODO: upisati ovde distance
                        },
                        {
                            "category": "category 2",
                            "column-1": 6,
                            "column-2": 7
                        },
                        {
                            "category": "category 3",
                            "column-1": 2,
                            "column-2": 3
                        },
                        {
                            "category": "category 4",
                            "column-1": 1,
                            "column-2": 3
                        },
                        {
                            "category": "category 5",
                            "column-1": 2,
                            "column-2": 1
                        },
                        {
                            "category": "category 6",
                            "column-1": 3,
                            "column-2": 2
                        },
                        {
                            "category": "category 7",
                            "column-1": 6,
                            "column-2": 8
                        }
                    ]
                }
            );
        });

    </script>
</head>
<body>
<div id="chartdiv" style="width: 100%; height: 400px; background-color: #FFFFFF;" ></div>
</body>
</html>
