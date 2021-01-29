<?php
$type = getusertypes($type);
$type = $type[0]['title'];


if($type == 'Admin' || $owner_type == 'Admin'){
$data = getorders();
}elseif($type == 'Branch' || $owner_type == 'Branch'){
	if($owner_type == NULL){
$data = getorders($logInId,$type);
	
	}else{
 $data = getorders($owner_id,$owner_type);
	}

}
elseif($type == 'Vendor' || $owner_type == 'Vendor'){
	

	if($owner_type == NULL){
$data = getorders($vendor_id,$type);
	
	}else{
 $data = getorders($vendor_id,$owner_type);
	}





}

?>