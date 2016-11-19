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
//print_r($allLocations);
//die();

?>


<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <title>Google Maps Multiple Markers</title>

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>


    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDpG0X3mLqEju5PBCEV4IyjOJc7vAnUTbM">
        type="text/javascript"></script>

</head>
<body style="background-color: #ADD8E6">
<div class="row" style="background-color: #006dcc;height: 40px">
    <div class="col-md-4"></div>
    <div class="col-md-4">
        <div style="margin: 4px">
            <a href="reportAccess.php" style="color: white;text-decoration: none;font-size: 20px">Report</a>&nbsp&nbsp&nbsp&nbsp
            <a href="mapAccess.php" style="color: white;text-decoration: none;font-size: 20px">Map </a>&nbsp&nbsp&nbsp&nbsp
            <a href="register.php" style="color: white;text-decoration: none;font-size: 20px">Register</a>&nbsp&nbsp&nbsp&nbsp
        </div>
    </div>
    <div class="col-md-4"></div>
</div>
<div id="map" style="width: 80%; height: 500px;margin: 8%;background-color: aquamarine"></div>


<script type="text/javascript">
    refreshIntervalId = setInterval("requestPoints()", 4000);
    var ok;
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
        zoom: 11,
        center: new google.maps.LatLng(<?php echo $allLocations[0]['lat'] . ',' . $allLocations[0]['lng']; ?>),
        mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    var infowindow = new google.maps.InfoWindow();

    var marker, i;
    function  markLocations(locations) {
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
        map.setCenter(new google.maps.LatLng(locations[0]['lat'],locations[0]['lng']));
    }
</script>
</body>
</html>