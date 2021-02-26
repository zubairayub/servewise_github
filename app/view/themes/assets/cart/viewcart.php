<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-189150205-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'UA-189150205-1');
</script>

<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-MXSHQXW');</script>
<!-- End Google Tag Manager -->
<script type="text/javascript">
window.dataLayer = window.dataLayer||[];
function trackGTMEcommerce() {
    this._addTrans = addTrans;
    this._addItem = addItems;
    this._trackTrans = trackTrans;
}

var transaction = {};
transaction.transactionProducts = [];

function addTrans(orderID, store, total, tax, shipping, city, state, country) {
    transaction.transactionId = orderID;
    transaction.transactionAffiliation = store;
    transaction.transactionTotal = total;
    transaction.transactionTax = tax;
    transaction.transactionShipping = shipping;
}


function addItems(orderID, sku, product, variation, price, quantity) {
    transaction.transactionProducts.push({
        'id': orderID,
            'sku': sku,
            'name': product,
            'category': variation,
            'price': price,
            'quantity': quantity
    });
}

function trackTrans() {
    transaction.event = 'transactionSuccess';
    dataLayer.push(transaction);
}

var pageTracker = new trackGTMEcommerce();
</script>
<script>

var product_id = $('#product_id').val();
var Product_name = $('#product_price').val();
var product_price = $('#product_price').val();
// Measures product impressions and also tracks a standard
// pageview for the tag configuration.
// Product impressions are sent by pushing an impressions object
// containing one or more impressionFieldObjects.
dataLayer.push({
  'ecommerce': {
    'currencyCode': 'USD',                       // Local currency is optional.
    'impressions': [
     {
       'name': product_name,       // Name or ID is required.
       'id': product_id,
       'price': product_price,
       'category': 'Any',
       'list': 'Search Results'
     }]
  }
});
</script>
<?php
// Get the results as JSON string
$product_list = filter_input(INPUT_POST, 'cart_list');
// Convert JSON to array
$product_list_array = json_decode($product_list);
//var_dump(count($product_list_array)); var_dump($product_list_array);
$proct_final_price = NULL;
$total_product = NULL;
 ?>
 <?php  include '../themePages/theme_header.phtml'; ?>
<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MXSHQXW"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<div class="container mt-5 mb-5 viewcart-main">
<table class="viewcart-table">
   <tr class="viewcart-table-row">
     <th class="viewcart-heading1">product Image</th>
     <th class="viewcart-heading2">Name</th>
     <th class="viewcart-heading3">Cost</th>
     <th class="viewcart-heading4">Quantity</th>
     <th class="viewcart-heading5">Total</th>
     <th class="viewcart-heading6">Options</th>
   </tr>
 </table>
<?php foreach($product_list_array as $results){
$proct_final_price += $results->product_price * $results->product_quantity;
// var_dump($results);
 ?>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
    .viewcart-main{border: 1px solid rgba(0,0,0,0.2);border-radius: 4px;box-shadow: 0px 3px 6px rgba(0,0,0,0.1);padding: 10px;}
    .viewcart-main .viewcart-product-head{border-bottom: 1px solid rgba(0,0,0,0.2);}
    .viewcart-main .viewcart-product-head .viewcart-heading{margin: inherit;background: #f75252;border-radius: 4px;padding: 0px 10px;color: white;}
    .viewcart-main .viewcart-item-content{display: flex;justify-content: center;align-items: center;}
    .viewcart-main .viewcart-item-content .viewcart3,.viewcart5{display:none;}
    .viewcart-main .viewcart-item-content .viewcart1{flex-basis: 15%;display: flex;justify-content: center;align-items: center;}
    .viewcart-main .viewcart-item-content .viewcart2{flex-basis: 25%;display: flex;justify-content: center;}
    .viewcart-main .viewcart-item-content .viewcart2 .h6{display: flex;justify-content: center;align-items: center;width: 100%;}
    .viewcart-main .viewcart-item-content .viewcart4{display: flex;flex-basis: 20%;justify-content: center;align-items: center;color: green;font-size: 20px;}
    .viewcart-main .viewcart-item-content .viewcart5{flex-basis: 10%;display: flex;justify-content: center;align-items: center;}
    .viewcart-main .viewcart-item-content .viewcart4 label{margin-right:10px;font-size:18px;}
    .viewcart-main .viewcart-item-content .viewcart4 input{text-align:center; border: 1px dashed black;border-radius: 4px;width: 90px;font-size: 18px;padding: 2px 10px;}
    .viewcart-main .viewcart-item-content .viewcart6{width: 10%;justify-content: center;display: flex;align-items: center;}
    .viewcart-main .viewcart-item-content .viewcart6 .vewcart-delet{border: 1px solid rgba(0,0,0,0.2);border-radius: 50%;width: 35px;height: 35px;background: #ff8888;color: white;}
    .viewcart-sum-content{display: flex;justify-content: space-between;align-items: flex-start;padding:0px 25px; margin: 15px 0px;border-radius: 4px;overflow: hidden;}
    .viewcart-sum-content .viewcart-sum{width: 40%;border: 1px solid rgba(0,0,0,0.2);box-shadow: 0px 3px 6px rgba(0,0,0,0.1);padding: 10px;border-radius: 4px;}
    .viewcart-sum-content .short-note{flex-basis: 40%;border: 1px dashed rgba(0,0,0,0.4);box-shadow: 0px 3px 6px rgba(0,0,0,0.1); border-radius: 4px;background: white;padding: 20px;}
    .viewcart-sum-content .short-note .short-note-heading{color:red;}
    .viewcart-sum-content .short-note .short-note-heading i{transition:.3s ease;}
    .viewcart-sum-content .short-note:hover .short-note-heading i{margin-left:20px;    transform: rotate(360deg);}
    .viewcart-sum-content .viewcart-sum .viewcart-coupons{display: flex;justify-content: center;align-items: center;border-bottom: 1px solid rgba(0,0,0,0.2);padding-bottom: 15px;}
    .viewcart-sum-content .viewcart-sum .viewcart-coupons label{font-size: 20px;font-weight: 600;margin-right: 10px;}
    .viewcart-sum-content .viewcart-sum .viewcart-coupons .coupon{margin-right: 10px;border: none;}
    .viewcart-sum-content .viewcart-sum .viewcart-coupons .redeem{border: 1px solid rgba(0,0,0,0.2);background: white;border-radius: 4px;font-size: 20px;box-shadow: 0px 3px 6px rgba(0,0,0,0.2);transition: .3s ease;}
    .viewcart-sum-content .viewcart-sum .viewcart-coupons .redeem:hover{transform: scale(1.1); box-shadow: 0px 3px 6px rgba(0,0,0,0.4);}
    .viewcart-sum-content .viewcart-main-content .viewcart-sum-heading{font-size: 20px;font-weight: 600;text-align: center;}
    .viewcart-sum-content .viewcart-main-content .viewcart-sum-heading .sum-head{font-size: 34px;color: green;border-bottom: 1px dashed rgba(0,0,0,0.4);border-top: 1px dashed rgba(0,0,0,0.4);}
    .viewcart-sum-content .viewcart-main-content .viewcart-sum1{display: flex;justify-content: center;font-size: 20px;font-weight: 600; align-items: center;}
    .viewcart-sum-content .viewcart-main-content .viewcart-sum1 .text-uppercase1{flex-basis:50%; display: flex;justify-content: flex-end; align-items: center;}
    .viewcart-sum-content .viewcart-main-content .viewcart-sum1 .text-uppercase2{flex-basis:50%; display: flex;justify-content: flex-end; align-items: center;}
    .viewcart-sum-content .viewcart-main-content .viewcart-sum1 .text-uppercase3{flex-basis:50%; display: flex;justify-content: flex-end; align-items: center;}
    .viewcart-sum-content .viewcart-main-content .viewcart-sum1 .totals-value1{flex-basis:50%; display: flex;justify-content: center; align-items: center;}
    .viewcart-sum-content .viewcart-main-content .viewcart-sum1 .totals-value2{flex-basis:50%; display: flex;justify-content: center; align-items: center;}
    .viewcart-sum-content .viewcart-main-content .viewcart-sum1 .totals-value3{flex-basis:50%; display: flex;justify-content: center; align-items: center;}
    .viewcart-payment-detail{display: flex;justify-content: center;align-items: center;border-top: 1px solid rgba(0,0,0,0.2);padding: 20px 0px;}
    .viewcart-payment-detail label{flex-basis: 40%;font-size: 20px;font-weight: 600;}
    .viewcart-payment-detail select{flex-basis: 40%;border: 1px dashed black;font-size: 20px;border-radius: 4px;padding: 0px 10px;margin-right: 10px;}
    .viewcart-payment-detail input{border: 1px solid rgba(0,0,0,0.2);background: white;font-size: 20px;border-radius: 4px;padding: 10px;box-shadow: 0px 3px 6px rgba(0,0,0,0.2); transition: .3s ease;}
    .viewcart-payment-detail input:hover{transform: scale(1.1); box-shadow: 0px 3px 6px rgba(0,0,0,0.4);}
    .pic100x100{width:100px;height:100px}
    .viewcart-table{width: 100%;}
    .viewcart-table .viewcart-table-row{display: flex;justify-content: center;align-items: center;}
    .viewcart-table .viewcart-table-row .viewcart-heading1{flex-basis:15%;color: #4c4c4c;}
    .viewcart-table .viewcart-table-row .viewcart-heading2{flex-basis:25%; color: #4c4c4c;}
    .viewcart-table .viewcart-table-row .viewcart-heading3{flex-basis:20%; color: #4c4c4c;}
    .viewcart-table .viewcart-table-row .viewcart-heading4{flex-basis:20%; color: #4c4c4c;}
    .viewcart-table .viewcart-table-row .viewcart-heading5{flex-basis:10%; color: #4c4c4c;}
    .viewcart-table .viewcart-table-row .viewcart-heading6{flex-basis:10%; color: #4c4c4c;}
    
    @media(max-width:1000px){
      .header-content {padding: 10px 10px;}
      .viewcart-payment-detail select {flex-basis: 40%;}
      .header-content .header-content-right .header-logo-section img {width: 40px;height: 38px;}
      .viewcart-main {overflow: auto;padding: 5px;margin:auto 10px!important;}
      .viewcart-main .viewcart-item-content .viewcart2 .h6 {font-size: 12px;}
      .viewcart-main .viewcart-item-content {padding: 10px 4px;}
      .pic100x100 {width: 50px;height: 50px;}
      .viewcart-table tbody{font-size:12px;}
      .viewcart-table{width:100%;}
      .lower-table{width:100%;}
      .container {margin: auto 10px;}
      .viewcart-main .viewcart-item-content .viewcart4 {font-size: 18px;}
      .viewcart-main .viewcart-item-content .viewcart4 input {width: 60px;font-size: 18px;padding: 10px 10px;}
      .viewcart-main .viewcart-item-content .viewcart6 .vewcart-delet {width: 25px;height: 25px;}
      .viewcart-sum-content {flex-wrap: wrap;    padding: 0px 10px;}
      .viewcart-sum-content .short-note {flex-basis: 30%;padding: 10px;}
      .short-note-heading h3{margin: 3px 0px;}
      .short-note-disc p{font-size:12px;}
      .viewcart-sum-content .viewcart-sum {    margin-top: 0px;flex-basis: 60%;}
      .viewcart-sum-content .viewcart-sum .viewcart-coupons {flex-wrap: wrap;}
      .viewcart-sum-content .viewcart-sum .viewcart-coupons label {flex-basis: 20%;}
      .viewcart-sum-content .viewcart-sum .viewcart-coupons .coupon {flex-basis: 35%;margin: 10px 5px;}
      .viewcart-sum-content .viewcart-main-content .viewcart-sum-heading .sum-head {font-size: 24px;}
      .viewcart-sum-content .viewcart-main-content .viewcart-sum1 {font-size: 16px;}
      .viewcart-payment-detail {flex-wrap: wrap;}
      .viewcart-payment-detail label {flex-basis: 30%;font-size:16px;}
      .viewcart-sum-content .viewcart-main-content .viewcart-sum1 .text-uppercase1 {margin: 10px 0px;}
      .viewcart-sum-content .viewcart-main-content .viewcart-sum1 .totals-value1 {margin: 10px 0px;}
      .viewcart-sum-content .viewcart-main-content .viewcart-sum1 .text-uppercase2 {margin: 10px 0px;}
      .viewcart-sum-content .viewcart-main-content .viewcart-sum1 .totals-value2{margin: 10px 0px;}
      .viewcart-sum-content .viewcart-main-content .viewcart-sum1 .text-uppercase3{margin: 10px 0px;}
      .viewcart-sum-content .viewcart-main-content .viewcart-sum1 .totals-value3{margin: 10px 0px;}
      .viewcart-payment-detail input {font-size: 16px;padding: 5px;}
      #menu {position: absolute;width: 285px;margin: -40px 0 0 -302px;padding: 35px;}
    }


    @media(max-width:900px){
      .header-content {padding: 10px 10px;}
      .viewcart-payment-detail select {flex-basis: 40%;}
      .header-content .header-content-right .header-logo-section img {width: 40px;height: 38px;}
      .viewcart-main {overflow: auto;padding: 5px;margin:auto 10px!important;}
      .viewcart-main .viewcart-item-content .viewcart2 .h6 {font-size: 12px;}
      .viewcart-main .viewcart-item-content {padding: 10px 4px;}
      .pic100x100 {width: 50px;height: 50px;}
      .viewcart-table tbody{font-size:12px;}
      .viewcart-table{width:100%;}
      .lower-table{width:100%;}
      .container {margin: auto 10px;}
      .viewcart-main .viewcart-item-content .viewcart4 {font-size: 18px;}
      .viewcart-main .viewcart-item-content .viewcart4 input {width: 60px;font-size: 18px;padding: 10px 10px;}
      .viewcart-main .viewcart-item-content .viewcart6 .vewcart-delet {width: 25px;height: 25px;}
      .viewcart-sum-content {flex-wrap: wrap;    padding: 0px 10px;}
      .viewcart-sum-content .short-note {flex-basis: 30%;padding: 10px;}
      .short-note-heading h3{margin: 3px 0px;}
      .short-note-disc p{font-size:12px;}
      .viewcart-sum-content .viewcart-sum {    margin-top: 0px;flex-basis: 60%;}
      .viewcart-sum-content .viewcart-sum .viewcart-coupons {flex-wrap: wrap;}
      .viewcart-sum-content .viewcart-sum .viewcart-coupons label {flex-basis: 20%;}
      .viewcart-sum-content .viewcart-sum .viewcart-coupons .coupon {flex-basis: 35%;margin: 10px 5px;}
      .viewcart-sum-content .viewcart-main-content .viewcart-sum-heading .sum-head {font-size: 24px;}
      .viewcart-sum-content .viewcart-main-content .viewcart-sum1 {font-size: 16px;}
      .viewcart-payment-detail {flex-wrap: wrap;}
      .viewcart-payment-detail label {flex-basis: 30%;font-size:16px;}
      .viewcart-sum-content .viewcart-main-content .viewcart-sum1 .text-uppercase1 {margin: 10px 0px;}
      .viewcart-sum-content .viewcart-main-content .viewcart-sum1 .totals-value1 {margin: 10px 0px;}
      .viewcart-sum-content .viewcart-main-content .viewcart-sum1 .text-uppercase2 {margin: 10px 0px;}
      .viewcart-sum-content .viewcart-main-content .viewcart-sum1 .totals-value2{margin: 10px 0px;}
      .viewcart-sum-content .viewcart-main-content .viewcart-sum1 .text-uppercase3{margin: 10px 0px;}
      .viewcart-sum-content .viewcart-main-content .viewcart-sum1 .totals-value3{margin: 10px 0px;}
      .viewcart-payment-detail input {font-size: 16px;padding: 5px;}
      #menu {position: absolute;width: 285px;margin: -40px 0 0 -302px;padding: 35px;}
    }

    @media(max-width:800px){
      .header-content {padding: 10px 10px;}
      .viewcart-payment-detail select {flex-basis: 40%;}
      .header-content .header-content-right .header-logo-section img {width: 40px;height: 38px;}
      .viewcart-main {overflow: auto;padding: 5px;margin:auto 10px!important;}
      .viewcart-main .viewcart-item-content .viewcart2 .h6 {font-size: 12px;}
      .viewcart-main .viewcart-item-content {padding: 10px 4px;}
      .pic100x100 {width: 50px;height: 50px;}
      .viewcart-table tbody{font-size:12px;}
      .viewcart-table{width:100%;}
      .lower-table{width:100%;}
      .container {margin: auto 10px;}
      .viewcart-main .viewcart-item-content .viewcart4 {font-size: 18px;}
      .viewcart-main .viewcart-item-content .viewcart4 input {width: 60px;font-size: 18px;padding: 10px 10px;}
      .viewcart-main .viewcart-item-content .viewcart6 .vewcart-delet {width: 25px;height: 25px;}
      .viewcart-sum-content {flex-wrap: wrap;    padding: 0px 10px;}
      .viewcart-sum-content .short-note {flex-basis: 30%;padding: 10px;}
      .short-note-heading h3{margin: 3px 0px;}
      .short-note-disc p{font-size:12px;}
      .viewcart-sum-content .viewcart-sum {    margin-top: 0px;flex-basis: 60%;}
      .viewcart-sum-content .viewcart-sum .viewcart-coupons {flex-wrap: wrap;}
      .viewcart-sum-content .viewcart-sum .viewcart-coupons label {flex-basis: 20%;}
      .viewcart-sum-content .viewcart-sum .viewcart-coupons .coupon {flex-basis: 35%;margin: 10px 5px;}
      .viewcart-sum-content .viewcart-main-content .viewcart-sum-heading .sum-head {font-size: 24px;}
      .viewcart-sum-content .viewcart-main-content .viewcart-sum1 {font-size: 16px;}
      .viewcart-payment-detail {flex-wrap: wrap;}
      .viewcart-payment-detail label {flex-basis: 30%;font-size:16px;}
      .viewcart-sum-content .viewcart-main-content .viewcart-sum1 .text-uppercase1 {margin: 10px 0px;}
      .viewcart-sum-content .viewcart-main-content .viewcart-sum1 .totals-value1 {margin: 10px 0px;}
      .viewcart-sum-content .viewcart-main-content .viewcart-sum1 .text-uppercase2 {margin: 10px 0px;}
      .viewcart-sum-content .viewcart-main-content .viewcart-sum1 .totals-value2{margin: 10px 0px;}
      .viewcart-sum-content .viewcart-main-content .viewcart-sum1 .text-uppercase3{margin: 10px 0px;}
      .viewcart-sum-content .viewcart-main-content .viewcart-sum1 .totals-value3{margin: 10px 0px;}
      .viewcart-payment-detail input {font-size: 16px;padding: 5px;}
      #menu {position: absolute;width: 285px;margin: -40px 0 0 -302px;padding: 35px;}
    }



    @media(max-width:768px){
      .header-content {padding: 10px 10px;}
      .viewcart-payment-detail select {flex-basis: 40%;}
      .header-content .header-content-right .header-logo-section img {width: 40px;height: 38px;}
      .viewcart-main {overflow: auto;padding: 5px;margin:auto 10px!important;}
      .viewcart-main .viewcart-item-content .viewcart2 .h6 {font-size: 12px;}
      .viewcart-main .viewcart-item-content {padding: 10px 4px;}
      .pic100x100 {width: 50px;height: 50px;}
      .viewcart-table tbody{font-size:12px;}
      .viewcart-table{width:100%;}
      .lower-table{width:100%;}
      .container {margin: auto 10px;}
      .viewcart-main .viewcart-item-content .viewcart4 {font-size: 18px;}
      .viewcart-main .viewcart-item-content .viewcart4 input {width: 60px;font-size: 18px;padding: 10px 10px;}
      .viewcart-main .viewcart-item-content .viewcart6 .vewcart-delet {width: 25px;height: 25px;}
      .viewcart-sum-content {flex-wrap: wrap;    padding: 0px 10px;}
      .viewcart-sum-content .short-note {flex-basis: 30%;padding: 10px;}
      .short-note-heading h3{margin: 3px 0px;}
      .short-note-disc p{font-size:12px;}
      .viewcart-sum-content .viewcart-sum {    margin-top: 0px;flex-basis: 60%;}
      .viewcart-sum-content .viewcart-sum .viewcart-coupons {flex-wrap: wrap;}
      .viewcart-sum-content .viewcart-sum .viewcart-coupons label {flex-basis: 20%;}
      .viewcart-sum-content .viewcart-sum .viewcart-coupons .coupon {flex-basis: 35%;margin: 10px 5px;}
      .viewcart-sum-content .viewcart-main-content .viewcart-sum-heading .sum-head {font-size: 24px;}
      .viewcart-sum-content .viewcart-main-content .viewcart-sum1 {font-size: 16px;}
      .viewcart-payment-detail {flex-wrap: wrap;}
      .viewcart-payment-detail label {flex-basis: 30%;font-size:16px;}
      .viewcart-sum-content .viewcart-main-content .viewcart-sum1 .text-uppercase1 {margin: 10px 0px;}
      .viewcart-sum-content .viewcart-main-content .viewcart-sum1 .totals-value1 {margin: 10px 0px;}
      .viewcart-sum-content .viewcart-main-content .viewcart-sum1 .text-uppercase2 {margin: 10px 0px;}
      .viewcart-sum-content .viewcart-main-content .viewcart-sum1 .totals-value2{margin: 10px 0px;}
      .viewcart-sum-content .viewcart-main-content .viewcart-sum1 .text-uppercase3{margin: 10px 0px;}
      .viewcart-sum-content .viewcart-main-content .viewcart-sum1 .totals-value3{margin: 10px 0px;}
      .viewcart-payment-detail input {font-size: 16px;padding: 5px;}
      #menu {position: absolute;width: 285px;margin: -40px 0 0 -302px;padding: 35px;}
    }

    @media(max-width:600px){
      .header-content {padding: 10px 10px;}
      .viewcart-payment-detail select {flex-basis: 70%;}
      .header-content .header-content-right .header-logo-section img {width: 40px;height: 38px;}
      .viewcart-main {overflow: auto;padding: 5px;margin:auto 10px!important;}
      .viewcart-main .viewcart-item-content .viewcart2 .h6 {font-size: 12px;}
      .viewcart-main .viewcart-item-content {padding: 10px 4px;}
      .pic100x100 {width: 50px;height: 50px;}
      .viewcart-table tbody{font-size:12px;}
      .viewcart-table{width:560px;}
      .lower-table{width:560px;}
      .container {margin: auto 10px;}
      .viewcart-main .viewcart-item-content .viewcart4 {font-size: 12px;}
      .viewcart-main .viewcart-item-content .viewcart4 input {width: 60px;font-size: 18px;padding: 10px 10px;}
      .viewcart-main .viewcart-item-content .viewcart6 .vewcart-delet {width: 25px;height: 25px;}
      .viewcart-sum-content {flex-wrap: wrap;    padding: 0px 10px;}
      .viewcart-sum-content .short-note {flex-basis: 100%;padding: 10px;}
      .short-note-heading h3{margin: 3px 0px;}
      .short-note-disc p{font-size:12px;}
      .viewcart-sum-content .viewcart-sum {    margin-top: 10px;flex-basis: 100%;}
      .viewcart-sum-content .viewcart-sum .viewcart-coupons {flex-wrap: wrap;}
      .viewcart-sum-content .viewcart-sum .viewcart-coupons label {flex-basis: 100%;}
      .viewcart-sum-content .viewcart-sum .viewcart-coupons .coupon {flex-basis: 50%;margin: 10px 30px;}
      .viewcart-sum-content .viewcart-main-content .viewcart-sum-heading .sum-head {font-size: 24px;}
      .viewcart-sum-content .viewcart-main-content .viewcart-sum1 {font-size: 16px;}
      .viewcart-payment-detail {flex-wrap: wrap;}
      .viewcart-payment-detail label {flex-basis: 100%;font-size:16px;}
      .viewcart-sum-content .viewcart-main-content .viewcart-sum1 .text-uppercase1 {margin: 10px 0px;}
      .viewcart-sum-content .viewcart-main-content .viewcart-sum1 .totals-value1 {margin: 10px 0px;}
      .viewcart-sum-content .viewcart-main-content .viewcart-sum1 .text-uppercase2 {margin: 10px 0px;}
      .viewcart-sum-content .viewcart-main-content .viewcart-sum1 .totals-value2{margin: 10px 0px;}
      .viewcart-sum-content .viewcart-main-content .viewcart-sum1 .text-uppercase3{margin: 10px 0px;}
      .viewcart-sum-content .viewcart-main-content .viewcart-sum1 .totals-value3{margin: 10px 0px;}
      .viewcart-payment-detail input {font-size: 16px;padding: 5px;}
      #menu {position: absolute;width: 285px;margin: -40px 0 0 -302px;padding: 35px;}
    }



    @media(max-width:500px){
      .header-content {padding: 10px 10px;}
      .viewcart-payment-detail select {flex-basis: 70%;}
      .header-content .header-content-right .header-logo-section img {width: 40px;height: 38px;}
      .viewcart-main {overflow: auto;padding: 5px;margin:auto 10px!important;}
      .viewcart-main .viewcart-item-content .viewcart2 .h6 {font-size: 12px;}
      .viewcart-main .viewcart-item-content {padding: 10px 4px;}
      .pic100x100 {width: 50px;height: 50px;}
      .viewcart-table tbody{font-size:12px;}
      .viewcart-table{width:500px;}
      .lower-table{width:500px;}
      .container {margin: auto 10px;}
      .viewcart-main .viewcart-item-content .viewcart4 {font-size: 12px;}
      .viewcart-main .viewcart-item-content .viewcart4 input {width: 60px;font-size: 18px;padding: 10px 10px;}
      .viewcart-main .viewcart-item-content .viewcart6 .vewcart-delet {width: 25px;height: 25px;}
      .viewcart-sum-content {flex-wrap: wrap;    padding: 0px 10px;}
      .viewcart-sum-content .short-note {flex-basis: 100%;padding: 10px;}
      .short-note-heading h3{margin: 3px 0px;}
      .short-note-disc p{font-size:12px;}
      .viewcart-sum-content .viewcart-sum {    margin-top: 10px;flex-basis: 100%;}
      .viewcart-sum-content .viewcart-sum .viewcart-coupons {flex-wrap: wrap;}
      .viewcart-sum-content .viewcart-sum .viewcart-coupons label {flex-basis: 100%;}
      .viewcart-sum-content .viewcart-sum .viewcart-coupons .coupon {flex-basis: 50%;margin: 10px 30px;}
      .viewcart-sum-content .viewcart-main-content .viewcart-sum-heading .sum-head {font-size: 24px;}
      .viewcart-sum-content .viewcart-main-content .viewcart-sum1 {font-size: 16px;}
      .viewcart-payment-detail {flex-wrap: wrap;}
      .viewcart-payment-detail label {flex-basis: 100%;font-size:16px;}
      .viewcart-sum-content .viewcart-main-content .viewcart-sum1 .text-uppercase1 {margin: 10px 0px;}
      .viewcart-sum-content .viewcart-main-content .viewcart-sum1 .totals-value1 {margin: 10px 0px;}
      .viewcart-sum-content .viewcart-main-content .viewcart-sum1 .text-uppercase2 {margin: 10px 0px;}
      .viewcart-sum-content .viewcart-main-content .viewcart-sum1 .totals-value2{margin: 10px 0px;}
      .viewcart-sum-content .viewcart-main-content .viewcart-sum1 .text-uppercase3{margin: 10px 0px;}
      .viewcart-sum-content .viewcart-main-content .viewcart-sum1 .totals-value3{margin: 10px 0px;}
      .viewcart-payment-detail input {font-size: 16px;padding: 5px;}
      #menu {position: absolute;width: 285px;margin: -40px 0 0 -302px;padding: 35px;}
    }


    @media(max-width:475px){
      .header-content {padding: 10px 10px;}
      .viewcart-payment-detail select {flex-basis: 70%;}
      .header-content .header-content-right .header-logo-section img {width: 40px;height: 38px;}
      .viewcart-main {overflow: auto;padding: 5px;margin:auto 10px!important;}
      .viewcart-main .viewcart-item-content .viewcart2 .h6 {font-size: 12px;}
      .viewcart-main .viewcart-item-content {padding: 10px 4px;}
      .pic100x100 {width: 50px;height: 50px;}
      .viewcart-table tbody{font-size:12px;}
      .viewcart-table{width:500px;}
      .lower-table{width:500px;}
      .container {margin: auto 10px;}
      .viewcart-main .viewcart-item-content .viewcart4 {font-size: 12px;}
      .viewcart-main .viewcart-item-content .viewcart4 input {width: 60px;font-size: 18px;padding: 10px 10px;}
      .viewcart-main .viewcart-item-content .viewcart6 .vewcart-delet {width: 25px;height: 25px;}
      .viewcart-sum-content {flex-wrap: wrap;    padding: 0px 10px;}
      .viewcart-sum-content .short-note {flex-basis: 100%;padding: 10px;}
      .short-note-heading h3{margin: 3px 0px;}
      .short-note-disc p{font-size:12px;}
      .viewcart-sum-content .viewcart-sum {    margin-top: 10px;flex-basis: 100%;}
      .viewcart-sum-content .viewcart-sum .viewcart-coupons {flex-wrap: wrap;}
      .viewcart-sum-content .viewcart-sum .viewcart-coupons label {flex-basis: 100%;}
      .viewcart-sum-content .viewcart-sum .viewcart-coupons .coupon {flex-basis: 50%;margin: 10px 30px;}
      .viewcart-sum-content .viewcart-main-content .viewcart-sum-heading .sum-head {font-size: 24px;}
      .viewcart-sum-content .viewcart-main-content .viewcart-sum1 {font-size: 16px;}
      .viewcart-payment-detail {flex-wrap: wrap;}
      .viewcart-payment-detail label {flex-basis: 100%;font-size:16px;}
      .viewcart-sum-content .viewcart-main-content .viewcart-sum1 .text-uppercase1 {margin: 10px 0px;}
      .viewcart-sum-content .viewcart-main-content .viewcart-sum1 .totals-value1 {margin: 10px 0px;}
      .viewcart-sum-content .viewcart-main-content .viewcart-sum1 .text-uppercase2 {margin: 10px 0px;}
      .viewcart-sum-content .viewcart-main-content .viewcart-sum1 .totals-value2{margin: 10px 0px;}
      .viewcart-sum-content .viewcart-main-content .viewcart-sum1 .text-uppercase3{margin: 10px 0px;}
      .viewcart-sum-content .viewcart-main-content .viewcart-sum1 .totals-value3{margin: 10px 0px;}
      .viewcart-payment-detail input {font-size: 16px;padding: 5px;}
      #menu {position: absolute;width: 285px;margin: -40px 0 0 -302px;padding: 35px;}
    }


    @media(max-width:450px){
      .header-content {padding: 10px 10px;}
      .viewcart-payment-detail select {flex-basis: 70%;}
      .header-content .header-content-right .header-logo-section img {width: 40px;height: 38px;}
      .viewcart-main {overflow: auto;padding: 5px;margin:auto 10px!important;}
      .viewcart-main .viewcart-item-content .viewcart2 .h6 {font-size: 12px;}
      .viewcart-main .viewcart-item-content {padding: 10px 4px;}
      .pic100x100 {width: 50px;height: 50px;}
      .viewcart-table tbody{font-size:12px;}
      .viewcart-table{width:500px;}
      .lower-table{width:500px;}
      .container {margin: auto 10px;}
      .viewcart-main .viewcart-item-content .viewcart4 {font-size: 12px;}
      .viewcart-main .viewcart-item-content .viewcart4 input {width: 60px;font-size: 18px;padding: 10px 10px;}
      .viewcart-main .viewcart-item-content .viewcart6 .vewcart-delet {width: 25px;height: 25px;}
      .viewcart-sum-content {flex-wrap: wrap;    padding: 0px 10px;}
      .viewcart-sum-content .short-note {flex-basis: 100%;padding: 10px;}
      .short-note-heading h3{margin: 3px 0px;}
      .short-note-disc p{font-size:12px;}
      .viewcart-sum-content .viewcart-sum {    margin-top: 10px;flex-basis: 100%;}
      .viewcart-sum-content .viewcart-sum .viewcart-coupons {flex-wrap: wrap;}
      .viewcart-sum-content .viewcart-sum .viewcart-coupons label {flex-basis: 100%;}
      .viewcart-sum-content .viewcart-sum .viewcart-coupons .coupon {flex-basis: 50%;margin: 10px 30px;}
      .viewcart-sum-content .viewcart-main-content .viewcart-sum-heading .sum-head {font-size: 24px;}
      .viewcart-sum-content .viewcart-main-content .viewcart-sum1 {font-size: 16px;}
      .viewcart-payment-detail {flex-wrap: wrap;}
      .viewcart-payment-detail label {flex-basis: 100%;font-size:16px;}
      .viewcart-sum-content .viewcart-main-content .viewcart-sum1 .text-uppercase1 {margin: 10px 0px;}
      .viewcart-sum-content .viewcart-main-content .viewcart-sum1 .totals-value1 {margin: 10px 0px;}
      .viewcart-sum-content .viewcart-main-content .viewcart-sum1 .text-uppercase2 {margin: 10px 0px;}
      .viewcart-sum-content .viewcart-main-content .viewcart-sum1 .totals-value2{margin: 10px 0px;}
      .viewcart-sum-content .viewcart-main-content .viewcart-sum1 .text-uppercase3{margin: 10px 0px;}
      .viewcart-sum-content .viewcart-main-content .viewcart-sum1 .totals-value3{margin: 10px 0px;}
      .viewcart-payment-detail input {font-size: 16px;padding: 5px;}
      #menu {position: absolute;width: 285px;margin: -40px 0 0 -302px;padding: 35px;}
    }

    @media(max-width:425px){
      .header-content {padding: 10px 10px;}
      .viewcart-payment-detail select {flex-basis: 70%;}
      .header-content .header-content-right .header-logo-section img {width: 40px;height: 38px;}
      .viewcart-main {overflow: auto;padding: 5px;margin:auto 10px!important;}
      .viewcart-main .viewcart-item-content .viewcart2 .h6 {font-size: 12px;}
      .viewcart-main .viewcart-item-content {padding: 10px 4px;}
      .pic100x100 {width: 50px;height: 50px;}
      .viewcart-table tbody{font-size:12px;}
      .viewcart-table{width:500px;}
      .lower-table{width:500px;}
      .container {margin: auto 10px;}
      .viewcart-main .viewcart-item-content .viewcart4 {font-size: 12px;}
      .viewcart-main .viewcart-item-content .viewcart4 input {width: 60px;font-size: 18px;padding: 10px 10px;}
      .viewcart-main .viewcart-item-content .viewcart6 .vewcart-delet {width: 25px;height: 25px;}
      .viewcart-sum-content {flex-wrap: wrap;    padding: 0px 10px;}
      .viewcart-sum-content .short-note {flex-basis: 100%;padding: 10px;}
      .short-note-heading h3{margin: 3px 0px;}
      .short-note-disc p{font-size:12px;}
      .viewcart-sum-content .viewcart-sum {    margin-top: 10px;flex-basis: 100%;}
      .viewcart-sum-content .viewcart-sum .viewcart-coupons {flex-wrap: wrap;}
      .viewcart-sum-content .viewcart-sum .viewcart-coupons label {flex-basis: 100%;}
      .viewcart-sum-content .viewcart-sum .viewcart-coupons .coupon {flex-basis: 50%;margin: 10px 30px;}
      .viewcart-sum-content .viewcart-main-content .viewcart-sum-heading .sum-head {font-size: 24px;}
      .viewcart-sum-content .viewcart-main-content .viewcart-sum1 {font-size: 16px;}
      .viewcart-payment-detail {flex-wrap: wrap;}
      .viewcart-payment-detail label {flex-basis: 100%;font-size:16px;}
      .viewcart-sum-content .viewcart-main-content .viewcart-sum1 .text-uppercase1 {margin: 10px 0px;}
      .viewcart-sum-content .viewcart-main-content .viewcart-sum1 .totals-value1 {margin: 10px 0px;}
      .viewcart-sum-content .viewcart-main-content .viewcart-sum1 .text-uppercase2 {margin: 10px 0px;}
      .viewcart-sum-content .viewcart-main-content .viewcart-sum1 .totals-value2{margin: 10px 0px;}
      .viewcart-sum-content .viewcart-main-content .viewcart-sum1 .text-uppercase3{margin: 10px 0px;}
      .viewcart-sum-content .viewcart-main-content .viewcart-sum1 .totals-value3{margin: 10px 0px;}
      .viewcart-payment-detail input {font-size: 16px;padding: 5px;}
      #menu {position: absolute;width: 285px;margin: -40px 0 0 -302px;padding: 35px;}
    }

    @media(max-width:400px){
      .header-content {padding: 10px 10px;}
      .viewcart-payment-detail select {flex-basis: 70%;}
      .header-content .header-content-right .header-logo-section img {width: 40px;height: 38px;}
      .viewcart-main {overflow: auto;padding: 5px;margin:auto 10px!important;}
      .viewcart-main .viewcart-item-content .viewcart2 .h6 {font-size: 12px;}
      .viewcart-main .viewcart-item-content {padding: 10px 4px;}
      .pic100x100 {width: 50px;height: 50px;}
      .viewcart-table tbody{font-size:12px;}
      .viewcart-table{width:500px;}
      .lower-table{width:500px;}
      .container {margin: auto 10px;}
      .viewcart-main .viewcart-item-content .viewcart4 {font-size: 12px;}
      .viewcart-main .viewcart-item-content .viewcart4 input {width: 60px;font-size: 18px;padding: 10px 10px;}
      .viewcart-main .viewcart-item-content .viewcart6 .vewcart-delet {width: 25px;height: 25px;}
      .viewcart-sum-content {flex-wrap: wrap;    padding: 0px 10px;}
      .viewcart-sum-content .short-note {flex-basis: 100%;padding: 10px;}
      .short-note-heading h3{margin: 3px 0px;}
      .short-note-disc p{font-size:12px;}
      .viewcart-sum-content .viewcart-sum {    margin-top: 10px;flex-basis: 100%;}
      .viewcart-sum-content .viewcart-sum .viewcart-coupons {flex-wrap: wrap;}
      .viewcart-sum-content .viewcart-sum .viewcart-coupons label {flex-basis: 100%;}
      .viewcart-sum-content .viewcart-sum .viewcart-coupons .coupon {flex-basis: 100%;margin: 10px 30px;}
      .viewcart-sum-content .viewcart-main-content .viewcart-sum-heading .sum-head {font-size: 24px;}
      .viewcart-sum-content .viewcart-main-content .viewcart-sum1 {font-size: 16px;}
      .viewcart-payment-detail {flex-wrap: wrap;}
      .viewcart-payment-detail label {flex-basis: 100%;font-size:16px;}
      .viewcart-sum-content .viewcart-main-content .viewcart-sum1 .text-uppercase1 {margin: 10px 0px;}
      .viewcart-sum-content .viewcart-main-content .viewcart-sum1 .totals-value1 {margin: 10px 0px;}
      .viewcart-sum-content .viewcart-main-content .viewcart-sum1 .text-uppercase2 {margin: 10px 0px;}
      .viewcart-sum-content .viewcart-main-content .viewcart-sum1 .totals-value2{margin: 10px 0px;}
      .viewcart-sum-content .viewcart-main-content .viewcart-sum1 .text-uppercase3{margin: 10px 0px;}
      .viewcart-sum-content .viewcart-main-content .viewcart-sum1 .totals-value3{margin: 10px 0px;}
      .viewcart-payment-detail input {font-size: 16px;padding: 5px;}
      #menu {position: absolute;width: 285px;margin: -40px 0 0 -302px;padding: 35px;}
    }



    @media(max-width:375px){
      .header-content {padding: 10px 10px;}
      .viewcart-payment-detail select {flex-basis: 70%;}
      .header-content .header-content-right .header-logo-section img {width: 40px;height: 38px;}
      .viewcart-main {overflow: auto;padding: 5px;margin:auto 10px!important;}
      .viewcart-main .viewcart-item-content .viewcart2 .h6 {font-size: 12px;}
      .viewcart-main .viewcart-item-content {padding: 10px 4px;}
      .pic100x100 {width: 50px;height: 50px;}
      .viewcart-table tbody{font-size:12px;}
      .viewcart-table{width:500px;}
      .lower-table{width:500px;}
      .container {margin: auto 10px;}
      .viewcart-main .viewcart-item-content .viewcart4 {font-size: 12px;}
      .viewcart-main .viewcart-item-content .viewcart4 input {width: 60px;font-size: 18px;padding: 10px 10px;}
      .viewcart-main .viewcart-item-content .viewcart6 .vewcart-delet {width: 25px;height: 25px;}
      .viewcart-sum-content {flex-wrap: wrap;    padding: 0px 10px;}
      .viewcart-sum-content .short-note {flex-basis: 100%;padding: 10px;}
      .short-note-heading h3{margin: 3px 0px;}
      .short-note-disc p{font-size:12px;}
      .viewcart-sum-content .viewcart-sum {    margin-top: 10px;flex-basis: 100%;}
      .viewcart-sum-content .viewcart-sum .viewcart-coupons {flex-wrap: wrap;}
      .viewcart-sum-content .viewcart-sum .viewcart-coupons label {flex-basis: 100%;}
      .viewcart-sum-content .viewcart-sum .viewcart-coupons .coupon {flex-basis: 100%;margin: 10px 30px;}
      .viewcart-sum-content .viewcart-main-content .viewcart-sum-heading .sum-head {font-size: 24px;}
      .viewcart-sum-content .viewcart-main-content .viewcart-sum1 {font-size: 16px;}
      .viewcart-payment-detail {flex-wrap: wrap;}
      .viewcart-payment-detail label {flex-basis: 100%;font-size:16px;}
      .viewcart-sum-content .viewcart-main-content .viewcart-sum1 .text-uppercase1 {margin: 3px 0px;}
      .viewcart-sum-content .viewcart-main-content .viewcart-sum1 .totals-value1 {margin: 3px 0px;}
      .viewcart-sum-content .viewcart-main-content .viewcart-sum1 .text-uppercase2 {margin: 3px 0px;}
      .viewcart-sum-content .viewcart-main-content .viewcart-sum1 .totals-value2{margin: 3px 0px;}
      .viewcart-sum-content .viewcart-main-content .viewcart-sum1 .text-uppercase3{margin: 3px 0px;}
      .viewcart-sum-content .viewcart-main-content .viewcart-sum1 .totals-value3{margin: 3px 0px;}
      .viewcart-payment-detail input {font-size: 16px;padding: 5px;}
      #menu {position: absolute;width: 285px;margin: -40px 0 0 -302px;padding: 35px;}
    }


    @media(max-width:350px){
      .header-content {padding: 10px 10px;}
      .viewcart-payment-detail select {flex-basis: 70%;}
      .header-content .header-content-right .header-logo-section img {width: 40px;height: 38px;}
      .viewcart-main {overflow: auto;padding: 5px;margin:auto 10px!important;}
      .viewcart-main .viewcart-item-content .viewcart2 .h6 {font-size: 12px;}
      .viewcart-main .viewcart-item-content {padding: 10px 4px;}
      .pic100x100 {width: 50px;height: 50px;}
      .viewcart-table tbody{font-size:10px;}
      .viewcart-table{width:500px;}
      .lower-table{width:500px;}
      .container {margin: auto 10px;}
      .viewcart-main .viewcart-item-content .viewcart4 {font-size: 12px;}
      .viewcart-main .viewcart-item-content .viewcart4 input {width: 60px;font-size: 18px;padding: 10px 10px;}
      .viewcart-main .viewcart-item-content .viewcart6 .vewcart-delet {width: 25px;height: 25px;}
      .viewcart-sum-content {flex-wrap: wrap;    padding: 0px 10px;}
      .viewcart-sum-content .short-note {flex-basis: 100%;padding: 10px;}
      .short-note-heading h3{margin: 3px 0px;}
      .short-note-disc p{font-size:12px;}
      .viewcart-sum-content .viewcart-sum {    margin-top: 10px;flex-basis: 100%;}
      .viewcart-sum-content .viewcart-sum .viewcart-coupons {flex-wrap: wrap;}
      .viewcart-sum-content .viewcart-sum .viewcart-coupons label {flex-basis: 100%;}
      .viewcart-sum-content .viewcart-sum .viewcart-coupons .coupon {flex-basis: 100%;margin: 10px 30px;}
      .viewcart-sum-content .viewcart-main-content .viewcart-sum-heading .sum-head {font-size: 24px;}
      .viewcart-sum-content .viewcart-main-content .viewcart-sum1 {font-size: 16px;}
      .viewcart-payment-detail {flex-wrap: wrap;}
      .viewcart-payment-detail label {flex-basis: 100%;font-size:16px;}
      .viewcart-sum-content .viewcart-main-content .viewcart-sum1 .text-uppercase1 {margin: 3px 0px;}
      .viewcart-sum-content .viewcart-main-content .viewcart-sum1 .totals-value1 {margin: 3px 0px;}
      .viewcart-sum-content .viewcart-main-content .viewcart-sum1 .text-uppercase2 {margin: 3px 0px;}
      .viewcart-sum-content .viewcart-main-content .viewcart-sum1 .totals-value2{margin: 3px 0px;}
      .viewcart-sum-content .viewcart-main-content .viewcart-sum1 .text-uppercase3{margin: 3px 0px;}
      .viewcart-sum-content .viewcart-main-content .viewcart-sum1 .totals-value3{margin: 3px 0px;}
      .viewcart-payment-detail input {font-size: 16px;padding: 5px;}
      #menu {position: absolute;width: 240px;margin: -40px 0 0 -252px;padding: 35px;}
    }


    @media(max-width:320px){
      .header-content {padding: 10px 10px;}
      .header-content .header-content-right .header-logo-section img {width: 40px;height: 38px;}
      .viewcart-main {overflow: auto;padding: 5px;margin:auto 10px!important;}
      .viewcart-main .viewcart-item-content .viewcart2 .h6 {font-size: 12px;}
      .viewcart-main .viewcart-item-content {padding: 10px 4px;}
      .pic100x100 {width: 50px;height: 50px;}
      .viewcart-table tbody{font-size:10px;}
      .viewcart-table{width:500px;}
      .lower-table{width:500px;}
      .container {margin: auto 10px;}
      .viewcart-main .viewcart-item-content .viewcart4 {font-size: 12px;}
      .viewcart-main .viewcart-item-content .viewcart4 input {width: 60px;font-size: 18px;padding: 10px 10px;}
      .viewcart-main .viewcart-item-content .viewcart6 .vewcart-delet {width: 25px;height: 25px;}
      .viewcart-sum-content {flex-wrap: wrap;    padding: 0px 10px;}
      .viewcart-sum-content .short-note {flex-basis: 100%;padding: 10px;}
      .short-note-heading h3{margin: 3px 0px;}
      .short-note-disc p{font-size:12px;}
      .viewcart-sum-content .viewcart-sum {    margin-top: 10px;flex-basis: 100%;}
      .viewcart-sum-content .viewcart-sum .viewcart-coupons {flex-wrap: wrap;}
      .viewcart-sum-content .viewcart-sum .viewcart-coupons label {flex-basis: 100%;}
      .viewcart-sum-content .viewcart-sum .viewcart-coupons .coupon {flex-basis: 100%;margin: 10px 30px;}
      .viewcart-sum-content .viewcart-main-content .viewcart-sum-heading .sum-head {font-size: 24px;}
      .viewcart-sum-content .viewcart-main-content .viewcart-sum1 {font-size: 16px;}
      .viewcart-payment-detail {flex-wrap: wrap;}
      .viewcart-payment-detail label {flex-basis: 100%;font-size:16px;}
      .viewcart-sum-content .viewcart-main-content .viewcart-sum1 .text-uppercase1 {margin: 3px 0px;}
      .viewcart-sum-content .viewcart-main-content .viewcart-sum1 .totals-value1 {margin: 3px 0px;}
      .viewcart-sum-content .viewcart-main-content .viewcart-sum1 .text-uppercase2 {margin: 3px 0px;}
      .viewcart-sum-content .viewcart-main-content .viewcart-sum1 .totals-value2{margin: 3px 0px;}
      .viewcart-sum-content .viewcart-main-content .viewcart-sum1 .text-uppercase3{margin: 3px 0px;}
      .viewcart-sum-content .viewcart-main-content .viewcart-sum1 .totals-value3{margin: 3px 0px;}
      .viewcart-payment-detail input {font-size: 16px;padding: 5px;}
      #menu {position: absolute;width: 240px;margin: -40px 0 0 -252px;padding: 35px;}
    }


  </style><form  class="lower-table" method="post" action="checkout.php">
  <div class="row justify-content-center viewcart-main-content">
    <div class="col-xl-7 col-lg-8 col-md-7 viewcart-content">
      <div class="border border-gainsboro p-3 viewcart-product-head">

       <!--  <h2 class="h6 text-uppercase mb-0 viewcart-heading">Cart Total (<?= $results -> product_quantity ?> Items): <strong class="cart-total"><?= $results->product_price * $results->product_quantity; ?></strong></h2> -->
      </div>

      <div class="border border-gainsboro p-3 mt-3 clearfix item viewcart-item-content">
        <div class="text-lg-left viewcart1">
        <img name="prod_img" class="pic100x100" src="<?= '../'.$results -> product_cart_img ?>" alt="<?= $results->product_name; ?>">
          <!-- <i class="fa fa-product-hunt fa-2x text-center" aria-hidden="true"></i> -->
        </div>
        <div class="col-lg-5 col-5 text-lg-left viewcart2">
          <h3 class="h6 mb-0"><?= $results->product_name; ?>
          </h3>
        </div>
        <div class="col-lg-5 col-5 text-lg-left viewcart3">
          <h3 class="h6 mb-0"><?= $results->product_price; ?>
          </h3>
        </div>
        <div class="product-price d-none viewcart4"><?= $results->product_price; ?></div>
        <div class="pass-quantity col-lg-3 col-md-4 col-sm-3 viewcart4">
          <label for="pass-quantity" class="pass-quantity"></label>
          <input class="form-control" type="number" name="product_quantity" value="<?= $results->product_quantity;?>" min="1">
        </div>
        <div class="col-lg-2 col-md-1 col-sm-2 product-line-price pt-4 viewcart5">
          <span class="product-line-price"><?= $results->product_quantity * $results->product_price; ?>
          </span>
        </div>
        <div class="remove-item pt-4 viewcart6">
          <button class="remove-product btn-light vewcart-delet">
          <i class="fa fa-minus" aria-hidden="true"></i>
          </button>
        </div>
      </div>
	<div class="hiddenFields">
    <input type="hidden" name="prod_img[]" value="<?= '../'.$results->product_cart_img ?>">
    <input type="hidden" name="subtotal[]" id="subtotal" value="<?= $proct_final_price; ?>">
    <input type="hidden" name="totals[]" class="cart-total" value="<?= $results->product_quantity * $results->product_price; ?>">
    <input type="hidden" name="prod-name[]" value="<?= $results->product_name; ?>">
    <input type="hidden" name="products_quantity[]" value="<?= $results->product_quantity; ?>" min="1">
    <input type="hidden" name="product_price[]" value="<?= $results->product_price; ?>" min="1">
    <input type="hidden" name="product_id[]" value="<?= $results->product_id; ?>" min="1">
    
	 </div>
    </div>

  </div>
<!-- container -->
<script>
// var metricValue = '123';
// ga('set', 'metric3', metricValue);
window.dataLayer = window.dataLayer || [];

window.dataLayer.push({
  event: 'eec.remove',
  ecommerce: {
    remove: {
      actionField: {
        list: 'Shopping cart'
      },
      products: [{
        id: <?= $results->product_id; ?>,
        name: <?= $results->product_name; ?>,
        category: 'Devesa/SuperMarket/ViewCart',
        variant: 'Product',
        brand: 'Devesa',
        quantity: <?= $results->product_quantity; ?>,
        dimension1: 'Ecommerce',
        metric2: <?= count($product_list_array); ?>
      },
      ]
    }
  }
});
</script>
<?php } ?>
</div>
<div class="viewcart-sum-content">
<input type="hidden" name="final_total" id="final-subtotal" value="<?= $proct_final_price; ?>">
  <div class="short-note">
    <div class="short-note-heading">
      <h3>Note <i class="fa fa-exclamation" aria-hidden="true"></i></h3>
    </div>
    <div class="short-note-disc">
      <p>ShortNote Lorem ipsum, dolor sit amet consectetur adipisicing elit. Architecto quidem vitae nesciunt nam aut soluta ipsum dicta, fuga laudantium tempore eum, minima odit quas nobis ad nulla eligendi ullam vel.</p>
    </div>    
  </div>
  <div class="viewcart-sum">
    <div class="viewcart-coupons">
      <label for="coupon" class="coupon_label">Coupon</label>
      <div class="coupon"><input type="number" name="coupon" id="coupon" /></div>
      <button class='redeem'><i class="fa fa-handshake-o" aria-hidden="true"></i> Redeem</button>
    </div>
      <div class="col-xl-3 col-lg-4 col-md-5 totals">
        <div class="border border-gainsboro px-3 viewcart-main-content">
          <div class="border-bottom border-gainsboro viewcart-sum-heading">
            <p class="text-uppercase mb-0 py-3 sum-head"><strong>Order Summary</strong></p>
          </div>
          <!-- <div class="totals-item totals-item-total d-flex align-items-center justify-content-between mt-3 pt-3 border-top border-gainsboro viewcart-sum1">
            <p class="text-uppercase3"><strong>Product</strong></p>
            <p class="totals-value3 font-weight-bold cart-total" name="total"><?= count($product_list_array); ?></p>
          </div> -->
          <div class="totals-item d-flex align-items-center justify-content-between mt-3 viewcart-sum1">
            <p class="text-uppercase1">Subtotal</p>
            <p class="totals-value1" name="cart-subtotal" id="cart-subtotal"><?= $proct_final_price; ?></p>
          </div>
          <div class="totals-item d-flex align-items-center justify-content-between viewcart-sum1">
            <p class="text-uppercase2">Coupon discount</p>
            <p class="totals-value2" name="cart-discount" id="cart-discount"></p>
          </div>
          <div class="totals-item totals-item-total d-flex align-items-center justify-content-between mt-3 pt-3 border-top border-gainsboro viewcart-sum1">
            <p class="text-uppercase3"><strong>Total</strong></p>
            <p class="totals-value3 font-weight-bold cart-total" name="total"><?= $proct_final_price; ?></p>
          </div>
        </div>
    
      </div>
      <div class="viewcart-payment-detail">
        <label>Payment Method</label>
        <select name="payment-method">
          <option value="pespal">PESAPAL</option>
          <option value="mpesa">mpesa</option>
          <option value="paystack">PayStack</option>
          <option value="flutter">flutter</option>
        </select> 
          <input type="submit" name="submit" id="submit" class="mt-3 btn btn-pay w-100 d-flex justify-content-between btn-lg rounded-0" value="Submit">
      </div>
    </form>
  </div>
</div>
<?php  include '../themePages/theme_footer.phtml'; ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js" type="text/javascript" ></script>
<script>
$(document).ready(function() {


   var fadeTime = 300;

   $('.pass-quantity input').change(function() {
     updateQuantity(this);
   });

   $('.remove-item button').click(function() {
     removeItem(this); //$(this).find($("input[type='hidden']")).remove();
     removeHidden(this);
   });
   
   $('.redeem').click(function(){
	   redeemCoupon(this);
   });


   function recalculateCart() {
     var subtotal = 0;

     /* Sum up row totals */
     $('.item').each(function() {
       subtotal += parseFloat($(this).children('.product-line-price').text());
     });

     /* Calculate totals */
     //var discount = subtotal * coupon;
     var total = subtotal;
console.log(subtotal);
     /* Update totals display */
     $('.coupon').fadeOut(fadeTime, function() {
       $('#cart-subtotal').html(subtotal);
       $('#final-subtotal').val(total);
       $('#subtotal').val(subtotal);
       //$('#coupon').val(coupon);
       $('.cart-total').html(total);
       $('.cart-total').val(total);
       
       if (total == 0) {
         $('.checkout').fadeOut(fadeTime);
       } else {
         $('.checkout').fadeIn(fadeTime);
       }
       $('.coupon').fadeIn(fadeTime);
     });
   }


   /* Update quantity */
   function updateQuantity(quantityInput) {
     /* Calculate line price */
     var productRow = $(quantityInput).parent().parent();
     var price = parseFloat(productRow.children('.product-price').text());
     var quantity = $(quantityInput).val();
	 var coupon = $('#coupon').val();
     var linePrice = price * quantity
	 /* Update line price display and recalc cart totals */
     productRow.children('.product-line-price').each(function() {
       $(this).fadeOut(fadeTime, function() {
	   $(this).text(linePrice);
         if(!$('#coupon').val()){
			$(this).text(linePrice);   
		 }else{
			 $(this).text(linePrice - coupon);
		 }
         recalculateCart();
         $(this).fadeIn(fadeTime);
       });
     });
   }

   /* Redeem coupon */
   function redeemCoupon(redeemButton) {
     /* Calculate line price */
     var productRow = $(redeemButton).parent();
	 //var quantityRow = $(redeemButton).parent().parent();
     var price = parseFloat(productRow.children().children('.product-price').text());
     var quantity = $('.pass-quantity .form-control').val();console.log(quantity);
	 var coupon = $('#coupon').val();
     var linePrice = price * quantity;
	 $('#cart-discount').html(coupon);
	 $('#discount').val(coupon);
	 /* Update line price display and recalc cart totals */
     productRow.children().children('.product-line-price').each(function() {
       $(this).fadeOut(fadeTime, function() {
	   //$(this).text(linePrice);
         $(this).text(linePrice - coupon);console.log("test",linePrice);
		 
         recalculateCart();
         $(this).fadeIn(fadeTime);
       });
     });
   }
   /* Remove item from cart */
   function removeItem(removeButton) {
     /* Remove row from DOM and recalc cart total */
     var productRow = $(removeButton).parent().parent();
     //var hiddenRow  = $("input[type='hidden']");
     productRow.slideUp(fadeTime, function() {
       productRow.remove(); //hiddenRow.remove();
       //console.log(hiddenRow);
       recalculateCart();
     });
   }
   function removeHidden(removeHidden) {
     var hiddenRow = $(removeHidden).parent().parent().parent().children(); 
     console.log(hiddenRow); hiddenRow.remove();
   }

 });
 </script>
 <script>
    $(document).ready(function(){

        $("#submit").on('click', function(){
           
            $.ajax({
                url: '../assets/cart/checkout.php', 
                type : "POST", 
                dataType : 'json', 
                data : $("#form").serialize(), 
                success : function(result) {
                    console.log(result);
                },
                error: function(xhr, resp, text) {
                    console.log(xhr, resp, text);
                }
            })
        });
    });

</script>