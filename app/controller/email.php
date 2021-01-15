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

$email      = $_POST['email'] = isset($_POST['email']) ? $_POST['email'] : '';
$title      = $_POST['email_title'] = isset($_POST['email_title']) ? $_POST['email_title'] : '';
$message    = $_POST['email_msg'] = isset($_POST['email_msg']) ? $_POST['email_msg'] : '';
$user_id =  $_SESSION['logInId'] ;




if(isset($email) && !empty($email)){

    $varr->query="SELECT * FROM `config` where userid = $user_id AND name = 'Email' ";
    $result=$varr->executeQuery($varr->query,array($user_id,'Email'),"sread");
    
    if($result){
    $varr->query="UPDATE  `config` SET value=? where userid = $user_id AND name = 'Email'";
    $result=$varr->executeQuery($varr->query,array($email),"update");
    }
    else{
    $varr->query="INSERT INTO `config`( `id`,`name`, `value`, `userid`) 
    VALUES (?,?,?,?) ";
    $result=$varr->executeQuery($varr->query,array(NULL,'Email',$email,$user_id),"create");
    
    }    
    
    $response = 1;
}

if(isset($title) && !empty($title)){

    $varr->query="SELECT * FROM `config` where userid = $user_id AND name = 'Email_title' ";
    $result=$varr->executeQuery($varr->query,array($user_id,'Email_title'),"sread");
    
    
    if($result){
        $varr->query="UPDATE  `config` SET value=? where userid = $user_id AND name ='Email_title' ";
        $result=$varr->executeQuery($varr->query,array($title),"update");
    }
    else{
    
        $varr->query="INSERT INTO `config`( `id`,`name`, `value`, `userid`) 
    VALUES (?,?,?,?) ";
    $result=$varr->executeQuery($varr->query,array(NULL,'Email_title',$title,$user_id),"create");
    
    }
    $response = 1;

}

if(isset($message) && !empty($message)){

    $varr->query="SELECT * FROM `config` where userid = $user_id AND name = 'Email_msg' ";
    $result=$varr->executeQuery($varr->query,array($user_id,'Email_msg'),"sread");
    
    
    if($result){
    
        $varr->query="UPDATE  `config` SET value=? where userid = $user_id AND name ='Email_msg' ";
        $result=$varr->executeQuery($varr->query,array($message),"update");
    
    }else{
    
        $varr->query="INSERT INTO `config`( `id`,`name`, `value`, `userid`) 
    VALUES (?,?,?,?) ";
    $result=$varr->executeQuery($varr->query,array(NULL,'Email_msg',$message,$user_id),"create");
    
    }
    $response = 1;

}


echo $response;
?>