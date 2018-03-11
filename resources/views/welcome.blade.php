<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
</head>
<body>
<div>Skidam...</div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.min.js"></script>
<script
        src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>
<script>
//    $.getJSON('data.json', function (objects) {
//        objects.forEach((item, index) => {
//
//            let street = (item.address.street).replace(/ /g, "+"),
//                city = 'Beograd',
//                url = 'https://maps.googleapis.com/maps/api/geocode/json?address=' + street + ',' + city + '&key=AIzaSyDO5z2fZjTYcTi8fPbiYaFlQcSFDMY3LhI';
//
//            axios.get(url).then(response => {
//                let data = {
//                    name: item.shortTitle,
//                    address: item.address.street,
//                    city: city,
//                    zip: item.ptt,
//                    phone: item.phone,
//                    lat: response.data.results[0].geometry.location.lat,
//                    lng: response.data.results[0].geometry.location.lng
//                };
//                axios.post('/api/betting', data).then(response => {
//                    console.log('success');
//                });
//            });
//        });
//    });
</script>
<script>

    // $.getJSON('elementarySchool.json', function (item) {
    //     item.forEach(function (element) {
    //         if (element.naziv_su_cir === 'Београд') {
    //
    //             let latlng = element.gps.split(",");
    //             let data = {
    //                 name: element.naziv_skole,
    //                 address: element.adresa,
    //                 city: 'Beograd',
    //                 zip: element.postanski_broj,
    //                 phone: element.tel,
    //                 lat: latlng[0],
    //                 lng: latlng[1],
    //                 type: 0
    //             };
    //             axios.post('/api/schools', data).then(response => {
    //                 console.log('success');
    //             });
    //         }
    //     });
    // });

    //
    // $.getJSON('highSchool.json', function (data) {
    //     data.forEach(function (element) {
    //         if (element.mesto.includes('Београд')) {
    //             element.mesto = 'Београд';
    //             let latlng = element.gps.split(",");
    //             let highSchool = {
    //                 name: element.naziv_skole,
    //                 address: element.adresa,
    //                 city: 'Београд',
    //                 zip: element.postanski_broj,
    //                 phone: element.tel,
    //                 lat: latlng[0],
    //                 lng: latlng[1],
    //                 type: 0
    //             };
    //         }
    //     });
    // });

</script>
</html>
