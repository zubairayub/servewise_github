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

$staff_name    = $_POST['staff_name']     = isset($_POST['staff_name']) ? $_POST['staff_name'] : '';
$staff_email   = $_POST['staff_email']   = isset($_POST['staff_email']) ? $_POST['staff_email'] : '';
$staff_phone   = $_POST['staff_phone']    = isset($_POST['staff_phone']) ? $_POST['staff_phone'] : '';

$staff_role    = $_POST['staff_role']     = isset($_POST['staff_role']) ? $_POST['staff_role'] : '';

if(!empty($staff_email)){


$dataall = register_user($DB_CLASS,$staff_email,$staff_name,$staff_phone,$staff_role);

//print_r($dataall);

$addstaff = add_staff($DB_CLASS,$dataall[0]['user_id'],$_SESSION['logInId'],$staff_role,$_SESSION['type']);
$staff_type = getusertypes($staff_role);
$message_body = '<b> Hi '.$staff_name . '</b> <br><br> <b> You assigned role of '. $staff_type[0]['title'] . ' From '.$_SESSION['logInId'] . ' </b> <br><br>Your login details are <br><b>username:</b>'. $staff_email .'<br> <b>password:</b>' .$dataall[0]['password'].' <br> <b>Website url is:</b> https://servewise.shop';
$subject = 'NEW ROLE ASSIGNED';

			  sendEmail($staff_email,'ServeWise',$_SESSION['logIn'],$message_body,$subject);








}