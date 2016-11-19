<?php
session_start();
include_once 'LocationTrack.php';
$location = new LocationTrack();
$allLocations = $location->mapIndex();
echo json_encode($allLocations);
?>