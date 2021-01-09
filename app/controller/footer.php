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



 $footer_logo    = $_FILES['footer_logo']['name']    = isset($_FILES['footer_logo']['name']) ? $_FILES['footer_logo']['name'] : '';
 $about_desc     = $_POST['about_desc']     = isset($_POST['about_desc']) ? $_POST['about_desc'] : '';
 $contact_add    = $_POST['contact_add']    = isset($_POST['contact_add']) ? $_POST['contact_add'] : '';
 $contact_ph     = $_POST['contact_ph']     = isset($_POST['contact_ph']) ? $_POST['contact_ph'] : '';
 $contact_email  = $_POST['contact_email']  = isset($_POST['contact_email']) ? $_POST['contact_email'] : '';
 $cpy_text       = $_POST['cpy_text']       = isset($_POST['cpy_text']) ? $_POST['cpy_text'] : '';
 $social_links   = $_POST['social_links']   = isset($_POST['social_links']) ? $_POST['social_links'] : '';
 $facebook       = $_POST['facebook']       = isset($_POST['facebook']) ? $_POST['facebook'] : '';
 $twitter        = $_POST['twitter']        = isset($_POST['twitter']) ? $_POST['twitter'] : '';
 $instagram      = $_POST['instagram']      = isset($_POST['instagram']) ? $_POST['instagram'] : '';
 $linkedin       = $_POST['linkedin']       = isset($_POST['linkedin']) ? $_POST['linkedin'] : '';


                
		
			
		
		
		


if(!empty($contact_add)){


    $varr->query="UPDATE  `config` SET value=? where name = 'contact' ";
    $result=$varr->executeQuery($varr->query,array($contact_ph),"update");
    if(!empty($contact_email)){
        $varr->query="UPDATE  `config` SET value=? where name = 'email' ";
        $result=$varr->executeQuery($varr->query,array($contact_email),"update");
       

    }

    if(!empty($contact_add)){

        $varr->query="UPDATE  `config` SET value=? where name = 'address' ";
        $result=$varr->executeQuery($varr->query,array($contact_add),"update");
     
    }

    $response = 1;


}elseif(!empty($footer_logo)){


    $varr->query="UPDATE  `config` SET value=? where name = 'footerlogo' ";
    $result=$varr->executeQuery($varr->query,array($footer_logo),"update");
    if(!empty($about_desc)){


        $varr->query="UPDATE  `config` SET value=? where name = 'aboutdiscribtion' ";
        $result=$varr->executeQuery($varr->query,array($about_desc),"update");
    
    }
    $response = 1;
    

}elseif(!empty($cpy_text)){

    $varr->query="UPDATE  `config` SET value=? where name = 'Copyrighttext' ";
    $result=$varr->executeQuery($varr->query,array($cpy_text),"update");
    
if(!empty($facebook)){

    $varr->query="UPDATE  `config` SET value=? where name = 'facebook' ";
    $result=$varr->executeQuery($varr->query,array($facebook),"update");
}
if(!empty($twitter)){

    $varr->query="UPDATE  `config` SET value=? where name = 'twitter' ";
    $result=$varr->executeQuery($varr->query,array($twitter),"update");
}
if(!empty($instagram)){

    $varr->query="UPDATE  `config` SET value=? where name = 'instagram' ";
    $result=$varr->executeQuery($varr->query,array($instagram),"update");
}
if(!empty($linkedin)){

    $varr->query="UPDATE  `config` SET value=? where name = 'Linkin' ";
    $result=$varr->executeQuery($varr->query,array($linkedin),"update");
}
$response = 1;
}

else{


    $response = 0;

}
echo $response;



?>
 
