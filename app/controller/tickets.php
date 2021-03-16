<?php
session_start();
//echo $_SESSION["logIn"];
//echo $_SESSION['logInName'];

defined('APPLICATION_INNERPATH') || define('APPLICATION_INNERPATH', realpath( dirname(__FILE__) . '/../'));

//echo 0;
$PATH =  constant("APPLICATION_INNERPATH");

require $PATH . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'service_config.php'; 
require_once $config_service['DB_CLASS'];
require $config_service['PRODUCT_CLASS'];
require $config_service['FUNCTIONS'];


$DB_CLASS = $config_service['DB_CLASS'];

/* ticket form */
$brandemail    = $_POST['emailbrand'] = isset($_POST['emailbrand']) ? $_POST['emailbrand'] : '';
$vendoremail  = $_POST['emailvendor']  = isset($_POST['emailvendor'])  ? $_POST['emailvendor'] : '';
$title    = $_POST['Title']    = isset($_POST['Title'])    ? $_POST['Title'] : '';
$description    = $_POST['description']    = isset($_POST['description'])    ? $_POST['description'] : '';

$ticket_id    = $_POST['ticket_id']    = isset($_POST['ticket_id'])    ? $_POST['ticket_id'] : '';



$tovendor    = $_POST['Branch']    = isset($_POST['Branch'])    ? $_POST['Branch'] : '';


if($tovendor == 'on'){


$tomeail = $vendoremail;

}else{

$tomeail = $brandemail;

}



$reciever_data  = getuserinfobyemail($tomeail,$DB_CLASS);

$vendor_id = $_SESSION['vendor_id'];
$branch_id = $_SESSION['branch_id'];


$sender_id = $_SESSION["logInId"];
$sender_email = $_SESSION["logIn"];
$reciever_id = $reciever_data[0]['user_id'];

$message = $description;
$title = $title;
if(empty($ticket_id) && $ticket_id != ''){
$ticket_id = null;
}



sendtickets($DB_CLASS,$sender_id,$reciever_id,$branch_id,$vendor_id,$message,$title,$ticket_id,$sender_email,$tomeail);



	insert_notifications($DB_CLASS,$sender_id,$reciever_id,'Ticket_generated','tickettable_dashboard');	
	insert_notifications($DB_CLASS,$reciever_id,$sender_id,'Ticket_generated','tickettable_dashboard');	


echo 1;
?>