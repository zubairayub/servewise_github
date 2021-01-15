<?php
session_start();

defined('APPLICATION_INNERPATH') || define('APPLICATION_INNERPATH', realpath( dirname(__FILE__) . '/../'));


$PATH =  constant("APPLICATION_INNERPATH");

require $PATH . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'service_config.php'; 
$DB_CLASS =  $config_service['DB_CLASS'];
require_once $config_service['FUNCTIONS'];
require_once $DB_CLASS;
$query;
$db;	
$varr = new databaseManager();

/* about description */
$formAbout       = $_POST['formDesc']        = isset($_POST['formDesc']) ? $_POST['formDesc'] : '';
$about_desc      = $_POST['theme_about_desc']      = isset($_POST['theme_about_desc']) ? $_POST['theme_about_desc'] : '';

/* vision */
$visionForm      = $_POST['visionForm']      = isset($_POST['visionForm']) ? $_POST['visionForm'] : '';
$vision          = $_POST['theme_about_vision']          = isset($_POST['theme_about_vision']) ? $_POST['theme_about_vision'] : '';
$user_id =  $_SESSION['logInId'] ;




if(isset($about_desc) && !empty($about_desc)){

    $varr->query="SELECT * FROM `config` where userid = $user_id AND name = 'theme_about_dis' ";
    $result=$varr->executeQuery($varr->query,array($user_id,'theme_about_dis'),"sread");
    
    
    if($result){
    
    $varr->query="UPDATE  `config` SET value=? where userid = $user_id AND name = 'theme_about_dis'";
    $result=$varr->executeQuery($varr->query,array($about_desc),"update");
    
    }else{
    
    $varr->query="INSERT INTO `config`( `id`,`name`, `value`, `userid`) 
    VALUES (?,?,?,?) ";
    $result=$varr->executeQuery($varr->query,array(NULL,'theme_about_dis',$about_desc,$user_id),"create");
    
    }    
    
    $response = 1;
}
elseif(isset($vision) && !empty($vision)){

    $varr->query="SELECT * FROM `config` where userid = $user_id AND name = 'theme_about_vision' ";
    $result=$varr->executeQuery($varr->query,array($user_id,'logo'),"sread");
    
    
    if($result){
    
        $varr->query="UPDATE  `config` SET value=? where userid = $user_id AND name ='theme_about_vision' ";
        $result=$varr->executeQuery($varr->query,array($vision),"update");
    
    }else{
    
        $varr->query="INSERT INTO `config`( `id`,`name`, `value`, `userid`) 
    VALUES (?,?,?,?) ";
    $result=$varr->executeQuery($varr->query,array(NULL,'theme_about_vision',$vision,$user_id),"create");
    
    }
    $response = 1;

}


echo $response;



?>