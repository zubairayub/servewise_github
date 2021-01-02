<?php
session_start();
defined('APPLICATION_INNERPATH') || define('APPLICATION_INNERPATH', realpath( dirname(__FILE__) . '/../'));

//echo 0;
$PATH =  constant("APPLICATION_INNERPATH");

require $PATH . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'service_config.php'; 
require_once $config_service['DB_CLASS'];
require $config_service['USER_CLASS'];

	$user=new User();
	$message=null;
	
	if(isset($_POST["email"])){
	$emailid = $_POST["email"];
	$password = $user->getSpecificUserPassword($emailid);
	if (!empty($password)){
		//$actualpassword = $password[0]["password"];
		//mail password
		//$to = $emailid;
		//$subject = "ServeWise Password";
		//$txt = "Your Password for ServeWise is ". $actualpassword. "\n This is your password to enjoy our services.";
		//$headers .= 'From: <noreply@servewise.com>' . "\r\n";
		//mail($to,$subject,$txt,$headers);
		// end
		echo "1";
          
	} else {
		echo "0";
       
	}
	}
?>