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
 $about_desc     = $_POST['footer_about_desc']     = isset($_POST['footer_about_desc']) ? $_POST['footer_about_desc'] : '';
 $contact_add    = $_POST['contact_add']    = isset($_POST['contact_add']) ? $_POST['contact_add'] : '';
 $contact_ph     = $_POST['contact_ph']     = isset($_POST['contact_ph']) ? $_POST['contact_ph'] : '';
 $contact_email  = $_POST['contact_email']  = isset($_POST['contact_email']) ? $_POST['contact_email'] : '';
 $cpy_text       = $_POST['cpy_text']       = isset($_POST['cpy_text']) ? $_POST['cpy_text'] : '';
 $social_links   = $_POST['social_links']   = isset($_POST['social_links']) ? $_POST['social_links'] : '';
 $facebook       = $_POST['facebook']       = isset($_POST['facebook']) ? $_POST['facebook'] : '';
 $twitter        = $_POST['twitter']        = isset($_POST['twitter']) ? $_POST['twitter'] : '';
 $instagram      = $_POST['instagram']      = isset($_POST['instagram']) ? $_POST['instagram'] : '';
 $linkedin       = $_POST['linkedin']       = isset($_POST['linkedin']) ? $_POST['linkedin'] : '';

$user_id = $_SESSION['logInId'];


 if($_SESSION['type']  == 1){
                

$user_id = 0;

                }
                
if(!empty($contact_add)){

    $varr->query="SELECT * FROM `config`  where userid = $user_id and name = 'contact' ";
    $result=$varr->executeQuery($varr->query,array(),"sread");

    if($result){
   $varr->query="UPDATE  `config` SET value=? where name = 'contact' ";
    $result=$varr->executeQuery($varr->query,array($contact_ph),"update");
 
    }else{
$varr->query="INSERT INTO `config`(`name`, `value`, `userid`) VALUES (?,?,?)";
$result=$varr->executeQuery($varr->query,array('contact',$contact_ph,$user_id),"create");

    }

    if(!empty($contact_email)){
        



         $varr->query="SELECT * FROM `config`  where userid = $user_id  and name = 'email' ";
    $result=$varr->executeQuery($varr->query,array(),"sread");

    if($result){
  $varr->query="UPDATE  `config` SET value=? where name = 'email' ";
        $result=$varr->executeQuery($varr->query,array($contact_email),"update");
 
    }else{
$varr->query="INSERT INTO `config`(`name`, `value`, `userid`) VALUES (?,?,?)";
$result=$varr->executeQuery($varr->query,array('email',$contact_email,$user_id),"create");

    }
       

    }

    if(!empty($contact_add)){

       
         $varr->query="SELECT * FROM `config`  where userid = $user_id and  name = 'address' ";
    $result=$varr->executeQuery($varr->query,array(),"sread");

    if($result){
  $varr->query="UPDATE  `config` SET value=? where name = 'address' ";
        $result=$varr->executeQuery($varr->query,array($contact_add),"update");

 
    }else{
$varr->query="INSERT INTO `config`(`name`, `value`, `userid`) VALUES (?,?,?)";
$result=$varr->executeQuery($varr->query,array('address',$contact_add,$user_id),"create");

    }
       
     
    }

    $response = 1;


}elseif(!empty($about_desc)){


    // $varr->query="UPDATE  `config` SET value=? where name = 'footerlogo' ";
    // $result=$varr->executeQuery($varr->query,array($footer_logo),"update");
    if(!empty($about_desc)){


      


           $varr->query="SELECT * FROM `config`  where userid = $user_id and   name = 'footer about dis' ";
    $result=$varr->executeQuery($varr->query,array(),"sread");

    if($result){
   $varr->query="UPDATE  `config` SET value=? where name = 'footer about dis' ";
        $result=$varr->executeQuery($varr->query,array($about_desc),"update");


 
    }else{
$varr->query="INSERT INTO `config`(`name`, `value`, `userid`) VALUES (?,?,?)";
$result=$varr->executeQuery($varr->query,array('footer about dis',$about_desc,$user_id),"create");

    }
    
    }
    $response = 1;
    

}elseif(!empty($cpy_text)){

   

   $varr->query="SELECT * FROM `config`  where userid = $user_id and  name = 'Copyrighttext' ";
    $result=$varr->executeQuery($varr->query,array(),"sread");

    if($result){
   $varr->query="UPDATE  `config` SET value=? where name = 'Copyrighttext' ";
    $result=$varr->executeQuery($varr->query,array($cpy_text),"update");



 
    }else{
$varr->query="INSERT INTO `config`(`name`, `value`, `userid`) VALUES (?,?,?)";
$result=$varr->executeQuery($varr->query,array('Copyrighttext',$cpy_text,$user_id),"create");

    }



    
if(!empty($facebook)){

   


 $varr->query="SELECT * FROM `config`  where userid = $user_id and  name = 'facebook' ";
    $result=$varr->executeQuery($varr->query,array(),"sread");

    if($result){
   $varr->query="UPDATE  `config` SET value=? where name = 'facebook' ";
    $result=$varr->executeQuery($varr->query,array($facebook),"update");



 
    }else{
$varr->query="INSERT INTO `config`(`name`, `value`, `userid`) VALUES (?,?,?)";
$result=$varr->executeQuery($varr->query,array('facebook',$facebook,$user_id),"create");

    }

}
if(!empty($twitter)){

   
$varr->query="SELECT * FROM `config`  where userid = $user_id and  name = 'twitter' ";
    $result=$varr->executeQuery($varr->query,array(),"sread");

    if($result){
   $varr->query="UPDATE  `config` SET value=? where name = 'twitter' ";
    $result=$varr->executeQuery($varr->query,array($twitter),"update");



 
    }else{
$varr->query="INSERT INTO `config`(`name`, `value`, `userid`) VALUES (?,?,?)";
$result=$varr->executeQuery($varr->query,array('twitter',$twitter,$user_id),"create");

    }


}
if(!empty($instagram)){

   

$varr->query="SELECT * FROM `config`  where userid = $user_id and  name = 'instagram' ";
    $result=$varr->executeQuery($varr->query,array(),"sread");

    if($result){
  $varr->query="UPDATE  `config` SET value=? where name = 'instagram' ";
    $result=$varr->executeQuery($varr->query,array($instagram),"update");



 
    }else{
$varr->query="INSERT INTO `config`(`name`, `value`, `userid`) VALUES (?,?,?)";
$result=$varr->executeQuery($varr->query,array('instagram',$instagram,$user_id),"create");

    }


}
if(!empty($linkedin)){

  


    $varr->query="SELECT * FROM `config`  where userid = $user_id and   name = 'Linkin' ";
    $result=$varr->executeQuery($varr->query,array(),"sread");

    if($result){
    $varr->query="UPDATE  `config` SET value=? where name = 'Linkin' ";
    $result=$varr->executeQuery($varr->query,array($linkedin),"update");




 
    }else{
$varr->query="INSERT INTO `config`(`name`, `value`, `userid`) VALUES (?,?,?)";
$result=$varr->executeQuery($varr->query,array('Linkin',$linkedin,$user_id),"create");

    }
}
$response = 1;
}


echo $response;



?>
 
