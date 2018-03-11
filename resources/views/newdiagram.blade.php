<!DOCTYPE html>
<html>
<head>
    <title>date series, daily | amCharts</title>
    <meta name="description" content="chart created using amCharts live editor" />
    <script
            src="https://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
            crossorigin="anonymous"></script>
    <!-- amCharts javascript sources -->
    <script type="text/javascript" src="https://www.amcharts.com/lib/3/amcharts.js"></script>
    <script type="text/javascript" src="https://cdn.amcharts.com/lib/3/serial.js"></script>
    <script type="text/javascript" src="https://www.amcharts.com/lib/3/themes/dark.js"></script>


    <!-- amCharts javascript code -->
    <script type="text/javascript">
        $.getJSON('/near-one', function(data) { // TODO: uzeti podatke sa distancma

            let kladze = [];
            data.forEach(item => {
                kladze.push({
                    "date": "" + item,
                    "column-1": item.dist,
                    "column-2": 0
                });
            });
        AmCharts.makeChart("chartdiv",
            {
                "type": "serial",
                "categoryField": "date",
                "dataDateFormat": "YYYY-MM-DD",
                "autoMarginOffset": 40,
                "marginRight": 60,
                "marginTop": 60,
                "fontSize": 13,
                "theme": "dark",
                "categoryAxis": {
                    "parseDates": true
                },
                "chartCursor": {
                    "enabled": true
                },
                "chartScrollbar": {
                    "enabled": true
                },
                "trendLines": [],
                "graphs": [
                    {
                        "columnWidth": 0.44,
                        "cornerRadiusTop": 8,
                        "dashLength": 4,
                        "fillAlphas": 0.51,
                        "id": "AmGraph-1",
                        "lineAlpha": 0.44,
                        "title": "graph 1",
                        "type": "column",
                        "valueField": "column-1"
                    },
                    {
                        "bullet": "square",
                        "bulletBorderAlpha": 1,
                        "bulletBorderThickness": 1,
                        "bulletSize": 16,
                        "id": "AmGraph-2",
                        "lineThickness": 3,
                        "title": "graph 2",
                        "valueField": "column-2"
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
                "dataProvider": [
                    {
                        "date": "2014-03-01",
                        "column-1": 8,
                        "column-2": 5
                    },
                    {
                        "date": "2014-03-02",
                        "column-1": 6,
                        "column-2": 7
                    },
                    {
                        "date": "2014-03-03",
                        "column-1": 2,
                        "column-2": 3
                    },
                    {
                        "date": "2014-03-04",
                        "column-1": 1,
                        "column-2": 3
                    },
                    {
                        "date": "2014-03-05",
                        "column-1": 2,
                        "column-2": 1
                    },
                    {
                        "date": "2014-03-06",
                        "column-1": 3,
                        "column-2": 2
                    },
                    {
                        "date": "2014-03-07",
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
<div id="chartdiv" style="width: 100%; height: 400px; background-color: #282828;" ></div>
</body>
</html>