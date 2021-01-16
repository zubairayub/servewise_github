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

$staff_name    = $_POST['staff_name']     = isset($_POST['staff_name']) ? $_POST['staff_name'] : '';
$staff_email   = $_FILES['staff_email']   = isset($_FILES['staff_email']) ? $_FILES['staff_email'] : '';
$staff_phone   = $_POST['staff_phone']    = isset($_POST['staff_phone']) ? $_POST['staff_phone'] : '';
$staff_pass    = $_POST['staff_pass']     = isset($_POST['staff_pass']) ? $_POST['staff_pass'] : '';
$staff_role    = $_POST['staff_role']     = isset($_POST['staff_role']) ? $_POST['staff_role'] : '';
