<?php
session_start();
//echo $_SESSION["logIn"];
//echo $_SESSION['logInName'];

defined('APPLICATION_INNERPATH') || define('APPLICATION_INNERPATH', realpath( dirname(__FILE__) . '/../'));

//echo 0;
$PATH =  constant("APPLICATION_INNERPATH");

require $PATH . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'service_config.php'; 
require_once $config_service['DB_CLASS'];
require $config_service['CATEGORY_CLASS'];


	$category=new Category();
	$message=null;

//deleting category...
	$categoryid = $_GET["id"];

	$deleted = $category->deletecategory($categoryid);
if (!empty($deleted)){
	
	echo "deleted";	
} else {
	echo "not deleted";
}
	//deleting.....

	//print_r($olddetails);
	if(isset($_POST["category"])){
	
	$categoryname = $_POST["category"];
    $createdby = $_SESSION['logInId'];    
	
	$vbid = $_SESSION['vendorid'];
	
		$addedcategory = $category->addnewcategory($categoryname,$createdby,$vbid);
		if (empty($addedcategory)){
			//$message[0] = true;
			//$message[1] = "Updated Successfully";	
			//echo "Successfully Updated";
				//header("location: ../View/userprofile.php");
		echo "0";
        } else {
			echo "1";		
        }
	
	}


?>
