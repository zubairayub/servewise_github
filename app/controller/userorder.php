<?php	
session_start();


defined('APPLICATION_INNERPATH') || define('APPLICATION_INNERPATH', realpath( dirname(__FILE__) . '/../'));

//echo 0;
$PATH =  constant("APPLICATION_INNERPATH");

require $PATH . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'service_config.php'; 
require_once $config_service['DB_CLASS'];
require $config_service['ORDER_CLASS'];


	$order = new Order();

$userid = $_SESSION['logInId'];

$orderhistory = $order->getorderhistorybyuser($userid);



?>