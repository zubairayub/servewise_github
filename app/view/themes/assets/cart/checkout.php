<?php

$summary = $_POST; //var_dump($summary);
?>
<?php //foreach($summary as $results):  var_dump($results);
$array['data']['product_name'] = $_POST['prod-name'];
$array['data']['subtotal'] = $_POST['subtotal'];
$array['data']['product_price'] = $_POST['product_price'];
$array['data']['totals'] = $_POST['totals'];
$array['data']['products_quantity'] = $_POST['products_quantity'];
$final_total = $_POST['final_total'];



$payment_method = $_POST['payment-method'];
// $dataArray = array();	
// $count = 0;
$count = count($array['data']['product_name']);
// for($i=0; $i < $count; $i++) {

// foreach($array as $key => $value):
// 	// $dataArray[$count]['product_name'] = $value['product_name'];
// 	// print_r($dataArray[$count]['product_name'][$count] ); echo '<br />';
// 	//echo $value['product_name'][$i]; echo '<br>';	
// endforeach;
// }
//$args = array( $_POST['prod-name'],$_POST['subtotal'],$_POST['payment-method'],$_POST['product_quantity'],$_POST['product_price'], );//endforeach;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Checkout Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
	  *{font-family: sans-serif;}
	.cart_summary{border: 1px solid rgba(0,0,0,0.2);border-radius: 4px;box-shadow: 0px 3px 6px rgba(0,0,0,0.2);padding: 10px;width: 40%;margin: auto;text-align: center;font-size: 20px;font-weight: 600;}
	.checkout-main{border: 1px solid rgba(0,0,0,0.2);border-radius: 4px;box-shadow: 0px 3px 6px rgba(0,0,0,0.2);padding: 10px;width: 80%;margin: 20px auto;}
	.checkout-main h3{font-size: 30px;}
	.checkout-main form .row{margin:10px 0px;display: flex;justify-content: center;align-items: center;width: 100%;}
	.checkout-main form .row label{flex-basis: 30%;font-size: 18px;font-weight: 600;color: rgba(0,0,0,0.7);}
	.checkout-main form .row .col-sm-10{flex-basis: 70%;}
	.checkout-main form .row .col-sm-10 input{width: 95%;background: #fbf9f9;border: 1px solid rgba(0,0,0,0.4);border-radius: 4px;font-size: 18px;padding: 4px;box-shadow: 0px 3px 6px rgba(0,0,0,0.1);}
	.checkout-options{width: 70%;display: flex;align-items: center;}
	.checkout-options .col-sm-10 select{width: 85%;font-size: 20px;border-radius: 4px;border: 1px dashed black;}
	.checkout-currency{flex-basis: 40%;margin-left: 10px;}
	.row .checkout-options .col-sm-10{    flex-basis: 50%!important;}
	.checkout-main form .checkout-btn{display: flex;justify-content: flex-end;align-items: center;}
	.checkout-main form .checkout-btn button{border: 1px solid rgba(0,0,0,0.2);border-radius: 4px;font-size: 20px;transition: .3s ease; background: white;box-shadow: 0px 3px 6px rgba(0,0,0,0.2);padding: 10px;font-weight: 600;}
	.checkout-main form .checkout-btn button:hover{    box-shadow: 0px 3px 6px rgba(0,0,0,0.4);transform: scale(1.1);}

 </style>
 </head>

<body>
	<form id="js-demo-form" name="form" method="post">
	<table id="cart" class="table table-hover table-condensed">
    				<thead>
						<tr>
							<th style="width:50%">Product</th>
							<th style="width:10%">Price</th>
							<th style="width:8%">Quantity</th>
							<th style="width:22%" class="text-center">Subtotal</th>
							<th style="width:10%"></th>
						</tr>
					</thead>
<?php  include '../themePages/theme_header.phtml'; 

foreach($array as $key => $value): for($i=0; $i < $count; $i++) :?>
		<?php $values =  $value['products_quantity'][$i]; ?> 
		<input type="hidden" name="payment_method" value="<?= $payment_method ?>">
	<input type="hidden" name="totals[]" class="cart-total" value="<?= $value['totals'][$i]; ?>">
	<input type="hidden" name="prod-name[]" value="<?= $value['product_name'][$i]; ?>">
    <input type="hidden" name="products_quantity[]" value="<?= $values; ?>" min="1">
    <input type="hidden" name="product_price[]" value="<?= $value['product_price'][$i]; ?>" min="1">
	<div class="container">
	
					<tbody>
						<tr>
							<td data-th="Product">
								<div class="row">
									<div class="col-sm-2 hidden-xs"><img src="http://placehold.it/100x100" alt="..." class="img-responsive"/></div>
									<div class="col-sm-10">
										<h4 class="nomargin"><?= $value['product_name'][$i]; ?> </h4>
										<!-- <p>Quis aute iure reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor sit amet.</p> -->
									</div>
								</div>
							</td>
							<td data-th="Price"><?= $value['product_price'][$i]; ?></td>
							<td data-th="Quantity">
							
								<input type="number" class="form-control text-center" value="<?=  $values ?>">
							</td>
							<td data-th="Subtotal" class="text-center"><?= $value['totals'][$i]; ?></td>
							<td class="actions" data-th="">
								<button class="btn btn-info btn-sm"><i class="fa fa-refresh"></i></button>
								<button class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button>								
							</td>
						</tr>
					</tbody>
					
				
</div><?php endfor; ?>
</table>
					<tfoot>
						<tr class="visible-xs">
							<td class="text-center"><strong>Total <?= $final_total; ?></strong></td>
						</tr>
						<tr>
							<td><a href="#" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
							<td colspan="2" class="hidden-xs"></td>
							
						</tr>
					</tfoot>
<div class="container checkout-main">
<h3>Payment Form</h3>

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
		  <input type="text" class="form-control" id="email" name="email" placeholder="email@example.com">
		</div>
	</div>	
	<div class="form-group row">
		<label for="amount" class="col-sm-2 col-form-label">Amount</label>
		<div class="col-sm-10">
		  <input type="number" name='final_total' class="form-control" id="amount" value="<?= $final_total; ?>" readonly="readonly">
		</div>
	</div>
		
	<div class="form-group row">
		<label for="country" class="col-sm-2 col-form-label">Select Country</label>	
		<div class="checkout-options">
			<div class="col-sm-10">
			<select class="form-control" name="country" id="country">
				<option value="Pakistan">Pakistan</option>
				<option value="NG">NG</option>
			</select>
			</div>
			
			<label for="currency" class="col-sm-2 col-form-label checkout-currency">Select currency</label>
			<div class="col-sm-10">
			<select class="form-control" name="currency" id="currency">
				<option value="NGN">NGN</option>
				<option value="USSD">USSD</option>
			</select>
			</div>
		</div>
	</div>
	<div class="form-group row checkout-btn">
		<div class="col-sm-12">
		  <button <?php if($payment_method == 'flutter') { echo 'type="button"';} elseif($payment_method == 'paystack'){ echo 'type="submit"';} ?> name="pay_now" id="pay-now" <?php if($payment_method == 'flutter'){echo 'onClick="makePayment()"'; }?> title="Pay now">Pay now</button>
		</div>
	</div>
</form><?php endforeach; ?>
<div class="resp"></div>
</div>
<?php  include '../themePages/theme_footer.phtml'; ?>
<?php
	if($payment_method == 'flutter'){?>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js" type="text/javascript" ></script>
	<script>
	$('#pay-now').click(function(){
		
		url='checkoutData.php';
		formData = $('form').serialize();
		$.ajax({
			type : 'post',
			url : url,
			data : formData,
			success: function(data) {
				console.log(data);
			}
		});
	});
	</script>
	 
 
  <script src="https://checkout.flutterwave.com/v3.js"></script>
  <script src="../js/flutter.js"></script>
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
	<script>
		$('button').click(function(){
			var listvalues = $("#js-demo-form").serialize();
		localStorage.setItem('lists', JSON.stringify(listvalues));	
		});
		 
	</script>
	