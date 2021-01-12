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

/* about description */
$formDesc       = $_POST['formDesc']        = isset($_POST['formDesc']) ? $_POST['formDesc'] : '';
$about_desc     = $_POST['about_desc']      = isset($_POST['about_desc']) ? $_POST['about_desc'] : '';

/* team info */
$cntForm        = $_POST['cntForm']         = isset($_POST['cntForm']) ? $_POST['cntForm'] : '';
$contact_add    = $_POST['contact_add']     = isset($_POST['contact_add']) ? $_POST['contact_add'] : '';
$contact_ph     = $_POST['contact_ph']      = isset($_POST['contact_ph']) ? $_POST['contact_ph'] : '';
$contact_img    = $_FILES['contact_img']    = isset($_FILES['contact_img']) ? $_FILES['contact_img'] : '';
$contact_email  = $_POST['contact_email']   = isset($_POST['contact_email']) ? $_POST['contact_email'] : '';

/* vision */
$visionForm     = $_POST['visionForm']      = isset($_POST['visionForm']) ? $_POST['visionForm'] : '';
$vision         = $_POST['vision']          = isset($_POST['vision']) ? $_POST['vision'] : '';



if(!empty($formDesc)){

    $varr->query="UPDATE  `config` SET value=? where name = 'AboutDiscribtion' ";
    $result=$varr->executeQuery($varr->query,array($formDesc),"update");
    if(!empty($about_desc)){

        $varr->query="UPDATE  `config` SET value=? where name = 'AboutDiscribtion' ";
        $result=$varr->executeQuery($varr->query,array($about_desc),"update");
    }
$response = 1;
}

else{


    $response = 0;

}
echo $response;

?>