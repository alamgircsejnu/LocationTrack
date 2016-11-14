<?php
include_once 'LocationTrack.php';

//print_r($_GET);
//die();


$location = new  LocationTrack();

$location->prepare($_GET);
$location->store();