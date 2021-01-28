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

	$deleted = $category->deletecategory($categoryid);

if (!empty($deleted)){
	
	header('Location: ' . $_SERVER['HTTP_REFERER']);
} else {
	header('Location: ' . $_SERVER['HTTP_REFERER']);
}
}

	//deleting.....

	//print_r($olddetails);
	if(isset($_POST["category"])){
	
	$categoryname = $_POST["category"];
    $createdby = $_SESSION['logInId'];    


	
	
$type =  $_SESSION['type'];
$type = getstatus($type);
if($type == 'Branch')
{

	$data =  getbranches($createdby);
	$vbid =  $data[0]['vendor_id'];
}elseif($type == 'Admin'){

$vbid =  0;

}elseif($type == 'Vendor'){
// $data =  getvendors($createdby);
	 $vbid =  $_SESSION['vendor_id'];

}else{

	header('Location ?page=logout');
}

	//$vbid = $_SESSION['vendorid'];
	
		$addedcategory = $category->addnewcategory($categoryname,$createdby,$vbid);
		if (empty($addedcategory)){
			
		echo "0";
        } else {
			echo "1";		
        }
	
	}


?>
