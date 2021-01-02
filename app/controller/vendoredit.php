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
	$vendorid = $_SESSION["vendorid"];
	
	//print_r($olddetails);
	if(isset($_POST["name"])){
	
	$name = $_POST["name"];
        $email = $_POST["email"];
	$contactno = $_POST["contactno"];
	$address = $_POST["address"];
        $address2 = $_POST["address2"];
        $cityid = $_POST["city"];
        $stateid = $_POST["state"];
        $countryid = $_POST["country"];
	
	$getcountryname = $vendor->getcountrynamebyid($countryid);
        $getstatename = $vendor->getstatenamebyid($stateid);
        $getcityname = $vendor->getcitynamebyid($cityid);
        $country = $getcountryname[0]["name"];
        $state = $getstatename[0]["name"];
        $city = $getcityname[0]["name"];
	
		$updatedetails = $vendor->updatevendordetails($name,$email,$contactno,$address,$address2,$city,$state,$country,$vendorid);
		if (!empty($updatedetails)){
			echo "1";
          
		} else {
			echo "0";
            
		}
	
	}

?>
