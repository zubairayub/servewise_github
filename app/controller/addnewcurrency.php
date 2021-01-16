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
$currency_symbol      = $_FILES['currency_symbol']      = isset($_FILES['currency_symbol']) ? $_FILES['currency_symbol'] : '';
$currency_code   = $_POST['currency_code']    = isset($_POST['currency_code']) ? $_POST['currency_code'] : '';
$currency_rate    = $_POST['currency_rate']     = isset($_POST['end_date']) ? $_POST['end_date'] : '';
