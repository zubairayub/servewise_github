<?php
session_start();

defined('APPLICATION_INNERPATH') || define('APPLICATION_INNERPATH', realpath( dirname(__FILE__) . '/../'));


$PATH =  constant("APPLICATION_INNERPATH");

require $PATH . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'service_config.php'; 
$DB_CLASS =  $config_service['DB_CLASS'];
require_once $config_service['FUNCTIONS'];
/* default currency form */
$defaultCurrency    = $_POST['defaultCurrency'] = isset($_POST['defaultCurrency']) ? $_POST['defaultCurrency'] : '';
$def_currency       = $_POST['def_currency']    = isset($_POST['def_currency']) ? $_POST['def_currency'] : '';
/* symbol form */
$currencySymbol     = $_POST['currencySymbol']  = isset($_POST['currencySymbol']) ? $_POST['currencySymbol'] : '';
$symbol_format      = $_POST['symbol_format']    = isset($_POST['symbol_format']) ? $_POST['symbol_format'] : '';

echo 1;
?>