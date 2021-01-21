<?php
session_start();
defined('APPLICATION_PATH') || define('APPLICATION_PATH', realpath( dirname(__FILE__) . '../../'));
const DS = DIRECTORY_SEPARATOR; 
$dbcalss = APPLICATION_PATH . DS . 'model' . DS . 'classDatabaseManager.php';
include_once('functions.php'); 
 

 if(!empty($_SESSION['logInId'])){

$user_id = $_SESSION['logInId'];

$result = getnotifications($dbcalss,$user_id,'');

if(!empty($result)){


	$count = count($result);
	echo $count;


}else{


	echo 0;
}





}else{

	echo 0;
} 



//SELECT * FROM `notifications` ;

  // echo $status = 'unread';
        // $query = "SELECT currval('status')";
        // if($query == $status){
        //     exit(0);            
        // }
        // $newEntries = "SELECT * FROM notifications where status = 'read'";
        // if(performQuery($newEntries)){
        //     header("location:index.php");
        // }
?>