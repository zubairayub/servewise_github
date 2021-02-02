<?php
//session_start();
//echo $_SESSION["logIn"];
//echo $_SESSION['logInName'];


defined('APPLICATION_INNERPATH') || define('APPLICATION_INNERPATH', realpath( dirname(__FILE__) . '/../'));

//echo 0;
$PATH =  constant("APPLICATION_INNERPATH");

require $PATH . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'service_config.php'; 
require_once $config_service['DB_CLASS'];



if($type == 'Branch' || $_SESSION['owner_type'] == 'Branch')
        {

        //$data =  getbranches($createdby);
        $branch_id =  $_SESSION['branch_id'];
        $vendorid =  $_SESSION['vendor_id'];
        }else{

          header('Location ?page=logout');
        }
 $data = getchat($dbcalss,null,$branch_id);
 

 //print_r($data);
 
 //exit();







?>