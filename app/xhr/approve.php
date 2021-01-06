<?php
session_start();

defined('APPLICATION_INNERPATH') || define('APPLICATION_INNERPATH', realpath( dirname(__FILE__) . '/../'));


$PATH =  constant("APPLICATION_INNERPATH");

require $PATH . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'service_config.php'; 
$DB_CLASS =  $config_service['DB_CLASS'];
require_once $config_service['FUNCTIONS'];



$vendor_id  =   $_GET['vendor_id'];
$type       =   $_GET['type'];
$action     =   $_GET['action'];
$user_id    =   $_GET['user_id'];
$branch_id    =   $_GET['branch_id'];

if($type == 'vendor'){
$result = approve_vendor($user_id,$vendor_id,$action,$DB_CLASS);
}else{

$result = approve_branch($user_id,$vendor_id,$branch_id,$action,$DB_CLASS);

}

header('Location: ' . $_SERVER['HTTP_REFERER']);
?>