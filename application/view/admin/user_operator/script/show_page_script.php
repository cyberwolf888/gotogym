<script>
    <?php if($gym->alamat != ''): ?>
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
        gym_location = new google.maps.LatLng(<?= $gym->latitude ?>, <?= $gym->longitude ?>);

        var map = new google.maps.Map(document.getElementById('map_canvas'), {
            zoom: 14,
            center: gym_location,
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            styles: styleMap
        });

        var myMarker = new google.maps.Marker({
            position: gym_location,
            draggable: false,
            title: '<?= $_SESSION['gym']->fullname ?>',
            //icon: 'http://www.myiconfinder.com/uploads/iconsets/256-256-6096188ce806c80cf30dca727fe7c237.png',
            animation: google.maps.Animation.DROP,
            map: map
        });

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
    <?php endif; ?>


    $(document).ready(function() {
        $('.zoom-gallery').magnificPopup({
            delegate: 'a',
            type: 'image',
            closeOnContentClick: false,
            closeBtnInside: false,
            mainClass: 'mfp-with-zoom mfp-img-mobile',
            image: {
                verticalFit: true,
                titleSrc: function(item) {
                    return item.el.attr('title') + ' &middot; <a class="image-source-link" href="'+item.el.attr('data-source')+'" target="_blank">image source</a>';
                }
            },
            gallery: {
                enabled: true
            },
            zoom: {
                enabled: true,
                duration: 300, // don't foget to change the duration also in CSS
                opener: function(element) {
                    return element.find('img');
                }
            }

        });
    });

</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB2qlYAIYtnkeDoVzplOxe1LvH00bY8MNY&callback=initMap"></script>