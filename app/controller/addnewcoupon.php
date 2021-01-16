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

$coupon_type        = $_POST['coupon_type']         = isset($_POST['coupon_type']) ? $_POST['coupon_type'] : '';
$coupon_code        = $_POST['coupon_code']         = isset($_FILES['coupon_code']) ? $_FILES['coupon_code'] : '';
$discount           = $_POST['discount']            = isset($_POST['discount']) ? $_POST['discount'] : '';
$discount_select    = $_POST['discount_select']     = isset($_POST['discount_select']) ? $_POST['discount_select'] : '';
$products           = $_POST['products']            = isset($_POST['products']) ? $_POST['products'] : '';
$max_discount       = $_POST['max_discount']        = isset($_POST['max_discount']) ? $_POST['max_discount'] : '';
$coupon_date        = $_POST['coupon_date']         = isset($_POST['coupon_date']) ? $_POST['coupon_date'] : '';
