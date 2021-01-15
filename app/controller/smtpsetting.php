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

$smtp_type      = $_POST['smtp_type']       = isset($_POST['smtp_type']) ? $_POST['smtp_type'] : '';
$smtp_host      = $_POST['smtp_host']       = isset($_POST['smtp_host']) ? $_POST['smtp_host'] : '';
$smtp_port      = $_POST['smtp_port']       = isset($_POST['smtp_port']) ? $_POST['smtp_port'] : '';
$smtp_user      = $_POST['smtp_user']       = isset($_POST['smtp_user']) ? $_POST['smtp_user'] : '';
$smtp_pass      = $_POST['smtp_pass']       = isset($_POST['smtp_pass']) ? $_POST['smtp_pass'] : '';
$smtp_enc       = $_POST['smtp_enc']        = isset($_POST['smtp_enc']) ? $_POST['smtp_enc'] : '';
$smtp_frm_add   = $_POST['smtp_frm_add']    = isset($_POST['smtp_frm_add']) ? $_POST['smtp_frm_add'] : '';
$smtp_frm_name  = $_POST['smtp_frm_name']   = isset($_POST['smtp_frm_name']) ? $_POST['smtp_frm_name'] : '';
$user_id =  $_SESSION['logInId'] ;




if(isset($smtp_type) && !empty($smtp_type)){

    $varr->query="SELECT * FROM `config` where userid = $user_id AND name = 'SMTP_type' ";
    $result=$varr->executeQuery($varr->query,array($user_id,'SMTP_type'),"sread");
    
    if($result){
    $varr->query="UPDATE  `config` SET value=? where userid = $user_id AND name = 'SMTP_type'";
    $result=$varr->executeQuery($varr->query,array($smtp_type),"update");
    }
    else{
    $varr->query="INSERT INTO `config`( `id`,`name`, `value`, `userid`) 
    VALUES (?,?,?,?) ";
    $result=$varr->executeQuery($varr->query,array(NULL,'SMTP_type',$smtp_type,$user_id),"create");
    
    }    
    
    $response = 1;
}

if(isset($smtp_host) && !empty($smtp_host)){

    $varr->query="SELECT * FROM `config` where userid = $user_id AND name = 'SMTP_host' ";
    $result=$varr->executeQuery($varr->query,array($user_id,'SMTP_host'),"sread");
    
    
    if($result){
        $varr->query="UPDATE  `config` SET value=? where userid = $user_id AND name ='SMTP_host' ";
        $result=$varr->executeQuery($varr->query,array($smtp_host),"update");
    }
    else{
    
        $varr->query="INSERT INTO `config`( `id`,`name`, `value`, `userid`) 
    VALUES (?,?,?,?) ";
    $result=$varr->executeQuery($varr->query,array(NULL,'SMTP_host',$smtp_host,$user_id),"create");
    
    }
    $response = 1;

}

if(isset($smtp_port) && !empty($smtp_port)){

    $varr->query="SELECT * FROM `config` where userid = $user_id AND name = 'SMTP_port' ";
    $result=$varr->executeQuery($varr->query,array($user_id,'SMTP_port'),"sread");
    
    
    if($result){
    
        $varr->query="UPDATE  `config` SET value=? where userid = $user_id AND name ='SMTP_port' ";
        $result=$varr->executeQuery($varr->query,array($smtp_port),"update");
    
    }else{
    
        $varr->query="INSERT INTO `config`( `id`,`name`, `value`, `userid`) 
    VALUES (?,?,?,?) ";
    $result=$varr->executeQuery($varr->query,array(NULL,'SMTP_port',$smtp_port,$user_id),"create");
    
    }
    $response = 1;

}
if(isset($smtp_user) && !empty($smtp_user)){

    $varr->query="SELECT * FROM `config` where userid = $user_id AND name = 'page_background_image' ";
    $result=$varr->executeQuery($varr->query,array($user_id,'page_background_image'),"sread");
    
    
    if($result){
    
        $varr->query="UPDATE  `config` SET value=? where userid = $user_id AND name ='page_background_image' ";
        $result=$varr->executeQuery($varr->query,array($smtp_user),"update");
    
    }else{
    
        $varr->query="INSERT INTO `config`( `id`,`name`, `value`, `userid`) 
    VALUES (?,?,?,?) ";
    $result=$varr->executeQuery($varr->query,array(NULL,'page_background_image',$smtp_user,$user_id),"create");
    
    }
    $response = 1;

}
if(isset($smtp_pass) && !empty($smtp_pass)){

    $varr->query="SELECT * FROM `config` where userid = $user_id AND name = 'SMTP_password' ";
    $result=$varr->executeQuery($varr->query,array($user_id,'SMTP_password'),"sread");
    
    
    if($result){
    
        $varr->query="UPDATE  `config` SET value=? where userid = $user_id AND name ='SMTP_password' ";
        $result=$varr->executeQuery($varr->query,array($smtp_pass),"update");
    
    }else{
    
        $varr->query="INSERT INTO `config`( `id`,`name`, `value`, `userid`) 
    VALUES (?,?,?,?) ";
    $result=$varr->executeQuery($varr->query,array(NULL,'SMTP_password',$smtp_pass,$user_id),"create");
    
    }
    $response = 1;

}
if(isset($smtp_enc) && !empty($smtp_enc)){

    $varr->query="SELECT * FROM `config` where userid = $user_id AND name = 'SMTP_encryption' ";
    $result=$varr->executeQuery($varr->query,array($user_id,'SMTP_encryption'),"sread");
    
    
    if($result){
    
        $varr->query="UPDATE  `config` SET value=? where userid = $user_id AND name ='SMTP_encryption' ";
        $result=$varr->executeQuery($varr->query,array($smtp_enc),"update");
    
    }else{
    
        $varr->query="INSERT INTO `config`( `id`,`name`, `value`, `userid`) 
    VALUES (?,?,?,?) ";
    $result=$varr->executeQuery($varr->query,array(NULL,'SMTP_encryption',$smtp_enc,$user_id),"create");
    
    }
    $response = 1;

}
if(isset($smtp_frm_add) && !empty($smtp_frm_add)){

    $varr->query="SELECT * FROM `config` where userid = $user_id AND name = 'SMTP_form_address' ";
    $result=$varr->executeQuery($varr->query,array($user_id,'SMTP_form_address'),"sread");
    
    
    if($result){
    
        $varr->query="UPDATE  `config` SET value=? where userid = $user_id AND name ='SMTP_form_address' ";
        $result=$varr->executeQuery($varr->query,array($smtp_frm_add),"update");
    
    }else{
    
        $varr->query="INSERT INTO `config`( `id`,`name`, `value`, `userid`) 
    VALUES (?,?,?,?) ";
    $result=$varr->executeQuery($varr->query,array(NULL,'SMTP_form_address',$smtp_frm_add,$user_id),"create");
    
    }
    $response = 1;

}

if(isset($smtp_frm_name) && !empty($smtp_frm_name)){

    $varr->query="SELECT * FROM `config` where userid = $user_id AND name = 'SMTP_form_name' ";
    $result=$varr->executeQuery($varr->query,array($user_id,'SMTP_form_name'),"sread");
    
    
    if($result){
    
        $varr->query="UPDATE  `config` SET value=? where userid = $user_id AND name ='SMTP_form_name' ";
        $result=$varr->executeQuery($varr->query,array($smtp_frm_name),"update");
    
    }else{
    
        $varr->query="INSERT INTO `config`( `id`,`name`, `value`, `userid`) 
    VALUES (?,?,?,?) ";
    $result=$varr->executeQuery($varr->query,array(NULL,'SMTP_form_name',$smtp_frm_name,$user_id),"create");
    
    }
    $response = 1;

}

echo $response;
?>