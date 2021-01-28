<?php
$type = getusertypes($type);
$type = $type[0]['title'];


if($type == 'Admin'){
$data = getorders();
}elseif($type == 'Branch'){
	
$data = getorders($logInId,$type);
}
elseif($type == 'Vendor'){
	
$data = getorders($vendor_id,$type);




}

?>