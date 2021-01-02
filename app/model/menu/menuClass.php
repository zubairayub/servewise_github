<?php 
//require("../../db/classDatabaseManager.php");

	class Menu{
		
		private $query;
		private $db;	
		
			function __construct(){
				$this->db=new databaseManager();
			}
			
			
		
		
				function getmenu(){
					$this->query="select * from menu ";
					$result=$this->db->executeQuery($this->query,array(),"sread");
					return $result;
				}
			
				function getsubmenu(){
					$this->query="SELECT menu.title,menu.url,menu.icon,menu.status,sub_menu.sm_id,sub_menu.sm_title,sub_menu.sm_url,sub_menu.sm_icon,sub_menu.sm_status FROM menu,sub_menu WHERE menu.menu_id = sub_menu.menu_id ";
					$result=$this->db->executeQuery($this->query,array(),"sread");
					return $result;
				}

		
		
	
		
		
				 
				

	}

?>