<?php 
//require("../../db/classDatabaseManager.php");

	class Category{
		
		private $query;
		private $db;	
		
			function __construct(){
				$this->db=new databaseManager();
			}
			
			function addnewcategory($categoryname,$createdby,$vbid)
{
					$this->query="insert into category(name,created_by,vendor_id,created_date) values(?,?,?,CURRENT_DATE())";
				$result=$this->db->executeQuery($this->query,array($categoryname,$createdby,$vbid),"create");
					if($result){
						return $result;
						}    
				    else{
						return false;
						}
				}
		
		function addnewsubcategory($categoryid,$categoryname,$vendorid)
{
					$this->query="insert into subcategory_2_level(category_id,sub_category,vendor_id,created_date) values(?,?,?,CURRENT_DATE())";
				$result=$this->db->executeQuery($this->query,array($categoryid,$categoryname,$vendorid),"create");
					if($result){
						return $result;
						}    
				    else{
						return false;
						}
				}
		
		function addnewsubcategorythree($scid,$categoryname,$vendorid)
{
					$this->query="insert into subcategory_3_level(sc_id,ss_category,vendor_id,created_date) values(?,?,?,CURRENT_DATE())";
				$result=$this->db->executeQuery($this->query,array($scid,$categoryname,$vendorid),"create");
					if($result){
						return $result;
						}    
				    else{
						return false;
						}
				}
        	function deletecategory($categoryid){
					$this->query="delete from category where category_id=?";
					$result=$this->db->executeQuery($this->query,array($categoryid),"delete");
					return $result;

				}
		
		function deletecategorytwo($categoryid){
					$this->query="delete from subcategory_2_level where sc_id=?";
					$result=$this->db->executeQuery($this->query,array($categoryid),"delete");
					return $result;

				}
		function deletecategorythree($categoryid){
					$this->query="delete from subcategory_3_level where ssc_id=?";
					$result=$this->db->executeQuery($this->query,array($categoryid),"delete");
					return $result;

				}
		
		
		
				function getcategorybyvbid($vbid){
					$this->query="select * from category where vendor_id=? ";
				$result=$this->db->executeQuery($this->query,array($vbid),"cread");
				return $result;
				}
				
				function getcategorybyid($categoryid){
					$this->query="select * from subcategory_2_level where category_id=? ";
				$result=$this->db->executeQuery($this->query,array($categoryid),"cread");
				return $result;
				}
		
				function getcategories(){
					$this->query="SELECT category.category_id,category.name,subcategory_2_level.sc_id,subcategory_2_level.sub_category,subcategory_2_level.sc_id,subcategory_3_level.ss_category FROM category,subcategory_2_level,subcategory_3_level,vendor WHERE category.vendor_id = vendor.vendor_id";
				$result=$this->db->executeQuery($this->query,array(),"sread");
				return $result;
				}
		
			function getcategorythreebyid($categoryid){
					$this->query="select * from subcategory_3_level where sc_id=? ";
				$result=$this->db->executeQuery($this->query,array($categoryid),"cread");
				return $result;
				}
		
		
				function updatecategorybyid($categoryname,$categoryid)
{
					$this->query="UPDATE `category` SET `name`= ? WHERE `category_id` = ?";
				$result=$this->db->executeQuery($this->query,array($categoryname,$categoryid),"update");
					if($result){
						return true;
						}    
				    else{
						return false;
						}
				}
		
		function updatesubcategory2byid($categoryname,$categoryid)
{
					$this->query="UPDATE `subcategory_2_level` SET `sub_category`= ? WHERE `sc_id` = ?";
				$result=$this->db->executeQuery($this->query,array($categoryname,$categoryid),"update");
					if($result){
						return true;
						}    
				    else{
						return false;
						}
				}
		
		function updatesubcategory3byid($categoryname,$categoryid)
{
					$this->query="UPDATE `subcategory_3_level` SET `ss_category`= ? WHERE `ssc_id` = ?";
				$result=$this->db->executeQuery($this->query,array($categoryname,$categoryid),"update");
					if($result){
						return true;
						}    
				    else{
						return false;
						}
				}
				function getspecificproductdata ($productid){
					$this->query="select * from product where product_id=?  ";
					$result=$this->db->executeQuery($this->query,array($productid),"cread");
					return $result;
				}
				
        	function getproductdata (){
					$this->query="select * from product  ";
					$result=$this->db->executeQuery($this->query,array(),"sread");
					return $result;
				}
        
			
				function deletefavproperty($property_id,$userid){
					$this->query="delete from favorite_properties where property_id=? and user_id=?";
					$result=$this->db->executeQuery($this->query,array($property_id,$userid),"delete");
					return $result;

				}
				 function getpropertybystatus($status){
					 $this->query="select * from property where status=? and is_verified=1 order by created_date DESC  ";
					$result=$this->db->executeQuery($this->query,array($status),"cread");
					return $result;
				 }
				 function getpropertybytype($type,$status){
					 $this->query="select * from property where status=? and type=? and is_verified=1  ";
					$result=$this->db->executeQuery($this->query,array($status,$type),"cread");
					return $result;
				 }
				  function getpropertybytypenostatus($type){
					 $this->query="select * from property where type=? and is_verified=1   ";
					$result=$this->db->executeQuery($this->query,array($type),"cread");
					return $result;
				 }
				 
				function getrecent10properties(){
					$this->query="select * from property where is_verified=1 and created_date BETWEEN (CURRENT_DATE() - INTERVAL 1 WEEK) AND CURRENT_DATE() LIMIT 10;";
					$result=$this->db->executeQuery($this->query,array(),"sread");
					return $result;
				 }
				 
				 function getpropertybyadvancesearch($pstatus,$minarea,$maxarea,$minprice,$maxprice,$ptype,$proom,$pbath,$pcity,$pparking,$plawn,$paircondition,$ppool,$plift,$ppets,$pmaid,$pstudy,$psecurity,$pwardrobe,$pbalcony,$pgym,$pspa,$psteam,$pplayarea,$psquash,$pcinema,$pkitchen){
						//echo "<script>alert('called');</script>";
					$this->query="select * from property where type=? and city=? and is_verified=1 and area BETWEEN $minarea and $maxarea and price BETWEEN $minprice and $maxprice and bedroom=? and bathroom=? AND status=?"." ".$pparking." ".$plawn." ".$paircondition." ".$ppool." ".$plift." ".$ppets." ".$pmaid." ".$pstudy." ".$psecurity." ".$pwardrobe." ".$pbalcony." ".$pgym." ".$pspa." ".$psteam." ".$pplayarea." ".$psquash." ".$pcinema." ".$pkitchen;
					$newquery=$this->query;
					//echo "<script>alert($newquery);</script>";
					$result=$this->db->executeQuery($newquery,array($ptype,$pcity,$proom,$pbath,$pstatus),"cread");
					return $result;
				 }
				 
				function addpropertyImages($imgPath,$propId,$createdBy){
					$this->query="insert INTO property_images(property_id,image_path,created_by) VALUES(?,?,?) ";
					$result=$this->db->executeQuery($this->query,array($propId,$imgPath,$createdBy),"create");
					if($result){
						return true;
					}
					else{
						return false;
					}
				 }
				 
				 
				 	function getpropertyImages($propertyid){
					$this->query="SELECT * FROM property_images WHERE property_id=?";
					$result=$this->db->executeQuery($this->query,array($propertyid),"cread");
					if($result){
						return $result;
					}
					else{
						return false;
					}
				 }
				  function propertybytype($type){
					 $this->query="select * from property where type=? and is_verified=1   ";
					$result=$this->db->executeQuery($this->query,array($type),"cread");
					return $result;
				 }
				 function favoriteproperty($propertyid,$userid){
					// echo "<script>alert('called');</script>";
						 $this->query="select property_id from favorite_properties where property_id=? and user_id=?";
					 $resultcheck=$this->db->executeQuery($this->query,array($propertyid,$userid),"cread");	
					if($resultcheck){
					return false;	
					}
					else{
					$this->query="insert into favorite_properties(property_id,user_id,created_date) values(?,?,current_date())";
					 $result=$this->db->executeQuery($this->query,array($propertyid,$userid),"create");
					if($result){
						return $result;
					}
					else{
						return false;
					}
					}
				 }
				 
				 function getfavoriteproperty($userid){
					$this->query="SELECT * FROM property, favorite_properties WHERE property.property_id=favorite_properties.property_id and favorite_properties.user_id=?";
					$result=$this->db->executeQuery($this->query,array($userid),"cread");
					if($result){
						return $result;
					}
					else{
						return false;
					}
				 }
				 
				 function getrecent3properties(){
					$this->query="select * from property where is_verified=1 and created_date BETWEEN (CURRENT_DATE() - INTERVAL 1 WEEK) AND CURRENT_DATE() LIMIT 3;";
					$result=$this->db->executeQuery($this->query,array(),"sread");
					return $result;
				 }
				 function getnewprojects(){
					$this->query="select * from new_project where 1";
					$result=$this->db->executeQuery($this->query,array(),"sread");
					return $result;
				 }
				 
				 function getestateagents(){
					$this->query="select * from real_estate_agency where 1";
					$result=$this->db->executeQuery($this->query,array(),"sread");
					return $result;
				 }
				 
				

	}

?>