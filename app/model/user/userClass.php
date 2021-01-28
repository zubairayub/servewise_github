
<?php 

	class User{
		
		private $query;
		private $db;	
		
			function __construct(){
				$this->db=new databaseManager();
			}
			
			
			function newSignIn($email, $password){
				$this->query="select * from user where email_id=? and password=? and status = 'active' ";
				$result=$this->db->executeQuery($this->query,array($email, $password),"cread");
				if($result){

					
					$_SESSION["logIn"]=$email;
					$_SESSION['logInId']=$result[0]['user_id'];
					$_SESSION['type']=$result[0]['type'];
					$_SESSION['first_name']=$result[0]['first_name'];
					$_SESSION['last_name']=$result[0]['last_name'];
					$_SESSION['address']=$result[0]['address'];
					$_SESSION['address_2']=$result[0]['address_2'];
					$_SESSION['country']=$result[0]['country'];
					$_SESSION['city']=$result[0]['city'];
					$_SESSION['state']=$result[0]['state'];
					$_SESSION['zip']=$result[0]['zip'];
					$_SESSION['status']=$result[0]['status'];

					
					
				
					return true;
				}
				else{
					return false;
				}
			}


			//signup method of user..
			function newSignUp($email,$password,$security_code,$status,$type){
					$this->query="insert into user(email_id,password,security_code,status,type,created_date) values(?,?,?,?,?,CURRENT_DATE())";
				$result=$this->db->executeQuery($this->query,array($email,$password,$security_code,$status,$type),"create");
					if($result){
						$this->query="select * from user where email_id=? and password=? ";
				$result=$this->db->executeQuery($this->query,array($email, $password),"cread");
				if($result){
					$_SESSION["logIn"]=$email;
					$_SESSION['logInId']=$result[0]['user_id'];
					$_SESSION['type']=$result[0]['type'];
					$_SESSION['first_name']=$result[0]['first_name'];
					$_SESSION['last_name']=$result[0]['last_name'];
					$_SESSION['address']=$result[0]['address'];
					$_SESSION['address_2']=$result[0]['address_2'];
					$_SESSION['country']=$result[0]['country'];
					$_SESSION['city']=$result[0]['city'];
					$_SESSION['state']=$result[0]['state'];
					$_SESSION['zip']=$result[0]['zip'];
					$_SESSION['status']=$result[0]['status'];


					
				
					return true;
				}

						}    
				    else{
						return false;
						}
				}



			function getvendoridbyuserid($userid){
				$this->query="select * from vendor where user_id=? ";
				$result=$this->db->executeQuery($this->query,array($userid),"cread");
				if($result){
					$_SESSION["vendorid"]=$result[0]["vendor_id"];
					return true;
				}
				else{


				$this->query="select * from branch where user_id=? ";
				$result=$this->db->executeQuery($this->query,array($userid),"cread");



				if($result){
					$_SESSION["vendorid"]=$result[0]["vendor_id"];
					return true;
				}
				else{
					return false;
				}
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
			
			
			function getcustomersbyvbid($vbid){
				$this->query="SELECT user.user_id,user.first_name,user.last_name,product.product_id,order_product.user_id,product.name FROM product,orders,order_product,user,vendor_branch WHERE product.vb_id = ? AND product.product_id = order_product.product_id AND user.user_id = order_product.user_id GROUP BY product.product_id ";
				$result=$this->db->executeQuery($this->query,array($vbid),"cread");
				return $result;	
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
				$_SESSION['status'] = 'active';
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