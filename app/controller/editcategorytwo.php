<?php 
session_start();
defined('APPLICATION_INNERPATH') || define('APPLICATION_INNERPATH', realpath( dirname(__FILE__) . '/../'));

//echo 0;
$PATH =  constant("APPLICATION_INNERPATH");

require $PATH . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'service_config.php'; 
require_once $config_service['DB_CLASS'];
require $config_service['CATEGORY_CLASS'];
require $config_service['FUNCTIONS'];
	
    $category=new Category();
	$message=null;
	$categoryid = $_POST["categoryid"];
	$categoryname = $_POST["category"];
	$cat_id = $_POST["cat_id"];
	
	
		if(isset($_POST["category"])){
			
			
						$uploadInfo=$category->updatesubcategory2byid($categoryname,$categoryid);	
							if($uploadInfo){
								  			  $user_id = $_SESSION['logInId'];  
			  

			  $brand_id = isset($_SESSION['vendor_id']);  
			  $vendor_id = isset($_SESSION['branch_id']); 

			  if(empty($brand_id)){
				$brand_id = 0;
			  
			  }
			  
			  if(empty($vendor_id)){
				$vendor_id = 0;
			  
			  }


			  $activity_log = 'Sub Category Edit '. $categoryname;
			  addacivitylog('',$activity_log,$user_id,$brand_id,$vendor_id);
									header('Location: ../../public/?page=subcategorytwo_dashboard&id='.$cat_id);
							}
							else{
									header('Location: ../../public/?page=subcategorytwo_dashboard&id='.$cat_id);
                            }
			
		}
		
?>