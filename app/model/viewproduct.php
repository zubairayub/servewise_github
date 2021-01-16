<?php
$type = getusertypes($type);
$type = $type[0]['title'];


if($type == 'Admin'){
$data = getviewproduct();
}elseif($type == 'Branch') {
	$Branchid = getbranches($logInId,'TRUE');
$data = getproducts($Branchid[0]['branch_id']);

}elseif($type == 'Vendor'){
	$vendor_id	 = getvendors($logInId);

	
	$Branchid = getbranches($vendor_id[0]['vendor_id'],'false');
	
foreach ($Branchid as $key => $value) {

	$valuepro  = getproducts($value['branch_id']);

	if(!empty($value)){
foreach ($valuepro as $key => $value) {
	$data[] = $value;
	
}
	

	}
}
	

// print_r($data);
// //print_r($data);
// exit();
    
}


?>