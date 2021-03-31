<?php
session_start();

defined('APPLICATION_INNERPATH') || define('APPLICATION_INNERPATH', realpath( dirname(__FILE__) . '/../'));


$PATH =  constant("APPLICATION_INNERPATH");

require $PATH . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'service_config.php'; 
$DB_CLASS =  $config_service['DB_CLASS'];
require_once $config_service['FUNCTIONS'];
require_once $DB_CLASS;
/* default currency form */

$def_currency       = $_POST['def_currency']    = isset($_POST['def_currency']) ? $_POST['def_currency'] : '';


setcurrecny($DB_CLASS,$def_currency);


echo 1;
?>