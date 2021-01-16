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

$lang_name       = $_POST['lang_name']        = isset($_POST['lang_name']) ? $_POST['lang_name'] : '';
$lang_code      = $_FILES['lang_code']      = isset($_FILES['lang_code']) ? $_FILES['lang_code'] : '';
