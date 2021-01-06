<?php
$owner = NULL;
$action = NULL;
if(getstatus($type) == 'Admin'){

$branch = getbranches();	

}else{


$vendor_id	 = getvendors($logInId);
	if(!empty($vendor_id)){
	$branch = getbranches($vendor_id[0]['vendor_id']);

	$owner = TRUE;
	}else{

		$owner = FALSE;
		$branch = getbranches($logInId);
	}	
	
}



?>