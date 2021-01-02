<?php
defined('APPLICATION_INNERPATH') || define('APPLICATION_INNERPATH', realpath( dirname(__FILE__) . '/../'));

//echo 0;
$PATH =  constant("APPLICATION_INNERPATH");

require $PATH . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'service_config.php'; 
require_once $config_service['DB_CLASS'];
//require $config_service['PRODUCT_CLASS'];

if(isset($_POST['menu'])){


$menu = $_POST['menu'];

$submenu = $_POST['submenu'];

$type = $_POST['type'];
//echo $type;

	if(!empty($type)){
 
		if(!empty($menu)){

		$resposne = updatepermissions($menu,$type,'menu');
}



		if(!empty($submenu)){

		$resposne = updatepermissions($submenu,$type,'submenu');
}


header('Location: ' . $_SERVER['HTTP_REFERER']);





	}







}else{


header('Location: ' . $_SERVER['HTTP_REFERER']);
}






function updatepermissions($id = NULL,$type=NULL,$from= NULL)
{

				 $query;
		 		 $db;	
		 		 $varr = new databaseManager();
		 		
		
		if($from == 'menu'){

			$varr->query="DELETE FROM `permissions` WHERE user_type_id=$type";
			$result=$varr->executeQuery($varr->query,array(),"sread");

	foreach ($id as $key => $value) {
	//echo $key.$value;

			$varr->query="INSERT INTO `permissions`(`id`, `menu_id`, `submenu_id`, `user_type_id`) 
			VALUES (NULL,$key,'0',$type)";
				$result=$varr->executeQuery($varr->query,array(),"sread");
		
}
		}elseif($from == 'submenu'){

			$varr->query="DELETE FROM `permissions` WHERE user_type_id=$type AND submenu_id != '0' ";
			$result=$varr->executeQuery($varr->query,array(),"sread");

	foreach ($id as $key => $value) {
	//echo $key.$value;
		$varr->query="SELECT menu_id FROM `sub_menu` where  sm_id= $key";
		$result=$varr->executeQuery($varr->query,array(),"sread");
		
			$menu_id = $result[0][0];
				$varr->query="INSERT INTO `permissions`(`id`, `menu_id`, `submenu_id`, `user_type_id`) 
			VALUES (NULL,$menu_id,$key,$type)";
				$result=$varr->executeQuery($varr->query,array(),"sread");
		
}






		}else{
			$result = FALSE;
		}
				
			

				// if(empty($id)){
				// 		$varr->query="SELECT * FROM `user_type`";

				// }else{


				// 		$varr->query="SELECT * FROM `user_type` where id=$id";

				// }
			//$result=$delete->executeQuery($varr->query,array(),"sread");
		
			return  $result;
	 

}




?>