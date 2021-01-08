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

$title      = $_POST['title']       = isset($_POST['title']) ? $_POST['title'] : '';
$art_img    = $_POST['art_img']     = isset($_POST['art_img']) ? $_POST['art_img'] : '';
$art_type   = $_POST['art_type']    = isset($_POST['art_type']) ? $_POST['art_type'] : '';
$art_video  = $_POST['art_video']   = isset($_POST['art_video']) ? $_POST['art_video'] : '';
$blog_dis  = $_POST['blog']         = isset($_POST['blog']) ? $_POST['blog'] : '';



if(!empty($title)){

    $varr->query="UPDATE  `config` SET value=? where name = 'blogtitle' ";
    $result=$varr->executeQuery($varr->query,array($title),"update");
  if(!empty($blog_dis)){

    $varr->query="UPDATE  `config` SET value=? where name = 'blogcode' ";
    $result=$varr->executeQuery($varr->query,array($blog_dis),"update");
}  if(!empty($art_type)){

    $varr->query="UPDATE  `config` SET value=? where name = 'blogtype' ";
    $result=$varr->executeQuery($varr->query,array($art_type),"update");
}
$response = 1;
}

else{


    $response = 0;

}
echo $response;

?>