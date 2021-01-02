<?php 
// server should keep session data for AT LEAST 1 hour
//ini_set('session.gc_maxlifetime', 3600);

// each client should remember their session id for EXACTLY 1 hour
//session_set_cookie_params(3600);

session_start(); // ready to go!
//require ('../model/user/userClass.php');
//require ('../model/classDatabaseManager.php');
defined('APPLICATION_INNERPATH') || define('APPLICATION_INNERPATH', realpath( dirname(__FILE__) . '/../'));

//echo 0;
$PATH =  constant("APPLICATION_INNERPATH");

require $PATH . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'service_config.php'; 
require_once $config_service['DB_CLASS'];
require $config_service['USER_CLASS'];
//require APPLICATION_INNERPATH   . DSINNER  . 'user' . DSINNER . 'userClass.php';
//require APPLICATION_INNERPATH  . DSINNER  . 'classDatabaseManager.php';

$user = new User();


	if(isset($_POST["email"])){


if(!empty($_POST["password"])){
			$username = $_POST["email"];
			$password = $_POST["password"];

			    $signIn = $user->newSignIn($username,$password);

			if ($signIn){
				$userid = $_SESSION['logInId'];
				
				$getvendorid = $user->getvendoridbyuserid($userid);
				
				
					echo '1';
		}



}else {
			// echo "<script>window.location.href='../View/login.php?message=SignIn Failed';</script>";
			echo '0';	
		}
	}

		
?>
