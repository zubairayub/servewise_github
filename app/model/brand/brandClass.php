<?php 
//require("../../db/classDatabaseManager.php");

	class Brand{
		
		private $query;
		private $db;	
		
			function __construct(){
				$this->db=new databaseManager();
			}
			
			function addnewbrand($name,$vendorid)
{
					$this->query="insert into brand(name,vendor_id) values(?,?)";
				$result=$this->db->executeQuery($this->query,array($name,$vendorid),"create");
					if($result){
						return $result;
						}    
				    else{
						return false;
						}
				}
		

				function getallbrands($vendorid){
					$this->query="select * from brand where vendor_id = ? ";
				$result=$this->db->executeQuery($this->query,array($vendorid),"cread");
				return $result;
				}
				
				
					function updatebrandbyid($name,$brandid)
{
					$this->query="UPDATE `brand` SET `name`= ? WHERE `brand_id` = ?";
				$result=$this->db->executeQuery($this->query,array($name,$brandid),"update");
					if($result){
						return true;
						}    
				    else{
						return false;
						}
				}
				
					function deletebrand($brandid){
					$this->query="delete from brand where brand_id=?";
					$result=$this->db->executeQuery($this->query,array($brandid),"delete");
					return $result;

				}

	}

?>