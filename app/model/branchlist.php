<?php
session_start();
//echo $_SESSION["logIn"];
//echo $_SESSION['logInName'];

 require("branch/branchClass.php");
 require_once($dbcalss);

	$branch = new Branch();
	$message=null;
	$vendorid = "3";
		$getbranches = $branch->getbranchesbyvendorid($vendorid);
	
	
	

?>