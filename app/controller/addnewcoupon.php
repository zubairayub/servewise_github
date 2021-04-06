<?php
session_start();

defined('APPLICATION_INNERPATH') || define('APPLICATION_INNERPATH', realpath( dirname(__FILE__) . '/../'));


$PATH =  constant("APPLICATION_INNERPATH");

require $PATH . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'service_config.php'; 
$DB_CLASS =  $config_service['DB_CLASS'];
require_once $config_service['FUNCTIONS'];
require_once $DB_CLASS;
$query;
$db;	
$varr = new databaseManager();


$user_id = $_SESSION['logInId'];
$branch_id =  $_SESSION['branch_id'] ;

$coupon_name        = $_POST['coupon_name']         = isset($_POST['coupon_name']) ? $_POST['coupon_name'] : '';
$coupon_code        = $_POST['coupon_code']         = isset($_POST['coupon_code']) ? $_POST['coupon_code'] : '';
$min_shop           = $_POST['min_shop']            = isset($_POST['min_shop']) ? $_POST['min_shop'] : '';
$discount    = $_POST['discount']     = isset($_POST['discount']) ? $_POST['discount'] : '';
$discount_select           = $_POST['discount_select']            = isset($_POST['discount_select']) ? $_POST['discount_select'] : '';
$from_date       = $_POST['coupon_date_start']        = isset($_POST['coupon_date_start']) ? $_POST['coupon_date_start'] : '';
$to_date        = $_POST['coupon_date_end']         = isset($_POST['coupon_date_end']) ? $_POST['coupon_date_end'] : '';

$coupon_id        = $_POST['coupon_id']         = isset($_POST['coupon_id']) ? $_POST['coupon_id'] : '';

if(!empty($coupon_id)){
addcoupon($DB_CLASS,$user_id,$branch_id,$coupon_name,$coupon_code,$min_shop,$discount,$from_date,$to_date,$discount_select,'update',$coupon_id);

}else{
addcoupon($DB_CLASS,$user_id,$branch_id,$coupon_name,$coupon_code,$min_shop,$discount,$from_date,$to_date,$discount_select);

}

