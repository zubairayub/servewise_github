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
$formFAQ        = $_POST['formFAQ']         = isset($_POST['formFAQ']) ? $_POST['formFAQ'] : '';
$faq            = $_POST['partner_faq']             = isset($_POST['partner_faq']) ? $_POST['partner_faq'] : '';
$faq_answers    = $_POST['partner_faq_ans']     = isset($_POST['partner_faq_ans']) ? $_POST['partner_faq_ans'] : '';

/* package form */
$pckgForm       = $_POST['pckgForm']        = isset($_POST['pckgForm']) ? $_POST['pckgForm'] : '';
$pckg_name      = $_POST['partner_package_name']       = isset($_POST['partner_package_name']) ? $_POST['partner_package_name'] : '';
$pckg_price     = $_POST['partner_package_price']      = isset($_POST['partner_package_price']) ? $_POST['partner_package_price'] : '';
$pckg_heading   = $_POST['partner_package_heading']   = isset($_POST['partner_package_heading']) ? $_POST['partner_package_heading'] : '';
$pckg_desc      = $_POST['partner_package_desc']       = isset($_POST['partner_package_desc']) ? $_POST['partner_package_desc'] : '';

/* hero form */
$heroForm       = $_POST['heroForm']        = isset($_POST['heroForm']) ? $_POST['heroForm'] : '';
$hero_head      = $_POST['partner_hero_heading']       = isset($_POST['partner_hero_heading']) ? $_POST['partner_hero_heading'] : '';
$hero_desc      = $_POST['partner_discribtion']       = isset($_POST['partner_discribtion']) ? $_POST['partner_discribtion'] : '';

if(!empty($faq)){

    $varr->query="UPDATE  `config` SET value=? where name = 'partner faq title' ";
    $result=$varr->executeQuery($varr->query,array($faq),"update");
    if(!empty($faq_answers)){
        $varr->query="UPDATE  `config` SET value=? where name = 'partner faq ans' ";
        $result=$varr->executeQuery($varr->query,array($faq_answers),"update");
    }
    $response = 1;
}
if(!empty($pckg_name)){

    $varr->query="UPDATE  `config` SET value=? where name = 'partner pkg name' ";
    $result=$varr->executeQuery($varr->query,array($pckg_name),"update");
    if(!empty($pckg_price)){
        $varr->query="UPDATE  `config` SET value=? where name = 'partner pkg price' ";
        $result=$varr->executeQuery($varr->query,array($pckg_price),"update");
    }if(!empty($pckg_heading)){
        $varr->query="UPDATE  `config` SET value=? where name = 'partner pkg heading' ";
        $result=$varr->executeQuery($varr->query,array($pckg_heading),"update");
    }if(!empty($pckg_desc)){
        $varr->query="UPDATE  `config` SET value=? where name = 'partner pkg dis' ";
        $result=$varr->executeQuery($varr->query,array($pckg_desc),"update");
    }
    $response = 1;
}
if(!empty($hero_head)){

    $varr->query="UPDATE  `config` SET value=? where name = 'partner hero heading' ";
    $result=$varr->executeQuery($varr->query,array($hero_head),"update");
    if(!empty($hero_desc)){
        $varr->query="UPDATE  `config` SET value=? where name = 'partner hero disc' ";
        $result=$varr->executeQuery($varr->query,array($hero_desc),"update");
    }
    $response = 1;
}

else{


    $response = 0;

}
echo $response;

?>