<?php
$type = getusertypes($type);
$type = $type[0]['title'];


if($type == 'Admin'){
$data = getviewproduct();
}elseif($type == 'Branch') {
$data = getviewproduct($logInId);

}elseif($type == 'Vendor'){
    
}


?>