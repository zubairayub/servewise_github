<?php
session_start();
// defined('APPLICATION_PATH') || define('APPLICATION_PATH', realpath( dirname(__FILE__) . '../../app'));
// const DS = DIRECTORY_SEPARATOR; 
// $dbcalss = APPLICATION_PATH . DS . 'model' . DS . 'classDatabaseManager.php';
// $functions = APPLICATION_PATH . DS . 'lib' . DS . 'functions.php';
$dbcalss = '../model/classDatabaseManager.php';
require_once 'functions.php';

 if(!empty($_SESSION['logInId'])){
 	

$user_id = $_SESSION['logInId'];

$result = getnotifications($dbcalss,$user_id,'');

if(!empty($result)){

//print_r($result);


	 $count = count($result);
	 echo $count;


}else{


	echo 0;
}





}else{

	echo 0;
} 





?>