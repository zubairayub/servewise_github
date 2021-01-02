
<?php 

	class Vendor{
		
		private $query;
		private $db;	
		
			function __construct(){
				$this->db=new databaseManager();
			}
			//signup method of vendor..
			function SignUpasVendor($name,$contactno,$emailid,$address,$address2,$country,$state,$city,$userid){
					$this->query="insert into vendor(name,contact_no,email_id,address,address_2,country,state,city,user_id,created_date) values(?,?,?,?,?,?,?,?,?,CURRENT_DATE())";
				$result=$this->db->executeQuery($this->query,array($name,$contactno,$emailid,$address,$address2,$country,$state,$city,$userid),"create");
					if($result){
						return true;
						}    
				    else{
						return false;
						}
				}
			
			function newSignIn($email, $password){
				$this->query="select * from user where email_id=? and password=? and status = 'active' ";
				$result=$this->db->executeQuery($this->query,array($email, $password),"cread");
				if($result){
					$_SESSION["logIn"]=$email;
					$_SESSION['logInName']=$result[0]['name'];
					$_SESSION['logInId']=$result[0]['user_id'];
					return true;
				}
				else{
					return false;
				}
			}
			
			function updateuserdetails($fname,$lname,$contactno,$address,$address2,$city,$state,$zip,$country,$emailid){
				$this->query="update user set first_name=?,last_name=?,contact_no=?,address=?,address_2=?,city=?,state=?,zip=?,country=? where email_id=? ";
				$result=$this->db->executeQuery($this->query,array($fname,$lname,$contactno,$address,$address2,$city,$state,$zip,$country,$emailid),"update");
					if($result){return true;}    
				    else{
						return false;
						}
					
			}
		
			function getvendordetails($vendorid){
				$this->query="select * from vendor where vendor_id=?";
				$result=$this->db->executeQuery($this->query,array($vendorid),"cread");
				if($result){
					return $result;
					}    
				    else{
						return false;
						}
			}
		
			function updatevendordetails($name,$email,$contactno,$address,$address2,$city,$state,$country,$vendorid){
				$this->query="update vendor set name=?,email_id=?,contact_no=?,address=?,address_2=?,city=?,state=?,country=? where vendor_id=? ";
				$result=$this->db->executeQuery($this->query,array($name,$email,$contactno,$address,$address2,$city,$state,$country,$vendorid),"update");
					if($result){return true;}    
				    else{
						return false;
						}
					
			}
		function getvendordetailsbyuserid($userid){
				$this->query="select * from vendor where user_id=?";
				$result=$this->db->executeQuery($this->query,array($userid),"cread");
				if($result){
					return $result;
					}    
				    else{
						return false;
						}
			}
        
			function getuserdetails($emailid){
				$this->query="select * from user where email_id=?";
				$result=$this->db->executeQuery($this->query,array($emailid),"cread");
				if($result){
					return $result;
					}    
				    else{
						return false;
						}
			}
        
        	function getallcountries(){
				$this->query="select * from countries ";
				$result=$this->db->executeQuery($this->query,array(),"sread");
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
        	function getstatebycountryid($countryid){
				$this->query="select * from states where country_id=?";
				$result=$this->db->executeQuery($this->query,array($countryid),"cread");
				if($result){
					return $result;
					}    
				    else{
						return false;
						}
			}
        function getcitybystateid($stateid){
				$this->query="select * from cities where state_id=?";
				$result=$this->db->executeQuery($this->query,array($stateid),"cread");
				if($result){
					return $result;
					}    
				    else{
						return false;
						}
			}
			
			function getuserpic($emailid){
				$this->query="select picture_path from user where email_id=?";
				$result=$this->db->executeQuery($this->query,array($emailid),"cread");
				if($result){
					return $result;
					}    
				    else{
						return false;
						}
			}
			
					function updatepicture($picpath,$emailid){
					//	echo "called";
				$this->query="update user set picture_path=? where email_id=?";
				$result=$this->db->executeQuery($this->query,array($picpath,$emailid),"update");
					if($result){return true;}    
				    else{
						return false;
						}
					
			}
			
			
			function changepassword($oldpassword,$newpassword,$emailid){
					$this->query="update user set password=? where email_id=? and password=?";
				$result=$this->db->executeQuery($this->query,array($newpassword,$emailid,$oldpassword),"update");
					if($result){return true;}    
				    else{
						return false;
						}
					
			}
			
			function submitproperty($name,$email,$password,$status,$security_code){
					$this->query="insert into user(name,email_id,password,status,security_code,created_date) values(?,?,?,?,?,CURRENT_DATE())";
				$result=$this->db->executeQuery($this->query,array($name,$email,$password,$status,$security_code),"create");
					if($result){
						return true;
						}    
				    else{
						return false;
						}
				}
			
			
			
			
			
			
			
			function getSpecificUserSecurityCode($email){
				$this->query="select security_code from user where email_id=? ";
				$result=$this->db->executeQuery($this->query,array($email),"cread");
				return $result;	
			}
			function getSpecificUserPassword($email){
				$this->query="select password from user where email_id=? ";
				$result=$this->db->executeQuery($this->query,array($email),"cread");
				return $result;	
			}
			function CheckUser($email){
				$this->query="select email_id from user where email_id=? ";
				$result=$this->db->executeQuery($this->query,array($email),"cread");
				return $result;	
			}
			function updateUserStatus($status,$email){
				$this->query="update user set status=? where email_id=? ";
				$result=$this->db->executeQuery($this->query,array($status,$email),"update");
					if($result){return true;}    
				    else{return false;}
					
			}
			
			function subscribeEmail($email){
				$this->query="insert into subscribers(email_id) values(?)";
				$result=$this->db->executeQuery($this->query,array($email),"create");
				if($result){
					return true;
				}    
				    else{
						return false;
						}
			}
		
	}



?>