<?php
session_start();

defined('APPLICATION_INNERPATH') || define('APPLICATION_INNERPATH', realpath( dirname(__FILE__) . '/../'));


$PATH =  constant("APPLICATION_INNERPATH");

require $PATH . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'service_config.php'; 
$DB_CLASS =  $config_service['DB_CLASS'];
require_once $config_service['FUNCTIONS'];

/* about description */
$formFAQ        = $_POST['formFAQ']         = isset($_POST['formFAQ']) ? $_POST['formFAQ'] : '';
$faq            = $_POST['faq']             = isset($_POST['faq']) ? $_POST['faq'] : '';
$faq_answers    = $_POST['faq_answers']     = isset($_POST['faq_answers']) ? $_POST['faq_answers'] : '';

/* package form */
$pckgForm       = $_POST['pckgForm']        = isset($_POST['pckgForm']) ? $_POST['pckgForm'] : '';
$pckg_name      = $_POST['pckg_name']       = isset($_POST['pckg_name']) ? $_POST['pckg_name'] : '';
$pckg_price     = $_POST['pckg_price']      = isset($_POST['pckg_price']) ? $_POST['pckg_price'] : '';
$pckg_heading   = $_FILES['pckg_heading']   = isset($_FILES['pckg_heading']) ? $_FILES['pckg_heading'] : '';
$pckg_desc      = $_POST['pckg_desc']       = isset($_POST['pckg_desc']) ? $_POST['pckg_desc'] : '';

/* hero form */
$heroForm       = $_POST['heroForm']        = isset($_POST['heroForm']) ? $_POST['heroForm'] : '';
$hero_head      = $_POST['hero_head']       = isset($_POST['hero_head']) ? $_POST['hero_head'] : '';
$hero_desc      = $_POST['hero_desc']       = isset($_POST['hero_desc']) ? $_POST['hero_desc'] : '';
echo '1';
?>