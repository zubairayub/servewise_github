<?php
session_start();
// defined('APPLICATION_PATH') || define('APPLICATION_PATH', realpath( dirname(__FILE__) . '../../app'));
// const DS = DIRECTORY_SEPARATOR; 
// $dbcalss = APPLICATION_PATH . DS . 'model' . DS . 'classDatabaseManager.php';
// $functions = APPLICATION_PATH . DS . 'lib' . DS . 'functions.php';
$dbclass = '../model/classDatabaseManager.php';
require_once 'functions.php';



if(isset($_SESSION['name']) && isset($_SESSION['vb_id'])){
    

	$name = $_SESSION['name'];
	$useremail = $_SESSION['email'];
	$phoneno = $_SESSION['phone'];
	$branch_id = $_SESSION['vb_id'];
    $text = $_POST['text'];
     
    $text_message = stripslashes(htmlspecialchars($text));
   // file_put_contents("log.html", $text_message, FILE_APPEND | LOCK_EX);
  $user_data =   register_user($dbclass,$useremail,$name,$phoneno);

  $_SESSION['visitor_id'] = $user_data[0]['user_id']; 
  $data =  sendchat($dbclass,$user_data[0]['user_id'],$branch_id,$text_message);
}



print_r($data);



?>