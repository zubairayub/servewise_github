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
	
		if(isset($_POST["category"])){
			
			
						    $uploadInfo=$category->updatecategorybyid($categoryname,$categoryid);	
							if($uploadInfo){
								header('Location: ../../public/?page=category_dashboard');
								//editcategorytwo_dashboard
							}
							else{
								header('Location: ../../public/?page=category_dashboard');
                            }
			
		}
		
?>