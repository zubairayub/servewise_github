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
if($type == 'Branch')
{

	$data =  getbranches($logInId );
	$vbid =  $data[0]['branch_id'];
}elseif($type == 'Admin'){

$vbid =  0;

}elseif($type == 'Vendor'){
$data =  getvendors($logInId );
	$vbid =  $data[0]['vendor_id'];

}else{

	header('Location ?page=logout');
}






	
		$getcategory = $category->getcategorybyvbid($vbid);
	
	
	

?>
