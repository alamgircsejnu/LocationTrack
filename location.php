<?php
include_once 'LocationTrack.php';

$deviceId = $_GET['deviceId'];
//echo $deviceId;
//die();
$location = new  LocationTrack();

$checkData = $location->checkData($deviceId);
//print_r($checkData);
//die();
$long = (double)$_GET['long'];
$lat = (double)$_GET['lat'];
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
if($_GET['status']=='OUTSIDE'){
//    ob_start();
    include_once 'RegisterUser.php';
    $user = new RegisterUser();
    $phone = $user->userInfo($deviceId);
    $phoneNumber1 = $phone['phone_1'];
    $phoneNumber2 = $phone['phone_2'];


    if(isset($phoneNumber1) && !empty($phoneNumber1)){
header('location:http://166.62.16.132/manageSMS/smssend.php?phone='.$phoneNumber1.'&text=Dear Sir, Your kid is out of route.-2RA&user=gps_tracker&password=gps123');

    }else if (isset($phoneNumber2) && !empty($phoneNumber2)){
header('location:http://166.62.16.132/manageSMS/smssend.php?phone='.$phoneNumber2.'&text=Dear Sir, Your kid is out of route.-2RA&user=gps_tracker&password=gps123',false);
    }

}