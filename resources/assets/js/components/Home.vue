<template>
    <div id="map"></div>
</template>

<script>

    export default {
        data() {
            return {
                map: {},
                floodsObj: {},
                floods: [],
                dataArr: [],
            }
        },
        mounted: function () {
            this.initMap();
        },
        methods: {
            initMap: function () {
                let items = [];
                axios.get('/check').then(response => {
                    this.dataArr = response.data;
                    response.data.forEach(item => {
                        items.push(item.school_lat);
                        items.push(item.betting_lat);

                        this.floods.push(items);
                        items = [];
                    });


                    this.map = new google.maps.Map(document.getElementById('map'), {
                        zoom: 14,
                        center: {lat: 44.810160, lng: 20.461457},
                        // mapTypeId: 'moon', // ovo izmeni ako oces praznu mapu
                        mapTypeId: 'roadmap',
                        styles: [
                            {elementType: 'geometry', stylers: [{color: '#242f3e'}]},
                            {elementType: 'labels.text.stroke', stylers: [{color: '#242f3e'}]},
                            {elementType: 'labels.text.fill', stylers: [{color: '#545658'}]},
                            {
                                featureType: 'administrative.locality',
                                elementType: 'labels.text.fill',
                                stylers: [{color: '#545658'}]
                            },
                            {
                                featureType: 'poi',
                                elementType: 'labels.text.fill',
                                stylers: [{color: '#545658'}]
                            },
                            {
                                featureType: 'poi.park',
                                elementType: 'geometry',
                                stylers: [{color: '#263c3f'}]
                            },
                            {
                                featureType: 'poi.park',
                                elementType: 'labels.text.fill',
                                stylers: [{color: '#6b9a76'}]
                            },
                            {
                                featureType: 'road',
                                elementType: 'geometry',
                                stylers: [{color: '#38414e'}]
                            },
                            {
                                featureType: 'road',
                                elementType: 'geometry.stroke',
                                stylers: [{color: '#212a37'}]
                            },
                            {
                                featureType: 'road',
                                elementType: 'labels.text.fill',
                                stylers: [{color: '#6f7582'}]
                            },
                            {
                                featureType: 'road.highway',
                                elementType: 'geometry',
                                stylers: [{color: '#746855'}]
                            },
                            {
                                featureType: 'road.highway',
                                elementType: 'geometry.stroke',
                                stylers: [{color: '#1f2835'}]
                            },
                            {
                                featureType: 'road.highway',
                                elementType: 'labels.text.fill',
                                stylers: [{color: '#f3d19c'}]
                            },
                            {
                                featureType: 'transit',
                                elementType: 'geometry',
                                stylers: [{color: '#2f3948'}]
                            },
                            {
                                featureType: 'transit.station',
                                elementType: 'labels.text.fill',
                                stylers: [{color: '#545658'}]
                            },
                            {
                                featureType: 'water',
                                elementType: 'geometry',
                                stylers: [{color: '#17263c'}]
                            },
                            {
                                featureType: 'water',
                                elementType: 'labels.text.fill',
                                stylers: [{color: '#515c6d'}]
                            },
                            {
                                featureType: 'water',
                                elementType: 'labels.text.stroke',
                                stylers: [{color: '#17263c'}]
                            }
                        ],
                        mapTypeControl: true,
                        mapTypeControlOptions: {
                            style: google.maps.MapTypeControlStyle.HORIZONTAL_BAR,
                            position: google.maps.ControlPosition.TOP_CENTER
                        },
                        zoomControl: true,
                        zoomControlOptions: {
                            position: google.maps.ControlPosition.LEFT_BOTTOM
                        },
                        scaleControl: true,
                        streetViewControl: false,
                    });

                    this.setFloodMap();
                });
            },


            setFloodMap() {
                this.floods.forEach((item, index) => {
                    let color = '#ff1313', opacity = 1, distance = this.dataArr[index].distance, weight = 3;
                    if (distance > 175) {
                        weight = 2;
                        opacity = 0.25;
                    } else if (distance > 150) {
                        opacity = 0.5
                        weight = 2;
                    } else if (distance > 100) {
                        opacity = 0.75;
                        weight = 2.5;
                    } else {
                        opacity = 1;
                        weight = 7;
                    }
                    this.floodsObj = new google.maps.Polyline({
                        path: item,
                        geodesic: true,
                        strokeColor: color,
                        strokeOpacity: opacity,
                        strokeWeight: weight
                    });


                    this.floodsObj.setMap(this.map);
                })

            },


        }
    }
</script>

<style>
    #map {
        width: 100%;
        height: 100%;
        left: 0;
        right: 0;
        top: 0;
        bottom: 0;
        position: absolute;
    }

    #map-control {
        background: #fff;
        border: 2px solid #fff;
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        border-radius: 3px;
        -webkit-box-shadow: 0 2px 6px rgba(0, 0, 0, .3);
        -moz-box-shadow: 0 2px 6px rgba(0, 0, 0, .3);
        box-shadow: 0 2px 6px rgba(0, 0, 0, .3);
        margin: 10px;
        color: #000;
        font-size: 16px;
        padding: 10px;
    }

    #infowindow-content .title {
        font-weight: bold;
    }

    #infowindow-content {
        display: none;
    }

    #map #infowindow-content {
        display: inline;
    }

</style>