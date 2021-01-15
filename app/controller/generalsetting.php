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

$sys_name   = $_POST['system_name'] = isset($_POST['system_name']) ? $_POST['system_name'] : '';
$sys_logo   = $_POST['system_logo'] = isset($_POST['system_logo']) ? $_POST['system_logo'] : '';
$sys_time   = $_POST['system_time'] = isset($_POST['system_time']) ? $_POST['system_time'] : '';
$adlp_bg    = $_POST['admin_page_background'] = isset($_POST['admin_page_background']) ? $_POST['admin_page_background'] : '';
$user_id =  $_SESSION['logInId'] ;




if(isset($sys_name) && !empty($sys_name)){

    $varr->query="SELECT * FROM `config` where userid = $user_id AND name = 'System_name' ";
    $result=$varr->executeQuery($varr->query,array($user_id,'System_name'),"sread");
    
    if($result){
    $varr->query="UPDATE  `config` SET value=? where userid = $user_id AND name = 'System_name'";
    $result=$varr->executeQuery($varr->query,array($sys_name),"update");
    }
    else{
    $varr->query="INSERT INTO `config`( `id`,`name`, `value`, `userid`) 
    VALUES (?,?,?,?) ";
    $result=$varr->executeQuery($varr->query,array(NULL,'System_name',$sys_name,$user_id),"create");
    
    }    
    
    $response = 1;
}

if(isset($sys_logo) && !empty($sys_logo)){

    $varr->query="SELECT * FROM `config` where userid = $user_id AND name = 'System_logo' ";
    $result=$varr->executeQuery($varr->query,array($user_id,'System_logo'),"sread");
    
    
    if($result){
        $varr->query="UPDATE  `config` SET value=? where userid = $user_id AND name ='System_logo' ";
        $result=$varr->executeQuery($varr->query,array($sys_logo),"update");
    }
    else{
    
        $varr->query="INSERT INTO `config`( `id`,`name`, `value`, `userid`) 
    VALUES (?,?,?,?) ";
    $result=$varr->executeQuery($varr->query,array(NULL,'System_logo',$sys_logo,$user_id),"create");
    
    }
    $response = 1;

}

if(isset($sys_time) && !empty($sys_time)){

    $varr->query="SELECT * FROM `config` where userid = $user_id AND name = 'System_time' ";
    $result=$varr->executeQuery($varr->query,array($user_id,'System_time'),"sread");
    
    
    if($result){
    
        $varr->query="UPDATE  `config` SET value=? where userid = $user_id AND name ='System_time' ";
        $result=$varr->executeQuery($varr->query,array($sys_time),"update");
    
    }else{
    
        $varr->query="INSERT INTO `config`( `id`,`name`, `value`, `userid`) 
    VALUES (?,?,?,?) ";
    $result=$varr->executeQuery($varr->query,array(NULL,'System_time',$sys_time,$user_id),"create");
    
    }
    $response = 1;

}
if(isset($adlp_bg) && !empty($adlp_bg)){

    $varr->query="SELECT * FROM `config` where userid = $user_id AND name = 'page_background_image' ";
    $result=$varr->executeQuery($varr->query,array($user_id,'page_background_image'),"sread");
    
    
    if($result){
    
        $varr->query="UPDATE  `config` SET value=? where userid = $user_id AND name ='page_background_image' ";
        $result=$varr->executeQuery($varr->query,array($adlp_bg),"update");
    
    }else{
    
        $varr->query="INSERT INTO `config`( `id`,`name`, `value`, `userid`) 
    VALUES (?,?,?,?) ";
    $result=$varr->executeQuery($varr->query,array(NULL,'page_background_image',$adlp_bg,$user_id),"create");
    
    }
    $response = 1;

}

echo $response;
?>