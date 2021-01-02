<?php

require_once($dbcalss);
function get($name, $def= '')
{
	 return isset($_REQUEST[$name]) ? $_REQUEST[$name] : $def;
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






