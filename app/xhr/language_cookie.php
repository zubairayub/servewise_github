<?php


session_start();

defined('APPLICATION_INNERPATH') || define('APPLICATION_INNERPATH', realpath( dirname(__FILE__) . '/../'));


$PATH =  constant("APPLICATION_INNERPATH");

require $PATH . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'service_config.php'; 
$DB_CLASS =  $config_service['DB_CLASS'];
require_once $config_service['FUNCTIONS'];




if(!empty($_GET['lng'])){

	$LANG = $_GET['lng'];

setlangcookie($LANG);


$returnpage = $_SERVER['HTTP_REFERER'] ;


    //header("Location: $returnpage");


}


// $value = 'something from somewhere';

// setcookie("TestCookie", $value, 0,'/');

?>

<script type="text/javascript">
	window.location.replace("<?= $returnpage ?>");

</script>