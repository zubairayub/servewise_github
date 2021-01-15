<?php
$type = getusertypes($type);
$type = $type[0]['title'];

if($type == 'Admin'){
$data = getabandoncart();
}else{
    $data = getabandoncart($logInId);
}
?>