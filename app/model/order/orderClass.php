<?php 
//require("../../db/classDatabaseManager.php");

	class Order{
		
		private $query;
		private $db;	
		
			function __construct(){
				$this->db=new databaseManager();
			}
			
			
		
		function addtoorder($orderstatus,$orderdt,$userid,$productid,$quantity,$price,$size){
					$this->query="insert into order(order_status,order_dt,user_id,product_id,quantity,price,size) values(?,?,?,?,?,?,?)";
				$result=$this->db->executeQuery($this->query,array($orderstatus,$orderdt,$userid,$productid,$quantity,$price,$size),"create");
					if($result){
						return true;
						}    
				    else{
						return false;
						}
				}
		
				function getorderhistorybyuser($userid){
					$this->query="SELECT orders.orders_id,orders.order_status,orders.order_dt,order_product.product_id,order_product.quantity,order_product.price,order_product.user_id,order_product.user_id,order_product.totalprice, product.name FROM orders,order_product,product WHERE orders.op_id=order_product.op_id AND order_product.user_id = ? AND product.product_id = order_product.product_id ";
					$result=$this->db->executeQuery($this->query,array($userid),"cread");
					return $result;
				}
		
		
				function getorderrecordbyuserid($userid){
					$this->query="select * from order_product where user_id = ?  ";
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