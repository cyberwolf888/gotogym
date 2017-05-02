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
        gym_location = new google.maps.LatLng(<?= $gym->latitude ?>, <?= $gym->longitude ?>);

        var map = new google.maps.Map(document.getElementById('map_canvas'), {
            zoom: 14,
            center: gym_location,
            scrollwheel: false,
            mapTypeControl: false,
            scaleControl: false,
            navigationControl: false,
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            styles: styleMap
        });

        var myMarker = new google.maps.Marker({
            position: gym_location,
            draggable: false,
            icon: '<?= URL;?>assets/frontend/images/marker.png',
            animation: google.maps.Animation.DROP,
            map: map
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