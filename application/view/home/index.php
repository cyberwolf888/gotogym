<!DOCTYPE HTML>
<html lang="en-gb" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="With unique design and accent in details Maxx Fitness is perfect template. Design have beautiful typography and elegant structure. HTML Template is based on Warp7 Framework and made for all who wants a lightweight and modular website.">

    <title>Home - Maxx Fitness HTML Template</title>

    <!-- Favicon and Apple icon -->
    <link href="favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon">
    <link href="apple_touch_icon.png" rel="apple-touch-icon-precomposed">

    <link href="<?= URL;?>assets/frontend/css/bootstrap.css" rel="stylesheet"><!-- Bootstrap Styles -->
    <link href="<?= URL;?>assets/frontend/css/theme.css" rel="stylesheet"><!-- Main Template Styles -->
    <link href="<?= URL;?>assets/frontend/css/schedule.css" rel="stylesheet"><!-- Schedule CSS -->
</head>
<body class="tm-isblog">
<div class="ak-page">

    <!-- START Main menu -->
    <nav class="tm-navbar uk-navbar">
        <div class="uk-container uk-container-center">
            <!-- START Logo -->
            <a class="tm-logo" href="index-2.html">
                <!-- <span class="color-1">GO TO </span><span class="color-2">GYM</span> -->
                <img src="<?= URL;?>assets/frontend/images/logo.png" style="margin-top: 10px;">
            </a>
            <!-- END Logo -->
            <ul class="uk-navbar-nav uk-hidden-small">
                <li class="uk-parent uk-active"><a href="<?= URL ?>">Home</a></li>
                <li><a href="<?= URL ?>">New Facility</a></li>
                <li><a href="contacts.html">Contact</a></li>
                <li><a href="<?= URL.'home/login' ?>"">Login</a></li>
            </ul>
            <a href="#offcanvas" class="uk-navbar-toggle uk-visible-small" data-uk-offcanvas=""></a>
        </div>
    </nav>
    <!-- END Main menu -->

    <!-- START Fullscreen block -->
    <div class="tm-fullscreen uk-position-relative">
        <div class="akslider-module ">
            <div id='map_canvas' style="width: 100%;height: 630px;"></div>
        </div>
    </div>
    <!-- END Fullscreen block -->

    <!-- START Features block -->
    <div class="tm-block  tm-block-top-a tm-section-light tm-section-padding-large" style="padding-top: 50px; padding-bottom: 50px;">
        <div class="uk-container uk-container-center">
            <section class="tm-top-a uk-grid" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin="">
                <div class="uk-width-1-1">
                    <div class="uk-panel">
                        <div class="category-module-features ">

                            <div class="uk-grid" data-uk-grid-margin="" data-uk-grid-match="{target:'.uk-panel'}">
                                <div class="uk-width-large-2-10 uk-text-center"></div>
                                <div class="uk-width-medium-1-1 uk-width-large-6-10 uk-text-center">
                                    <!-- START Feature 1 -->
                                    <div class="uk-overlay tm-overlay uk-width-1-1">
                                        <div class="uk-panel uk-panel-box" style="padding: 30px">
                                            <form class="uk-form">

                                                <fieldset data-uk-margin>
                                                    <input type="text" placeholder="Search..." class="uk-form-large uk-width-5-10" >
                                                    <select class="uk-form-large uk-width-3-10">
                                                        <option value="0">All Category</option>
                                                        <?php $category = new \Mini\Model\Category(); foreach ($category->getAll() as $cat): ?>
                                                            <option value="<?= $cat->id ?>"><?= $cat->label ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    <button class="uk-button uk-form-large uk-width-1-10" style="height: 40px;">Search</button>
                                                </fieldset>

                                            </form>
                                        </div>
                                    </div>
                                    <!-- END Feature 1 -->
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <!-- END Features block -->

    <!-- START About block -->
    <div class="tm-block  tm-block-top-b tm-section-dark tm-section-image tm-section-padding-large">
        <div class="uk-container uk-container-center">
            <section class="tm-top-b uk-grid" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin="">
                <div class="uk-width-1-1">
                    <div class="uk-panel">
                        <div class="uk-grid" style="margin-bottom: 110px;">
                            <div class="uk-width-large-1-2 uk-width-medium-2-3 uk-width-small-1-1">
                                <h4 class="tm-logo-text">
                                    <span class="color-1">ABOUT </span><span class="color-2">US</span>
                                </h4>
                                <p class="uk-margin-remove">Kami berusaha menyediakan informasi tentang lokasi fasilitas kebugaran dengan relevan dan menarik. Saat ini kami hanya berfokus untuk daerah Bali. Berikut ini merupakan layanan yang kami berikan:</p>
                                <ol class="tm-list">
                                    <li>Informasi lokasi fasilitas kebugaran</li>
                                    <li>Informasi detail terkait dengan fasilitas kebugaran</li>
                                    <li>Wesite yang relevan dan mudah digunakan</li>
                                </ol>
                                <hr style="margin: 35px 0;">
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <!-- END About block -->



    <!-- START Social block -->
    <div class="tm-block tm-block-social">
        <div class="uk-container uk-container-center">
            <div class="uk-panel ak-social">
                <ul class="uk-subnav uk-subnav-line uk-text-center">
                    <li><a href="https://www.facebook.com/" target="_blank">Facebook</a></li>
                    <li><a href="https://twitter.com/" target="_blank">Twitter</a></li>
                    <li><a href="http://instagram.com/" target="_blank">Instagram</a></li>
                    <li><a href="https://plus.google.com/" target="_blank">Google+</a></li>
                    <li><a href="https://www.linkedin.com/" target="_blank">Linkedin</a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- END Social block -->

    <!-- START Footer block -->
    <div class="ak-footer" style="padding: 10px 0;">
        <div class="uk-container uk-container-center">
            <footer class="tm-footer uk-grid tm-footer uk-grid" data-uk-grid-match="{target:'> div > .uk-panel'}" data-uk-grid-margin="" style="margin-bottom: 0; margin-top: 0;">
                <!-- START Footer About MaxxFitness block -->
                <div class="uk-hidden-small uk-hidden-medium uk-width-large-1-3" style="margin-bottom: 0; margin-top: 0;">
                    <div class="uk-panel uk-hidden-medium uk-hidden-small" style="margin-bottom: 0; margin-top: 0;">
                        <div class="ak-copyright">©GO TO GYM  2017</div>
                    </div>
                </div>
                <!-- END Footer About MaxxFitness block -->

            </footer>
        </div>
    </div>
    <!-- END Footer block -->

    <!-- START Mobile menu block -->
    <div id="offcanvas" class="uk-offcanvas">
        <div class="uk-offcanvas-bar">
            <ul class="uk-nav uk-nav-offcanvas">
                <li class="uk-parent uk-active">
                    <a href="#">Home</a>
                    <ul class="uk-nav-sub">
                        <li class="uk-parent">
                            <a href="#">Color Variations</a>
                            <ul>
                                <li><a href="index.html">Default style</a></li>
                                <li><a href="../demo-4/index.html">Orange style</a></li>
                                <li><a href="../demo-5/index.html">Green Style</a></li>
                                <li><a href="../demo-6/index.html">Red Style</a></li>
                            </ul>
                        </li>
                        <li><a href="layouts.html">Modules Positions</a></li>
                        <li><a href="coming-soon-page.html">Coming Soon / Offline Page</a></li>
                        <li><a href="error.html">Error page</a></li>
                    </ul>
                </li>
                <li><a href="about.html">About</a></li>
                <li><a href="schedule.html">Schedule</a></li>
                <li class="uk-parent">
                    <a href="classes.html">Classes</a>
                    <ul class="uk-nav-sub">
                        <li><a href="#">Weight Loss</a></li>
                        <li><a href="classes/swimming.html">Swimming</a></li>
                        <li><a href="classes/swimming.html">Kickboxing</a></li>
                        <li><a href="classes/swimming.html">Cross Trainer</a></li>
                        <li><a href="#">Muscle Gain</a></li>
                        <li><a href="classes/swimming.html">Fast Bodyweight</a></li>
                        <li><a href="classes/swimming.html">Pilates</a></li>
                        <li><a href="classes/swimming.html">Boxing</a></li>
                    </ul>
                </li>
                <li><a href="workouts.html">Workouts</a></li>
                <li><a href="trainers.html">Trainers</a></li>
                <li><a href="store.html">Store</a></li>
                <li><a href="gallery.html">Gallery</a></li>
                <li><a href="contacts.html">Locations</a></li>
            </ul>
        </div>
    </div>
    <!-- END Mobile menu block -->

</div>

<script src="<?= URL;?>assets/frontend/js/jquery.min.js" type="text/javascript"></script><!-- jQuery v1.11.2 -->
<script src="<?= URL;?>assets/frontend/js/bootstrap.min.js" type="text/javascript"></script><!-- Bootstrap.js Custom version for HTML! -->

<!-- UIkit Version 2.19.0 -->
<script src="<?= URL;?>assets/frontend/js/uikit/js/uikit.js" type="text/javascript"></script>
<script src="<?= URL;?>assets/frontend/js/uikit/js/components/slideshow.js" type="text/javascript"></script>
<script src="<?= URL;?>assets/frontend/js/uikit/js/components/slideshow-fx.js" type="text/javascript"></script>
<script src="<?= URL;?>assets/frontend/js/uikit/js/core/cover.js" type="text/javascript"></script>
<script src="<?= URL;?>assets/frontend/js/uikit/js/core/modal.js" type="text/javascript"></script>
<script src="<?= URL;?>assets/frontend/js/uikit/js/components/lightbox.js" type="text/javascript"></script>

<!-- Animated circular progress bars -->
<script src="<?= URL;?>assets/frontend/js/circle-progress.js" type="text/javascript"></script>

<!-- START Schedule block -->
<script src="<?= URL;?>assets/frontend/js/jquery.mousewheel.js" type="text/javascript"></script><!-- Uses for Schedule -->
<script src="<?= URL;?>assets/frontend/js/jquery.jscrollpane.min.js" type="text/javascript"></script><!-- Uses for Schedule -->
<!-- END Schedule block -->

<!-- Template scripts -->
<script src="<?= URL;?>assets/frontend/js/script.js" type="text/javascript"></script>
<script src="<?= URL;?>assets/frontend/js/script.js" type="text/javascript"></script>

<script>
    var geocoder;
    var gym_location;

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
                    "color": "#02a7df"
                },
                {
                    "visibility": "on"
                }
            ]
        }
    ];

    function initMap() {
        geocoder = new google.maps.Geocoder();
        gym_location = new google.maps.LatLng(-8.655952, 115.216967);

        var map = new google.maps.Map(document.getElementById('map_canvas'), {
            zoom: 13,
            center: gym_location,
            scrollwheel: false,
            mapTypeControl: false,
            scaleControl: false,
            navigationControl: false,
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            styles: styleMap
        });


        <?php $gym = new \Mini\Model\Gym(); ?>
        <?php foreach($gym->getAll(['status'=>1]) as $key=>$row): ?>
        <?php $image = \Mini\Model\Gym::getImage($row->id); ?>
        var myMarker<?= $key ?> = new google.maps.Marker({
            position: new google.maps.LatLng(<?= $row->latitude ?>, <?= $row->longitude ?>),
            draggable: false,
            animation: google.maps.Animation.DROP,
            icon: '<?= URL;?>assets/frontend/images/marker.png',
            map: map
        });

        var contentString =
            '<div>'+
                '<div style="float:left;width:27%;">'+
                    '<img src="<?= $image == '' ? URL.'img/noimagefound.jpg' : URL.'img/gym/thumb_'.$image ?>" style="width:100%">'+
                '</div>'+
                '<div style="float:right;width:70%;">'+
                    '<h3 id="firstHeading" class="firstHeading"><?= $row->fullname ?></h3>'+
                    '<p style="margin-top: -10px;"><?= $row->alamat ?></p> '+
                '</div>'+
            '</div>';

        var infowindow<?= $key ?> = new google.maps.InfoWindow({
            content: contentString
        });

        myMarker<?= $key ?>.addListener('click', function() {
            window.location = '<?= URL.'home/detail/'.$row->id ?>';
        });

        myMarker<?= $key ?>.addListener('mouseover', function() {
            infowindow<?= $key ?>.open(map, myMarker<?= $key ?>);
        });

        myMarker<?= $key ?>.addListener('mouseout', function() {
            infowindow<?= $key ?>.close();
        });
        <?php endforeach; ?>

        //map.setCenter(myMarker.position);
        //myMarker.setMap(map);

    }

</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB2qlYAIYtnkeDoVzplOxe1LvH00bY8MNY&callback=initMap"></script>

</body>

</html>