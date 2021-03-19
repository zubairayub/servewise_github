<?php
session_start();
defined('APPLICATION_PATH') || define('APPLICATION_PATH', realpath( dirname(__FILE__) . '/../../../../app')); 
const DS = DIRECTORY_SEPARATOR; 
require  APPLICATION_PATH . DS . 'lib'. DS .'functions.php';
$DB_CLASS =     APPLICATION_PATH . DS . 'model' . DS. 'classDatabaseManager.php';
$PRODUCT_DIRECTORY = '../../../upload/products/';
$logo_directory =  '../../../upload/logos/';
$default_image_store = '../../../view/img/web_images/supermarket/';
$default_image_fashion = '../../../view/img/web_images/fashion/';
$default_image_medical = '../../../view/img/web_images/pharmacy/';
$default_image_restaurent = '../../../view/img/web_images/res/';

if(!empty($_SESSION['vb_id'])){

$vb_id = $_SESSION['vb_id'];
$type = $_SESSION['type'];
$domain_url =$_SESSION['domain_url']; 
$theme_id = $_SESSION['theme_id'];
$theme_title = $_SESSION['theme_title'];
$theme_url = $_SESSION['theme_url'];
$owner_id = $_SESSION['owner_id'];

$result = getproducts($vb_id,$DB_CLASS);

  $config_system = get_config_system($owner_id); 

   $footer_about_disc = search_array('footer about dis',$config_system);
    $foote_ad = search_array('address',$config_system);
    $footer_contact = search_array('contact',$config_system);
    $footer_email = search_array('email',$config_system);
    $footer_copyr = search_array('Copyrighttext',$config_system);
    $footer_fb_link = search_array('facebook',$config_system);
    $footer_tw_link = search_array('twitter',$config_system);
    $footer_inst_link = search_array('instagram',$config_system);
    $footer_in_link = search_array('Linkin',$config_system);




if(!empty($footer_contact)){

  $footer_contact = $footer_contact['value'];

}else{
$footer_contact = '+92-00000000';  
}


if(!empty($footer_about_disc)){

  $footer_about_disc = $footer_about_disc['value'];

}else{
$footer_about_disc = 'Description Here';  
}
if(!empty($foote_ad)){

  $foote_ad = $foote_ad['value'];

}else{
$foote_ad = 'Store Address';  
}
if(!empty($footer_email)){

  $footer_email = $footer_email['value'];

}else{
$footer_email = 'Store Email';  
}
if(!empty($footer_copyr)){

  $footer_copyr = $footer_copyr['value'];

}else{
$footer_copyr = 'Store Copy Rights';  
}
if(!empty($footer_fb_link)){

  $footer_fb_link = $footer_fb_link['value'];

}else{
$footer_fb_link = 'facebook.com';  
}
if(!empty($footer_tw_link)){

  $footer_tw_link = $footer_tw_link['value'];

}else{
$footer_tw_link = 'twitter.com';  
}
if(!empty($footer_inst_link)){

  $footer_inst_link = $footer_inst_link['value'];

}else{
$footer_inst_link = 'Instagaram Link';  
}
if(!empty($footer_in_link)){

  $footer_in_link = $footer_in_link['value'];

}else{
$footer_in_link = 'Linkdin Link';  
}















$branch_data = getbranchbybranchid($DB_CLASS,$vb_id);
$branch_name =  $_SESSION['branch_name'] = $branch_data[0]['name'];

$logo = $_SESSION['logo'] =  getlogo_dashboard($owner_id,$DB_CLASS,$logo_directory);





    $payment_method =   getpaymentmethods($DB_CLASS,$vb_id,'');
    foreach ($payment_method as $key => $value) {
    	if($value['status'] == 1){

$html = ' <option value="' .$value['method'] . '">' . $value['method'] .'</option>';

    	}
    }
      $pay_method = $_SESSION['pay_method'] = '<div class="viewcart-payment-detail">
        <label>Payment Method</label>
        <select name="payment-method">
        '. $html .'
         </select> 
          <input type="submit" name="submit" id="submit" class="mt-3 btn btn-pay w-100 d-flex justify-content-between btn-lg rounded-0" value="Submit">
      </div>';







}else{


header('Location: ../../../../public/');


}

?>
