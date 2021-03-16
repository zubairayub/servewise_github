<?php 
include '../include/config.php';
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $branch_name .' - Kfc'  ;?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/slick.css">
    <link rel="stylesheet" href="css/supermarket.css">
    

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <script>dataLayer = [];</script>
<!-- <script>
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){ (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o), m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m) })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
</script> -->
<!-- Global site tag (gtag.js) - Google Analytics -->
<!-- <script async src="https://www.googletagmanager.com/gtag/js?id=UA-189150205-1"></script> -->
<!-- <script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-189150205-1');
</script> -->

    <!-- Global site tag (gtag.js) - Google Analytics -->

<!-- Google Tag Manager -->
<!-- Global site tag (gtag.js) - Google Analytics -->
<!-- <script async src="https://www.googletagmanager.com/gtag/js?id=G-NVVDFMZB9K"></script> -->
<!-- <script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-NVVDFMZB9K');
</script> -->
<!-- End Google Tag Manager --><!-- Google Tag Manager -->
<!-- <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-MXSHQXW');</script> -->
<!-- End Google Tag Manager -->
<!-- Google Tag Manager -->
<!-- <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-MXSHQXW');</script> -->
<!-- End Google Tag Manager -->

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
</head>
