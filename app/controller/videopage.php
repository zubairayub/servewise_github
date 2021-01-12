<?php
session_start();

defined('APPLICATION_INNERPATH') || define('APPLICATION_INNERPATH', realpath( dirname(__FILE__) . '/../'));


$PATH =  constant("APPLICATION_INNERPATH");

require $PATH . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'service_config.php'; 
$DB_CLASS =  $config_service['DB_CLASS'];
require_once $config_service['FUNCTIONS'];


$title       = $_POST['title']        = isset($_POST['title']) ? $_POST['title'] : '';
$short_desc  = $_POST['short_desc']   = isset($_POST['short_desc']) ? $_POST['short_desc'] : '';
$video  = $_FILES['video']   = isset($_FILES['video']) ? $_FILES['video'] : '';
echo '1';
?>