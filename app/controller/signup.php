<?php 
session_start();
defined('APPLICATION_INNERPATH') || define('APPLICATION_INNERPATH', realpath( dirname(__FILE__) . '/../'));

//echo 0;
$PATH =  constant("APPLICATION_INNERPATH");

require $PATH . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'service_config.php'; 
require_once $config_service['DB_CLASS'];
require $config_service['USER_CLASS'];
require_once $config_service['FUNCTIONS'];
$DB_CLASS = $config_service['DB_CLASS'];
	
$user=new User();
	$message=null;
	
	if(isset($_POST["email"])){
	

	$email = $_POST["email"];
	$password = $_POST["password"];
	$cpassword = $_POST["confirm_Password"];
	$type = $_POST["type"];
	
	$security_code = mt_rand(1000,9999);
	$_SESSION["email"]=$email;
    $status = "block";
    $_SESSION["securitycode"] = $security_code;
   
	
    
		$checkuser= $user->CheckUser($email);
		
		if (empty($checkuser)){
		   
		$signup = $user->newSignUp($email,$password,$security_code,$status,$type);        
		   
		if (!empty($signup)){
			$from_email = 'register@servewise.shop' ;
			$message_body = '<h2>Welcome to ServeWise</h2> <br><br> You securtiy code is <h3>'.$security_code.'</h3> Please verify your email using this code Thanks';
			 sendEmail($email,'ServeWise',$from_email,$message_body,'Registration');
			 insert_notifications($DB_CLASS,'6','6','User_register','https://servewise.shop');
			 

			echo "1";
			
		} else {
			echo "0";
		}	
		} else {
		 echo "2";
		}
		
        
	}
		
?>