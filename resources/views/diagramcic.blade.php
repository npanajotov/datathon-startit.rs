<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>UK Temperature History</title>
    <link rel="stylesheet" href="/css/reset.css">
    <link rel="stylesheet" href="/css/style.css">
    <script src="/js/modernizr.js"></script>
</head>

<body>
<div id="chart">
    <svg>
    </svg>
</div>
<div id="widgets">
    <div id="header">
        <h1>UK Temperature History</h1>
        <p>Explore the temperature in the United Kingdom since 1910 by scrolling the page <span
                    class="emphasis">up</span> and <span class="emphasis">down</span>. Visit years marked in <span
                    style="color: indianred;">red</span> or <span style="color: steelblue;">blue</span> that have
            significant weather events. You can also sort by <span class="emphasis">year</span>, <span class="emphasis">maximum</span>,
            <span class="emphasis">minimum</span> or <span class="emphasis">mean</span> temperature</p>
    </div>
    <div id="menu">
    </div>
    <div id="info">
    </div>
</div>

<script
        src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>
<script src="/js/d3.v3.min.js"></script>
<script src="/js/underscore-min.js"></script>
<script type="text/javascript">
    Modernizr.load({
        test: Modernizr.svg,
        yep: 'js/temperature.js',
        nope: ['js/jquery-1.10.2.min.js', 'js/fallback.js']
    });
</script>
</body>
</html>