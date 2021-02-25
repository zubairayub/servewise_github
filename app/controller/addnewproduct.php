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


$DB_CLASS = $config_service['DB_CLASS'];

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
        $weight = $_POST["weight"];
        $featured = $_POST["featured"];
        $publish = $_POST["publish"];

IF($publish != 1){
$publish = 0;
}

IF($featured != 1){
$featured = 0;
}

       

        $purchase_price = $_POST["purchase_price"];
        $createdby = $_SESSION['logInId'];  
        $type =  $_SESSION['type'];
        $type = getstatus($type);
        if($type == 'Branch' || $_SESSION['owner_type'] == 'Branch')
        {

        //$data =  getbranches($createdby);
        $vbid =  $_SESSION['branch_id'];
        $vendorid =  $_SESSION['vendor_id'];
        }elseif($type == 'Admin'){

        $vbid =  0;

        }elseif($type == 'Vendor' || $_SESSION['owner_type'] == 'Vendor'){
       // $data =  getvendors($createdby);
        $vbid =  $_SESSION['vendor_id'];

        }else{

          header('Location ?page=logout');
        }
       if (!empty($vbid)){
        
	
		$addedproduct = $product->addnewproduct($name,$description,$quantity,$price,$code,$category,$secondlevel,$thirdlevel,$vbid,$weight,$featured,$publish,$purchase_price);
		if (!empty($addedproduct)){
			$getproductid = $product->getproductidbycode($code);
                $productid = $getproductid[0]["product_id"];
		
              
// get details of the uploaded file
foreach($_FILES["files"]["tmp_name"] as $key=>$tmp_name) {
 //   $file_name=$_FILES["files"]["name"][$key];

$fileTmpPath = $_FILES['files']['tmp_name'][$key];
$fileName = $_FILES['files']['name'][$key];
$fileSize = $_FILES['files']['size'][$key];
$fileType = $_FILES['files']['type'][$key];
$fileNameCmps = explode(".", $fileName);
$fileExtension = strtolower(end($fileNameCmps));



$url = upload_file($fileName,$fileExtension,$fileTmpPath,$fileSize,$fileType,$fileNameCmps,$PRODUCT_DIRECTORY);
    

 $addimages = $product->insertimagesbyproductid($productid,$url);
   
    }        
             insert_notifications($DB_CLASS,$createdby,'6','product_added','https://servewise.shop');
            
             insert_notifications($DB_CLASS,$createdby,$vendorid,'product_added','https://servewise.shop');

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
