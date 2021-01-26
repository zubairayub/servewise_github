<?php
session_start();

// defined('APPLICATION_INNERPATH') || define('APPLICATION_INNERPATH', realpath( dirname(__FILE__) . '/../'));


// $PATH =  constant("APPLICATION_INNERPATH");

// require $PATH . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'service_config.php'; 
// $DB_CLASS =  $config_service['DB_CLASS'];
// require_once $config_service['FUNCTIONS'];

$DB_CLASS = '../model/classDatabaseManager.php';
require_once '../lib/functions.php';



$vendor_id  =   $_GET['vendor_id'];
$type       =   $_GET['type'];
$action     =   $_GET['action'];
$user_id    =   $_GET['user_id'];
$branch_id    =   $_GET['branch_id'];
$user_info = getuserinfo($user_id);
$email = $user_info[0]['email_id'];
if($type == 'vendor'){
$result = approve_vendor($user_id,$vendor_id,$action,$DB_CLASS);

if($action == 'approve'){

			$message_body = 'Congratulations! Your Request for become vendor has been approved. Thanks for becoming a part of ServeWise';
			$subject = 'Shop Approved';


}else{

			$message_body = 'Hello your shop has been delisted from ServeWise. for more queries please contact at info@servewise.shop Thanks';
			$subject = 'Shop Delisted';


}

}else{




$result = approve_branch($user_id,$vendor_id,$branch_id,$action,$DB_CLASS);


if($action == 'approve'){

			$message_body = 'Congratulations! Your Request for Branch has been approved. Thanks for becoming a part of ServeWise';
			$subject = 'Shop_Approved';


}else{

			$message_body = 'Hello your shop has been delisted from ServeWise. for more queries please contact at info@servewise.shop Thanks';
			$subject = 'Shop_Delisted';


}


}



$from_email = 'vendor@servewise.shop';
			 sendEmail($email,'ServeWise',$from_email,$message_body,$subject);
			
			// insert_notifications($DB_CLASS,$user_id,'6','vendor_singup','https://servewise.shop');
			
			 insert_notifications($DB_CLASS,'6',$user_id,$subject,'https://servewise.shop');


header('Location: ' . $_SERVER['HTTP_REFERER']);
?>