<?php
$flutterwavekey = null;
$flutterwavesecret = null;

$pesapalkey = null;
$pesapalsecret = null;

$paystackkey = null;
$paystacksecret = null;

$mpesakey = null;
$mpesasecret = null;

$fdata = getpaymentmethods('',$branch_id,'Flutterwave');

if(!empty($fdata)){
$flutterwavekey = $fdata[0]['pay_key'];
$flutterwavesecret = $fdata[0]['secret'];
$flutterwavestatus = $fdata[0]['status'];

if($flutterwavestatus == 1){
$flutterwavestatus = 'CHECKED';
}else{
$flutterwavestatus = 'UNCHECKED';
}


}




$pesapaldata = getpaymentmethods('',$branch_id,'Pesapal');

if(!empty($pesapaldata)){
$pesapalkey = $pesapaldata[0]['pay_key'];
$pesapalsecret = $pesapaldata[0]['secret'];
$pesapalstatus = $pesapaldata[0]['status'];

if($pesapalstatus == 1){
$pesapalstatus = 'CHECKED';
}else{
$pesapalstatus = 'UNCHECKED';
}



}





$paystackdata = getpaymentmethods('',$branch_id,'paystack');

if(!empty($paystackdata)){
$paystackkey = $paystackdata[0]['pay_key'];
$paystacksecret = $paystackdata[0]['secret'];


$paystackstatus = $paystackdata[0]['status'];

if($paystackstatus == 1){
$paystackstatus = 'CHECKED';
}else{
$paystackstatus = 'UNCHECKED';
}


}




$mpesadata = getpaymentmethods('',$branch_id,'mpesa');

if(!empty($mpesadata)){
$mpesakey = $mpesadata[0]['pay_key'];
$mpesasecret = $mpesadata[0]['secret'];

$mpesastatus = $mpesadata[0]['status'];

if($mpesastatus == 1){
$mpesastatus = 'CHECKED';
}else{
$mpesastatus = 'UNCHECKED';
}

}












?>