<?php
session_start();
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

	
	//print_r($olddetails);
	//$vbid = "1";
	

   // $vbid = $_SESSION['vendorid'];
  //$branch = getbranches($logInId);

  $vbid = $_SESSION['vendor_id'];
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
         $html .= '<option value="'.$second["sc_id"].'">'. $second["sub_category"].'</option>';
     
     }
echo $html;
    
}
	
	

?>