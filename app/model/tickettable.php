<?php
$owner = NULL;
$action = NULL;
if(getstatus($type) == 'Admin' || $owner_type == 'Admin'){


$data_tickets =  gettickets('','','',$logIn,'Admin');

}elseif(getstatus($type) == 'Branch' || $owner_type == 'Branch'){

     	

$data_tickets =  gettickets('',$branch_id,$vendor_id,$logInId,'Vendor');
	
}elseif(getstatus($type) == 'Vendor' || $owner_type == 'Vendor' ){

	
$data_tickets = 	gettickets('',$branch_id,$vendor_id,$logInId,'Brand');

}
else{


$data_tickets = gettickets('','','',$logInId,'User');

}



?>