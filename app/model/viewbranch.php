<?php
$owner = NULL;
$action = NULL;
if(getstatus($type) == 'Admin'){

$branch = getbranches();	

}elseif(getstatus($type) == 'Branch'){

$owner = FALSE;
		$branch = getbranches($logInId);

	
}elseif(getstatus($type) == 'Vendor'){


	$vendor_id	 = getvendors('',$logInId,'');
	
	$branch = getbranches($vendor_id[0]['vendor_id']);

	$owner = TRUE;
	

}



?>