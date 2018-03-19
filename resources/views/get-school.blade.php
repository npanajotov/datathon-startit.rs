<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <style>body {
            margin: 0;
            padding: 0
        }</style>
</head>
<body>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAdE28yG64gQTuf9G4JjpsG7KgEEyc06ug&libraries=visualization,places"></script>
<script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>
<script>
    $.getJSON('elementarySchool.json', function (item) {
        item.forEach(function (element) {
            if (element.naziv_su_cir === 'Београд') {

                let latlng = element.gps.split(",");
                let data = {
                    name: element.naziv_skole,
                    address: element.adresa,
                    city: 'Beograd',
                    zip: element.postanski_broj,
                    phone: element.tel,
                    lat: latlng[0],
                    lng: latlng[1],
                    type: 0
                };
                axios.post('/api/schools', data).then(() => {
                    console.log('success');
                });
            }
        });
    });


</script>
</html>
