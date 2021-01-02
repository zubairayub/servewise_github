<?php
session_start();
//echo $_SESSION["logIn"];
//echo $_SESSION['logInName'];

 require("user/userClass.php");
 require_once($dbcalss);

	$customer = new User();
	$message=null;
	$vbid = "1";
		$getcustomers = $customer->getcustomersbyvbid($vbid);
	
	
	

?>