<?php
session_start();

defined('APPLICATION_INNERPATH') || define('APPLICATION_INNERPATH', realpath( dirname(__FILE__) . '/../'));


$PATH =  constant("APPLICATION_INNERPATH");

require $PATH . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'service_config.php'; 
$DB_CLASS =  $config_service['DB_CLASS'];
require_once $config_service['FUNCTIONS'];

$title      = $_POST['title']       = isset($_POST['title']) ? $_POST['title'] : '';
$art_img    = $_POST['art_img']     = isset($_POST['art_img']) ? $_POST['art_img'] : '';
$art_type   = $_POST['art_type']    = isset($_POST['art_type']) ? $_POST['art_type'] : '';
$art_video  = $_POST['art_video']   = isset($_POST['art_video']) ? $_POST['art_video'] : '';


echo 1;
?>