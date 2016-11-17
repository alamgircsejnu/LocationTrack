<?php
//print_r($_POST);
//die();
include_once 'LocationTrack.php';
session_start();
if (empty($_SESSION)){
    $_SESSION['deviceId'] = $_POST['deviceId'];
    $_SESSION['dateFrom'] = $_POST['dateFrom'];
    $_SESSION['dateTo'] = $_POST['dateTo'];
//    print_r($_SESSION);
//    die();
}
if (!empty($_POST)){
    $_SESSION['deviceId'] = $_POST['deviceId'];
    $_SESSION['dateFrom'] = $_POST['dateFrom'];
    $_SESSION['dateTo'] = $_POST['dateTo'];
//    print_r($_SESSION);
//    die();
}
//    print_r($_SESSION);
//    die();
$location = new LocationTrack();
$location->prepare($_SESSION);
$allLocations = $location->mapIndex();

?>


<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <title>Google Maps Multiple Markers</title>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDpG0X3mLqEju5PBCEV4IyjOJc7vAnUTbM">
        type="text/javascript"></script>
</head>
<body>
<div id="map" style="width: 80%; height: 500px;margin: 8%;background-color: aquamarine"></div>


<script type="text/javascript">
    refreshIntervalId = setInterval("requestPoints()", 4000);
    function requestPoints() {
        $.ajax({
            url: 'geo-location.php',
            success: function (data) {
                ok = JSON.parse(data);
//                console.log(ok);
                markLocations(ok);
            }
        });

    }

    //    var locations = [
    //        ['Bondi Beach', 23.7099, 90.4071, 4],
    //        ['Coogee Beach', -33.923036, 151.259052, 5],
    //        ['Cronulla Beach', -34.028249, 151.157507, 3],
    //        ['Manly Beach', -33.80010128657071, 151.28747820854187, 2],
    //        ['Maroubra Beach', -33.950198, 151.259302, 1]
    //    ];

    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 7,
        center: new google.maps.LatLng(24.7492, 90.5026),
        mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    var infowindow = new google.maps.InfoWindow();

    var marker, i;
    function  markLocations(locations) {
//    console.log(locations);

        for (i = 0; i < locations.length; i++) {
//        console.log(locations[i]["lat"]);
            if(locations[i]['status']=='INSIDE'){
                var image = 'images/dot.png';
            }  else {
                var image = 'images/red-pog.png';
            }
            marker = new google.maps.Marker({
                position: new google.maps.LatLng(locations[i]["lat"], locations[i]["lng"]),
                map: map,
                icon:image
            });

            google.maps.event.addListener(marker, 'click', (function(marker, i) {
                return function() {
                    infowindow.setContent(locations[i][0]);
                    infowindow.open(map, marker);
                }
            })(marker, i));
        }
    }
</script>
</body>
</html>