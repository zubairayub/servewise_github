<?php
session_start();

defined('APPLICATION_INNERPATH') || define('APPLICATION_INNERPATH', realpath( dirname(__FILE__) . '/../'));


$PATH =  constant("APPLICATION_INNERPATH");

require $PATH . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'service_config.php'; 
$DB_CLASS =  $config_service['DB_CLASS'];
require_once $config_service['FUNCTIONS'];

/** Google Form */
$googleForm         = $_POST['googleForm']       = isset($_POST['googleForm']) ? $_POST['googleForm'] : '';
$gclient_id         = $_POST['gclient_id']       = isset($_POST['gclient_id']) ? $_POST['gclient_id'] : '';
$gclient_secret     = $_POST['gclient_secret']   = isset($_POST['gclient_secret']) ? $_POST['gclient_secret'] : '';

/** Facebook Form */
$facebookForm         = $_POST['facebookForm']          = isset($_POST['facebookForm']) ? $_POST['facebookForm'] : '';
$facebook_app_id      = $_POST['facebook_app_id']       = isset($_POST['facebook_app_id']) ? $_POST['facebook_app_id'] : '';
$facebook_app_secret  = $_POST['facebook_app_secret']   = isset($_POST['facebook_app_secret']) ? $_POST['facebook_app_secret'] : '';

/**  Twitter Form */
$twitterForm          = $_POST['twitterForm']          = isset($_POST['twitterForm']) ? $_POST['twitterForm'] : '';
$twitter_client_id    = $_POST['twitter_client_id']    = isset($_POST['twitter_client_id']) ? $_POST['twitter_client_id'] : '';
$twitter_client_secret= $_POST['twitter_client_secret']= isset($_POST['twitter_client_secret']) ? $_POST['twitter_client_secret'] : '';

echo 1;
?>