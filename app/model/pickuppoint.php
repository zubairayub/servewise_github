<?php
$type = getusertypes($type);
$type = $type[0]['title'];


if($type == 'Admin'){
$data = getpickuppoint();
}else{
$data = getpickuppoint($logInId,$type);
}


?>