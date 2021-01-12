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
$formDesc       = $_POST['formDesc']        = isset($_POST['formDesc']) ? $_POST['formDesc'] : '';
$about_desc     = $_POST['about_desc']      = isset($_POST['about_desc']) ? $_POST['about_desc'] : '';

/* team info */
$cntForm        = $_POST['cntForm']         = isset($_POST['cntForm']) ? $_POST['cntForm'] : '';
$contact_add    = $_POST['team_name']     = isset($_POST['team_name']) ? $_POST['team_name'] : '';
$contact_ph     = $_POST['team_position']      = isset($_POST['team_position']) ? $_POST['team_position'] : '';
$contact_img    = $_FILES['team_img']    = isset($_FILES['team_img']) ? $_FILES['team_img'] : '';
$contact_email  = $_POST['team_comp']   = isset($_POST['team_comp']) ? $_POST['team_comp'] : '';

/* vision */
$visionForm     = $_POST['visionForm']      = isset($_POST['visionForm']) ? $_POST['visionForm'] : '';
$vision         = $_POST['vision']          = isset($_POST['vision']) ? $_POST['vision'] : '';

if(!empty($about_desc)){

    $varr->query="UPDATE  `config` SET value=? where name = 'AboutDiscribtion' ";
    $result=$varr->executeQuery($varr->query,array($about_desc),"update");
    $response = 1;
}
if(!empty($contact_add)){

    $varr->query="UPDATE  `config` SET value=? where name = 'our team Name' ";
    $result=$varr->executeQuery($varr->query,array($contact_add),"update");
    if(!empty($contact_ph)){

        $varr->query="UPDATE  `config` SET value=? where name = 'our team position' ";
        $result=$varr->executeQuery($varr->query,array($contact_ph),"update");
    }if(!empty($contact_img)){

        $varr->query="UPDATE  `config` SET value=? where name = 'our team image' ";
        $result=$varr->executeQuery($varr->query,array($contact_img),"update");
    }if(!empty($contact_email)){

        $varr->query="UPDATE  `config` SET value=? where name = 'our team company' ";
        $result=$varr->executeQuery($varr->query,array($contact_email),"update");
    }
    $response = 1;            
}
if(!empty($vision)){

    $varr->query="UPDATE  `config` SET value=? where name = 'about our vision' ";
    $result=$varr->executeQuery($varr->query,array($vision),"update");
    $response = 1;
}

else{


    $response = 0;

}
echo $response;

?>