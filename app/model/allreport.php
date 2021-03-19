<?php
$owner = NULL;
$action = NULL;
if(getstatus($type) == 'Admin' || $owner_type == 'Admin'){

$branch = getbranches();	

}elseif(getstatus($type) == 'Branch' || $owner_type == 'Branch'){

        $owner = FALSE;
if($owner_type == NULL){
	$branch = getbranches($logInId);
	
	}else{
 $branch = getbranches($owner_id);
	}


		

	
}elseif(getstatus($type) == 'Vendor' || $owner_type == 'Vendor' ){

	if($owner_type == NULL){
	$vendor_id	 = getvendors('',$logInId,'');
	$u_id = $logInId;
	}else{
	$vendor_id	 = getvendors('',$owner_id,'');
	$u_id = $owner_id;
	}
	$branch = getbranches($u_id,'FALSE');

	$owner = TRUE;
	

}



?>