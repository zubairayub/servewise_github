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

$sms_sub       = $_POST['help_question']        = isset($_POST['help_question']) ? $_POST['help_question'] : '';
$answers       = $_POST['help_answers']        = isset($_POST['help_answers']) ? $_POST['help_answers'] : '';

if(!empty($sms_sub)){

    $varr->query="UPDATE  `config` SET value=? where name = 'Help Question' ";
    $result=$varr->executeQuery($varr->query,array($sms_sub),"update");
    if(!empty($answers)){

        $varr->query="UPDATE  `config` SET value=? where name = 'Help Ans' ";
        $result=$varr->executeQuery($varr->query,array($answers),"update");
    }
    $response = 1;
}

else{


    $response = 0;

}
echo $response;
?>