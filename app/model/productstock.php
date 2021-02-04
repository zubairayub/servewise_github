<?php
//session_start();
//echo $_SESSION["logIn"];
//echo $_SESSION['logInName'];

 require("category/categoryClass.php");
 require_once($dbcalss);

	$category = new Category();
	$message=null;

	
	


	$type =  $type;
$type = getstatus($type);
if($type == 'Branch' || $owner_type == 'Branch')
{

	//$data =  getbranches($logInId );
	$vbid =  $_SESSION['branch_id'];
	$type = 'Branch';
	
}elseif($type == 'Admin' || $owner_type == 'Admin'){

    $vbid =  0;
    $type = 'Admin';

}elseif($type == 'Vendor' || $owner_type == 'Vendor'){
// $data =  getvendors($logInId );
	$vbid =  $_SESSION['vendor_id'];
	$type = 'Vendor';

}else{

	header('Location ?page=logout');
}



$data = getstock($vbid,'',$type);


	
	
	
	

?>