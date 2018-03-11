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
        $.getJSON('/near-one', function(data) { // TODO: uzeti podatke sa distancma
            let kladze = [];
            data.forEach(item=>{
                kladze.push({
                    "category": "",
                    "column-1": item.dist,
                    "column-2": item.dist
                });
            });
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
                    "dataProvider": kladze
                }
            );
        });

    </script>
</head>
<body>
<div id="chartdiv" style="width: 100%; height: 400px; background-color: #FFFFFF;" ></div>
</body>
</html>
