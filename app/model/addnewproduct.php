<?php
//session_start();
//echo $_SESSION["logIn"];
//echo $_SESSION['logInName'];


defined('APPLICATION_INNERPATH') || define('APPLICATION_INNERPATH', realpath( dirname(__FILE__) . '/../'));

//echo 0;
$PATH =  constant("APPLICATION_INNERPATH");

require $PATH . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'service_config.php'; 
require_once $config_service['DB_CLASS'];
 require("product/productClass.php");
 

	$product = new Product();
	$message=null;



if(isset($_GET['product_name']) && !empty($_GET['product_name'])){

$update = "TRUE";
$product_name = $_GET['product_name'];
$product_id = $_GET['product_id'];
$product_desc  = $_GET['product_desc'];
$product_qty = $_GET['product_qty'];
$product_sell = $_GET['product_sell'];
$product_purchase = $_GET['product_purchase'];
$product_weight = $_GET['product_weight'];
$product_feature = $_GET['product_feature'];
$product_publish = $_GET['product_publish'];
$product_cat = $_GET['product_cat'];
$product_cat_sub = $_GET['product_cat_sub'];
$product_cat_ssub = $_GET['product_cat_ssub'];
$product_img = $_GET['product_img'];
$product_min_quantity = $_GET['product_min_quantity'];
$tax_percantage = $_GET['tax_percantage'];




}
else{

$update= "FALSE";
$product_name = NULL;
$product_id = NULL;
$product_desc = NULL;
$product_qty = NULL;
$product_sell = NULL;
$product_purchase = NULL;
$product_weight = NULL;
$product_feature = NULL;
$product_publish = NULL;
$product_cat = NULL;
$product_cat_sub = NULL;
$product_cat_ssub = NULL;
$product_image = NULL;
$product_min_quantity = null;
$tax_percantage = null;




}





if($product_feature == 1){
$product_feature = 'CHECKED';
}else{
$product_feature = null;    
}

if($product_publish == 1){
$product_publish = 'CHECKED';
}else{
$product_publish = null;    
}




	
	//print_r($olddetails);
	//$vbid = "1";
	

   // $vbid = $_SESSION['vendorid'];
  //$branch = getbranches($logInId);
if(isset($_SESSION['vendor_id'])){
    $vbid = $_SESSION['vendor_id'];
}else{
    $vbid =null;
}
  
    
    $getcategories = $product->getallcategories($vbid);

if (isset($_POST["sc_id"])){
    $scid = $_POST["sc_id"];
    $hhtml = "";
        $getthirdlevel = $product->getthirdlevelbysecondlevelid($scid);
     foreach ($getthirdlevel as $third) {
         $hhtml .= '<option value="'.$third["ssc_id"].'">'. $third["ss_category"].'</option>';

     
     }
echo $hhtml;
}
if (isset($_POST["category_id"])){
        $categoryid = $_POST["category_id"];
        $html = "";
        $getsecondlevel = $product->getsecondlevelbycategoryid($categoryid);
     foreach ($getsecondlevel as $second) {
       
         $html .= '<option value="'.$second["sc_id"].'" "'.$select.'"">'. $second["sub_category"].'</option>';

        
     
     }
echo $html;
    
}
	
	

?>