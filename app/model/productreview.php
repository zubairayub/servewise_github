<?php
session_start();
//echo $_SESSION["logIn"];
//echo $_SESSION['logInName'];

 require("product/productClass.php");
 require_once($dbcalss);

	$product = new Product();
	$message=null;
	$vbid = "1";
		$getreview = $product->getallreviewsbyvbid($vbid);
	
	
	

?>