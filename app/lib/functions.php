<?php
 require_once('owl.php');
if(!empty($dbcalss)){
include_once($dbcalss); 
} 
function get($name, $def= '')
{
	 return isset($_REQUEST[$name]) ? $_REQUEST[$name] : $def;
}




function checkvendornameandemail($dbclass= null,$name, $email)
{
	 if(!empty($dbclass)){
	
		include_once($dbclass);
	 }
	  $query;
	  $db;
 $varr = new databaseManager();
$varr->query="SELECT * FROM `vendor`  where name = '$name' AND email_id = '$email' ";
$result=$varr->executeQuery($varr->query,array(),"sread");

if(count($result) > 0){
return false;

}else{
	return true;

}

}




function checkbranchnameandemail($dbclass= null,$name, $email)
{
	 if(!empty($dbclass)){
	
		include_once($dbclass);
	 }
	  $query;
	  $db;
 $varr = new databaseManager();
$varr->query="SELECT * FROM `branch`  where name = '$name' AND email_id = '$email' ";
$result=$varr->executeQuery($varr->query,array(),"sread");

if(count($result) > 0){
return false;

}else{
	return true;

}

}








function deleteorder($dbclass= null,$order_id)
{
	 if(!empty($dbclass)){
	
		include_once($dbclass);
	 }
	  $query;
	  $db;
	  $varr = new databaseManager();

$varr->query="DELETE FROM `order_details` WHERE id = $order_id";
$result=$varr->executeQuery($varr->query,array(),"delete");

$varr->query="DELETE FROM `orders` WHERE order_id = $order_id";
$result=$varr->executeQuery($varr->query,array(),"delete");


$varr->query="DELETE FROM `invoice` WHERE order_id = $order_id";
$result=$varr->executeQuery($varr->query,array(),"delete");

$varr->query="DELETE FROM `order_status` WHERE order_id = $order_id";
$result=$varr->executeQuery($varr->query,array(),"delete");

return $result;



}




function deletevendor($dbclass= null,$vendor_id)
{
	 if(!empty($dbclass)){
	
		include_once($dbclass);
	 }
	  $query;
	  $db;
	  $varr = new databaseManager();

$varr->query="DELETE FROM `vendor` WHERE vendor_id = $vendor_id";
$result=$varr->executeQuery($varr->query,array(),"delete");

$varr->query="DELETE  FROM `branch` WHERE vendor_id = $vendor_id";
$result=$varr->executeQuery($varr->query,array(),"delete");




return $result;



}




function deleteallstaff($dbclass= null,$allstaff_id)
{
	 if(!empty($dbclass)){
	
		include_once($dbclass);
	 }
	  $query;
	  $db;
	  $varr = new databaseManager();

$varr->query="DELETE  FROM `user` WHERE user_id = $allstaff_id";
$result=$varr->executeQuery($varr->query,array(),"delete");

$varr->query="DELETE  FROM `staff` WHERE user = $allstaff_id";
$result=$varr->executeQuery($varr->query,array(),"delete");




return $result;



}







// function setlangcookie($lang){

	
//     unset($_COOKIE['lang']); 
//     setcookie('lang', null, -1, '/'); 
//   //  return true;

// 	$cookie_name = "lang";
// $cookie_value = $lang;
// setcookie($cookie_name, $cookie_value,0,'/'); 
// }


function getlangcookie() {
 if (isset($_COOKIE["lang"])){
   return $_COOKIE["lang"];
}
};




function getdefaultlanguage(){

	 if (isset($_COOKIE["lang"])){
 
 $df =  $_COOKIE["lang"];
}else{
	cookies();
}

$varr = "<ul class='default_option'>
					<li>
						<div class='option  $df '>
						<div class='icon'></div>
							<p> ". strtoupper($df) ." </p>
						</div>
					</li>
				</ul>"  ;


return $varr;

}


function cookies() {
 if (!isset($_COOKIE["lang"]) && empty($_COOKIE["lang"])){
 setcookie('lang','eng', time()+(60*60*24*31), '/'); 
  
}};


function getlang($dbclass= '',$word= '', $lang= '')
{
	 if(!empty($dbclass)){
	
		include_once($dbclass);
	 }
	  $query;
	 $db;
	 $varr = new databaseManager();

$varr->query="SELECT * FROM `languages`  where value = '$word'";
$result=$varr->executeQuery($varr->query,array(),"sread");

return $result[0][$lang];



}

function getthemebybranchid($id)
{
	if(!empty($dbclass)){
	
		include_once($dbclass);
	 }
	  $query;
	 $db;
	 $varr = new databaseManager();

$varr->query="SELECT * FROM `vb_themesetting`  where vb_id='$id'";
$result=$varr->executeQuery($varr->query,array(),"sread");

return $result;
}

function getallthemes()
{
	if(!empty($dbclass)){
	
		include_once($dbclass);
	 }
	  $query;
	 $db;
	 $varr = new databaseManager();

$varr->query="SELECT * FROM `themes`";
$result=$varr->executeQuery($varr->query,array(),"sread");

return $result;



}

function sendchat($dbcalss,$user_id,$branch_id,$text_message,$status = null){

if(!empty($dbclass)){
	
		include_once($dbclass);
	 }
	  $query;
	 $db;
	 $varr = new databaseManager();


	 if(empty($type)){
$varr->query="INSERT INTO `users_chat`(`user_id`, `branch_id`, `text`,`status`) VALUES (?,?,?,?)";
$result=$varr->executeQuery($varr->query,array($user_id,$branch_id,$text_message,$status),"create");

if(($status == 0) || empty($status)){

	$branch_owner_data =	getbranchbybranchid($dbcalss,$branch_id);
$owner_id = $branch_owner_data[0]['user_id'];
$link = 'viewchat_dashboard&user_id=' . $user_id ;
insert_notifications($dbcalss,$user_id,$owner_id,'message_recieved',$link);	
}


return $result;
}



}


function addcurrecny($dbcalss,$name,$symbol,$code,$rate,$action = null,$id= null){

if(!empty($dbclass)){
	
		include_once($dbclass);
	 }
	  $query;
	 $db;
	 $varr = new databaseManager();
//$symbol = mysqli_real_escape_string($varr,$symbol);

	 if($action == 'update'){
$varr->query="UPDATE  `currency` SET  name = ?,symbol = ?,code = ?,rate = ? where  id = $id ";
	$result=$varr->executeQuery($varr->query,array($name,$symbol,$code,$rate),"update");
	 }else{
$varr->query="INSERT INTO `currency`(`name`, `symbol`, `code`,`rate`) VALUES (?,?,?,?)";
$result=$varr->executeQuery($varr->query,array($name,$symbol,$code,$rate),"create");	 	
	 }




return $result;




}




function priceconverter($dbcalss,$amount){

if(!empty($dbclass)){
	
		include_once($dbclass);
	 }
	  $query;
	 $db;
	 $varr = new databaseManager();


$varr->query="SELECT * FROM `config`   where name  = 'def_currency' ";
$result=$varr->executeQuery($varr->query,array(),"sread");

$id = $result[0]['value'];

$varr->query="SELECT * FROM `currency`    where id  = $id ";
$result=$varr->executeQuery($varr->query,array(),"sread");

if($result[0]['id'] != 7 ){
$final_amount = $amount * $result[0]['rate'];

	$symbol = $result[0]['symbol'] ;
}
else{
	$final_amount = $amount;
	$symbol = '$' ;
}

 $data = array('amount' => $final_amount,'symbol' => $symbol );
return $data;


}

function setcurrecny($dbcalss,$id){

if(!empty($dbclass)){
	
		include_once($dbclass);
	 }
	  $query;
	 $db;
	 $varr = new databaseManager();

	$varr->query="UPDATE  `config` SET  value = ? where  name = 'def_currency' ";
	$result=$varr->executeQuery($varr->query,array($id),"update");




return $result;




}



function getcurrecny($id=null){

if(!empty($dbclass)){
	
		include_once($dbclass);
	 }
	  $query;
	 $db;
	 $varr = new databaseManager();
//$symbol = mysqli_real_escape_string($varr,$symbol);

	 


if(empty($id)){
$varr->query="SELECT * FROM `currency`    ";	
}else{
	$varr->query="SELECT * FROM `currency`   where id = $id ";	
}

$result=$varr->executeQuery($varr->query,array(),"sread");
return $result;




}


function getpaymentmethods($dbclass=null,$branch_id,$type=null){
if(!empty($dbclass)){
	
		include_once($dbclass);
	 }
	  $query;
	 $db;
	 $varr = new databaseManager();

if(empty($type)){
$varr->query="SELECT * FROM `vendor_payment_method` WHERE branch_id = $branch_id   ";	

}else{
$varr->query="SELECT * FROM `vendor_payment_method` WHERE branch_id = $branch_id AND method = '$type'   ";	

}
$result=$varr->executeQuery($varr->query,array(),"sread");


return $result;



}

function insertpaymentmethod($dbcalss,$user_id,$key,$secret,$title,$status){

if(!empty($dbclass)){
	
		include_once($dbclass);
	 }
	  $query;
	 $db;
	 $varr = new databaseManager();


$varr->query="SELECT * FROM `vendor_payment_method` WHERE branch_id = $user_id AND method = '$title'  ";	
$result=$varr->executeQuery($varr->query,array(),"sread");

if(empty($result)){
$varr->query="INSERT INTO `vendor_payment_method`(`branch_id`, `pay_key`, `secret`, `method`) VALUES (?,?,?,?)";
$result=$varr->executeQuery($varr->query,array($user_id,$key,$secret,$title),"create");

}else{
 if($status == 1){
 	$updatestatus = 0;
$varr->query="UPDATE  `vendor_payment_method` SET  status = ? where  branch_id = $user_id ";
	$result=$varr->executeQuery($varr->query,array($updatestatus),"update");
 }
	$varr->query="UPDATE  `vendor_payment_method` SET pay_key=? , secret = ? , status = ? where method = '$title' AND branch_id = $user_id ";
	$result=$varr->executeQuery($varr->query,array($key,$secret,$status),"update");

}



return $result;
}









function sendtickets($dbcalss=null,$sender_id,$reciever_id,$branch_id=null,$vendor_id=null,$message,$title=null,$ticket_id = null,$sender_email= null  ,$reciever_email = null,$priority = null){

if(!empty($dbclass)){
	
		include_once($dbclass);
	 }
	  $query;
	 $db;
	 $varr = new databaseManager();


	 if(empty($ticket_id)){
$varr->query="INSERT INTO `tickets`(`from_user`, `to_user`, `vendor_id`, `branch_id`,`title`,`priority`) VALUES (?,?,?,?,?,?)";
$result=$varr->executeQuery($varr->query,array($sender_id,$reciever_id,$vendor_id,$branch_id,$title,$priority),"create");

if(!empty($result)){

$ticket_id = $result[0]['id'];
$title_ticket = 'Ticket Generated ' . $title ;
$message_body = 'You recieved new ticket';
 sendEmail($reciever_email,$title_ticket,$sender_email,$message_body,$title_ticket);


}

}


if(!empty($message)){

$varr->query="INSERT INTO `tickets_conversation`(`ticket_id`, `reciever_id`, `sender_id`, `message`) VALUES (?,?,?,?)";
$result=$varr->executeQuery($varr->query,array($ticket_id,$reciever_id,$sender_id,$message),"create");


}




return $result;

}











function getchat($dbcalss,$user_id = NULL , $branch_id = NULL){

if(!empty($dbclass)){
	
		include_once($dbclass);
	 }
	  $query;
	 $db;
	 $varr = new databaseManager();


	 if(empty($branch_id)){
$varr->query="SELECT * FROM `users_chat`   where `user_id` = '$user_id' ";

}elseif(empty($user_id)){
$varr->query="SELECT * FROM `users_chat`   where  branch_id = '$branch_id' ";	
}else{
	$varr->query="SELECT * FROM `users_chat`   where `user_id` = '$user_id' and branch_id = '$branch_id' ";	
}

$result=$varr->executeQuery($varr->query,array(),"sread");

return $result;

}





function getticketsconversation($db_class = null,$t_id){

if(!empty($dbclass)){
	
		include_once($dbclass);
	 }
	  $query;
	 $db;
	 $varr = new databaseManager();





$varr->query="SELECT * FROM `tickets_conversation`  where ticket_id = $t_id ";

$result=$varr->executeQuery($varr->query,array(),"sread");

return $result;


}







function gettickets($dbcalss=null,$branch_id = NULL , $vendor_id = NULL,$user_id= null,$status = null){

if(!empty($dbclass)){
	
		include_once($dbclass);
	 }
	  $query;
	 $db;
	 $varr = new databaseManager();



if($status == 'Admin'){

$varr->query="SELECT * FROM `tickets` ";

}elseif($status == 'Vendor'){

$varr->query="SELECT * FROM `tickets` where branch_id = $branch_id ";

}
elseif($status == 'Brand'){

$varr->query="SELECT * FROM `tickets` where vendor_id = $vendor_id  ";


}
elseif($status == 'user'){
$varr->query="SELECT * FROM `tickets` where from_user = $user_id  OR to_user = $user_id ";
}


$result=$varr->executeQuery($varr->query,array(),"sread");

return $result;

}





function getuseridbychat($dbcalss,$branch_id = NULL){

if(!empty($dbclass)){
	
		include_once($dbclass);
	 }
	  $query;
	 $db;
	 $varr = new databaseManager();



$varr->query="SELECT DISTINCT `user_id`  FROM `users_chat`   where  branch_id = '$branch_id'  ";	


$result=$varr->executeQuery($varr->query,array(),"sread");

return $result;

}

function getnotifications($dbclass,$userid,$type = NULL){

if(!empty($dbclass)){
	
		include_once($dbclass);
	 }
	  $query;
	 $db;
	 $varr = new databaseManager();
if(empty($type)){
$varr->query="SELECT * FROM `notifications`   where `to_user_id` = '$userid'  ORDER BY id DESC";
$result=$varr->executeQuery($varr->query,array(),"sread");

return $result;
}


}


function process_order($dbclass=null,$order_data,$owner_id,$branch_id){

if(!empty($dbclass)){
	
		include_once($dbclass);
	 }
	  $query;
	 $db;
	 $varr = new databaseManager();


$array['data']['product_name'] = $order_data['prod-name'];

$array['data']['product_price'] = $order_data['product_price'];
$array['data']['totals'] = $order_data['totals'];
$array['data']['products_quantity'] = $order_data['products_quantity'];
$array['data']['product_id'] = $order_data['product_id'];
$final_total = $order_data['final_total'];
$payment_method = $order_data['payment_method'];
$customer_name = $order_data['name'];
$customer_email = $order_data['email'];
$customer_phone = $order_data['phone'];
$customer_country = $order_data['country'];
$customer_currency = $order_data['currency'];
$count = count($array['data']['product_name']);
$owner_id = $owner_id;
$branch_id = $branch_id;
if(empty($order_data['discount'])){
$discount = 0;

}else{

	$discount = $order_data['discount'];
}


if(empty($order_data['shipping_type'])){
$shipping_type = 1;

}else{

	$shipping_type = $order_data['shipping_type'];
}

if(empty($order_data['payment_method'])){
$payment_method = 1;

}else{

	$payment_method = 2;
}





//insert_notifications($DB_CLASS,'1','6','product_purchase','https://servewise.shop');
$dataall = register_user($dbclass,$customer_email,$customer_name,$customer_phone);

if(!empty($dataall)){


$purchaser_id = $dataall[0]['user_id'];

$order_details_id =  add_order_details($dbclass,$purchaser_id,$branch_id,$owner_id,$shipping_type,$payment_method);

if($order_details_id != 0){



	

//add order status
	$varr->query="INSERT INTO `order_status`(`order_id`, `status`) VALUES (?,?)";
	$result=$varr->executeQuery($varr->query,array($order_details_id,'1'),"create");
//create invoice
	$varr->query="	INSERT INTO `invoice`(`order_id`, `amount`, `discount`, `status`) VALUES (?,?,?,?)";
	$result=$varr->executeQuery($varr->query,array($order_details_id,$final_total,$discount,'0'),"create");

//insert each product details
	foreach($array as $key => $value): for($i=0; $i < $count; $i++) :
		$quantity =  $value['products_quantity'][$i]; 
		$product_name =  $value['product_name'][$i]; 	
        $product_price =  $value['product_price'][$i]; 
          $product_id =  $value['product_id'][$i]; 
        $totals =  $value['totals'][$i]; 

$product_data =  getproductbyid($dbclass,$product_id);

if($product_data[0]['quantity'] > 0){
		
		$varr->query="INSERT INTO `orders`(`product_id`, `product_quantity`, `product_price`, `product_total_price`, `order_id`) VALUES (?,?,?,?,?)";
	$result=$varr->executeQuery($varr->query,array($product_id,$quantity,$product_price,$totals,$order_details_id),"create");


if($result){
	$update_quantity = $product_data[0]['quantity'] - $quantity ; 

		$varr->query="UPDATE  `product` SET quantity=? where product_id = $product_id ";
					$result=$varr->executeQuery($varr->query,array($update_quantity),"update");

}	

}



 endfor; 
endforeach;

$branch_data  = getbranchbybranchid($dbclass,$branch_id);

echo $order_details_id;

$vendor_data = getvendors($dbclass,$branch_data[0]['vendor_id'],'FALSE');
if(!empty($vendor_data) && !empty($branch_data)){


//user -> branch -> vendor -> admin
insert_notifications($dbclass,$owner_id,$purchaser_id,'Order_initiate','https://servewise.shop/public');
insert_notifications($dbclass,$purchaser_id,$owner_id,'new_order','https://servewise.shop/public');
insert_notifications($dbclass,$owner_id,$branch_data[0]['vendor_id'],'new_order','https://servewise.shop/public');
insert_notifications($dbclass,$branch_data[0]['vendor_id'],'6','new_order','https://servewise.shop/public');

//send emails
$from_email_vendor = $vendor_data[0]['email_id'];
$from_email_branch = $branch_data[0]['email_id'];
$from_email_admin  = 'order@servewise.shop';
$purchaser_email   =  $customer_email;
$message_body_vendor = '<b>Hello! ' . $vendor_data[0]['name'] .'</b> <br>'. '<b> Congratulations - Your Branch'. $branch_data[0]['name'] . 'Got New Order </b>';
$message_body_admin = '<b>Hello!  Admin </b><br> <b> Congratulations - Your Vendor'. $vendor_data[0]['name'] . 'Got New Order from his branch' . $branch_data[0]['name'] .'</b>' ;
$message_body_branch = '<b> Hello! ' . $branch_data[0]['name'] .'</b> <br>'. '<b> Congratulations - Got New Order from  '. $customer_name .'</b>';
$message_body_user = '<b>Hello! ' . $customer_name. '</b><br> <b> Thank you for your purchase. We have received your online store order </b>';
$subject_admin = '<b>'.$vendor_data[0]['name'].' Got New Order! </b>';
$subject_vendor = '<b>'.$branch_data[0]['name'].' Got New Order! </b>';
$subject_branch = '<b>'. $customer_name.' Order From Your Store </b>';
$subject_user = 'Order Initiated';

			 sendEmail('admin@servewise.shop','ServeWise',$from_email_admin,$message_body_admin,$subject_admin);
			 sendEmail($from_email_vendor,'ServeWise',$from_email_admin,$message_body_vendor,$subject_vendor);
			 sendEmail($from_email_branch,'ServeWise',$from_email_vendor,$message_body_branch,$subject_branch);
			 sendEmail($purchaser_email,'ServeWise',$from_email_branch,$message_body_branch,$subject_branch);



}
}




}








// 	$varr->query="INSERT INTO `order_details`(`id`, `user_id`, `branch_id`, `branch_owner_id`, `shipping_type`, `payment_method`) VALUES (?,?,?,?,?,?)";
// 	$result=$varr->executeQuery($varr->query,array(NULL,$userid,$to_user_id,$type,$url,'0'),"create");

 



}



function insert_notifications($dbclass=null,$userid,$to_user_id,$type,$url){

if(!empty($dbclass)){
	
		include_once($dbclass);
	 }
	  $query;
	 $db;
	 $varr = new databaseManager();

	$varr->query="INSERT INTO `notifications`(`id`, `from_user_id`, `to_user_id`, `type`, `link`, `status`) VALUES (?,?,?,?,?,?)";
	$result=$varr->executeQuery($varr->query,array(NULL,$userid,$to_user_id,$type,$url,'0'),"create");

return $result;



}


function randomPassword() {
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}


function add_order_details($dbclass=null,$purchaser_id,$branch_id,$owner_id,$shipping_type,$payment_method){

if(!empty($dbclass)){
	
		include_once($dbclass);
	 }
	  $query;
	 $db;
	 $varr = new databaseManager();


$vendor_data = getbranchbybranchid('',$branch_id);
$vendor_id = $vendor_data[0]['vendor_id'];
$payment_method = 2;

$varr->query="INSERT INTO `order_details`( `user_id`, `branch_id`, `branch_owner_id`, `vendor_id`,`shipping_type`, `payment_method`) VALUES (?,?,?,?,?,?)";
				$result=$varr->executeQuery($varr->query,array($purchaser_id,$branch_id,$owner_id,$vendor_id,$shipping_type,$payment_method),"create");
if($result){
$last_id =  $result;




}else{
	$last_id = 0;
}
return $last_id;

}
function add_staff($dbclass=null,$userid,$ownerid,$type,$owner_type){
if(!empty($dbclass)){
	
		include_once($dbclass);
	 }
	  $query;
	 $db;
	 $varr = new databaseManager();

	 $varr->query="SELECT * FROM `staff`  where `user` = '$userid' ";
$result=$varr->executeQuery($varr->query,array(),"sread"); 
if($result == null){
$varr->query="INSERT INTO `staff`(`user`, `owner_id`, `type`, `owner_type`) VALUES (?,?,?,?)";
	$result=$varr->executeQuery($varr->query,array($userid,$ownerid,$type,$owner_type),"create");
	

}else{


	$varr->query="UPDATE  `staff` SET type=? where user = $userid ";
	$result=$varr->executeQuery($varr->query,array($type),"update");
	$varr->query="UPDATE  `user` SET type=? where user_id = $userid ";
	$result=$varr->executeQuery($varr->query,array($type),"update");

}

	return $result;

}




function get_staff($dbclass=null,$ownerid = null,$user_id = null){
if(!empty($dbclass)){
	
		include_once($dbclass);
	 }
	  $query;
	 $db;
	 $varr = new databaseManager();
if($ownerid != null){
	 $varr->query="SELECT * FROM `staff`  where `owner_id` = '$ownerid' ";
	$result=$varr->executeQuery($varr->query,array(),"sread"); 
	
}elseif($user_id != null){
	 $varr->query="SELECT * FROM `staff`  where `user` = '$user_id' ";
	$result=$varr->executeQuery($varr->query,array(),"sread"); 
}
else{
	 $varr->query="SELECT * FROM `staff` ";
	$result=$varr->executeQuery($varr->query,array(),"sread"); 
}
	return $result;

}


function register_user($dbclass=null,$useremail,$name,$phoneno,$type =  NULL){

if(!empty($dbclass)){
	
		include_once($dbclass);
	 }
	  $query;
	 $db;
	 $varr = new databaseManager();

$varr->query="SELECT * FROM `user`    where `email_id` = '$useremail' ";
$result=$varr->executeQuery($varr->query,array(),"sread");


if(count($result) == 0){
	$password = randomPassword();

	$status = 'active';
if($type == null){

	$type = 2;
}
	$email = $useremail;
$varr->query="insert into user(email_id,first_name,contact_no,password,status,type,created_date) values(?,?,?,?,?,?,CURRENT_DATE())";
				$result=$varr->executeQuery($varr->query,array($useremail,$name,$phoneno,$password,$status,$type),"create");
					

}else{


	$email = $result[0]['email_id'];
}

if($result){
						$varr->query="select * from user where email_id=?  ";
				$result=$varr->executeQuery($varr->query,array($email),"cread");
				if($result){
					
				
					return $result;
				}



}

}


function checkbranchlevel($country_id= NULL,$state_id= NULL,$city_id= NULL,$vendor_id= NULL,$dbclass = NULL)
{
$return = 1;

if(!empty($dbclass)){
	
		include_once($dbclass);
	 }
	

	 $query;
	 $db;
	 $varr = new databaseManager();

	if(!empty($city_id)){


		$varr->query="SELECT * FROM `branch`   where `vendor_id` = $vendor_id ";
		$result=$varr->executeQuery($varr->query,array(),"sread");
		foreach ($result as $key => $value) {
					
				$branch_id = $value['branch_id'];
		
		$varr->query="SELECT * FROM `subbranch_city` WHERE `branch_id` = $branch_id AND `city` = $city_id  ";
		$result=$varr->executeQuery($varr->query,array(),"sread");

		if(!empty($result)){

			$return =  2;
			 break;
			 	}else{

			$return = TRUE;

		}



				}
				return $return;		


	}elseif(!empty($state_id)){


		$varr->query="SELECT * FROM `branch`   where `vendor_id` = $vendor_id ";
		$result=$varr->executeQuery($varr->query,array(),"sread");
		foreach ($result as $key => $value) {
					
				$branch_id = $value['branch_id'];
		
		$varr->query="SELECT * FROM `subbranch_state` WHERE `branch_id` = $branch_id AND `state` = $state_id  ";
		$result=$varr->executeQuery($varr->query,array(),"sread");

		if(!empty($result)){
	    $varr->query="SELECT * FROM `subbranch_city` WHERE `branch_id` = $branch_id  ";
		$result = $varr->executeQuery($varr->query,array(),"sread");
if(empty($result)){

		$return =  3;
		 break;
	


}else{

	 $return =  $result;
}
			 	}else{

			$return = TRUE;

		}



				}
				return $return;		










	}elseif(!empty($country_id)){




	$varr->query="SELECT * FROM `branch`   where `vendor_id` = $vendor_id ";
		$result=$varr->executeQuery($varr->query,array(),"sread");
		foreach ($result as $key => $value) {
					
				$branch_id = $value['branch_id'];
		
		$varr->query="SELECT * FROM `subbranch_country` WHERE `branch_id` = $branch_id AND `country` = $country_id  ";
		$result=$varr->executeQuery($varr->query,array(),"sread");

		if(!empty($result)){

	    $varr->query="SELECT * FROM `subbranch_state` WHERE `branch_id` = $branch_id  ";
		$result = $varr->executeQuery($varr->query,array(),"sread");
if(empty($result)){

		$return =  4;
		 break;
	


}else{

	 $return =  $result;
}

			 	}else{

			$return = TRUE;

		}



				}
				return $return;		

















	}else{


		return 'Something Went Wrong';
	}








}

function updatetheme($branch_id,$theme_id){


		$query;
		 		$db;	
		
		
				$varr = new databaseManager();





				$varr->query="UPDATE  `vb_themesetting` SET theme_id=? where vb_id = $branch_id ";
					$result=$varr->executeQuery($varr->query,array($theme_id),"update");






}


function gettheme($url){
 				


 				$query;
		 		$db;	
		
		
				$varr = new databaseManager();


				$varr->query="SELECT * FROM `vb_themesetting`  where `domain_url` = '$url'";
				$result=$varr->executeQuery($varr->query,array(),"sread");
					if(!empty($result)){
						$data =  array();

						$data['vb_id'] = $_SESSION['vb_id'] = $result[0]['vb_id'];
						$data['type'] =  $_SESSION['type'] = $result[0]['type'];
						$data['domain_url'] =  $_SESSION['domain_url'] = $result[0]['domain_url'];
						$data['theme_id'] =  $_SESSION['theme_id'] = $result[0]['theme_id'];

					$varr = new databaseManager();
					$varr->query="SELECT * FROM `branch`   where `branch_id` = ".$data['vb_id']."";
					$result=$varr->executeQuery($varr->query,array(),"sread");


					$data['owner_id'] =  $_SESSION['owner_id'] = $result[0]['user_id'];


					$varr = new databaseManager();
					$varr->query="SELECT * FROM `themes`   where `id` = ".$data['theme_id']."";
					$result=$varr->executeQuery($varr->query,array(),"sread");
						
					$data['theme_title'] = $_SESSION['theme_title'] = $result[0]['title'];
					$data['theme_url'] =  $_SESSION['theme_url'] = $result[0]['theme_url'];
					$data['theme_url_dummy'] =  $_SESSION['theme_url_dummy'] = $result[0]['theme_url_dummy'];
					return $data;
					

					}







}


function getthemeurl($branch_id){

	$query;
		 		$db;	
		
		
				$varr = new databaseManager();


				$varr->query="SELECT * FROM `vb_themesetting`  where `vb_id` = '$branch_id'";
				$result=$varr->executeQuery($varr->query,array(),"sread");

				return $result;

}


function logout(){

// Finds all server sessions
session_start();
// Stores in Array
$_SESSION = array();
// Swipe via memory
if (ini_get("session.use_cookies")) {
    // Prepare and swipe cookies
    $params = session_get_cookie_params();
    // clear cookies and sessions
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httpsonly"], $params["httponly"]
    );
}
// Just in case.. swipe these values too
ini_set('session.gc_max_lifetime', 0);
ini_set('session.gc_probability', 1);
ini_set('session.gc_divisor', 1);
// Completely destroy our server sessions..
session_destroy();

?>

<script>window.location.replace("https://servewise.shop/public");</script>

<?php
// header('Location: https://servewise.shop/public/?page=home');

// exit();

}



function getlogo_dashboard($userid = null,$dbclass = null,$directory = null){



if(!empty($dbclass)){
		
		require_once($dbclass);
		
	}
	$query;
	$db;
	$varr = new databaseManager();

	if(empty($userid)){
		$varr->query = "SELECT * FROM `config` where name='logo'  AND userid= 16 ";
	}else{
		$varr->query = "SELECT * FROM `config` where name='logo' AND userid = $userid ";
	}
	$result = $varr->executeQuery($varr->query,array(),"sread");
	


	if(empty($result))
	{
		$logo = $directory.'logo.jpg';
	}else{

		$logo = $directory.$result[0]['value'];
	}
	return $logo;




}



function getlogo($dbclass = null,$directory = null,$vendor_id = null){

if(!empty($dbclass)){
		
		include_once($dbclass);
	
	}
	$query;
	$db;
	$varr = new databaseManager();

	if(empty($vendor_id)){
		$varr->query = "SELECT * FROM `config` where name='logo'  AND userid= 6 ";
	}else{
$varr->query = "SELECT * FROM `config` where name='logo'  AND userid= $vendor_id ";
	}
	
	$result = $varr->executeQuery($varr->query,array(),"sread");

	if(empty($result))
	{
		$logo = $directory.'logo.jpg';
	}else{

		$logo = $directory.$result[0]['value'];
	}
	return $logo;




}


function getpickuppoint($user_id = NULL){
	if(!empty($dbclass)){
		include_once($dbclass);
	}
	$query;
	$db;
	$varr = new databaseManager();
	if(empty($usery_id)){
		$varr->query = "SELECT * FROM `order_product` ";
	}else{
		$varr->query = "SELECT * FROM `order_product` where user_id=$user_id";
	}
	$result = $varr->executeQuery($varr->query,array(),"sread");
	return $result;
}

function getviewproduct($vb_id =  NULL){

	if(!empty($dbclass)){
	
			include_once($dbclass);
	
	}
					 $query;
					 $db;	
			
			
					$varr = new databaseManager();
	
					if(empty($vb_id)){
						$varr->query="SELECT * FROM `product` ";
   
				   }else{
						$varr->query="SELECT * FROM `product`  where vb_id=$vb_id ";
						
						
				   }	
				$result=$varr->executeQuery($varr->query,array(),"sread");
					
				return  $result;
	
	}

function getcategorybyid($cat_id = NULL){
	if(!empty($dbclass)){
		include_once($dbclass);
	}
	$query;
	$db;
	$varr = new databaseManager();
	if(empty($cat_id)){
		$varr->query = "SELECT * FROM `category` ";
	}else{
		$varr->query = "SELECT * FROM `category` where category_id=$cat_id";
	}
	$result = $varr->executeQuery($varr->query,array(),"sread");
	return $result;
}
function getsubcategorybyid($sc_id = NULL){
	if(!empty($dbclass)){
		include_once($dbclass);
	}
	$query;
	$db;
	$varr = new databaseManager();
	if(empty($sc_id)){
		$varr->query = "SELECT * FROM `subcategory_2_level` ";
	}else{
		$varr->query = "SELECT * FROM `subcategory_2_level` where sc_id=$sc_id";
	}
	$result = $varr->executeQuery($varr->query,array(),"sread");
	return $result;
}
function getsubsubcategorybyid($ssc_id = NULL){
	if(!empty($dbclass)){
		include_once($dbclass);
	}
	$query;
	$db;
	$varr = new databaseManager();
	if(empty($ssc_id)){
		$varr->query = "SELECT * FROM `subcategory_3_level` ";
	}else{
		$varr->query = "SELECT * FROM `subcategory_3_level` where ssc_id=$ssc_id";
	}
	$result = $varr->executeQuery($varr->query,array(),"sread");
	return $result;
}


function getcustomerlist($vb_id =  NULL, $type = null){

	if(!empty($dbclass)){
	
			include_once($dbclass);
	
	}
					 $query;
					 $db;	
			
			
					$varr = new databaseManager();
	
					if($type == 'Branch'){
						$varr->query="SELECT DISTINCT user_id,branch_id,Vendor_id FROM `order_details` where branch_id = '$vb_id' ";
   
				   }elseif($type == 'Vendor'){
						$varr->query="SELECT DISTINCT user_id,branch_id,Vendor_id FROM `order_details` where vendor_id = '$vb_id' ";
					
						
				   }elseif($type == 'Admin'){

					$varr->query="SELECT DISTINCT user_id,branch_id,Vendor_id FROM `order_details` ";

				   }else{

				   	return 0;
				   }	
				$result=$varr->executeQuery($varr->query,array(),"sread");
					
				return  $result;
	
	}


function getcustomerinfo($user_id =  NULL){

	if(!empty($dbclass)){
	
			include_once($dbclass);
	
	}
					 $query;
					 $db;	
			
			
					$varr = new databaseManager();
	
					if(empty($user_id)){
						$varr->query="SELECT * FROM `user` ";
   
				   }else{
						$varr->query="SELECT * FROM `vendor`  where user_id=$user_id ";
						$result=$varr->executeQuery($varr->query,array(),"sread");
						$usr_id = $result[0]['user_id'];
						$varr->query="SELECT * FROM `user  where user_id=$usr_id ";
				   }	
				$result=$varr->executeQuery($varr->query,array(),"sread");
					
				return  $result;
	
	}

function getuserinfo($user_id =  NULL,$dbclass = NULL){

	if(!empty($dbclass)){
	
			include_once($dbclass);
	
	}
					 $query;
					 $db;	
			
			
					$varr = new databaseManager();
	
					if(empty($user_id)){
						 $varr->query="SELECT * FROM `user` ";
	
					}else{
						$varr->query="SELECT * FROM `user`  where user_id=$user_id ";
	
					}
						
				
			
			
				$result=$varr->executeQuery($varr->query,array(),"sread");
				return  $result;
	
	}

function getuserinfobyemail($user_id =  NULL,$dbclass = NULL){

	if(!empty($dbclass)){
	
			include_once($dbclass);
	
	}
					 $query;
					 $db;	
			
			
					$varr = new databaseManager();
	
					if(empty($user_id)){
						 $varr->query="SELECT * FROM `user` ";
	
					}else{
						$varr->query="SELECT * FROM `user`  where email_id = '$user_id' ";
	
					}
						
				
			
			
				$result=$varr->executeQuery($varr->query,array(),"sread");
				return  $result;
	
	}

	function getproductinfo($pid =  NULL){

		if(!empty($dbclass)){
		
				include_once($dbclass);
		
		}
						 $query;
						 $db;	
				
				
						$varr = new databaseManager();
		
						if(empty($user_id)){
							 $varr->query="SELECT * FROM `product` ";
		
						}else{
							$varr->query="SELECT * FROM `product`  where user_id=$pid ";
		
						}
							
					
				
				
					$result=$varr->executeQuery($varr->query,array(),"sread");
					return  $result;
		
		}



		function getproductbyid($dbclass =null ,$pid =  NULL){

		if(!empty($dbclass)){
		
				include_once($dbclass);
		
		}
						 $query;
						 $db;	
				
				
						$varr = new databaseManager();
		
						
							$varr->query="SELECT * FROM `product`  where product_id=$pid ";
		
						
							
					
				
				
					$result=$varr->executeQuery($varr->query,array(),"sread");
					return  $result;
		
		}

function getabandoncart($user_id =  NULL){

	if(!empty($dbclass)){
	
			include_once($dbclass);
	
	}
					 $query;
					 $db;	
			
			
					$varr = new databaseManager();
	
					if(empty($user_id)){
						 $varr->query="SELECT * FROM `abandon_cart` ";
	
					}else{
						$varr->query="SELECT * FROM `abandon_cart`  where user_id=$user_id ";
	
					}
						
				
			
			
				$result=$varr->executeQuery($varr->query,array(),"sread");
				return  $result;
	
	}

function getordersdetailsbyid($dbclass = null, $order_id,$branch_id = null){
if(!empty($dbclass)){

		include_once($dbclass);

}

 				$query;
		 		$db;	
				
		
				$varr = new databaseManager();

				
	            $varr->query="SELECT * FROM `orders`  where order_id= '$order_id'  ";	
			    $result=$varr->executeQuery($varr->query,array(),"sread");
			    return  $result;




}


function getorderamount($dbclass = null, $user_id = null , $type){
if(!empty($dbclass)){

		include_once($dbclass);

}

 				$query;
		 		$db;	
				
		
				$varr = new databaseManager();

				if($type == 'Admin'){
  						$varr->query="SELECT sum(amount) as totalamount FROM `invoice`     ";	




				}elseif($type == 'Vendor'){
					   $varr->query="SELECT sum(invoice.amount) as totalamount FROM `invoice` INNER JOIN order_details where  order_details.Vendor_id = '$user_id'  AND  order_details.id = invoice.order_id";	

				}elseif($type == 'Branch'){
					  	

					  	 $varr->query="SELECT sum(invoice.amount) as totalamount FROM `invoice` INNER JOIN order_details where  order_details.branch_owner_id = '$user_id'  AND  order_details.id = invoice.order_id";	

				}
	          
			    $result=$varr->executeQuery($varr->query,array(),"sread");
			    return  $result;




}




function getorderamountbyorderid($dbclass = null, $order_id){
if(!empty($dbclass)){

		include_once($dbclass);

}

 				$query;
		 		$db;	
				
		
				$varr = new databaseManager();

				
	            $varr->query="SELECT * FROM `invoice`  where order_id= '$order_id'  ";	
			    $result=$varr->executeQuery($varr->query,array(),"sread");
			    return  $result;




}


function getorderstatusbyorderid($dbclass = null, $order_id){
if(!empty($dbclass)){

		include_once($dbclass);

}

 				$query;
		 		$db;	
				
		
				$varr = new databaseManager();

				
	            $varr->query="SELECT * FROM `order_status`  where order_id= '$order_id'  ";	
			    $result=$varr->executeQuery($varr->query,array(),"sread");
			   
			    if($result){

			    	$status_id = $result[0]['status'];
			    	$varr->query="SELECT * FROM `order_process`   where id= '$status_id'  ";	
			    $result=$varr->executeQuery($varr->query,array(),"sread");


			    }

			    return  $result;




}



function progress_dashboard_weekly($dbcalss = null,$user_id =  NULL,$type =  NULL){

if(!empty($dbclass)){

		include_once($dbclass);

}
 				$query;
		 		$db;	
		
		$y_orders = 100;

		
				$varr = new databaseManager();

				if(empty($user_id)){
	                
	                 $weekly_order = $varr->query="SELECT *FROM order_details WHERE YEARWEEK(datetime) = YEARWEEK(NOW())";

	                 $weekly_deliverd_order = $varr->query="SELECT * FROM `order_details` INNER JOIN order_status where YEARWEEK(order_details.datetime) = YEARWEEK(NOW()) and order_details.id = order_status.order_id  and status = '4' ";

	                  $weekly_route_order = $varr->query="SELECT * FROM `order_details` INNER JOIN order_status where YEARWEEK(order_details.datetime) = YEARWEEK(NOW()) and order_details.id = order_status.order_id  and status = '3' ";
	                  $weekly_returned_order = $varr->query="SELECT * FROM `order_details` INNER JOIN order_status where YEARWEEK(order_details.datetime) = YEARWEEK(NOW()) and order_details.id = order_status.order_id  and status = '5' ";
	                   $weekly_store_pickup_order = $varr->query="SELECT * FROM `order_details` INNER JOIN order_status where YEARWEEK(order_details.datetime) = YEARWEEK(NOW()) and order_details.id = order_status.order_id  and status = '6' ";
				
				}else{

					

					if($type == 'Branch'){
							

							 $weekly_order = $varr->query="SELECT * FROM order_details WHERE order_details.branch_owner_id=$user_id AND YEARWEEK(datetime) = YEARWEEK(NOW())";

	                 $weekly_deliverd_order = $varr->query="SELECT * FROM `order_details` INNER JOIN order_status where order_details.branch_owner_id=$user_id AND YEARWEEK(order_details.datetime) = YEARWEEK(NOW()) and order_details.id = order_status.order_id  and status = '4' ";

	                  $weekly_route_order = $varr->query="SELECT * FROM `order_details` INNER JOIN order_status where order_details.branch_owner_id=$user_id AND YEARWEEK(order_details.datetime) = YEARWEEK(NOW()) and order_details.id = order_status.order_id  and status = '3' ";
	                  $weekly_returned_order = $varr->query="SELECT * FROM `order_details` INNER JOIN order_status where order_details.branch_owner_id=$user_id AND YEARWEEK(order_details.datetime) = YEARWEEK(NOW()) and order_details.id = order_status.order_id  and status = '5' ";
	                   $weekly_store_pickup_order = $varr->query="SELECT * FROM `order_details` INNER JOIN order_status where order_details.branch_owner_id=$user_id AND YEARWEEK(order_details.datetime) = YEARWEEK(NOW()) and order_details.id = order_status.order_id  and status = '6' ";








					}
					elseif($type == 'Vendor'){

							



								 $weekly_order = $varr->query="SELECT * FROM order_details WHERE order_details.Vendor_id=$user_id AND YEARWEEK(datetime) = YEARWEEK(NOW())";

	                 $weekly_deliverd_order = $varr->query="SELECT * FROM `order_details` INNER JOIN order_status where order_details.Vendor_id=$user_id AND YEARWEEK(order_details.datetime) = YEARWEEK(NOW()) and order_details.id = order_status.order_id  and status = '4' ";

	                  $weekly_route_order = $varr->query="SELECT * FROM `order_details` INNER JOIN order_status where order_details.Vendor_id=$user_id AND YEARWEEK(order_details.datetime) = YEARWEEK(NOW()) and order_details.id = order_status.order_id  and status = '3' ";
	                  $weekly_returned_order = $varr->query="SELECT * FROM `order_details` INNER JOIN order_status where order_details.Vendor_id=$user_id AND YEARWEEK(order_details.datetime) = YEARWEEK(NOW()) and order_details.id = order_status.order_id  and status = '5' ";
	                   $weekly_store_pickup_order = $varr->query="SELECT * FROM `order_details` INNER JOIN order_status where order_details.Vendor_id=$user_id AND YEARWEEK(order_details.datetime) = YEARWEEK(NOW()) and order_details.id = order_status.order_id  and status = '6' ";




					}elseif($type == 'User'){
							


								 $weekly_order = $varr->query="SELECT * FROM order_details WHERE order_details.user_id=$user_id AND YEARWEEK(datetime) = YEARWEEK(NOW())";

	                 $weekly_deliverd_order = $varr->query="SELECT * FROM `order_details` INNER JOIN order_status where order_details.user_id=$user_id AND YEARWEEK(order_details.datetime) = YEARWEEK(NOW()) and order_details.id = order_status.order_id  and status = '4' ";

	                  $weekly_route_order = $varr->query="SELECT * FROM `order_details` INNER JOIN order_status where order_details.user_id=$user_id AND YEARWEEK(order_details.datetime) = YEARWEEK(NOW()) and order_details.id = order_status.order_id  and status = '3' ";
	                  $weekly_returned_order = $varr->query="SELECT * FROM `order_details` INNER JOIN order_status where order_details.user_id=$user_id AND YEARWEEK(order_details.datetime) = YEARWEEK(NOW()) and order_details.id = order_status.order_id  and status = '5' ";
	                   $weekly_store_pickup_order = $varr->query="SELECT * FROM `order_details` INNER JOIN order_status where order_details.user_id=$user_id AND YEARWEEK(order_details.datetime) = YEARWEEK(NOW()) and order_details.id = order_status.order_id  and status = '6' ";

					}
				

				}
					
				
		
		
				$weekly_deliverd_order =$varr->executeQuery($weekly_deliverd_order,array(),"sread");
				$weekly_order =$varr->executeQuery($weekly_order,array(),"sread");

				$weekly_route_order =$varr->executeQuery($weekly_route_order,array(),"sread");
				$weekly_returned_order =$varr->executeQuery($weekly_returned_order,array(),"sread");
				$weekly_store_pickup_order =$varr->executeQuery($weekly_store_pickup_order,array(),"sread");

				
				$result['weekly_deliverd_order'] = count($weekly_deliverd_order);
				$result['weekly_order'] = count($weekly_order);
				$result['weekly_route_order'] = count($weekly_route_order);
				$result['weekly_returned_order'] = count($weekly_returned_order);
				$result['weekly_store_pickup_order'] = count($weekly_store_pickup_order);




				


			return  $result;

}




function getorders($user_id =  NULL,$type =  NULL){

if(!empty($dbclass)){

		include_once($dbclass);

}
 				$query;
		 		$db;	
		
		
				$varr = new databaseManager();

				if(empty($user_id)){
	                 $varr->query="SELECT * FROM `order_details` ORDER BY id DESC ";

				}else{

					

					if($type == 'Branch'){
							$varr->query="SELECT * FROM `order_details`  where branch_owner_id=$user_id ORDER BY id DESC ";

					}
					elseif($type == 'Vendor'){

							$varr->query="SELECT * FROM `order_details`  where Vendor_id = '$user_id' ORDER BY id DESC ";

					}elseif($type == 'User'){
							$varr->query="SELECT * FROM `order_details`  where user_id=$user_id  ORDER BY id DESC";

					}
				

				}
					
				
		
		
			$result=$varr->executeQuery($varr->query,array(),"sread");
			return  $result;

}


function getproductnamebyid($product_id =  NULL){

if(!empty($dbclass)){

		include_once($dbclass);

}
 				$query;
		 		$db;	
		
		
				$varr = new databaseManager();

				
						$varr->query="SELECT * FROM `product`  where product_id=$product_id ";

				
		
		
			$result=$varr->executeQuery($varr->query,array(),"sread");
			return  $result;

}




function getorderstatus($op_id =  NULL){

if(!empty($dbclass)){

		include_once($dbclass);

}
 				$query;
		 		$db;	
		
		
				$varr = new databaseManager();

				
						$varr->query="SELECT * FROM `orders`  where op_id=$op_id ";

				
		
		
			$result=$varr->executeQuery($varr->query,array(),"sread");
			return  $result;

}



function getordersalestatus($order_id =  NULL){

if(!empty($dbclass)){

		include_once($dbclass);

}
 				$query;
		 		$db;	
		
		
				$varr = new databaseManager();

				
				$varr->query="SELECT sale_id FROM `orderandsale`  where order_id=$order_id ";
				$result=$varr->executeQuery($varr->query,array(),"sread");
				$sale_id = $result[0]['sale_id'];
				$varr->query="SELECT * FROM `sale`  where sale_id=$sale_id ";
				$result=$varr->executeQuery($varr->query,array(),"sread");
			


			return  $result;

}

function getstock($vbid,$dbclass =  NULL,$type = null){



if(!empty($dbclass)){

		include_once($dbclass);

}
 				$query;
		 		$db;	
		
		
				$varr = new databaseManager();

				if($type == 'Branch'){
						$varr->query="SELECT * FROM `product` where vb_id=$vbid ";
				}elseif($type == 'Vendor'){
						$varr->query="SELECT *
FROM branch
INNER JOIN product ON branch.vendor_id= '$vbid' AND branch.branch_id = product.vb_id ";
				}elseif($type == 'Admin'){
					    $varr->query="SELECT * FROM `product` " ;
				}
				

				
		
		
			$result=$varr->executeQuery($varr->query,array(),"sread");
			return  $result;

}


function getoutofstockproducts($vbid,$dbclass =  NULL,$type = null){



if(!empty($dbclass)){

		include_once($dbclass);

}
 				$query;
		 		$db;	
		
		
				$varr = new databaseManager();

				if(!empty($vbid)){
					if($type == 'Branch'){
		$varr->query="SELECT * FROM `product` where vb_id=$vbid AND quantity < 5";
					}else{
		$varr->query="SELECT *
FROM branch
INNER JOIN product ON branch.vendor_id= '$vbid' AND branch.branch_id = product.vb_id ";
					}
		

				}else{
					$varr->query="SELECT * FROM `product` where quantity < 5 ";
				}
						

				
		
		
			$result=$varr->executeQuery($varr->query,array(),"sread");
			return  $result;

}



function getproductsamount($vbid,$dbclass =  NULL,$type = null){



if(!empty($dbclass)){

		include_once($dbclass);

}
 				$query;
		 		$db;	
		
		
				$varr = new databaseManager();

				if(!empty($vbid)){
					if($type == 'Branch'){
$varr->query="SELECT sum(price) as productamount FROM `product` where vb_id=$vbid ";
 					}else{

$varr->query="SELECT sum(price) as productamount
FROM product
INNER JOIN branch ON branch.vendor_id= '$vbid' AND branch.branch_id = product.vb_id ";	

	  
					}
				

				}else{
					$varr->query="SELECT sum(price) as productamount FROM `product` ";
				}
						

				
		
		
			$result=$varr->executeQuery($varr->query,array(),"sread");
			return  $result;

}

function getproducts($vbid,$dbclass =  NULL,$type = null){



if(!empty($dbclass)){

		include_once($dbclass);

}
 				$query;
		 		$db;	
		
		
				$varr = new databaseManager();

				if(!empty($vbid)){
					if($type == 'Vendor'){
$varr->query="SELECT * FROM `product` INNER JOIN branch where branch.vendor_id='$vbid' AND product.vb_id = branch.branch_id  ";
					}else{
				$varr->query="SELECT * FROM `product` where vb_id=$vbid ";
}
				}else{
					$varr->query="SELECT * FROM `product` ";
				}
						

				
		
		
			$result=$varr->executeQuery($varr->query,array(),"sread");
			return  $result;

}

function getproductsimages($pid,$dbclass =  NULL){

if(!empty($dbclass)){

		include_once($dbclass);

}
 				$query;
		 		$db;	
		
		
				$varr = new databaseManager();

				if(empty($id)){
						$varr->query="SELECT * FROM `images`   where product_id=$pid ";

				}
		
		
			$result=$varr->executeQuery($varr->query,array(),"sread");
			return  $result;

}



function getusertypes($id = NULL)
{

				 $query;
		 		$db;	
		
		
				$varr = new databaseManager();

				if(empty($id)){
						$varr->query="SELECT * FROM `user_type`";

				}else{


						$varr->query="SELECT * FROM `user_type` where id=$id";

				}
		
		
			$result=$varr->executeQuery($varr->query,array(),"sread");
			return  $result;
	 

}








function ispermissionallowed($usertypeid = NULL,$from  = NULL)
{

				 $query;
		 		$db;	
		
		
				$varr = new databaseManager();
		
			$varr->query="SELECT * FROM `permissions` where user_type_id = $usertypeid AND $from";
			$result=$varr->executeQuery($varr->query,array(),"sread");
			return  $result;
	 

}




function getmenu()
{

				 $query;
		 		$db;	
		
		
				$varr = new databaseManager();
		
			$varr->query="select * from menu ";
			$result=$varr->executeQuery($varr->query,array(),"sread");
			return  $result;
	 

}




function getvendors($dbclass = null ,$user_id = NULL,$owner = NULL)
{
		if(!empty($dbclass)){

		include_once($dbclass);

}


				 $query;
		 		$db;	
		
		 
				$varr = new databaseManager();
					if(!empty($user_id)){
						IF($owner == "FALSE"){
$varr->query="SELECT * FROM `vendor`  where vendor_id = $user_id";

						}ELSE{

$varr->query="SELECT * FROM `vendor`  where user_id = $user_id";
}
		}else{

			$varr->query="SELECT * FROM `vendor` ";
		}
		
			
			$result=$varr->executeQuery($varr->query,array(),"sread");
			return  $result;
	 

}


function getbranchbybranchid($dbclass = null , $branch_id)
{

	if(!empty($dbclass)){

		include_once($dbclass);

}

				 $query; 
		 		$db;	
		
		 
				$varr = new databaseManager();
		
			$varr->query="SELECT * FROM `branch` where branch_id='$branch_id' ";
			
			$result=$varr->executeQuery($varr->query,array(),"sread");
     		


			return  $result;
	 

}




function getbranches($user_id =  NULL, $owner = NULL)
{

				 $query; 
		 		$db;	
		
		 
				$varr = new databaseManager();
		if(!empty($user_id)){
			IF($owner == "TRUE"){
$varr->query="SELECT * FROM `branch` where user_id=$user_id ";

			}else{
$varr->query="SELECT * FROM `branch` INNER JOIN vendor  where vendor.user_id='$user_id' AND  vendor.vendor_id=branch.vendor_id";

			}
		}else{

			$varr->query="SELECT * FROM `branch` ";
		}
			
			$result=$varr->executeQuery($varr->query,array(),"sread");
     		

			// $themesurl = '?domain=';
   //         $varr->query="SELECT * FROM `vb_themesetting`  where vb_id=$user_id";
   //        $resulttheme = $varr->executeQuery($varr->query,array(),"sread");
   //        if(!empty($resulttheme)){

   //        	$themesurl = $themesurl.$result[0]['domain_url'];
   //        	$result[] = $themesurl;

   //         }

			return  $result;
	 

}









function getstatus($status_id)
{

				$query;
		 		$db;	
		
		 
				$varr = new databaseManager();
		
			$varr->query="SELECT title FROM `user_type`  where id=$status_id";
			$result=$varr->executeQuery($varr->query,array(),"sread");
			return  $result[0]['title'];
	 

}





function getsubmenu($menuid)
{

		 $query;
		 $db;	
		
		
				$varr = new databaseManager();
		
			$varr->query="select * from sub_menu  where menu_id = $menuid ";
			$result=$varr->executeQuery($varr->query,array($menuid),"sread");
			return  $result;
	 

}


function checkpermission_menu($user_type_id,$menu_id)
{

		 $query;
		 $db;	
		
		
				$varr = new databaseManager();
		
			$varr->query="select id from permissions  where menu_id = $menu_id and user_type_id = $user_type_id";
			$result=$varr->executeQuery($varr->query,array($menu_id),"sread");
			return  $result;
	 

}



function checkpermission_submenu($user_type_id,$submenu_id)
{

		 $query;
		 $db;	
		
		
				$varr = new databaseManager();
		
			$varr->query="select id from permissions  where submenu_id = $submenu_id and user_type_id = $user_type_id ";
			$result=$varr->executeQuery($varr->query,array($submenu_id),"sread");
			return  $result;
	 

}




function upload_logo($user_id,$url,$dbclass)
{
	include_once($dbclass);

		 $query;
		 $db;	
		
		
				$varr = new databaseManager();
				//check if logo is uploaded already or not

				$varr->query="SELECT * FROM `config` where userid = $user_id AND name = 'logo' ";
				$result=$varr->executeQuery($varr->query,array($user_id,'logo'),"sread");


				if($result){

					$varr->query="UPDATE  `config` SET value=? where userid = $user_id ";
					$result=$varr->executeQuery($varr->query,array($url),"update");

				}else{

					$varr->query="INSERT INTO `config`( `id`,`name`, `value`, `userid`) 
			VALUES (?,?,?,?) ";
			$result=$varr->executeQuery($varr->query,array(NULL,'logo',$url,$user_id),"create");

				}
			
			return $result;
			 
	 

}




function upload_file($name,$ext,$fileTmpPath,$fileSize = NULL,$fileType = NULL,$fileNameCmps = NULL,$directory)
{

		$logo=$name;
	//echo $logo;
	 
 $explogo=explode('.',$logo);
 $ext = pathinfo($logo, PATHINFO_EXTENSION);
 $logoexptype=$explogo[1];

 date_default_timezone_set('Australia/Melbourne');
 $date = date('m/d/Yh:i:sa', time());
 $rand=rand(10000,99999);
 $encname=$date.$rand;
 $logoname=md5($encname).'.'.$ext;
 $logopath=$directory . $logoname;
 if(!empty($ext)){
  move_uploaded_file($fileTmpPath,$logopath);
   
}else{
	 $logoname = false;
}
	return  $logoname;




}



function get_user_logo($user_id)
{

	 $query;
		 $db;	
		
		
				$varr = new databaseManager();
		
		$varr->query="SELECT * FROM `config` where userid = $user_id AND name = 'logo' ";
		$result=$varr->executeQuery($varr->query,array($user_id,'logo'),"sread");
			return  $result;






}










function switcher($action,$type,$dbclass)
{

	include_once($dbclass);

	 $query;
	 $db;	

		
		
		$varr = new databaseManager();
		
		$varr->query="UPDATE `config` SET `value`=? WHERE `name`='$type'  ";
					$result=$varr->executeQuery($varr->query,array($action),"update");

					return $result;







}



function get_config_system($user_id = NULL)
{

	

	 $query;
	 $db;	

		
		
		$varr = new databaseManager();
		if(empty($user_id)){
			$varr->query="SELECT * FROM `config` where userid = 0  ";
	
		}else{
			$varr->query="SELECT * FROM `config` where userid = $user_id  ";
	
		}
		$result=$varr->executeQuery($varr->query,array(),"sread");
		return  $result;







}

function search_array($id, $array) {
   foreach ($array as $key => $val) {
       if ($val['name'] === $id) {
           return $val;
       }
   }
   return null;
}




function isLogin(){

if(empty($_SESSION['logInId'])){


return false;


}else{

  return true;
}




}




function approve_vendor($userid,$vendor_id,$action,$dbclass){
include_once($dbclass);
	 $query;
	 $db;	

		
		
		$varr = new databaseManager();
if($action == 'approve'){

$status = 1;

}else{

$status = 0;

}

		$varr->query="UPDATE  `vendor` SET status=? where vendor_id = $vendor_id ";
					$result=$varr->executeQuery($varr->query,array($status),"update");
					if($result){

						$varr->query="select user_id from `vendor`  where vendor_id = $vendor_id and status=1 ";
						$result=$varr->executeQuery($varr->query,array(),"sread");
						if(!empty($result)){
					$varr->query="UPDATE  `user` SET type=? where user_id = $userid ";
					$result=$varr->executeQuery($varr->query,array(3),"update");


						}else{

					$varr->query="UPDATE  `user` SET type=? where user_id = $userid ";
					$result=$varr->executeQuery($varr->query,array(2),"update");

						}

						// insert_notifications('',$userid,$userid,'vendor_approve','https://servewise.shop');
						// insert_notifications('',$userid,6,'vendor_approve','https://servewise.shop');

					}


}






function approve_branch($userid,$vendor_id,$branch_id,$action,$dbclass){
include_once($dbclass);
	 $query;
	 $db;	

		
		
		$varr = new databaseManager();
if($action == 'approve'){

$status = 1;

}else{

$status = 0;

}

		$varr->query="UPDATE  `branch` SET status=? where branch_id = $branch_id ";
					$result=$varr->executeQuery($varr->query,array($status),"update");
					if($result){

						$varr->query="select user_id,name from `branch`  where branch_id = $branch_id and status=1 ";
						$result=$varr->executeQuery($varr->query,array(),"sread");
						if(!empty($result[0]['user_id'])){
					$varr->query="UPDATE  `user` SET type=? where user_id = $userid ";
					$result=$varr->executeQuery($varr->query,array(4),"update");


						}else{

					$varr->query="UPDATE  `vendor` SET type=? where user_id = $userid ";
					$result=$varr->executeQuery($varr->query,array(2),"update");

						}


						// INSERT INTO `vb_themesetting`(`id`, `vb_id`, `domain_url`, `theme_id`, `type`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5])
						

					}


}

?>