<?php 
session_start();
defined('APPLICATION_INNERPATH') || define('APPLICATION_INNERPATH', realpath( dirname(__FILE__) . '/../'));

//echo 0;
$PATH =  constant("APPLICATION_INNERPATH");

require $PATH . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'service_config.php'; 
require_once $config_service['DB_CLASS'];
require $config_service['CATEGORY_CLASS'];
	
    $category=new Category();
	$message=null;
	$categoryid = $_POST["categoryid"];
	$categoryname = $_POST["category"];
	$cat_id = $_POST["cat_id"];
	
	
		if(isset($_POST["category"])){
			
			
						$uploadInfo=$category->updatesubcategory2byid($categoryname,$categoryid);	
							if($uploadInfo){
									header('Location: ../../public/?page=subcategorytwo_dashboard&id='.$cat_id);
							}
							else{
									header('Location: ../../public/?page=subcategorytwo_dashboard&id='.$cat_id);
                            }
			
		}
		
?>