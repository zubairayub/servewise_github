<?php
//session_start();
//echo $_SESSION["logIn"]; 
//echo $_SESSION['logInName'];

defined('APPLICATION_INNERPATH') || define('APPLICATION_INNERPATH', realpath( dirname(__FILE__) . '/../'));

//echo 0;
$PATH =  constant("APPLICATION_INNERPATH");

require $PATH . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'service_config.php'; 
require_once $config_service['DB_CLASS'];
require_once $config_service['FUNCTIONS'];
require $config_service['BRANCH_CLASS'];
	
	$branch=new branch();
	$message=null;

	//$getvendors = $branch->getvendorsforbranch();
    $usertype = getusertypes($type);
   
    if($usertype[0]['title'] == 'Admin'){

        $getvendors =  getvendors() ;

        

    }elseif($usertype[0]['title'] == 'Branch'){
         $getvendors =   getbranches($logInId,"TRUE");

$getvendors =  $getvendors[0]['vendor_id'] ; 
$getvendors =  getvendors($getvendors,'FALSE') ;


    }elseif($usertype[0]['title'] == 'Vendor'){


$getvendors =  getvendors($logInId ,"TRUE") ;



    } 

 


$getcountries = $branch->getallcountries();
        
if (isset($_POST["state_id"])){
    $stateid = $_POST["state_id"];
    $hhtml = "";
        $getcities = $branch->getcitybystateid($stateid);
        $hhtml .= '<option value="NULL">Select City</option>';
     foreach ($getcities as $city) {
         $hhtml .= '<option value="'.$city["id"].'">'. $city["name"].'</option>';
     
     }
echo $hhtml;
}
if (isset($_POST["country_id"])){
        $countryid = $_POST["country_id"];
        $html = "";
        $getstates = $branch->getstatebycountryid($countryid);
         $html .= '<option value="NULL">Select State</option>';
     foreach ($getstates as $state) {
         $html .= '<option value="'.$state["id"].'">'. $state["name"].'</option>';
     
     }
echo $html;
}

	
						
 
        
       

?>
