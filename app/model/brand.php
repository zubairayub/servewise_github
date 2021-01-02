<?php
session_start();
//echo $_SESSION["logIn"];
//echo $_SESSION['logInName'];

defined('APPLICATION_INNERPATH') || define('APPLICATION_INNERPATH', realpath( dirname(__FILE__) . '/../'));

//echo 0;
$PATH =  constant("APPLICATION_INNERPATH");

require $PATH . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'service_config.php'; 
require_once $config_service['DB_CLASS'];
 require("brand/brandClass.php");

 require_once($dbcalss);


	$brand = new Brand();
	$message=null;
	$vendorid = $_SESSION['vendorid'];
		$getbrand = $brand->getallbrands($vendorid);

	
	
	

?>
