<?php
session_start();
//echo $_SESSION["logIn"];
//echo $_SESSION['logInName'];

defined('APPLICATION_INNERPATH') || define('APPLICATION_INNERPATH', realpath( dirname(__FILE__) . '/../'));

//echo 0;
$PATH =  constant("APPLICATION_INNERPATH");

require $PATH . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'service_config.php'; 
require_once $config_service['DB_CLASS'];
require $config_service['VENDOR_CLASS'];
	$vendor=new Vendor();
	$message=null;

	


	

	if(isset($_POST["name"])){
	
	$name = $_POST["name"];
     $contactno = $_POST["contactno"];
	$emailid = $_POST["email"];
		$address = $_POST["address"];
        $address2 = $_POST["address2"];
        $countryid = $_POST["country"];
        $stateid = $_POST["state"];
        $cityid = $_POST["city"];
		$userid = $_SESSION['logInId'];
	
        $getcountryname = $vendor->getcountrynamebyid($countryid);
        $getstatename = $vendor->getstatenamebyid($stateid);
        $getcityname = $vendor->getcitynamebyid($cityid);
        $country = $getcountryname[0]["name"];
        $state = $getstatename[0]["name"];
        $city = $getcityname[0]["name"];
	
	
		$becomevendor = $vendor->SignUpasVendor($name,$contactno,$emailid,$address,$address2,$country,$state,$city,$userid);
		if (!empty($becomevendor)){
			echo "1";	
		} else {
			echo "0";
		}
	
	}
        $userid = $_SESSION["logInId"];
        $getvendorid = $vendor->getvendordetailsbyuserid($userid);
        $_SESSION['vendorid'] = $getvendorid[0]["vendor_id"];
        

?>
