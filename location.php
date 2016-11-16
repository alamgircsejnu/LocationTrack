<?php
include_once 'LocationTrack.php';

$deviceId = $_GET['deviceId'];
//echo $deviceId;
//die();
$location = new  LocationTrack();

$checkData = $location->checkData($deviceId);
//print_r($checkData);
//die();
$long = (float)$_GET['long'];
$lat = (float)$_GET['lat'];
$_GET['long'] = $long;
$_GET['lat'] = $lat;

if ($lat<$checkData['min_lat'] || $lat>$checkData['max_lat'] || $long<$checkData['min_lng'] || $long>$checkData['max_lng']) {
    $_GET['status'] = 'OUTSIDE';
} else {
    $_GET['status'] = 'INSIDE';
}
//print_r($_GET);
//die();
$location->prepare($_GET);
$location->store();