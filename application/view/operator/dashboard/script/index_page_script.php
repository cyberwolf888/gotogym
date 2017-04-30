<script>
    var geocoder;
    var gym_location;

    var contentString = '<div id="content">'+
        '<h3 id="firstHeading" class="firstHeading">Bedebah</h3>'+
        '<div id="bodyContent">'+
        '<button type="button" class="btn btn-success">asdasd</button> '+
        '</div>'+
        '</div>';

    var styleMap = [
        {
            "featureType": "administrative",
            "elementType": "labels.text.fill",
            "stylers": [
                {
                    "color": "#444444"
                }
            ]
        },
        {
            "featureType": "landscape",
            "elementType": "all",
            "stylers": [
                {
                    "color": "#f2f2f2"
                }
            ]
        },
        {
            "featureType": "poi",
            "elementType": "all",
            "stylers": [
                {
                    "visibility": "off"
                }
            ]
        },
        {
            "featureType": "road",
            "elementType": "all",
            "stylers": [
                {
                    "saturation": -100
                },
                {
                    "lightness": 45
                }
            ]
        },
        {
            "featureType": "road.highway",
            "elementType": "all",
            "stylers": [
                {
                    "visibility": "simplified"
                }
            ]
        },
        {
            "featureType": "road.arterial",
            "elementType": "labels.icon",
            "stylers": [
                {
                    "visibility": "on"
                }
            ]
        },
        {
            "featureType": "transit",
            "elementType": "all",
            "stylers": [
                {
                    "visibility": "off"
                }
            ]
        },
        {
            "featureType": "water",
            "elementType": "all",
            "stylers": [
                {
                    "color": "#18aeec"
                },
                {
                    "visibility": "on"
                }
            ]
        }
    ];

    function initMap() {
        geocoder = new google.maps.Geocoder();
        <?php if($_SESSION['gym']->alamat != ''): ?>
        gym_location = new google.maps.LatLng(<?= $_SESSION['gym']->latitude ?>, <?= $_SESSION['gym']->longitude ?>);
        <?php else: ?>
        gym_location = new google.maps.LatLng(-8.655952, 115.216967);
        <?php endif; ?>

        var map = new google.maps.Map(document.getElementById('map_canvas'), {
            zoom: 14,
            center: gym_location,
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            styles: styleMap
        });

        var myMarker = new google.maps.Marker({
            position: gym_location,
            draggable: true,
            title: '<?= $_SESSION['gym']->fullname ?>',
            //icon: 'http://www.myiconfinder.com/uploads/iconsets/256-256-6096188ce806c80cf30dca727fe7c237.png',
            animation: google.maps.Animation.DROP,
            map: map
        });

        <?php for ($i=1; $i<=10; $i++): ?>
        var myMarker<?= $i ?> = new google.maps.Marker({
            position: new google.maps.LatLng(-8.655952, 115.21<?= $i ?>967),
            draggable: false,
            title: '<?= $_SESSION['gym']->fullname ?>',
            map: map
        });

        var infowindow<?= $i ?> = new google.maps.InfoWindow({
            content: contentString
        });

        myMarker<?= $i ?>.addListener('click', function() {
            infowindow<?= $i ?>.open(map, myMarker<?= $i ?>);
        });

        myMarker<?= $i ?>.addListener('mouseover', function() {
            infowindow<?= $i ?>.open(map, myMarker<?= $i ?>);
        });

        myMarker<?= $i ?>.addListener('mouseout', function() {
            infowindow<?= $i ?>.close();
        });
        <?php endfor; ?>

        google.maps.event.addListener(myMarker, 'dragend', function (evt) {
            //document.getElementById('current').innerHTML = '<p>Marker dropped: Current Lat: ' + evt.latLng.lat().toFixed(6) + ' Current Lng: ' + evt.latLng.lng().toFixed(6) + '</p>';
            $('#longitude').val(evt.latLng.lng().toFixed(6));
            $('#latitude').val(evt.latLng.lat().toFixed(6));
            geocodePosition(myMarker.getPosition());
        });

        google.maps.event.addListener(myMarker, 'dragstart', function (evt) {
            //document.getElementById('current').innerHTML = '<p>Currently dragging marker...</p>';
        });

        //map.setCenter(myMarker.position);
        //myMarker.setMap(map);

    }

    function geocodePosition(pos) {
        geocoder.geocode({
            latLng: pos
        }, function(responses) {
            if (responses && responses.length > 0) {
                //document.getElementById('alamat').innerHTML = responses[0].formatted_address;
                $('#alamat').val(responses[0].formatted_address);
                //marker.formatted_address = responses[0].formatted_address;
            } else {
                document.getElementById('alamat').innerHTML = '';
                //marker.formatted_address = 'Cannot determine address at this location.';
            }
            //infowindow.setContent(marker.formatted_address + "<br>coordinates: " + marker.getPosition().toUrlValue(6));
            //infowindow.open(map, marker);
        });
    }

</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB2qlYAIYtnkeDoVzplOxe1LvH00bY8MNY&callback=initMap"></script>