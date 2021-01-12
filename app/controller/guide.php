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


$title          = $_POST['guid_title']        = isset($_POST['guid_title']) ? $_POST['guid_title'] : '';
$short_desc     = $_POST['guid_short_desc']   = isset($_POST['guid_short_desc']) ? $_POST['guid_short_desc'] : '';
$video          = $_FILES['guid_video']       = isset($_FILES['guid_video']) ? $_FILES['guid_video'] : '';
                                                                                                                        
if(!empty($title)){

    $varr->query="UPDATE  `config` SET value=? where name = 'guide title' ";
    $result=$varr->executeQuery($varr->query,array($title),"update");
    if(!empty($short_desc)){
        $varr->query="UPDATE  `config` SET value=? where name = 'guide Short Description' ";
        $result=$varr->executeQuery($varr->query,array($short_desc),"update");
    }if(!empty($video)){
        $varr->query="UPDATE  `config` SET value=? where name = 'guide video' ";
        $result=$varr->executeQuery($varr->query,array($video),"update");
    }
    $response = 1;
}

else{


    $response = 0;

}
echo $response;
?>