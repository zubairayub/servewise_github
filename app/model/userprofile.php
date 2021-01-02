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
require $config_service['USER_CLASS'];

//if(!isset($_SESSION["email"])){
				//echo "<script>window.location.href='login.php';</script>";

//}
	$login=new User();

//$emailid= $_SESSION["logIn"];
$emailid = $_SESSION["logIn"];
$olddetails = $login->getuserdetails($emailid);

?>