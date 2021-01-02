<?php 
//require("../../db/classDatabaseManager.php");

	class Addtocart{
		
		private $query;
		private $db;	
		
			function __construct(){
				$this->db=new databaseManager();
			}
			
			
		
		function addtocart($productid,$quantity,$price,$userid,$total){
					$this->query="insert into order_product(product_id,quantity,price,user_id,totalprice) values(?,?,?,?,?)";
				$result=$this->db->executeQuery($this->query,array($productid,$quantity,$price,$userid,$total),"create");
					if($result){
						return true;
						}    
				    else{
						return false;
						}
				}
        
        
        function addtoorder($opid,$status){
					$this->query="insert into orders(op_id,order_status) values(?,?)";
				$result=$this->db->executeQuery($this->query,array($opid,$status),"create");
					if($result){
						return true;
						}    
				    else{
						return false;
						}
				}
        
        
        
        
        
        function checkopid ($opid){
					$this->query="select op_id from orders where op_id=?  ";
					$result=$this->db->executeQuery($this->query,array($opid),"cread");
					return $result;
				}
        
        
        
        

        function getspecificproductdata ($code){
					$this->query="select * from product where code=?  ";
					$result=$this->db->executeQuery($this->query,array($code),"cread");
					return $result;
				}
        
        
        
        
        
        
        
        function getproductdata (){
					$this->query="select * from product  ";
					$result=$this->db->executeQuery($this->query,array(),"sread");
					return $result;
				}
        
				function getcartrecordbyuserid($userid){
					$this->query="select op_id from order_product where user_id = ?  ";
					$result=$this->db->executeQuery($this->query,array($userid),"cread");
					return $result;
				}
		
		function updatecart($quantity,$cartid){
				$this->query="update order_product set quantity where op_id=? ";
				$result=$this->db->executeQuery($this->query,array($quantity,$cartid),"update");
					if($result){return true;}    
				    else{
						return false;
						}
					
			}
		
		
				 
				

	}

?>