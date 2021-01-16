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

$cat_name                = $_POST['cat_name']               = isset($_POST['cat_name']) ? $_POST['cat_name'] : '';
$cat_type                = $_FILES['cat_type']              = isset($_FILES['cat_type']) ? $_FILES['cat_type'] : '';
$cat_meta_title          = $_POST['cat_meta_title']         = isset($_POST['cat_meta_title']) ? $_POST['cat_meta_title'] : '';
$cat_meta_description    = $_POST['cat_meta_description']   = isset($_POST['cat_meta_description']) ? $_POST['cat_meta_description'] : '';
