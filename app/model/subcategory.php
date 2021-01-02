<?php
session_start();
//echo $_SESSION["logIn"];
//echo $_SESSION['logInName'];

 require("category/categoryClass.php");
 require_once($dbcalss);

	$category = new Category();
	$message=null;
	
	
	//print_r($olddetails);
	//$vbid = "1";
	
		$getcategory = $category->getcategories();
	
	
	

?>