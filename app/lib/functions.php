<?php
 
if(!empty($dbcalss)){
include_once($dbcalss); 
} 
function get($name, $def= '')
{
	 return isset($_REQUEST[$name]) ? $_REQUEST[$name] : $def;
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
				$varr->query="SELECT * FROM `themes`   where `id` = ".$data['theme_id']."";
				$result=$varr->executeQuery($varr->query,array(),"sread");
						
					$data['theme_title'] = $_SESSION['theme_title'] = $result[0]['title'];
					$data['theme_url'] =  $_SESSION['theme_url'] = $result[0]['theme_url'];
					$data['theme_url_dummy'] =  $_SESSION['theme_url_dummy'] = $result[0]['theme_url_dummy'];
					return $data;
					

					}







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
        $params["secure"], $params["httponly"]
    );
}
// Just in case.. swipe these values too
ini_set('session.gc_max_lifetime', 0);
ini_set('session.gc_probability', 1);
ini_set('session.gc_divisor', 1);
// Completely destroy our server sessions..
session_destroy();

header('Location: ?page=home');

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

function getuserinfo($user_id =  NULL){

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



function getorders($user_id =  NULL,$type =  NULL){

if(!empty($dbclass)){

		include_once($dbclass);

}
 				$query;
		 		$db;	
		
		
				$varr = new databaseManager();

				if(empty($user_id)){
	                 $varr->query="SELECT * FROM `order_product` ";

				}else{
					$varr->query="SELECT * FROM `order_product`  where user_id=$user_id ";

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

				
						$varr->query="SELECT name FROM `product`  where product_id=$product_id ";

				
		
		
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



function getproducts($vbid,$dbclass =  NULL){

if(!empty($dbclass)){

		include_once($dbclass);

}
 				$query;
		 		$db;	
		
		
				$varr = new databaseManager();

				if(empty($id)){
						$varr->query="SELECT * FROM `product`  where vb_id=$vbid ";

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




function getvendors($user_id = NULL,$owner = NULL)
{

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







function getbranches($user_id =  NULL, $owner = NULL)
{

				 $query;
		 		$db;	
		
		 
				$varr = new databaseManager();
		if(!empty($user_id)){
			IF($owner == "TRUE"){
$varr->query="SELECT * FROM `branch` where user_id=$user_id ";

			}else{
$varr->query="SELECT * FROM `branch` where user_id=$user_id OR vendor_id=$user_id";

			}
		}else{

			$varr->query="SELECT * FROM `branch` ";
		}
			
			$result=$varr->executeQuery($varr->query,array(),"sread");
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

					$varr->query="UPDATE  `vendor` SET type=? where user_id = $userid ";
					$result=$varr->executeQuery($varr->query,array(2),"update");

						}



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