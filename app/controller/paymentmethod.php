<?php
session_start();
//echo $_SESSION["logIn"];
//echo $_SESSION['logInName'];

defined('APPLICATION_INNERPATH') || define('APPLICATION_INNERPATH', realpath( dirname(__FILE__) . '/../'));

//echo 0;
$PATH =  constant("APPLICATION_INNERPATH");

require $PATH . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'service_config.php'; 
require_once $config_service['DB_CLASS'];
require $config_service['PRODUCT_CLASS'];
require $config_service['FUNCTIONS'];


$DB_CLASS = $config_service['DB_CLASS'];
$vendor_id = $_SESSION['branch_id'];



/** Paypal Form */
$paypalForm     = $_POST['paypalForm']      = isset($_POST['paypalForm']) ? $_POST['paypalForm'] : '';
$paypal_id      = $_POST['paypal_id']       = isset($_POST['paypal_id']) ? $_POST['paypal_id'] : '';
$paypal_secret  = $_POST['paypal_secret']   = isset($_POST['paypal_secret']) ? $_POST['paypal_secret'] : '';
$paypal_mode    = $_POST['paypal_mode']     = isset($_POST['paypal_mode']) ? $_POST['paypal_mode'] : '';

IF(isset($_POST['checkbox'])){
$checkbox = $_POST['checkbox'];	
}ELSE{
	$checkbox = 0;
}



if($checkbox == "on"){
$status = 1;
}else{
	$status = 0;
}

if(!empty($paypal_id)){
$data = insertpaymentmethod($DB_CLASS,$vendor_id,$paypal_id,$paypal_secret,$paypalForm,$status);
}


/** Sslcommerz Form */
$sslczForm          = $_POST['sslczForm']           = isset($_POST['sslczForm']) ? $_POST['sslczForm'] : '';
$sslcz_store_id     = $_POST['sslcz_store_id']      = isset($_POST['sslcz_store_id']) ? $_POST['sslcz_store_id'] : '';
$sslcz_store_pass   = $_POST['sslcz_store_pass']    = isset($_POST['sslcz_store_pass']) ? $_POST['sslcz_store_pass'] : '';
$sslcz_mode         = $_POST['sslcz_mode']          = isset($_POST['sslcz_mode']) ? $_POST['sslcz_mode'] : '';


if(!empty($sslcz_store_id)){


$data = insertpaymentmethod($DB_CLASS,$vendor_id,$sslcz_store_id,$sslcz_store_pass,$sslczForm,$status);
}

/** Stripe Form */
$stripeForm     = $_POST['stripeForm']  = isset($_POST['stripeForm']) ? $_POST['stripeForm'] : '';
$st_key         = $_POST['st_key']      = isset($_POST['st_key']) ? $_POST['st_key'] : '';
$st_secret      = $_POST['st_secret']   = isset($_POST['st_secret']) ? $_POST['st_secret'] : '';

if(!empty($st_key)){
$data = insertpaymentmethod($DB_CLASS,$vendor_id,$st_key,$st_secret,$stripeForm,$status);
}


/** RazorPay Form */
$razForm    = $_POST['razForm']     = isset($_POST['razForm']) ? $_POST['razForm'] : '';
$raz_key    = $_POST['raz_key']     = isset($_POST['raz_key']) ? $_POST['raz_key'] : '';
$raz_secret = $_POST['raz_secret']  = isset($_POST['raz_secret']) ? $_POST['raz_secret'] : '';
if(!empty($raz_key)){
$data = insertpaymentmethod($DB_CLASS,$vendor_id,$raz_key,$raz_secret,$razForm,$status);
}



echo  '1';


?>