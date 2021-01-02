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

extract($_POST);
$error=array();
$extension=array("jpeg","jpg","png","gif");
$randomstring = generateRandomString();

	$product=new Product();
	$message=null;

	if(isset($_POST["add"])){
	
	$name = $_POST["name"];
        $description = $_POST["description"];
        $quantity = $_POST["quantity"];
        $price = $_POST["price"];
        $code = $name.$randomstring;
        $category = $_POST["category"];
        $secondlevel = $_POST["secondlevel"];
        $thirdlevel = $_POST["thirdlevel"];
       if (isset ($_SESSION['vbid'])){
		$vbid = $_SESSION['vbid'];
	  
	//echo $vbid;
	
		$addedproduct = $product->addnewproduct($name,$description,$quantity,$price,$code,$category,$secondlevel,$thirdlevel,$vbid);
		if (!empty($addedproduct)){
			$getproductid = $product->getproductidbycode($code);
                $productid = $getproductid[0]["product_id"];
		//echo $productid;
            foreach($_FILES["files"]["tmp_name"] as $key=>$tmp_name) {
    $file_name=$_FILES["files"]["name"][$key];
    $file_tmp=$_FILES["files"]["tmp_name"][$key];
    $ext=pathinfo($file_name,PATHINFO_EXTENSION);
    

    if(in_array($ext,$extension)) {
        
            $filename=basename($file_name,$ext);
            $newFileName=$randomstring.$filename.time().".".$ext;
            move_uploaded_file($file_tmp=$_FILES["files"]["tmp_name"][$key],"../photo_gallery/".$newFileName);
            echo $newFileName;
            $addimages = $product->insertimagesbyproductid($productid,$newFileName);
          
    }
    else {
        array_push($error,"$file_name, ");
    }
}

            echo "0";
        } else {
			echo "1";		
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
