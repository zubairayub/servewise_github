
<?php 

	class Branch{
		
		private $query;
		private $db;	
		
			function __construct(){
				$this->db=new databaseManager();
			}
			//signup method of branch..
			function requestbranch($name,$contactno,$emailid,$address,$address2,$userid,$vendorid){
					$this->query="insert into branch(name,contact_no,email_id,address,address_2,user_id,vendor_id,created_date) values(?,?,?,?,?,?,?,CURRENT_DATE())";
				$result=$this->db->executeQuery($this->query,array($name,$contactno,$emailid,$address,$address2,$userid,$vendorid),"create");
					if($result){
						return true;
						}    
				    else{
						return false;
						}
				}
        function addvendorandbranch($vendorid,$branchid){
					$this->query="insert into vendor_branch(vendor_id,branch_id) values(?,?)";
				$result=$this->db->executeQuery($this->query,array($vendorid,$branchid),"create");
					if($result){
						return true;
						}    
				    else{
						return false;
						}
				}
		function getspecificbranchbyemail($email){
				$this->query="select * from branch where email_id = ?";
				$result=$this->db->executeQuery($this->query,array($email),"cread");
				if($result){
					return $result;
					}    
				    else{
						return false;
						}
			}
		
		function getbranchesbyvendorid($vendorid){
				$this->query="select * from branch where vendor_id = ?";
				$result=$this->db->executeQuery($this->query,array($vendorid),"cread");
				if($result){
					return $result;
					}    
				    else{
						return false;
						}
			}
        function getbranchevendorid($vendorid){
				$this->query="select * from vendor_branch where vendor_id = ?";
				$result=$this->db->executeQuery($this->query,array($vendorid),"cread");
				if($result){
					return $result;
					}    
				    else{
						return false;
						}
			}
		//adding country to subbranch.
		function addcountrytosubbranch($branchid,$country){
					$this->query="insert into subbranch_country(branch_id,country,created_date) values(?,?,CURRENT_DATE())";
				$result=$this->db->executeQuery($this->query,array($branchid,$country),"create");
					if($result){
						return true;
						}    
				    else{
						return false;
						}
				}
		function getspecificsubbranchcountry($branchid){
				$this->query="select * from subbranch_country where branch_id = ? ";
				$result=$this->db->executeQuery($this->query,array($branchid),"cread");
				if($result){
					return $result;
					}    
				    else{
						return false;
						}
			}
		
		//addind state into subbranch
		function addstatetosubbranch($state,$branchid,$sbc){
					$this->query="insert into subbranch_state(state,branch_id,sbc_id,created_date) values(?,?,?,CURRENT_DATE())";
				$result=$this->db->executeQuery($this->query,array($state,$branchid,$sbc),"create");
					if($result){
						return true;
						}    
				    else{
						return false;
						}
				}
		function getspecificsubbranchstate($branchid){
				$this->query="select * from subbranch_state where branch_id = ? ";
				$result=$this->db->executeQuery($this->query,array($branchid),"cread");
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
		//addind city into subbranch
		function addcitytosubbranch($city,$branchid,$sbs){
					$this->query="insert into subbranch_city(city,branch_id,sbs_id,created_date) values(?,?,?,CURRENT_DATE())";
				$result=$this->db->executeQuery($this->query,array($city,$branchid,$sbs),"create");
					if($result){
						return true;
						}    
				    else{
						return false;
						}
				}
		function getspecificsubbranchcity($branchid){
				$this->query="select * from subbranch_city where branch_id = ? ";
				$result=$this->db->executeQuery($this->query,array($branchid),"sread");
				if($result){
					return $result;
					}    
				    else{
						return false;
						}
			}
		
			function getvendorsforbranch(){
				$this->query="select * from vendor";
				$result=$this->db->executeQuery($this->query,array(),"sread");
				if($result){
					return $result;
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