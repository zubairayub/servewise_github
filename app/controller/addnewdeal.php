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

$title       = $_POST['title']        = isset($_POST['title']) ? $_POST['title'] : '';
$banner      = $_FILES['banner']      = isset($_FILES['banner']) ? $_FILES['banner'] : '';
$strt_date   = $_POST['strt_date']    = isset($_POST['strt_date']) ? $_POST['strt_date'] : '';
$end_date    = $_POST['end_date']     = isset($_POST['end_date']) ? $_POST['end_date'] : '';
$page_link   = $_POST['page_link']    = isset($_POST['page_link']) ? $_POST['page_link'] : '';
