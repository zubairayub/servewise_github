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

$title       = $_POST['video_title']        = isset($_POST['video_title']) ? $_POST['video_title'] : '';
$short_desc  = $_POST['video_short_desc']   = isset($_POST['video_short_desc']) ? $_POST['video_short_desc'] : '';
$video  = $_FILES['video_video']   = isset($_FILES['video_video']) ? $_FILES['video_video'] : '';

if(!empty($title)){

    $varr->query="UPDATE  `config` SET value=? where name = 'video Title' ";
    $result=$varr->executeQuery($varr->query,array($title),"update");
    if(!empty($short_desc)){
        $varr->query="UPDATE  `config` SET value=? where name = 'video short dis' ";
        $result=$varr->executeQuery($varr->query,array($short_desc),"update");
    }if(!empty($video)){
        $varr->query="UPDATE  `config` SET value=? where name = 'video videofile' ";
        $result=$varr->executeQuery($varr->query,array($video),"update");
    }
    $response = 1;
}

else{


    $response = 0;

}
echo $response;
?>