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

$mob_user   = $_POST['bluk_sms-mob_user'] = isset($_POST['bluk_sms-mob_user']) ? $_POST['bluk_sms-mob_user'] : '';
$sms_sub    = $_POST['bluk_sms_sub'] = isset($_POST['bluk_sms_sub']) ? $_POST['bluk_sms_sub'] : '';
$sms_content= $_POST['bluk-sms-content'] = isset($_POST['bluk-sms-content']) ? $_POST['bluk-sms-content'] : '';
$user_id =  $_SESSION['logInId'] ;




if(isset($mob_user) && !empty($mob_user)){

    $varr->query="SELECT * FROM `config` where userid = $user_id AND name = 'Mobile_User' ";
    $result=$varr->executeQuery($varr->query,array($user_id,'Mobile_User'),"sread");
    
    if($result){
    $varr->query="UPDATE  `config` SET value=? where userid = $user_id AND name = 'Mobile_User'";
    $result=$varr->executeQuery($varr->query,array($mob_user),"update");
    }
    else{
    $varr->query="INSERT INTO `config`( `id`,`name`, `value`, `userid`) 
    VALUES (?,?,?,?) ";
    $result=$varr->executeQuery($varr->query,array(NULL,'Mobile_User',$mob_user,$user_id),"create");
    
    }    
    
    $response = 1;
}

if(isset($sms_sub) && !empty($sms_sub)){

    $varr->query="SELECT * FROM `config` where userid = $user_id AND name = 'Bluk_sms_sub' ";
    $result=$varr->executeQuery($varr->query,array($user_id,'Bluk_sms_sub'),"sread");
    
    
    if($result){
        $varr->query="UPDATE  `config` SET value=? where userid = $user_id AND name ='Bluk_sms_sub' ";
        $result=$varr->executeQuery($varr->query,array($sms_sub),"update");
    }
    else{
    
        $varr->query="INSERT INTO `config`( `id`,`name`, `value`, `userid`) 
    VALUES (?,?,?,?) ";
    $result=$varr->executeQuery($varr->query,array(NULL,'Bluk_sms_sub',$sms_sub,$user_id),"create");
    
    }
    $response = 1;

}

if(isset($sms_content) && !empty($sms_content)){

    $varr->query="SELECT * FROM `config` where userid = $user_id AND name = 'Bluk_Sms_content' ";
    $result=$varr->executeQuery($varr->query,array($user_id,'Bluk_Sms_content'),"sread");
    
    
    if($result){
    
        $varr->query="UPDATE  `config` SET value=? where userid = $user_id AND name ='Bluk_Sms_content' ";
        $result=$varr->executeQuery($varr->query,array($sms_content),"update");
    
    }else{
    
        $varr->query="INSERT INTO `config`( `id`,`name`, `value`, `userid`) 
    VALUES (?,?,?,?) ";
    $result=$varr->executeQuery($varr->query,array(NULL,'Bluk_Sms_content',$sms_content,$user_id),"create");
    
    }
    $response = 1;

}


echo $response;
?>