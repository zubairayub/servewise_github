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
	$emailid = $_SESSION["email"];
//	$code = null;
//	$code = $_GET["code"];
	
	
	
	if(isset($_POST["securitytxt"])){
	
	$security = $_POST["securitytxt"];
//	$email = $_SESSION["email"];
    
	
	$code = $user->getSpecificUserSecurityCode($emailid);
		
		if (!empty($code)){
		$securitycode = $code[0]["security_code"];
	
			if ($security==$securitycode){
				$status = "active";
				$statuses = $user->updateUserStatus($status,$emailid);
				if (!empty($statuses)){
				echo "1";
				} else {
				echo "0";
				}
			} else {
				echo "2";
			}
		} else {
			echo "3";	
        }
	
	}
	
		
?>