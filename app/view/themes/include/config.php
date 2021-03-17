<?php
session_start();
defined('APPLICATION_PATH') || define('APPLICATION_PATH', realpath( dirname(__FILE__) . '/../../../../app')); 
const DS = DIRECTORY_SEPARATOR; 
require  APPLICATION_PATH . DS . 'lib'. DS .'functions.php';
$DB_CLASS =     APPLICATION_PATH . DS . 'model' . DS. 'classDatabaseManager.php';
$PRODUCT_DIRECTORY = '../../../upload/products/';
$logo_directory =  '../../../upload/logos/';

if(!empty($_SESSION['vb_id'])){

$vb_id = $_SESSION['vb_id'];
$type = $_SESSION['type'];
$domain_url =$_SESSION['domain_url']; 
$theme_id = $_SESSION['theme_id'];
$theme_title = $_SESSION['theme_title'];
$theme_url = $_SESSION['theme_url'];
$owner_id = $_SESSION['owner_id'];

$result = getproducts($vb_id,$DB_CLASS);

$branch_data = getbranchbybranchid($DB_CLASS,$vb_id);
$branch_name =  $_SESSION['branch_name'] = $branch_data[0]['name'];

$logo = $_SESSION['logo'] =  getlogo_dashboard($owner_id,$DB_CLASS,$logo_directory);





    $payment_method =   getpaymentmethods($DB_CLASS,$vb_id,'');
    foreach ($payment_method as $key => $value) {
    	if($value['status'] == 1){

$html = ' <option value="' .$value['method'] . '">' . $value['method'] .'</option>';

    	}
    }
      $pay_method = $_SESSION['pay_method'] = '<div class="viewcart-payment-detail">
        <label>Payment Method</label>
        <select name="payment-method">
        '. $html .'
         </select> 
          <input type="submit" name="submit" id="submit" class="mt-3 btn btn-pay w-100 d-flex justify-content-between btn-lg rounded-0" value="Submit">
      </div>';







}else{


header('Location: ../../../../public/');


}

?>
