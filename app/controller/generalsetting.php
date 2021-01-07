<?php
session_start();

defined('APPLICATION_INNERPATH') || define('APPLICATION_INNERPATH', realpath( dirname(__FILE__) . '/../'));


$PATH =  constant("APPLICATION_INNERPATH");

require $PATH . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'service_config.php'; 
$DB_CLASS =  $config_service['DB_CLASS'];
require_once $config_service['FUNCTIONS'];

$sys_name   = $_POST['sys_name']       = isset($_POST['sys_name']) ? $_POST['sys_name'] : '';
$sys_logo   = $_POST['sys_logo']     = isset($_POST['sys_logo']) ? $_POST['sys_logo'] : '';
$sys_time   = $_POST['sys_time']    = isset($_POST['sys_time']) ? $_POST['sys_time'] : '';
$adlp_bg    = $_POST['adlp_bg']   = isset($_POST['adlp_bg']) ? $_POST['adlp_bg'] : '';


echo 1;
?>