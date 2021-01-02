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

	$deleted = $category->deletecategorytwo($categoryid);
if (!empty($deleted)){
	
	echo "deleted";	
} else {
	echo "not deleted";
}
	//deleting.....

	//print_r($olddetails);
	if(isset($_POST["category"])){
	
	$categoryid = $_POST["categoryid"];
		$categoryname = $_POST["category"];
    $vendorid = $_SESSION['vendorid'];    
	
	
		$addedcategory = $category->addnewsubcategory($categoryid,$categoryname,$vendorid);
		if (!empty($addedcategory)){
			//$message[0] = true;
			//$message[1] = "Updated Successfully";	
			//echo "Successfully Updated";
				//header("location: ../View/userprofile.php");
		echo "1";
        } else {
			echo "0";		
        }
	
	}


?>
