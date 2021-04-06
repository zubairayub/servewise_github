<?php
	$coupon_name =  NULL;
	$coupon_code = NULL;
	$coupon_min = NULL;
	$coupon_dis = NULL;
	$coupon_type = NULL;
	$coupon_from = NULL;
	$coupon_to = NULL;
	$coupon_id = null;
if(isset($_GET['action']) && !empty($_GET['action'])){

}else{
	if(isset($_GET['id'])){

	$data = 	getcouponse('',$branch_id,'',$_GET['id']);
$coupon_id = $_GET['id'];
	$coupon_name =  $data[0]['name'];
	$coupon_code = $data[0]['code'];
	$coupon_min = $data[0]['min_shipping'];
	$coupon_dis = $data[0]['amount'];
	$coupon_type = $data[0]['type'];
	$coupon_from = $data[0]['start_date'];
	$coupon_to = $data[0]['end_date'];
	}
}


?>