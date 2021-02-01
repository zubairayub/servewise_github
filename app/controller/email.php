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
$user_email =  $_SESSION['logIn'] ;




if(isset($email) && !empty($email)){

     sendEmail($email,'ServeWise',$user_email,$message,$title);
echo 1;

  
}





?>