<?php
session_start();

defined('APPLICATION_INNERPATH') || define('APPLICATION_INNERPATH', realpath( dirname(__FILE__) . '/../'));


$PATH =  constant("APPLICATION_INNERPATH");

require $PATH . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'service_config.php'; 
$DB_CLASS =  $config_service['DB_CLASS'];
require_once $config_service['FUNCTIONS'];

/** Paypal Form */
$paypalForm     = $_POST['paypalForm']      = isset($_POST['paypalForm']) ? $_POST['paypalForm'] : '';
$paypal_id      = $_POST['paypal_id']       = isset($_POST['paypal_id']) ? $_POST['paypal_id'] : '';
$paypal_secret  = $_POST['paypal_secret']   = isset($_POST['paypal_secret']) ? $_POST['paypal_secret'] : '';
$paypal_mode    = $_POST['paypal_mode']     = isset($_POST['paypal_mode']) ? $_POST['paypal_mode'] : '';

/** Sslcommerz Form */
$sslczForm          = $_POST['sslczForm']           = isset($_POST['sslczForm']) ? $_POST['sslczForm'] : '';
$sslcz_store_id     = $_POST['sslcz_store_id']      = isset($_POST['sslcz_store_id']) ? $_POST['sslcz_store_id'] : '';
$sslcz_store_pass   = $_POST['sslcz_store_pass']    = isset($_POST['sslcz_store_pass']) ? $_POST['sslcz_store_pass'] : '';
$sslcz_mode         = $_POST['sslcz_mode']          = isset($_POST['sslcz_mode']) ? $_POST['sslcz_mode'] : '';

/** Stripe Form */
$stripeForm     = $_POST['stripeForm']  = isset($_POST['stripeForm']) ? $_POST['stripeForm'] : '';
$st_key         = $_POST['st_key']      = isset($_POST['st_key']) ? $_POST['st_key'] : '';
$st_secret      = $_POST['st_secret']   = isset($_POST['st_secret']) ? $_POST['st_secret'] : '';

/** RazorPay Form */
$razForm    = $_POST['razForm']     = isset($_POST['razForm']) ? $_POST['razForm'] : '';
$raz_key    = $_POST['raz_key']     = isset($_POST['raz_key']) ? $_POST['raz_key'] : '';
$raz_secret = $_POST['raz_secret']  = isset($_POST['raz_secret']) ? $_POST['raz_secret'] : '';


?>