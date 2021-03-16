<?php
$owner = NULL;
$action = NULL;
if(getstatus($type) == 'Admin' || $owner_type == 'Admin'){

$branch = getbranches();	
$vendors = getvendors();

$data_tickets =  gettickets('','','',$logIn,'Admin');

}elseif(getstatus($type) == 'Branch' || $owner_type == 'Branch'){

        $owner = FALSE;
if($owner_type == NULL){
	$branch = getbranches($logInId);
	//$vendors = getvendors('',$vendor_id,'FALSE');
	
	}else{
 $branch = getbranches($owner_id);
 
	}

$vendors = getvendors('',$vendor_id,'FALSE');
		

$data_tickets =  gettickets('',$branch_id,$vendor_id,$logInId,'Vendor');
	
}elseif(getstatus($type) == 'Vendor' || $owner_type == 'Vendor' ){

	if($owner_type == NULL){
	$vendor_id	 = getvendors('',$logInId,'');

	$u_id = $logInId;
	}else{
	$vendor_id	 = getvendors('',$owner_id,'');
	$u_id = $owner_id;
	}
	$vendors = getvendors('',$u_id,'TRUE');
	$branch = getbranches($u_id,'FALSE');

	$owner = TRUE;
$data_tickets = 	gettickets('',$branch_id,$vendor_id,$logInId,'Brand');

}
else{


$data_tickets = gettickets('','','',$logInId,'User');

}



?>