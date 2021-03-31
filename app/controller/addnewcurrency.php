<?php
session_start();

defined('APPLICATION_INNERPATH') || define('APPLICATION_INNERPATH', realpath( dirname(__FILE__) . '/../'));


$PATH =  constant("APPLICATION_INNERPATH");

require $PATH . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'service_config.php'; 
$DB_CLASS =  $config_service['DB_CLASS'];
require_once $config_service['FUNCTIONS'];
require_once $DB_CLASS;
$query;
$db;	
$varr = new databaseManager();

$currency_name       = $_POST['currency_name']        = isset($_POST['currency_name']) ? $_POST['currency_name'] : '';
$currency_symbol      = $_POST['currency_symbol']      = isset($_POST['currency_symbol']) ? $_POST['currency_symbol'] : '';
$currency_code   = $_POST['currency_code']    = isset($_POST['currency_code']) ? $_POST['currency_code'] : '';
$currency_rate    = $_POST['currency_rate']     = isset($_POST['currency_rate']) ? $_POST['currency_rate'] : '';

$action = $_POST['action'] ;



if($action == 'true'){
	$id = $_POST['id'] ;
$add = addcurrecny($DB_CLASS,$currency_name,$currency_symbol,$currency_code,$currency_rate,'update',$id);
}else{
$add = addcurrecny($DB_CLASS,$currency_name,$currency_symbol,$currency_code,$currency_rate)	;
}

