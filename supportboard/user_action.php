<?php
require('config.php');

$f_name		= $_POST['f_name']		= isset($_POST['f_name']) 		? $_POST['f_name'] 		: '';
$l_name		= $_POST['l_name']		= isset($_POST['l_name']) 		? $_POST['l_name'] 		: '';
$user_type	= $_POST['user_type']	= isset($_POST['user_type']) 	? $_POST['user_type'] 	: '';
$email		= $_POST['email']       = isset($_POST['email']) 		? $_POST['email'] 		: '';
$close		= $_POST['close']       = isset($_POST['close']) 		? $_POST['close'] 		: '';
$messages	= $_POST['messages']    = isset($_POST['messages'])		? $_POST['messages']	: '';

echo 1;
?>