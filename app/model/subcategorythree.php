<?php
session_start();
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
	
		$getcategory = $category->getcategorythreebyid($categoryid);
	
	
	

?>
