<?php
session_start();
// defined('APPLICATION_PATH') || define('APPLICATION_PATH', realpath( dirname(__FILE__) . '../../app'));
// const DS = DIRECTORY_SEPARATOR; 
// $dbcalss = APPLICATION_PATH . DS . 'model' . DS . 'classDatabaseManager.php';
// $functions = APPLICATION_PATH . DS . 'lib' . DS . 'functions.php';
$dbcalss = '../model/classDatabaseManager.php';
require_once 'functions.php';



if(isset($_SESSION['name'])){
    $text = $_POST['text'];
     
    $text_message = "<div class='msgln'><span class='chat-time'>".date("g:i A")."</span> <b class='user-name'>".$_SESSION['name']."</b> ".stripslashes(htmlspecialchars($text))."<br></div>";
   // file_put_contents("log.html", $text_message, FILE_APPEND | LOCK_EX);

    sendchat($dbcalss,$user_id,$branch_id,$text_message);
}



function sendchat($dbcalss,$user_id,$branch_id,$text_message){

if(!empty($dbclass)){
	
		include_once($dbclass);
	 }
	  $query;
	 $db;
	 $varr = new databaseManager();


	 if(empty($type)){
$varr->query="SELECT * FROM `notifications`   where `to_user_id` = '$userid'  ORDER BY id DESC";
$result=$varr->executeQuery($varr->query,array(),"sread");

return $result;
}



}



?>