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

/** Google Form */
$googleForm         = $_POST['googleForm']       = isset($_POST['googleForm']) ? $_POST['googleForm'] : '';
$gclient_id         = $_POST['gclient_id']       = isset($_POST['gclient_id']) ? $_POST['gclient_id'] : '';
$gclient_secret     = $_POST['gclient_secret']   = isset($_POST['gclient_secret']) ? $_POST['gclient_secret'] : '';

/** Facebook Form */
$facebookForm         = $_POST['facebookForm']          = isset($_POST['facebookForm']) ? $_POST['facebookForm'] : '';
$facebook_app_id      = $_POST['facebook_app_id']       = isset($_POST['facebook_app_id']) ? $_POST['facebook_app_id'] : '';
$facebook_app_secret  = $_POST['facebook_app_secret']   = isset($_POST['facebook_app_secret']) ? $_POST['facebook_app_secret'] : '';

/**  Twitter Form */
$twitterForm          = $_POST['twitterForm']          = isset($_POST['twitterForm']) ? $_POST['twitterForm'] : '';
$twitter_client_id    = $_POST['twitter_client_id']    = isset($_POST['twitter_client_id']) ? $_POST['twitter_client_id'] : '';
$twitter_client_secret= $_POST['twitter_client_secret']= isset($_POST['twitter_client_secret']) ? $_POST['twitter_client_secret'] : '';
$user_id =  $_SESSION['logInId'] ;




if(isset($gclient_id) && !empty($gclient_id)){

    $varr->query="SELECT * FROM `config` where userid = $user_id AND name = 'Google_client_id' ";
    $result=$varr->executeQuery($varr->query,array($user_id,'Google_client_id'),"sread");
    
    if($result){
    $varr->query="UPDATE  `config` SET value=? where userid = $user_id AND name = 'Google_client_id'";
    $result=$varr->executeQuery($varr->query,array($gclient_id),"update");
    }
    else{
    $varr->query="INSERT INTO `config`( `id`,`name`, `value`, `userid`) 
    VALUES (?,?,?,?) ";
    $result=$varr->executeQuery($varr->query,array(NULL,'Google_client_id',$gclient_id,$user_id),"create");
    
    }    
    
    $response = 1;
}

if(isset($gclient_secret) && !empty($gclient_secret)){

    $varr->query="SELECT * FROM `config` where userid = $user_id AND name = 'Google_client_secret_key' ";
    $result=$varr->executeQuery($varr->query,array($user_id,'Google_client_secret_key'),"sread");
    
    
    if($result){
        $varr->query="UPDATE  `config` SET value=? where userid = $user_id AND name ='Google_client_secret_key' ";
        $result=$varr->executeQuery($varr->query,array($gclient_secret),"update");
    }
    else{
    
        $varr->query="INSERT INTO `config`( `id`,`name`, `value`, `userid`) 
    VALUES (?,?,?,?) ";
    $result=$varr->executeQuery($varr->query,array(NULL,'Google_client_secret_key',$gclient_secret,$user_id),"create");
    
    }
    $response = 1;

}

if(isset($facebook_app_id) && !empty($facebook_app_id)){

    $varr->query="SELECT * FROM `config` where userid = $user_id AND name = 'Facebook_app_id' ";
    $result=$varr->executeQuery($varr->query,array($user_id,'Facebook_app_id'),"sread");
    
    
    if($result){
    
        $varr->query="UPDATE  `config` SET value=? where userid = $user_id AND name ='Facebook_app_id' ";
        $result=$varr->executeQuery($varr->query,array($facebook_app_id),"update");
    
    }else{
    
        $varr->query="INSERT INTO `config`( `id`,`name`, `value`, `userid`) 
    VALUES (?,?,?,?) ";
    $result=$varr->executeQuery($varr->query,array(NULL,'Facebook_app_id',$facebook_app_id,$user_id),"create");
    
    }
    $response = 1;

}
if(isset($facebook_app_secret) && !empty($facebook_app_secret)){

    $varr->query="SELECT * FROM `config` where userid = $user_id AND name = 'Facebook_app_secret_key' ";
    $result=$varr->executeQuery($varr->query,array($user_id,'Facebook_app_secret_key'),"sread");
    
    
    if($result){
    
        $varr->query="UPDATE  `config` SET value=? where userid = $user_id AND name ='Facebook_app_secret_key' ";
        $result=$varr->executeQuery($varr->query,array($facebook_app_secret),"update");
    
    }else{
    
        $varr->query="INSERT INTO `config`( `id`,`name`, `value`, `userid`) 
    VALUES (?,?,?,?) ";
    $result=$varr->executeQuery($varr->query,array(NULL,'Facebook_app_secret_key',$facebook_app_secret,$user_id),"create");
    
    }
    $response = 1;

}
if(isset($twitter_client_id) && !empty($twitter_client_id)){

    $varr->query="SELECT * FROM `config` where userid = $user_id AND name = 'Twitter_app_id' ";
    $result=$varr->executeQuery($varr->query,array($user_id,'Twitter_app_id'),"sread");
    
    
    if($result){
    
        $varr->query="UPDATE  `config` SET value=? where userid = $user_id AND name ='Twitter_app_id' ";
        $result=$varr->executeQuery($varr->query,array($twitter_client_id),"update");
    
    }else{
    
        $varr->query="INSERT INTO `config`( `id`,`name`, `value`, `userid`) 
    VALUES (?,?,?,?) ";
    $result=$varr->executeQuery($varr->query,array(NULL,'Twitter_app_id',$twitter_client_id,$user_id),"create");
    
    }
    $response = 1;

}
if(isset($twitter_client_secret) && !empty($twitter_client_secret)){

    $varr->query="SELECT * FROM `config` where userid = $user_id AND name = 'Twitter_client_secret_key' ";
    $result=$varr->executeQuery($varr->query,array($user_id,'Twitter_client_secret_key'),"sread");
    
    
    if($result){
    
        $varr->query="UPDATE  `config` SET value=? where userid = $user_id AND name ='Twitter_client_secret_key' ";
        $result=$varr->executeQuery($varr->query,array($twitter_client_secret),"update");
    
    }else{
    
        $varr->query="INSERT INTO `config`( `id`,`name`, `value`, `userid`) 
    VALUES (?,?,?,?) ";
    $result=$varr->executeQuery($varr->query,array(NULL,'Twitter_client_secret_key',$twitter_client_secret,$user_id),"create");
    
    }
    $response = 1;

}
echo $response;
?>