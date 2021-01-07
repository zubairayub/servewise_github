<?php

$summary = $_POST; 
?>
<?php
$product_name 	= 	$_POST['prod-name'];
$subtotal		=  	$_POST['subtotal']; 
$discount		=	$_POST['cart-discount'];
$payment_method	=	$_POST['payment-method'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Checkout Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  
</head>

<body>
<aside>
<div class="cart_summary">
<p>Product Name: <?= $product_name;?></p>
<p>Subtotal: <?= $subtotal;?></p>
<p>Discount:<?= $discount;?></p>
<p>Payment Method: <?= $payment_method;?></p>

</div>
</aside>
<div class="container">
<h3>Payment Form</h3>
<form id="js-demo-form" method="post">
	<div class="form-group row">
		<label for="name" class="col-sm-2 col-form-label">Name</label>
		<div class="col-sm-10">
			<input type="text" name="name" id="name" class="form-control">
		</div>
	</div>
	<div class="form-group row">
		<label for="phone" class="col-sm-2 col-form-label">Phone Number</label>
		<div class="col-sm-10">
			<input type="number" name="phone" id="phone" class="form-control">
		</div>
	</div>	
	<div class="form-group row">
		<label for="email" class="col-sm-2 col-form-label">Email</label>
		<div class="col-sm-10">
		  <input type="text" class="form-control" id="email" placeholder="email@example.com">
		</div>
	</div>	
	<div class="form-group row">
		<label for="amount" class="col-sm-2 col-form-label">Amount</label>
		<div class="col-sm-10">
		  <input type="number" class="form-control" id="amount" value="<?= $subtotal; ?>" readonly="readonly">
		</div>
	</div>
		
	<div class="form-group row">
		<label for="country" class="col-sm-2 col-form-label">Select Country</label>	
		<div class="col-sm-10">
		  <select class="form-control" name="country" id="country">
			<option value="Pakistan">Pakistan</option>
			<option value="NG">NG</option>
		  </select>
		</div>
		
		<label for="currency" class="col-sm-2 col-form-label">Select currency</label>
		<div class="col-sm-10">
		  <select class="form-control" name="currency" id="currency">
			<option value="NGN">NGN</option>
			<option value="USSD">USSD</option>
		  </select>
		</div>
	</div>
	<div class="form-group row">
		<div class="col-sm-12">
		  <button <?php if($payment_method == 'flutter') { echo 'type="button"';} elseif($payment_method == 'paystack'){ echo 'type="submit"';} ?> name="pay_now" id="pay-now" <?php if($payment_method == 'flutter'){echo 'onClick="makePayment()"'; }?> title="Pay now">Pay now</button>

		</div>
	</div>
</form>
<div class="resp"></div>
</div>
<?php
	if($payment_method == 'flutter'){?>
  <script src="https://checkout.flutterwave.com/v3.js"></script>
  <script src="http://localhost/servewise/assets/js/flutter.js"></script>
	<?php }elseif($payment_method == 'paystack'){?>
	<script src="https://js.paystack.co/v2/inline.js"></script>
	<script>
  const paymentForm = document.getElementById('js-demo-form');
paymentForm.addEventListener("submit", payWithPaystack, false);
function payWithPaystack(e) {
  e.preventDefault();
  let handler = PaystackPop.setup({
    key: 'pk_test_6fd66a64bfde9a4ed9fbac756518965a99a322a0', 
    email: document.getElementById("email").value,
    amount: document.getElementById("amount").value * 100,
    ref: '12nb'+Math.floor((Math.random() * 1000000000) + 1), 
    onClose: function(){
      alert('Window closed.');
    },
    callback: function(response){
      let message = 'Payment complete! Reference: ' + response.reference;
      alert(message);
    }
  });
  handler.openIframe();
}
  </script>
	<?php }else{echo 'payment method'.$payment_method.' is not available';} ?>