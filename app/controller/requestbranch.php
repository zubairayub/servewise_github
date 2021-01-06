<?php
session_start();
//echo $_SESSION["logIn"];
//echo $_SESSION['logInName'];

defined('APPLICATION_INNERPATH') || define('APPLICATION_INNERPATH', realpath( dirname(__FILE__) . '/../'));

//echo 0;
$PATH =  constant("APPLICATION_INNERPATH");

require $PATH . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'service_config.php'; 
require_once $config_service['DB_CLASS'];
require $config_service['BRANCH_CLASS'];
	
	$branch=new branch();
	$message=null;

	


	if(isset($_POST["vendor"])){
	
	$vendorid = $_POST["vendor"];
		$name = $_POST["name"];
     $contactno = $_POST["contactno"];
	$emailid = $_POST["email"];
		$address = $_POST["address"];
        $address2 = $_POST["address2"];
      
		$userid = $_SESSION['logInId'];
	
	
	
		$reqbranch = $branch->requestbranch($name,$contactno,$emailid,$address,$address2,$userid,$vendorid);
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
						$state = $_POST["state"];	
                //    $branchid = $_SESSION['branchid'];
						$addstate = $branch->addstatetosubbranch($state,$branchid,$sbc);
				    $status = TRUE;
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
							 $city = $_POST["city"];
                      //          $branchid = $_SESSION['branchid'];
							$addcity = $branch->addcitytosubbranch($city,$branchid,$sbs);
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
