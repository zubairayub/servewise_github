<?php
//session_start();
//echo $_SESSION["logIn"];
//echo $_SESSION['logInName'];
defined('APPLICATION_INNERPATH') || define('APPLICATION_INNERPATH', realpath( dirname(__FILE__) . '/../'));

//echo 0;
$PATH =  constant("APPLICATION_INNERPATH");

require $PATH . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'service_config.php'; 
require_once $config_service['DB_CLASS'];
require $config_service['CATEGORY_CLASS'];
	$category = new Category();
	$message=null;

	
	//print_r($olddetails);
	$categoryid = $_GET["id"];
	   $type =  $_SESSION['type'];
    $createdby = $_SESSION['logInId'];
$type = getstatus($type);
if($type == 'Branch')
{

	$data =  getbranches($createdby);
	$vbid =  $data[0]['vendor_id'];
}elseif($type == 'Admin'){

$vbid =  0;

}elseif($type == 'Vendor'){
	$data =  getvendors($createdby);
	$vbid =  $data[0]['vendor_id'];

}else{

	header('Location ?page=logout');
}  
		$getcategory = $category->getcategorythreebyid($categoryid);
	
	
	

?>
