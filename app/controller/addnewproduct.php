<?php
session_start();
//echo $_SESSION["logIn"];
//echo $_SESSION['logInName'];

defined('APPLICATION_INNERPATH') || define('APPLICATION_INNERPATH', realpath( dirname(__FILE__) . '/../'));

//echo 0;
$PATH =  constant("APPLICATION_INNERPATH");

require $PATH . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'service_config.php'; 
require_once $config_service['DB_CLASS'];
require $config_service['PRODUCT_CLASS'];
require $config_service['FUNCTIONS'];




$PRODUCT_DIRECTORY  = $config_service['PRODUCT_DIRECTORY'];

extract($_POST);
$error=array();
$extension=array("jpeg","jpg","png","gif");
$randomstring = generateRandomString();

	$product=new Product();
	$message=null;

	if(isset($_POST["name"])){
	
	    $name = $_POST["name"];
        $description = $_POST["description"];
        $quantity = $_POST["quantity"];
        $price = $_POST["price"];
        $code = $name.$randomstring;
        $category = $_POST["category"];
        $secondlevel = $_POST["secondlevel"];
        $thirdlevel = $_POST["thirdlevel"];
        $createdby = $_SESSION['logInId'];  
        $type =  $_SESSION['type'];
        $type = getstatus($type);
        if($type == 'Branch')
        {

        $data =  getbranches($createdby);
        $vbid =  $data[0]['branch_id'];
        }elseif($type == 'Admin'){

        $vbid =  0;

        }elseif($type == 'Vendor'){
        $data =  getvendors($createdby);
        $vbid =  $data[0]['vendor_id'];

        }else{

          header('Location ?page=logout');
        }
       if (!empty($vbid)){
        
	
		$addedproduct = $product->addnewproduct($name,$description,$quantity,$price,$code,$category,$secondlevel,$thirdlevel,$vbid);
		if (!empty($addedproduct)){
			$getproductid = $product->getproductidbycode($code);
                $productid = $getproductid[0]["product_id"];
		
              
// get details of the uploaded file
$fileTmpPath = $_FILES['files']['tmp_name'];
$fileName = $_FILES['files']['name'];
$fileSize = $_FILES['files']['size'];
$fileType = $_FILES['files']['type'];
$fileNameCmps = explode(".", $fileName);
$fileExtension = strtolower(end($fileNameCmps));



$url = upload_file($fileName,$fileExtension,$fileTmpPath,$fileSize,$fileType,$fileNameCmps,$PRODUCT_DIRECTORY);
    

 $addimages = $product->insertimagesbyproductid($productid,$url);

    // if(in_array($ext,$extension)) {
        
    //         $filename=basename($file_name,$ext);
    //         $newFileName=$randomstring.$filename.time().".".$ext;
    //         move_uploaded_file($file_tmp=$_FILES["files"]["tmp_name"][$key],"../upload/products/".$newFileName);
    //         echo $newFileName;
    //         $addimages = $product->insertimagesbyproductid($productid,$newFileName);
          
    // }
    // else {
    //     array_push($error,"$file_name, ");
    // }

            ?>

<script>window.location.replace("https://servewise.shop/public/?page=viewproduct_dashboard");</script>
            <?php
        } else {
            ?>
			<script>window.location.replace("https://servewise.shop/public/?page=addnewproduct_dashboard");</script>	<?php
        }
	
	} else {
		   echo "branch not created";
	   }
		 } 


function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}



?>
