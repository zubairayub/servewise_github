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
require $config_service['FUNCTIONS'];


	$category=new Category();
	$message=null;

//deleting category...
	if(isset($_GET["id"])){
	$categoryid = $_GET["id"];

	$deleted = $category->deletecategorytwo($categoryid);
if (!empty($deleted)){
	
	header('Location: ' . $_SERVER['HTTP_REFERER']);
} else {
	header('Location: ' . $_SERVER['HTTP_REFERER']);
}
}
	//deleting.....

	//print_r($olddetails);
	if(isset($_POST["category"])){
	
	$categoryid = $_POST["categoryid"];
		$categoryname = $_POST["category"];
    $type =  $_SESSION['type'];
    $createdby = $_SESSION['logInId'];
$type = getstatus($type);
if($type == 'Branch')
{

	$data =  getbranches($createdby);
	$vbid =  $data[0]['vendor_id'];
}elseif($type == 'Admin'){

$vbid =  0;

}elseif($type == 'Vendor'){
	$data =  getvendors('',$createdby,'TRUE');
	$vbid =  $data[0]['vendor_id'];

}else{

	header('Location ?page=logout');
}  
	
	
		$addedcategory = $category->addnewsubcategory($categoryid,$categoryname,$vbid);
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
