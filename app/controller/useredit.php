<?php
session_start();
//echo $_SESSION["logIn"];
//echo $_SESSION['logInName'];

defined('APPLICATION_INNERPATH') || define('APPLICATION_INNERPATH', realpath( dirname(__FILE__) . '/../'));

//echo 0;
$PATH =  constant("APPLICATION_INNERPATH");

require $PATH . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'service_config.php'; 
require_once $config_service['DB_CLASS'];
require $config_service['USER_CLASS'];


	$user=new User();
	$message=null;
	$emailid = $_SESSION["logIn"];
	
	//print_r($olddetails);
	if(isset($_POST["fname"])){
	
	$fname = $_POST["fname"];
        $lname = $_POST["lname"];
	$contactno = $_POST["contactno"];
	$address = $_POST["address"];
        $address2 = $_POST["address2"];
        $city = $_POST["city"];
        $state = $_POST["state"];
        $zip = $_POST["zip"];
        $country = $_POST["country"];
	
	
	
		$updatedetails = $user->updateuserdetails($fname,$lname,$contactno,$address,$address2,$city,$state,$zip,$country,$emailid);
		if (!empty($updatedetails)){
			echo "1";
          
		} else {
			echo "0";
            
		}
	
	}

?>
