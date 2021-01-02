<?php 
session_start();
defined('APPLICATION_INNERPATH') || define('APPLICATION_INNERPATH', realpath( dirname(__FILE__) . '/../'));

//echo 0;
$PATH =  constant("APPLICATION_INNERPATH");

require $PATH . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'service_config.php'; 
require_once $config_service['DB_CLASS'];
require $config_service['BRAND_CLASS'];
	
    $brand=new Brand();
	$message=null;
	$brandid = $_POST["brandid"];
	$name = $_POST["name"];
	
		if(isset($_POST["name"])){
			
			
						$uploadInfo=$brand->updatebrandbyid($name,$brandid);	
							if($uploadInfo){
								echo "1";
							}
							else{
								echo "0"	;	
                            }
			
		}
		
?>