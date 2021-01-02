<?php
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

$menu = getmenu();

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
