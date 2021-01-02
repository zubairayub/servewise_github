<?php
	//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);	
session_start();
defined('APPLICATION_INNERPATH') || define('APPLICATION_INNERPATH', realpath( dirname(__FILE__) . '/../'));

//echo 0;
$PATH =  constant("APPLICATION_INNERPATH");

require $PATH . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'service_config.php'; 
require_once $config_service['DB_CLASS'];
require $config_service['VENDOR_CLASS'];

//if(!isset($_SESSION["email"])){
				//echo "<script>window.location.href='login.php';</script>";

//}
	$vendor=new Vendor();

//$emailid= $_SESSION["logIn"];
$vendorid = $_SESSION["vendorid"];
$olddetails = $vendor->getvendordetails($vendorid);

$getcountries = $vendor->getallcountries();
        
if (isset($_POST["state_id"])){
    $stateid = $_POST["state_id"];
    $hhtml = "";
        $getcities = $vendor->getcitybystateid($stateid);
     foreach ($getcities as $city) {
         $hhtml .= '<option value="'.$city["id"].'">'. $city["name"].'</option>';
     
     }
echo $hhtml;
}
if (isset($_POST["country_id"])){
        $countryid = $_POST["country_id"];
        $html = "";
        $getstates = $vendor->getstatebycountryid($countryid);
     foreach ($getstates as $state) {
         $html .= '<option value="'.$state["id"].'">'. $state["name"].'</option>';
     
     }
echo $html;
}
?>