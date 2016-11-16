<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>Waypoints in directions</title>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <style>
        #right-panel {
            font-family: 'Roboto','sans-serif';
            line-height: 30px;
            padding-left: 10px;
        }

        #right-panel select, #right-panel input {
            font-size: 15px;
        }

        #right-panel select {
            width: 100%;
        }

        #right-panel i {
            font-size: 12px;
        }
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }
        #map {
            height: 100%;
            float: left;
            width: 70%;
            height: 100%;
        }
        #right-panel {
            margin: 20px;
            border-width: 2px;
            width: 20%;
            height: 400px;
            float: left;
            text-align: left;
            padding-top: 0;
        }
        #directions-panel {
            margin-top: 10px;
            background-color: #FFEE77;
            padding: 10px;
        }
    </style>
</head>
<body>
<div id="map"></div>
<div id="right-panel">

    <div id="directions-panel"></div>
</div>
<script>
    var dirService;
    var dirDisplay;
    refreshIntervalId = setInterval("requestPoints(dirService,dirDisplay)", 4000);
    function initMap() {
        var directionsService = new google.maps.DirectionsService;
        var directionsDisplay = new google.maps.DirectionsRenderer;
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 6,
            center: {lat: 24.7492, lng: 90.5026}
        });
        directionsDisplay.setMap(map);

        dirService = directionsService;
        dirDisplay = directionsDisplay;

        requestPoints(directionsService,directionsDisplay);
    }

function requestPoints(directionsService,directionsDisplay) {
    $.ajax({
        url: 'geo-location.php',
        success: function (data) {
            ok = JSON.parse(data);
            console.log(ok);
//                markLocations(ok);
            calculateAndDisplayRoute(ok,directionsService, directionsDisplay);
        }
    });

}

    function calculateAndDisplayRoute(result,directionsService, directionsDisplay) {
        var waypts = [];
        var checkboxArray = result;
        var arrayLength = checkboxArray.length;
        for (var i = 1; i < arrayLength-1; i++) {
                waypts.push({
                    location: new google.maps.LatLng(checkboxArray[i]['lat'],checkboxArray[i]['lng']),
                    stopover: true
                });
        }

        directionsService.route({
            origin: new google.maps.LatLng(checkboxArray[0]['lat'],checkboxArray[0]['lng']),
            destination: new google.maps.LatLng(checkboxArray[arrayLength-1]['lat'],checkboxArray[arrayLength-1]['lng']),
            waypoints: waypts,
            optimizeWaypoints: true,
            travelMode: 'DRIVING'
        }, function(response, status) {
            if (status === 'OK') {
                directionsDisplay.setDirections(response);
                var route = response.routes[0];
                var summaryPanel = document.getElementById('directions-panel');
                summaryPanel.innerHTML = '';
                // For each route, display summary information.
                for (var i = 0; i < route.legs.length; i++) {
                    var routeSegment = i + 1;
                    summaryPanel.innerHTML += '<b>Route Segment: ' + routeSegment +
                        '</b><br>';
                    summaryPanel.innerHTML += route.legs[i].start_address + ' to ';
                    summaryPanel.innerHTML += route.legs[i].end_address + '<br>';
                    summaryPanel.innerHTML += route.legs[i].distance.text + '<br><br>';
                }
            } else {
                window.alert('Directions request failed due to ' + status);
            }
        });
    }
</script>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDpG0X3mLqEju5PBCEV4IyjOJc7vAnUTbM&callback=initMap">
</script>

</body>
</html>