<?php
session_start(); 
defined('APPLICATION_PATH') || define('APPLICATION_PATH', realpath( dirname(__FILE__) . '/../app'));
const DS = DIRECTORY_SEPARATOR; 
$dbcalss = APPLICATION_PATH . DS . 'model' . DS . 'classDatabaseManager.php';
require APPLICATION_PATH . DS . 'config' . DS . 'config.php';


//index.php?page=
if(isset($_REQUEST['page'])){
 $page = get ('page','home');
}elseif (isset($_REQUEST['domain'])) {
	$page = gettheme ($_REQUEST['domain']);
	
	// ECHO $page['theme_url'];
	// exit(); 

	if(!empty($page)){
		$live = getproducts($page['vb_id']);
		
		if(!empty($live)){
		$url = $page['theme_url'];
		}else{
		$url = $page['theme_url_dummy'];
		}

		?>
<script>window.location.replace("<?= $url ?>");</script>
		<?php
		//header('Location:  '.$url);


	}
	
}else{
	$page = get ('page','home');
}


if (strpos($page, 'dashboard') !== false) {
	$path = str_replace("_dashboard","",$page);
	$page = DS . 'dashboard' . DS . $page;
	$dashboard = DS . 'dashboard' . DS;

// if((!isLogin()) && ($page!='\dashboard\login_dashboard' && $page!= '\dashboard\signup_dashboard')){


// 	$page ='login_dashboard';
// 	$path = str_replace("_dashboard","",$page);
// 	$page = DS . 'dashboard' . DS . $page;
// 	$dashboard = DS . 'dashboard' . DS;



// }


	

}else{

	$path = $page;
	$dashboard = NULL;
}



$userstatus =NULL;
$logInId = NULL;

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
				$owner_type 	=	$_SESSION['owner_type'] = null;

			  $userstatus	 = getusertypes($type);
			  $userstatus = $userstatus[0]['title'];

			  if($userstatus == 'Vendor'){

				$vendor_data = getvendors('',$logInId,'');

 				$vendor_id = $vendor_data[0]['vendor_id'];
 				$_SESSION['vendor_id'] = $vendor_id;
 				$getbranches = getbranches($vendor_id,'');
				$branch_id = null; 				

			  }elseif($userstatus == 'Branch'){

			  $getbranches = 	getbranches($logInId,'TRUE');

			  $vendor_id = $_SESSION['vendor_id'] = $getbranches[0]['vendor_id'];
			  $branch_id = $_SESSION['branch_id'] = $getbranches[0]['branch_id'];
			  }else{

if($userstatus != 'Admin' && $userstatus != 'User' ){
 $getownerinfo =  get_staff('','',$logInId);
 $ownerstatus	 = getusertypes($getownerinfo[0]['owner_type']);
 $owner_id = $_SESSION['owner_id'] = $getownerinfo[0]['owner_id'];
 $owner_type = $_SESSION['owner_type'] = $ownerstatus[0]['title'];
	 
if($ownerstatus[0]['title'] == 'Vendor'){
//vendor
	 
	           $vendor_data = getvendors('',$owner_id,'');

 				$vendor_id = $vendor_data[0]['vendor_id'];
 				$_SESSION['vendor_id'] = $vendor_id;
 				$getbranches = getbranches($vendor_id,'');
				$branch_id = null; 	


}elseif($ownerstatus[0]['title'] == 'Branch'){
//branch

	 			$getbranches = 	getbranches($owner_id,'TRUE');

			  $vendor_id = $_SESSION['vendor_id'] = $getbranches[0]['vendor_id'];
			  $branch_id = $_SESSION['branch_id'] = $getbranches[0]['branch_id'];

}elseif($ownerstatus[0]['title'] == 'Admin'){
//admin

	 		$vendor_id = $_SESSION['vendor_id'] = NULL;
			$branch_id = $_SESSION['branch_id'] = NULL;

}


}


			  }

}










$menu = getmenu();


//get config


$config_system = get_config_system();

if(!empty($logInId)){
$config_system_pages = get_config_system($logInId);
}

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
$owlmailerjs = $config['OWL_MAILER_JS'];
$editorjs = $config['EDITOR_PATH'];
$editorsubjs = $config ['EDITOR_SUB_PATH'];
$jscript_dashboard = $config['JS_PATH_DASHBOARD'];
$jscript_tile_dashboard = $config['JS_TITLE_DASHBOARD'];
$ajax_handler = $config['AJAX_HANDLER_DASHBOARD'];
$dashboardcss = $config['DASHBOARD_PATH'];
$jqurey = $config['JQUREY_PATH'];
$aosjs = $config['AOSJS_PATH'];
$image = $config['IMAGE_PATH'];
$category_directory = $config['CATEGORY_DIRECTORY'];
$product_directory = $config['PRODUCT_DIRECTORY'];
$logo_directory = $config['LOGO_DIRECTORY'];
$_404 = $config['VIEW_PATH'] . '404.phtml';


$logo = getlogo_dashboard($logInId,'',$logo_directory);
$logo_frontend = getlogo('',$logo_directory);

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
