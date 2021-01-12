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

$prvpy       = $_POST['prvpy']        = isset($_POST['prvpy']) ? $_POST['prvpy'] : '';

if(!empty($prvpy)){

    $varr->query="UPDATE  `config` SET value=? where name = 'privacy policy' ";
    $result=$varr->executeQuery($varr->query,array($prvpy),"update");
    $response = 1;
}

else{


    $response = 0;

}
echo $response;
?>