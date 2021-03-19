<?php
session_start();

defined('APPLICATION_INNERPATH') || define('APPLICATION_INNERPATH', realpath( dirname(__FILE__) . '/../'));


$PATH =  constant("APPLICATION_INNERPATH");

require $PATH . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'service_config.php'; 
$DB_CLASS =  $config_service['DB_CLASS'];
require_once $config_service['FUNCTIONS'];





//Actions
//orders => remove orders
//users => remove users also if user is vendor or have branch remove that too
//product => remove product
//vendor => remove vendor also from user table
//branch => remove branch also user from user table


if(!empty($_SESSION['logInId'])){


if(isset($_GET['action']) && !empty($_GET['action'])){



$action = $_GET['action'];


if($action == 'order'){



$order_id = $_GET['order_id'];

$result = deleteorder($DB_CLASS,$order_id);

	

}elseif($action == 'user'){





}elseif($action == 'product'){





}elseif($action == "vendor"){

$vendor_id=$_GET['vendor_id'];

$result = deletevendor($DB_CLASS,$vendor_id);


}elseif ($action == "allstaff") {

$allstaff_id=$_GET['allstaff_id'];
$result = deleteallstaff($DB_CLASS,$allstaff_id);


}


else{


	echo 'no condition match';


}






if(!empty($result)){
$returnpage = $_SERVER['HTTP_REFERER'] . '&success=done';
   // header("Location:$returnpage");
?>
<script type="text/javascript">window.location.replace("<?= $returnpage ;?>");</script>
<?php

}








}
else{
	echo 'Something went wrong';
}



}else{

echo 'Please Login First';

}





?>