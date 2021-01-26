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
   
	
    
	//mail securtiy code
/*	$to = $email;
$subject = "ServeWise Verification of Email";
$txt = "Your Verification code for ServeWise is ". $security_code. "\n Add this verification code to enjoy our services. \n 
            <html>
            <body> 
            <a href='http://www.servewise.com/varification.php?id=".$_SESSION['email']."&code=".$security_code."'>Click here to validate your account.
                        </a>
                        </body>
                        </html>";
// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <noreply@servewise.com>' . "\r\n";



mail($to,$subject,$txt,$headers);
// end
	
*/	
		$checkuser= $user->CheckUser($email);
		
		if (empty($checkuser)){
		   
		//$signup = $user->newSignUp($email,$password,$security_code,$status,$type);        
		  $signup= 1;
		  echo $email;
		  exit(); 
		if (!empty($signup)){
			$message_body = 'Welcome to ServeWise You securtiy code is '.$security_code.' Please verify your email using this code Thanks';
			 sendEmail($email,'ServeWise','register@servewise.shop',$message_body,'Registration');
			 insert_notifications($DB_CLASS,$userid,'6','User_register','https://servewise.shop');

			echo "1";
			
		} else {
			echo "0";
		}	
		} else {
		 echo "2";
		}
		
        
	}
		
?>