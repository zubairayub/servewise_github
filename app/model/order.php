<?php
$type = getusertypes($type);
$type = $type[0]['title'];


if($type == 'Admin'){
$data = getorders();
}else{
$data = getorders($logInId,$type);
}


?>