<?php
if(!empty($_SESSION['logInId'])){

if(empty($owner_id)){

$user_id = $_SESSION['logInId'];
}else{
	$user_id = $_SESSION['owner_id'];

}

$user_logo = get_user_logo($user_id);
if(!empty($user_logo)){
$user_logo = $user_logo[0]['value'];
}





 }

?>
