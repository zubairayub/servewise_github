<?php
if(!empty($_SESSION['logInId'])){

$user_id = $_SESSION['logInId'];
$user_logo = get_user_logo($user_id);

$user_logo = $user_logo[0]['value'];






 }

?>
