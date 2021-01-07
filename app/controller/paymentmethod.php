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

/** Instamojo Form */
$instaForm    = $_POST['instaForm']    = isset($_POST['instaForm']) ? $_POST['instaForm'] : '';
$insta_key    = $_POST['insta_key']    = isset($_POST['insta_key']) ? $_POST['insta_key'] : '';
$insta_token  = $_POST['insta_token']  = isset($_POST['insta_token']) ? $_POST['insta_token'] : '';
$insta_mode   = $_POST['insta_mode']   = isset($_POST['insta_mode']) ? $_POST['insta_mode'] : '';

/** Paystack Form */
$paystackForm       = $_POST['paystackForm']    = isset($_POST['paystackForm']) ? $_POST['paystackForm'] : '';
$paystack_public    = $_POST['paystack_public'] = isset($_POST['paystack_public']) ? $_POST['paystack_public'] : '';
$paystack_secret    = $_POST['paystack_secret'] = isset($_POST['paystack_secret']) ? $_POST['paystack_secret'] : '';
$merchant_email     = $_POST['merchant_email']  = isset($_POST['merchant_email']) ? $_POST['merchant_email'] : '';

 /** VoguePay Form */
 $vogueForm         = $_POST['vogueForm']   = isset($_POST['vogueForm']) ? $_POST['vogueForm'] : '';
 $merchant_id       = $_POST['merchant_id'] = isset($_POST['merchant_id']) ? $_POST['merchant_id'] : '';
 $vogue_mode        = $_POST['vogue_mode']  = isset($_POST['vogue_mode']) ? $_POST['vogue_mode'] : '';
 
 /** Payhere Form */
 $payhereForm           = $_POST['payhereForm']         = isset($_POST['payhereForm']) ? $_POST['payhereForm'] : '';
 $payhere_merchant_id   = $_POST['payhere_merchant_id'] = isset($_POST['payhere_merchant_id']) ? $_POST['payhere_merchant_id'] : '';
 $payhere_secret        = $_POST['payhere_secret']      = isset($_POST['payhere_secret']) ? $_POST['payhere_secret'] : '';
 $payhere_currency      = $_POST['payhere_currency']    = isset($_POST['payhere_currency']) ? $_POST['payhere_currency'] : '';
 $payhere_mode          = $_POST['payhere_mode']        = isset($_POST['payhere_mode']) ? $_POST['payhere_mode'] : '';

/** Ngenius Form */
 $ngeniusForm           = $_POST['ngeniusForm']         = isset($_POST['ngeniusForm']) ? $_POST['ngeniusForm'] : '';
 $ngenius_id            = $_POST['ngenius_id']          = isset($_POST['ngenius_id']) ? $_POST['ngenius_id'] : '';
 $ngenius_key           = $_POST['ngenius_key']         = isset($_POST['ngenius_key']) ? $_POST['ngenius_key'] : '';
 $ngenius_currency      = $_POST['ngenius_currency']    = isset($_POST['ngenius_currency']) ? $_POST['ngenius_currency'] : '';
 
 echo 1;
?>