<?php  
const DSINNER = DIRECTORY_SEPARATOR; 
$config_service = [

	'DB_CLASS' =>  APPLICATION_INNERPATH  . DSINNER  . 'model'  . DSINNER  .  'classDatabaseManager.php',
	'USER_CLASS' => APPLICATION_INNERPATH   . DSINNER  . 'model' . DSINNER . 'user' . DSINNER . 'userClass.php',
	'BRANCH_CLASS' => APPLICATION_INNERPATH   . DSINNER  . 'model' . DSINNER . 'branch' . DSINNER . 'branchClass.php',
	'MENU_CLASS' => APPLICATION_INNERPATH   . DSINNER  . 'model' . DSINNER . 'menu' . DSINNER . 'menuClass.php',
	'ORDER_CLASS' => APPLICATION_INNERPATH   . DSINNER  . 'model' . DSINNER . 'order' . DSINNER . 'orderClass.php',
	'PRODUCT_CLASS' => APPLICATION_INNERPATH   . DSINNER  . 'model' . DSINNER . 'product' . DSINNER . 'productClass.php',
	'VENDOR_CLASS' => APPLICATION_INNERPATH   . DSINNER  . 'model' . DSINNER . 'vendor' . DSINNER . 'vendorClass.php',
    'CATEGORY_CLASS' => APPLICATION_INNERPATH   . DSINNER  . 'model' . DSINNER . 'category' . DSINNER . 'categoryClass.php',
    'BRAND_CLASS' => APPLICATION_INNERPATH   . DSINNER  . 'model' . DSINNER . 'brand' . DSINNER . 'brandClass.php'
];



?>