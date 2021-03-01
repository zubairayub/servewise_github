<?php 
//require("../../db/classDatabaseManager.php");

	class Product{
		
		private $query;
		private $db;	
		
			function __construct(){
				$this->db=new databaseManager();
			}
			
			function addnewproduct($name,$description,$quantity,$price,$code,$category,$secondlevel,$thirdlevel,$vbid,$weight,$featured,$publish,$purchase_price)
{
					$this->query="insert into product(name,description,quantity,price,code,category_id,sc_id,ssc_id,vb_id,weight,is_featured,publish,purchase_price,quantity_purchase) values(?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
				$result=$this->db->executeQuery($this->query,array($name,$description,$quantity,$price,$code,$category,$secondlevel,$thirdlevel,$vbid,$weight,$featured,$publish,$purchase_price,$quantity),"create");
					if($result){
						return $result;
						}    
				    else{
						return false;
						}
				}




							function updateproduct($name,$description,$quantity,$price,$category,$secondlevel,$thirdlevel,$weight,$featured,$publish,$purchase_price,$product_id)
{
	
					$this->query="UPDATE  `product` SET name=?,description=?,quantity=?,price=?,category_id=?,sc_id=?,ssc_id=?,weight=?,is_featured=?,publish=?,purchase_price=?,purchase_price=?,quantity_purchase=? where product_id = $product_id ";
				$result=$this->db->executeQuery($this->query,array($name,$description,$quantity,$price,$category,$secondlevel,$thirdlevel,$weight,$featured,$publish,$purchase_price,$product_id,$quantity),"update");
					if($result){
						return $result;
						}    
				    else{
						return false;
						}
				}
        
       function insertimagesbyproductid($productid,$newFileName)
{
					$this->query="insert into images(product_id,image_path) values(?,?)";
				$result=$this->db->executeQuery($this->query,array($productid,$newFileName),"create");
					if($result){
						return $result;
						}    
				    else{
						return false;
						}
				}
            function  getproductidbycode($code){
				$this->query="select product_id from product where code = ? ";
				$result=$this->db->executeQuery($this->query,array($code),"cread");
				if($result){
					return $result;
					}    
				    else{
						return false;
						}
			}
		//getting categories
        
        function getallcategories($vbid){
				$this->query="select * from category where vb_id = ? ";
				$result=$this->db->executeQuery($this->query,array($vbid),"cread");
				if($result){
					return $result;
					}    
				    else{
						return false;
						}
			}
        function getcountrynamebyid($countryid){
				$this->query="select (name) from countries where id = ? ";
				$result=$this->db->executeQuery($this->query,array($countryid),"cread");
				if($result){
					return $result;
					}    
				    else{
						return false;
						}
			}
         function getstatenamebyid($stateid){
				$this->query="select (name) from states where id = ? ";
				$result=$this->db->executeQuery($this->query,array($stateid),"cread");
				if($result){
					return $result;
					}    
				    else{
						return false;
						}
			}
         function getcitynamebyid($cityid){
				$this->query="select (name) from cities where id = ? ";
				$result=$this->db->executeQuery($this->query,array($cityid),"cread");
				if($result){
					return $result;
					}    
				    else{
						return false;
						}
			}
        	function getsecondlevelbycategoryid($categoryid){
				$this->query="select * from subcategory_2_level where category_id=?";
				$result=$this->db->executeQuery($this->query,array($categoryid),"cread");
				if($result){
					return $result;
					}    
				    else{
						return false;
						}
			}
        function getthirdlevelbysecondlevelid($scid){
				$this->query="select * from subcategory_3_level where sc_id=?";
				$result=$this->db->executeQuery($this->query,array($scid),"cread");
				if($result){
					return $result;
					}    
				    else{
						return false;
						}
			}
        //
		
		function getallreviewsbyvbid($vbid){
					$this->query="SELECT product.name,product.product_id,user.user_id,user.first_name,user.last_name,product_review.review,product.vb_id FROM product,user,product_review,vendor_branch WHERE product.product_id = product_review.product_id AND user.user_id = product_review.user_id AND product.vb_id = ? ";
				$result=$this->db->executeQuery($this->query,array($vbid),"cread");
				return $result;
				}
				function getpropertydata($user_id){
					$this->query="select property_id,property_title,address,area,city,status,price,created_date from property where created_by=? ";
				$result=$this->db->executeQuery($this->query,array($user_id),"cread");
				return $result;
				}
				
				function updateproperty($ptitle,$pstatus,$ptype,$commercial_type,$pprice,$parea,$proom,$pbath,$paddress,$pcity,$pinfo,$page,$pparking,$plawn,$paircondition,$ppool,$plift,$ppets,$pmaid,$pstudy,$psecurity,$pwardrobe,$pbalcony,$pgym,$pspa,$psteam,$pplayarea,$psquash,$pcinema,$pkitchen,$contactname,$contactemail,$contactno)
{
					$this->query="update property set property_title=?,status=?,type=?,price=?,area=?,address=?,city=?,detailed_information=?,building_age=?,bedroom=?,bathroom=?,free_parking=?,air_condition=?,places_to_seat=?,swimming_pool=?,maid_room=?,lift=?,security=?,gym=?,spa=?,steam_bath=?,balcony=?,play_area=?,squash_court=?,cinema=?,pets_allowed=?,study_room=?,wardrobe=?,kitchen_appliances=?,contact_name=?,contact_email=?,contact_no=?,created_by=?,created_date=CURRENT_DATE()";
				$result=$this->db->executeQuery($this->query,array($ptitle,$pstatus,$ptype,$pprice,$parea,$paddress,$pcity,$pinfo,$page,$proom,$pbath,$pparking,$paircondition,$plawn,$ppool,$pmaid,$plift,$psecurity,$pgym,$pspa,$psteam,$pbalcony,$pplayarea,$psquash,$pcinema,$ppets,$pstudy,$pwardrobe,$pkitchen,$contactname,$contactemail,$contactno,$_SESSION['logInId']),"update");
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
        
				function deleteproperty($property_id){
					$this->query="delete from property where property_id=?";
					$result=$this->db->executeQuery($this->query,array($property_id),"delete");
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