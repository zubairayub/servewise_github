<?php
REQUIRE '../../include/config.php';

if(!empty($_POST)){

$array['data']['product_name'] = $_POST['prod-name'];

$array['data']['product_price'] = $_POST['product_price'];
$array['data']['totals'] = $_POST['totals'];
$array['data']['products_quantity'] = $_POST['products_quantity'];
$final_total = $_POST['final_total'];
$payment_method = $_POST['payment_method'];
$customer_name = $_POST['name'];
$customer_email = $_POST['email'];
$customer_phone = $_POST['phone'];
$customer_country = $_POST['country'];
$customer_currency = $_POST['currency'];
$count = count($array['data']['product_name']);
print_r($array);
foreach($array as $key => $value): for($i=0; $i < $count; $i++) :
		$quantity =  $value['products_quantity'][$i]; 
		$product_name =  $value['product_name'][$i]; 
	
        $product_price =  $value['product_price'][$i]; 
        $totals =  $value['totals'][$i]; 
			




 endfor; 
endforeach;


//insert_notifications($DB_CLASS,'1','6','product_purchase','https://servewise.shop');
$dataall = register_user($DB_CLASS,$customer_email,$customer_name,$customer_phone);

print_r($dataall);
}


?>