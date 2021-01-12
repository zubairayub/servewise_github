<?php
session_start();

defined('APPLICATION_INNERPATH') || define('APPLICATION_INNERPATH', realpath( dirname(__FILE__) . '/../'));


$PATH =  constant("APPLICATION_INNERPATH");

require $PATH . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'service_config.php'; 
$DB_CLASS =  $config_service['DB_CLASS'];
require_once $config_service['FUNCTIONS'];

/* about description */
$formAbout       = $_POST['formDesc']        = isset($_POST['formDesc']) ? $_POST['formDesc'] : '';
$about_desc      = $_POST['about_desc']      = isset($_POST['about_desc']) ? $_POST['about_desc'] : '';

/* vision */
$visionForm      = $_POST['visionForm']      = isset($_POST['visionForm']) ? $_POST['visionForm'] : '';
$vision          = $_POST['vision']          = isset($_POST['vision']) ? $_POST['vision'] : '';
echo '1';
?>