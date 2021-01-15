<?php
session_start();
//echo $_SESSION["logIn"];
//echo $_SESSION['logInName'];

defined('APPLICATION_INNERPATH') || define('APPLICATION_INNERPATH', realpath( dirname(__FILE__) . '/../'));

//echo 0;
$PATH =  constant("APPLICATION_INNERPATH");

require $PATH . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'service_config.php'; 
$DB_CLASS =  $config_service['DB_CLASS'];
require_once $config_service['DB_CLASS'];
require_once $config_service['FUNCTIONS'];
require $config_service['BRANCH_CLASS'];
	
	$branch=new branch();
	$message=null;

	

$city = NULL;
$state = NULL;
if(isset($_POST["city"]) && !empty($_POST["city"])){
$city = $_POST["city"];

}
	if(isset($_POST["vendor"])){
	
	       $vendorid = $_POST["vendor"];
	       $name = $_POST["name"];
         $contactno = $_POST["contactno"];
	       $emailid = $_POST["email"];
		     $address = $_POST["address"];
         $address2 = $_POST["address2"];
         $country = $_POST["country"];
         $state = $_POST["state"]; 
         
		     $userid = $_SESSION['logInId'];
	
	 if($city == 'NULL'){

    $city = NULL;
   }


    if($state == 'NULL'){

    $state = NULL;
   }
	
		$data =  checkbranchlevel($country,$state,$city,$vendorid,$DB_CLASS);
//     print_r($data);
// exit();

   if($data ==  1){

$reqbranch = $branch->requestbranch($name,$contactno,$emailid,$address,$address2,$userid,$vendorid);

   }else{


echo $data;
exit();

   }
    




	} 
        
        if (!empty($reqbranch)){
			$getbranch=$branch->getspecificbranchbyemail($emailid);
			$branchid = $getbranch[0]["branch_id"];
            $_SESSION['branchid'] = $branchid;
         //   echo $_SESSION['branchid'];
      //  echo "record added";
		}  
            if (!empty($getbranch)){
				$status = TRUE; 
				$country = $_POST["country"];
               // $branchid = $_SESSION['branchid'];
					$addcountry = $branch->addcountrytosubbranch($branchid,$country);
			 }  else {
                $status = FALSE;
            }
                if (!empty($addcountry)){
                  //  $branchid = $_SESSION['branchid'];
						$getsubbranchcountry = $branch->getspecificsubbranchcountry($branchid);
						$sbc = $getsubbranchcountry[0]["sbc_id"];
               $status = TRUE;
				} else {
                $status = FALSE;
            }
                if (!empty($getsubbranchcountry)){
						//$state = $_POST["state"];	
                //    $branchid = $_SESSION['branchid'];
                  if(!empty($state)){
						$addstate = $branch->addstatetosubbranch($state,$branchid,$sbc);
				    $status = TRUE;
          }
                }else {
                $status = FALSE;
            } 
                if (!empty($addstate)){
                  //  $branchid = $_SESSION['branchid'];
							$getsubbranchstate = $branch->getspecificsubbranchstate($branchid);
							$sbs = $getsubbranchstate[0]["sbs_id"];
						$status = TRUE;
                        }	else {
                $status = FALSE;
            }
                            if (!empty($getsubbranchstate)){
							// $city = $_POST["city"];
                      //          $branchid = $_SESSION['branchid'];
                              if(!empty($city)){
							$addcity = $branch->addcitytosubbranch($city,$branchid,$sbs);
            }
						//	echo "city added";
                               
						}else {
               // echo "not added city";
            }
	
					$vbadd = $branch->addvendorandbranch($vendorid,$branchid);	
                if (!empty($vbadd)){
                    $getvbid = $branch->getbranchevendorid($vendorid);
              $status = TRUE;
              echo  "1";
                } else {
                    $status = FALSE;
                    echo  "0";
                }
                    if (!empty($getvbid)){
                    $_SESSION['vbid'] = $getvbid[0]["vb_id"];
                       //  echo $_SESSION['vbid'];
                      //  echo "got vb id ";
                    }
        else {
                           // echo "not get vb id";
        }
       

?>
