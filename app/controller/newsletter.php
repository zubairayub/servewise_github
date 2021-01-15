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


$email_user = $_POST['email_user'] = isset($_POST['email_user']) ? $_POST['email_user'] : '';
$email_sub  = $_POST['email_sub'] = isset($_POST['email_sub']) ? $_POST['email_sub'] : '';
$subject    = $_POST['news_subject'] = isset($_POST['news_subject']) ? $_POST['news_subject'] : '';
$content    = $_POST['news_content'] = isset($_POST['news_content']) ? $_POST['news_content'] : '';
$user_id =  $_SESSION['logInId'] ;




if(isset($email_sub) && !empty($email_sub)){

    $varr->query="SELECT * FROM `config` where userid = $user_id AND name = 'news_letter_subcriber' ";
    $result=$varr->executeQuery($varr->query,array($user_id,'theme_about_dis'),"sread");
    
    if($result){
    $varr->query="UPDATE  `config` SET value=? where userid = $user_id AND name = 'news_letter_subcriber'";
    $result=$varr->executeQuery($varr->query,array($email_sub),"update");
    }
    else{
    $varr->query="INSERT INTO `config`( `id`,`name`, `value`, `userid`) 
    VALUES (?,?,?,?) ";
    $result=$varr->executeQuery($varr->query,array(NULL,'news_letter_subcriber',$email_sub,$user_id),"create");
    
    }    
    
    $response = 1;
}

if(isset($subject) && !empty($subject)){

    $varr->query="SELECT * FROM `config` where userid = $user_id AND name = 'news_letter_subject' ";
    $result=$varr->executeQuery($varr->query,array($user_id,'news_letter_subject'),"sread");
    
    
    if($result){
        $varr->query="UPDATE  `config` SET value=? where userid = $user_id AND name ='news_letter_subject' ";
        $result=$varr->executeQuery($varr->query,array($subject),"update");
    }
    else{
    
        $varr->query="INSERT INTO `config`( `id`,`name`, `value`, `userid`) 
    VALUES (?,?,?,?) ";
    $result=$varr->executeQuery($varr->query,array(NULL,'news_letter_subject',$subject,$user_id),"create");
    
    }
    $response = 1;

}

if(isset($content) && !empty($content)){

    $varr->query="SELECT * FROM `config` where userid = $user_id AND name = 'news_letter_content' ";
    $result=$varr->executeQuery($varr->query,array($user_id,'news_letter_content'),"sread");
    
    
    if($result){
    
        $varr->query="UPDATE  `config` SET value=? where userid = $user_id AND name ='news_letter_content' ";
        $result=$varr->executeQuery($varr->query,array($content),"update");
    
    }else{
    
        $varr->query="INSERT INTO `config`( `id`,`name`, `value`, `userid`) 
    VALUES (?,?,?,?) ";
    $result=$varr->executeQuery($varr->query,array(NULL,'news_letter_content',$content,$user_id),"create");
    
    }
    $response = 1;

}


echo $response;

?>