<?php
session_start();
defined('APPLICATION_PATH') || define('APPLICATION_PATH', realpath( dirname(__FILE__) . '/../app'));
const DS = DIRECTORY_SEPARATOR; 
$dbcalss = APPLICATION_PATH . DS . 'model' . DS . 'classDatabaseManager.php';
require APPLICATION_PATH . DS . 'config' . DS . 'config.php';


//index.php?page=
$page = get ('page','home');
if (strpos($page, 'dashboard') !== false) {
	$path = str_replace("_dashboard","",$page);
	$page = DS . 'dashboard' . DS . $page;
	$dashboard = DS . 'dashboard' . DS;




	

}else{

	$path = $page;
	$dashboard = NULL;
}


//store session
if(isset($_SESSION['logIn']) && !empty($_SESSION['logIn'])){

				$logIn    		= 	$_SESSION["logIn"];
				$logInId 		=	$_SESSION['logInId'];
				$type 			=	$_SESSION['type'];
				$first_name 	= 	$_SESSION['first_name'];
				$last_name  	=	$_SESSION['last_name'];
				$address  	 	=	$_SESSION['address'];
				$address_2 		=	$_SESSION['address_2'];
				$country  		=	$_SESSION['country'];
				$city   		=	$_SESSION['city'];
				$city   		=	$_SESSION['state'];
				$zip    		=	$_SESSION['zip'];
				$status 		=	$_SESSION['status'];

}










$menu = getmenu();


//get config


$config_system = get_config_system();


$language = search_array('language',$config_system);


$currency = search_array('currency',$config_system);

 

if($language['value'] == 1){

$lang_status = 'CHECKED';

}else{

	$lang_status = 'UNCHECKED';
}



if($currency['value'] == 1){

$curr_status = 'CHECKED';

}else{

	$curr_status = 'UNCHECKED';
}



$model = $config['MODEL_PATH'] . $path . '.php';

$controller = $config['CONTROLLER_PATH'] . $path .  '.php';
$GLOBALS['user_model']   = $config['MODEL_PATH'] .  'user/userClass.php';
$view = $config['VIEW_PATH'] . $page . '.phtml';
$header = $config['VIEW_PATH'] . $dashboard .  'header.phtml';
$footer = $config['VIEW_PATH'] .  $dashboard . 'footer.phtml';
$stylesheet = $config['STYLE_PATH'];
$substylesheet = $config['SUBSTYLE_PATH'];
$aosstyle = $config['AOSSTYLE_PATH'];
$fonts = $config['FONTS_PATH'];
$fontawsome = $config['FONTAWSOME'];
$jscript = $config['JS_PATH'];
$jscript_dashboard = $config['JS_PATH_DASHBOARD'];
$ajax_handler = $config['AJAX_HANDLER_DASHBOARD'];
$dashboardcss = $config['DASHBOARD_PATH'];
$jqurey = $config['JQUREY_PATH'];
$aosjs = $config['AOSJS_PATH'];
$image = $config['IMAGE_PATH'];
$category_directory = $config['CATEGORY_DIRECTORY'];
$product_directory = $config['PRODUCT_DIRECTORY'];
$logo_directory = $config['LOGO_DIRECTORY'];
$_404 = $config['VIEW_PATH'] . '404.phtml';



if (file_exists($model)) {
	require $model;
}

 // if (file_exists($controller)) {
 // 	require $controller;
 // }


$main_content = $_404;
if (file_exists($view)) {
 $main_content = $view;
}


include $config['VIEW_PATH'] . 'layout.phtml';
