<?php
session_start();
// defined('APPLICATION_PATH') || define('APPLICATION_PATH', realpath( dirname(__FILE__) . '../../app'));
// const DS = DIRECTORY_SEPARATOR; 
// $dbcalss = APPLICATION_PATH . DS . 'model' . DS . 'classDatabaseManager.php';
// $functions = APPLICATION_PATH . DS . 'lib' . DS . 'functions.php';
$dbcalss = '../model/classDatabaseManager.php';
require_once 'functions.php';



if(isset($_SESSION['name']) && isset($_SESSION['vb_id'])){
    

	$name = $_SESSION['visitor_name'];
	$useremail = $_SESSION['visitor_email'];
	$phoneno = $_SESSION['visitor_phone'];
	$branch_id = $_SESSION['vb_id'];
    $text = $_POST['text'];
     
    $text_message = "<div class='msgln'><span class='chat-time'>".date("g:i A")."</span> <b class='user-name'>".$_SESSION['name']."</b> ".stripslashes(htmlspecialchars($text))."<br></div>";
   // file_put_contents("log.html", $text_message, FILE_APPEND | LOCK_EX);
  $user_data =   register_user($dbclass,$useremail,$name,$phoneno);

  $_SESSION['visitor_id'] = $user_data[0]['user_id']; 
    sendchat($dbcalss,$user_data[0]['user_id'],$branch_id,$text_message);
}







?>