<?php
session_start();
defined('APPLICATION_PATH') || define('APPLICATION_PATH', realpath( dirname(__FILE__) . '/../../../../app')); 
const DS = DIRECTORY_SEPARATOR; 
require  APPLICATION_PATH . DS . 'lib'. DS .'functions.php';
$DB_CLASS =     APPLICATION_PATH . DS . 'model' . DS. 'classDatabaseManager.php';
$PRODUCT_DIRECTORY =  APPLICATION_PATH . DS . 'upload' . DS. 'products' . DS ;
if(!empty($_SESSION['vb_id'])){

$vb_id = $_SESSION['vb_id'];
$type = $_SESSION['type'];
$domain_url =$_SESSION['domain_url']; 
$theme_id = $_SESSION['theme_id'];
$theme_title = $_SESSION['theme_title'];
$theme_url = $_SESSION['theme_url'];

$result = getproducts($vb_id,$DB_CLASS);



}else{


header('Location: ../../../../public/');


}

?>
