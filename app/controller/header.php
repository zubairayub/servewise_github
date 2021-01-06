<?php
session_start();

defined('APPLICATION_INNERPATH') || define('APPLICATION_INNERPATH', realpath( dirname(__FILE__) . '/../'));


$PATH =  constant("APPLICATION_INNERPATH");

require $PATH . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'service_config.php'; 
$DB_CLASS =  $config_service['DB_CLASS'];
require_once $config_service['FUNCTIONS'];


$LOGO_DIRECTORY  = $config_service['LOGO_DIRECTORY'];






$currency  = $_POST['currency_switcher'];
if($currency == 'on'){

	$currency = 1;

}else{

	$currency = 0;
}

$result = switcher($currency,'currency',$DB_CLASS);




$language  = $_POST['language_switcher'];
if($language == 'on'){

	$language = 1;

}else{

	$language = 0;
}

switcher($language,'language',$DB_CLASS);






// echo $_SESSION['logInId'];
// echo $currency;
// echo $language;
// echo $_FILES['logo']['size'].'hello';
// echo $LOGO_DIRECTORY;


if(!empty($_SESSION['logInId'])){

// get details of the uploaded file
$fileTmpPath = $_FILES['logo']['tmp_name'];
$fileName = $_FILES['logo']['name'];
$fileSize = $_FILES['logo']['size'];
$fileType = $_FILES['logo']['type'];
$fileNameCmps = explode(".", $fileName);
$fileExtension = strtolower(end($fileNameCmps));



$url = upload_file($fileName,$fileExtension,$fileTmpPath,$fileSize,$fileType,$fileNameCmps,$LOGO_DIRECTORY);
//if($url){
if($url){
upload_logo($_SESSION['logInId'],$url,$DB_CLASS);
}
//}
	// $logo=$_FILES['logo']['name'];
	// //echo $logo;
	 
 // $explogo=explode('.',$logo);
 // $ext = pathinfo($logo, PATHINFO_EXTENSION);
 // $logoexptype=$explogo[1];

 // date_default_timezone_set('Australia/Melbourne');
 // $date = date('m/d/Yh:i:sa', time());
 // $rand=rand(10000,99999);
 // $encname=$date.$rand;
 // $logoname=md5($encname).'.'.$ext;
 // $logopath=$LOGO_DIRECTORY . $logoname;
 // move_uploaded_file($_FILES["logo"]["tmp_name"],$logopath);






}




header('Location: ' . $_SERVER['HTTP_REFERER']);
?>

