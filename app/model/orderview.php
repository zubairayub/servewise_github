<?php
if(isset($_GET['order_id'])){

	$order_id =  $_GET['order_id'];
	$user_id = $_GET['user_id'];
	$datetime = $_GET['date'];
$type = getusertypes($type);
$type = $type[0]['title'];


  							$orderdata =  getordersdetailsbyid('',$order_id,'');
                           if(!empty($orderdata)){
                           $product_data = getproductnamebyid($orderdata[0]['product_id']);
                           $customer_data = getuserinfo($user_id,'');
                           $invoice_datails = getorderamountbyorderid('',$order_id);
                           $status_datails =  getorderstatusbyorderid('',$order_id);
                           $customer_email = $customer_data[0]['email_id'];
                           $customer_phone = $customer_data[0]['contact_no'];
                           $customer_country = $customer_data[0]['country'];
                           $order_status =  $status_datails[0]['title'];
                           $amount = $invoice_datails[0]['amount'];

                            $customer_address = $customer_data[0]['address'] .' ' .$customer_data[0]['address_2'];
                            if($customer_address == ''){
                            $customer_address = 'Not Mentioned';

                           }
                           if($customer_country == ''){
                            $customer_country = 'Not Mentioned';

                           }
                            if($customer_phone == ''){
                            $customer_phone = 'Not Mentioned';

                           }
                           if($invoice_datails[0]['status'] == 0){
                            $status_payment = 'Unpaid';

                           }else{

                           $status_payment = 'Paid';

                           }


                           if($customer_data[0]['first_name'] == ''){
$customer_name =   'Guest User' ;

                           }else{

                          $customer_name =   $customer_data[0]['first_name'] .' '. $customer_data[0]['last_name'] ;
                           }
                       }

}
?>