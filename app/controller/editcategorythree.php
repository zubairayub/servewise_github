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
	$cat_id = $_POST["cat_id"];
	$categoryid = $_POST["categoryid"];
	$categoryname = $_POST["category"];


	
		if(isset($_POST["category"])){
			
			
						$uploadInfo=$category->updatesubcategory3byid($categoryname,$categoryid);	
							if($uploadInfo){
									header('Location: ../../public/?page=subcategorythree_dashboard&id='.$cat_id);
							}
							else{
									header('Location: ../../public/?page=subcategorythree_dashboard&id='.$cat_id);
                            }
			
		}
		
?>