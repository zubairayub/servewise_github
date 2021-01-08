<?php
session_start();
require  '../../../lib/functions.php';
$DB_CLASS = '../../../model/classDatabaseManager.php';
$PRODUCT_DIRECTORY = '../../../upload/products/';
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
