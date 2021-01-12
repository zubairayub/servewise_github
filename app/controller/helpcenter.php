<?php
session_start();

defined('APPLICATION_INNERPATH') || define('APPLICATION_INNERPATH', realpath( dirname(__FILE__) . '/../'));


$PATH =  constant("APPLICATION_INNERPATH");

require $PATH . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'service_config.php'; 
$DB_CLASS =  $config_service['DB_CLASS'];
require_once $config_service['FUNCTIONS'];


$sms_sub       = $_POST['sms_sub']        = isset($_POST['sms_sub']) ? $_POST['sms_sub'] : '';
$answers       = $_POST['answers']        = isset($_POST['answers']) ? $_POST['answers'] : '';

echo '1';
?>