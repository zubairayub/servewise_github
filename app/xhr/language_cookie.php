<?php


session_start();

// defined('APPLICATION_INNERPATH') || define('APPLICATION_INNERPATH', realpath( dirname(__FILE__) . '/../'));


// $PATH =  constant("APPLICATION_INNERPATH");

// require $PATH . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'service_config.php'; 
// $DB_CLASS =  $config_service['DB_CLASS'];
// require_once $config_service['FUNCTIONS'];




if(!empty($_GET['lng'])){

	$LANG = $_GET['lng'];


function setlangcookie($lang){

	
    unset($_COOKIE['lang']); 
    setcookie('lang', null, -1, '/'); 
  //  return true;

	$cookie_name = "lang";
$cookie_value = $lang;
setcookie($cookie_name, $cookie_value,0,'/'); 
}

setlangcookie($LANG);


$returnpage = $_SERVER['HTTP_REFERER'] ;


    //header("Location: $returnpage");


}


// $value = 'something from somewhere';

// setcookie("TestCookie", $value, 0,'/');




?>

<!-- <script type="text/javascript">
	window.location.replace("<?= $returnpage ?>");

</script> -->