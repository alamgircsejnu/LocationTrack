<?php
//session_start();

class LocationTrack
{

    public $id = '';
    public $deviceId = '';
    public $longitude = '';
    public $latitude = '';
    public $status = '';
    public $dateFrom = '';
    public $dateTo = '';
<<<<<<< HEAD
    public $selectedLocations = [];
=======
>>>>>>> ddbdb4c15001701a524310126e3f04d8c6c044a3


    public function __construct()
    {
        $conn = mysql_connect('localhost', 'root', '') or die("Server Not Found");
        mysql_select_db('db_location') or die("Database Not Found");
    }

    public function prepare($data = '')
    {
        if (array_key_exists('id', $data)) {
            $this->id = $data['id'];
        }
        if (array_key_exists('deviceId', $data)) {
            $this->deviceId = $data['deviceId'];
        }
        if (array_key_exists('long', $data)) {
            $this->longitude = $data['long'];
        }
        if (array_key_exists('lat', $data)) {
            $this->latitude = $data['lat'];
        }
        if (array_key_exists('status', $data)) {
            $this->status = $data['status'];
        }
        if (array_key_exists('dateFrom', $data)) {
            $this->dateFrom = $data['dateFrom'];
        }
        if (array_key_exists('dateTo', $data)) {
            $this->dateTo = $data['dateTo'];
        }
<<<<<<< HEAD
        if (array_key_exists('selectedLocations', $data)) {
            $this->selectedLocations = $data['selectedLocations'];
        }
=======
>>>>>>> ddbdb4c15001701a524310126e3f04d8c6c044a3


//        print_r($this->selectedLocations[0]);
//
//        die();


    }


    public function store(){
        $d = new DateTime('', new DateTimeZone('Asia/Dhaka'));
        if(isset($this->deviceId) && !empty($this->deviceId) && isset($this->longitude) && !empty($this->longitude) && isset($this->latitude) && !empty($this->latitude)){
            $query="INSERT INTO `tbl_location` (`id`, `device_id`,`lng`,`lat`,`status`,`created_at`) VALUES ('', '".$this->deviceId."','". $this->longitude."','". $this->latitude."','". $this->status."','". $d->format('Y-m-d H:i:s')."')";
//            echo $query;
//            die();
            mysql_query($query);

//            header('location:report.php');

        }
    }

    public function index(){
        $mydata=array();
        $query="SELECT * FROM `tbl_location` WHERE `device_id`='".$this->deviceId."' AND created_at BETWEEN ('".$this->dateFrom." 00.00.00') AND ('".$this->dateTo." 23.59.59') ORDER BY id DESC" ;
//        echo $query;
//        die();
        $result=  mysql_query($query);
        while ($row=  mysql_fetch_assoc($result)){
            $mydata[]=$row;
        }
        return $mydata;
        header('location:report.php');
    }


    public function mapIndex(){
<<<<<<< HEAD

        if (isset($_SESSION['deviceId']) && !empty($_SESSION['deviceId'])){
        $this->deviceId = $_SESSION['deviceId'];
        $this->dateFrom = $_SESSION['dateFrom'];
        $this->dateTo = $_SESSION['dateTo'];
            $mydata=array();
=======
        $this->deviceId = $_SESSION['deviceId'];
        $this->dateFrom = $_SESSION['dateFrom'];
        $this->dateTo = $_SESSION['dateTo'];
        $mydata=array();
>>>>>>> ddbdb4c15001701a524310126e3f04d8c6c044a3
        $query="SELECT * FROM `tbl_location` WHERE `device_id`='".$this->deviceId."' AND created_at BETWEEN ('".$this->dateFrom." 00.00.00') AND ('".$this->dateTo." 23.59.59') ORDER BY id DESC" ;
//        echo $query;
//        die();
            $result=  mysql_query($query);
            while ($row=  mysql_fetch_assoc($result)){
                $mydata[]=$row;
            }

        } elseif (isset($_SESSION['selectedLocations'])){
            $mydata=array();
            for ($i=0;$i<count($_SESSION['selectedLocations']);$i++){
                $query="SELECT * FROM `tbl_location` WHERE `id`='".$_SESSION['selectedLocations'][$i]."'" ;
//        echo $query;
//        die();
                $result=  mysql_query($query);
                $row=  mysql_fetch_assoc($result);
                    $mydata[]=$row;
            }
        }
//print_r($mydata);
//        die();
        return $mydata;
    }


    public function checkData($device=''){
//        $mydata=array();
        $query="select r.min_lng,r.max_lng,r.min_lat,r.max_lat from `tbl_person` AS p,`tbl_reference` AS r WHERE r.school_id = p.school_id AND p.device_id ='".$device."';" ;
//        echo $query;
//        die();
        $result=  mysql_query($query);
        $row=  mysql_fetch_assoc($result);
        return $row;
    }

    public function boundaryCoords(){
        $mydata=array();
        $query="SELECT lat,lng FROM `tbl_bounded_area` WHERE `school_id`='147'" ;
//        echo $query;
//        die();
        $result=  mysql_query($query);
        while ($row=  mysql_fetch_assoc($result)){
            $mydata[]=$row;
        }
        return $mydata;
    }


}