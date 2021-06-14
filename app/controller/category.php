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

	  			  $user_id = $_SESSION['logInId'];  
			  

			  $brand_id = isset($_SESSION['vendor_id']);  
			  $vendor_id = isset($_SESSION['branch_id']); 

			  if(empty($brand_id)){
				$brand_id = 0;
			  
			  }
			  
			  if(empty($vendor_id)){
				$vendor_id = 0;
			  
			  }


			  $activity_log = 'Category Deleted ';
			  addacivitylog('',$activity_log,$user_id,$brand_id,$vendor_id);
	//header('Location: ' . $_SERVER['HTTP_REFERER']);
?>
			  <script>window.location.replace("https://servewise.shop/public?page=category_dashboard");</script>
			  <?php
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
	
	$bool = checkcategoryexits('',$categoryname);

if($bool){
$addedcategory = $category->addnewcategory($categoryname,$createdby,$vbid);
		if (empty($addedcategory)){
			
		echo "0";
        } else {
			echo "1";
			  $user_id = $_SESSION['logInId'];  
			  

			  $brand_id = isset($_SESSION['vendor_id']);  
			  $vendor_id = isset($_SESSION['branch_id']); 

			  if(empty($brand_id)){
$brand_id = 0;
			  }
			  if(empty($vendor_id)){
$vendor_id = 0;
			  }


			  $activity_log = 'Category Added '. $categoryname;
			  addacivitylog('',$activity_log,$user_id,$brand_id,$vendor_id);
        }
}else{

	echo "2";
}
	

	
	}


?>
