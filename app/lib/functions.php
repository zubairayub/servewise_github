<?php

if(!empty($dbclass)){
include_once($dbcalss);
}
function get($name, $def= '')
{
	 return isset($_REQUEST[$name]) ? $_REQUEST[$name] : $def;
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




function getvendors()
{

				 $query;
		 		$db;	
		
		
				$varr = new databaseManager();
		
			$varr->query="SELECT * FROM `vendor` ";
			$result=$varr->executeQuery($varr->query,array(),"sread");
			return  $result;
	 

}



function getbranches()
{

				 $query;
		 		$db;	
		
		
				$varr = new databaseManager();
		
			$varr->query="SELECT * FROM `branch` ";
			$result=$varr->executeQuery($varr->query,array(),"sread");
			return  $result;
	 

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



function get_config_system()
{

	

	 $query;
	 $db;	

		
		
		$varr = new databaseManager();
		
		$varr->query="SELECT * FROM `config` where userid = 0  ";
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
?>