<?php

$summary = $_POST; //var_dump($summary);
?>
<?php //foreach($summary as $results):  var_dump($results);
$array['data']['product_img'] = $_POST['prod_img'];
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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
	  *{font-family: sans-serif;}
	.cart_summary{border: 1px solid rgba(0,0,0,0.2);border-radius: 4px;box-shadow: 0px 3px 6px rgba(0,0,0,0.2);padding: 10px;width: 40%;margin: auto;text-align: center;font-size: 20px;font-weight: 600;}
	.checkout-main{border: 1px solid rgba(0,0,0,0.2);border-radius: 4px;box-shadow: 0px 3px 6px rgba(0,0,0,0.2);padding: 10px;width: 80%;margin: 20px auto;}
	.checkout-main h3{font-size: 30px;}
	.checkout-main form .row{margin:10px 0px;display: flex;justify-content: center;align-items: center;width: 100%;}
	.checkout-main form .row label{flex-basis: 30%;font-size: 18px;font-weight: 600;color: rgba(0,0,0,0.7);}
	.checkout-main form .row .col-sm-10{flex-basis: 70%;}
	.checkout-main form .row .col-sm-10 input{width: 95%;background: #fbf9f9;border: 1px solid rgba(0,0,0,0.4);border-radius: 4px;font-size: 18px;padding: 4px;box-shadow: 0px 3px 6px rgba(0,0,0,0.1);}
	.checkout-options{width: 100%;display: flex;align-items: center;margin:10px 0px;}
	.checkout-options .col-sm-10 select{width: 100%;font-size: 20px;border-radius: 4px;border: 1px dashed black;}
	.checkout-currency{flex-basis: 40%;margin-left: 10px;}
	.row .checkout-options .col-sm-10{    flex-basis: 50%!important;}
	.checkout-main form .checkout-btn{display: flex;justify-content: flex-end;align-items: center;}
	.checkout-main form .checkout-btn button{border: 1px solid rgba(0,0,0,0.2);border-radius: 4px;font-size: 20px;transition: .3s ease; background: white;box-shadow: 0px 3px 6px rgba(0,0,0,0.2);padding: 10px;font-weight: 600;}
	.checkout-main form .checkout-btn button:hover{    box-shadow: 0px 3px 6px rgba(0,0,0,0.4);transform: scale(1.1);}
	.checkout-table{width:100%;}
	.checkout-table .checkout-tablerow-1 .checkout-tablehead-1{width:15%;border-bottom: 1px dashed rgba(0,0,0,0.2);padding: 10px 0px;}
	.checkout-table .checkout-tablerow-1 .checkout-tablehead-1 i{color:#1a4c8a;}
	.checkout-table .checkout-tablerow-1 .checkout-tablehead-2{width:20%;border-bottom: 1px dashed rgba(0,0,0,0.2);padding: 10px 0px;}
	.checkout-table .checkout-tablerow-1 .checkout-tablehead-2 i{color:#1a4c8a;}
	.checkout-table .checkout-tablerow-1 .checkout-tablehead-3{width:15%;border-bottom: 1px dashed rgba(0,0,0,0.2);padding: 10px 0px;}
	.checkout-table .checkout-tablerow-1 .checkout-tablehead-3 i{color:#2c9e3a;}
	.checkout-table .checkout-tablerow-1 .checkout-tablehead-4{width:15%;border-bottom: 1px dashed rgba(0,0,0,0.2);padding: 10px 0px;}
	.checkout-table .checkout-tablerow-1 .checkout-tablehead-4 i{color:#8e4304;}
	.checkout-table .checkout-tablerow-1 .checkout-tablehead-5{width:15%;border-bottom: 1px dashed rgba(0,0,0,0.2);padding: 10px 0px;}
	.checkout-table .checkout-tablerow-1 .checkout-tablehead-5 i{color:#d6075d;}
	.checkout-table .checkout-tablerow-1 .checkout-tablehead-6{width:20%;border-bottom: 1px dashed rgba(0,0,0,0.2);padding: 10px 0px;}
	.checkout-table .checkout-tablerow-1 .checkout-tablehead-6 i{color:#33b513;}
	.checkout-tabledata-1 .product-img{display: flex;justify-content: center;align-items: center;}
	.checkout-tabledata-2 .product-name{display: flex;justify-content: center;align-items: center;}
	.checkout-tabledata-3 .price-value{display: flex;justify-content: center;align-items: center;}
	.checkout-tabledata-4 .product-qty{display: flex;justify-content: center;align-items: center;}
	.checkout-tabledata-4 .product-qty .form-control{width: 50px;text-align: center;border: 1px dashed rgba(0,0,0,0.4);border-radius: 4px;padding: 5px;font-size: 26px;}
	.checkout-tabledata-5 .subtotal-value{display: flex;justify-content: center;align-items: center;}
	.checkout-tabledata-6 .options-btn{display: flex;justify-content: center;align-items: center;}
	.checkout-tabledata-6 .options-btn .refresh-btn{font-size: 20px;background: #70e01b;color: white;cursor: pointer; border: none;border-radius: 50%;padding: 11px 15px;margin-right: 10px;transition: .3s ease;}
	.checkout-tabledata-6 .options-btn .refresh-btn .fa-refresh{transition: .3s ease;}
	.checkout-tabledata-6 .options-btn .refresh-btn:hover .fa-refresh{transform: rotate(360deg);}
	.checkout-tabledata-6 .options-btn .remove-btn{font-size: 20px;background: #e01b24;color: white;cursor: pointer; border: none;border-radius: 50%;padding: 11px 15px;margin-right: 10px;transition: .3s ease;}
	.checkout-tabledata-6 .options-btn .remove-btn .fa-trash-o{transition: .3s ease;}
	.checkout-tabledata-6 .options-btn .remove-btn:hover .fa-trash-o{transform: rotate(360deg);}
	.final-total-content{padding-bottom:20px; width: 100%;display: flex;justify-content: flex-end;align-items: center;}
	.final-total-content .finaltotal{width: 30%;display: flex;align-items: center;justify-content: space-evenly;margin-right: 10px;}
	.final-total-content .finaltotal .finaltotal-left{flex-basis: 50%;display: flex;justify-content: center;align-items: center;background-color: #f5f5f5;padding: 9.5px;border: 1px solid rgba(0,0,0,0.2);font-size: 20px;font-weight: 500;}
	.final-total-content .finaltotal .finaltotal-right{display: flex;justify-content: center;flex-basis: 50%;font-size: 30px;font-weight: 600;color: #353535;border-top: 1px dashed rgba(0,0,0,0.4);padding: 4px;border-bottom: 1px dashed rgba(0,0,0,0.4);border-right: 1px dashed rgba(0,0,0,0.4)}
	.count-shop-btn{border-bottom: 1px dashed rgba(0,0,0,0.3);margin-bottom: 20px; display: flex;justify-content: flex-end;align-items: center;width:100%; text-decoration: none;font-size: 20px;}
	.count-shop-btn .count-shop-btn-content{width: 30%;display: none;justify-content: center;align-items: center;margin: 15px 10px;}
	.count-shop-btn .count-shop-btn-content .count-btn{text-decoration: none;font-size: 27px;border: 1px dashed rgba(0,0,0,0.4);border-radius: 4px;padding: 10px;background: #8785ff;color: white; transition: .3s ease;}
	.count-shop-btn .count-shop-btn-content .count-btn:hover{background: #6462cc;}
	.checkout-main{width:50%;}
	.checkout-main .checkout-pay-content{display: flex;align-items: center;justify-content: center;flex-wrap: wrap;}
	.checkout-main .checkout-pay-content .pay-name{flex-basis: 49%;font-size: 20px;padding-bottom: 20px;}
	.checkout-main .checkout-pay-content .pay-name input{padding:5px 0px; width: 100%;font-size: 20px;border: 1px solid rgba(0,0,0,0.3);border-radius: 4px;background: #f7f7f7;box-shadow: 0px 3px 6px rgba(0,0,0,0.1);}
	.checkout-main .checkout-pay-content .pay-number{margin-left:10px;flex-basis: 49%;font-size: 20px;padding-bottom: 20px;}
	.checkout-main .checkout-pay-content .pay-number input{padding:5px 0px; width: 100%;font-size: 20px;border: 1px solid rgba(0,0,0,0.3);border-radius: 4px;background: #f7f7f7;box-shadow: 0px 3px 6px rgba(0,0,0,0.1);}
	.checkout-main .checkout-pay-content .pay-email{flex-basis: 100%;font-size: 20px;padding-bottom: 20px;}
	.checkout-main .checkout-pay-content .pay-email input{padding:5px 0px; width: 100%;font-size: 20px;border: 1px solid rgba(0,0,0,0.3);border-radius: 4px;background: #f7f7f7;box-shadow: 0px 3px 6px rgba(0,0,0,0.1);}
	.checkout-main .checkout-pay-content .pay-amount{flex-basis: 100%;font-size: 20px;padding-bottom: 20px;}
	.checkout-main .checkout-pay-content .pay-amount input{padding:5px 0px; width: 100%;font-size: 20px;border: 1px solid rgba(0,0,0,0.3);border-radius: 4px;background: #f7f7f7;box-shadow: 0px 3px 6px rgba(0,0,0,0.1);}
	.checkout-main .checkout-pay-content .pay-country{flex-basis: 100%;font-size: 20px;padding-bottom: 20px;border-top: 1px dashed rgba(0,0,0,0.4);border-bottom: 1px dashed rgba(0,0,0,0.4);padding-top: 20px;}
	.country-label-head{font-size: 30px;font-weight: 600;margin-bottom: 20px;}
	.pay-now-btn{display: flex;justify-content: center;align-items: center;padding: 20px 0px;}
	.pay-now-btn button{cursor: pointer; font-size: 30px;border: 1px dashed rgba(0,0,0,0.2);border-radius: 4px;background: #58ff6c;color: white; transition: .3s ease;}
	.pay-now-btn button:hover{background:#45c554; box-shadow:0px 3px 6px rgba(0,0,0,0.3);}
	.fa-angle-double-left{transition: .3s ease;}
	.pay-now-btn button:hover .fa-angle-double-left{transform: rotate(180deg);margin-right: 50px;}
	.fa-angle-double-right{transition: .3s ease;}
	.pay-now-btn button:hover .fa-angle-double-right{transform: rotate(-180deg);margin-left: 50px;}
</style>
 </head>

<body>
	<form id="js-demo-form" name="form" method="post">
	<table id="cart" class="table table-hover table-condensed checkout-table">
    				<thead>
						<tr class="checkout-tablerow-1">
							<th class="checkout-tablehead-1">Product image <i class="fa fa-picture-o" aria-hidden="true"></i></th>
							<th class="checkout-tablehead-2">Name</th>
							<th class="checkout-tablehead-3">Price <i class="fa fa-tag" aria-hidden="true"></i></th>
							<th class="checkout-tablehead-4">Quantity <i class="fa fa-sort-numeric-asc" aria-hidden="true"></i></th>
							<th class="checkout-tablehead-5">Subtotal <i class="fa fa-file-o" aria-hidden="true"></i></th>
							<!-- <th class="checkout-tablehead-6">Option <i class="fa fa-filter" aria-hidden="true"></i></th> -->
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
							<td data-th="Product" class="checkout-tabledata-1">
								<div class="row">
									<div class="col-sm-2 hidden-xs product-img"><img src="<?= $value['product_img'][$i] ?>" alt="..." width="100" height="100" class="img-responsive"/></div>
								</div>
							</td>
							<td data-th="product" class="checkout-tabledata-2">
								<div class="col-sm-10 product-name">
									<h4 class="nomargin"><?= $value['product_name'][$i]; ?> </h4>
									<!-- <p>Quis aute iure reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor sit amet.</p> -->
								</div>
							</td>
							<td data-th="Price" class="checkout-tabledata-3">
								<div class="price-value">
									<?= $value['product_price'][$i]; ?>
								</div>
							</td>
							<td data-th="Quantity" class="checkout-tabledata-4">
								<div class="product-qty">
									<label><?=  $values ?></label>
								</div>
							</td>
							<td data-th="Subtotal" class="text-center checkout-tabledata-5" >
								<div class="subtotal-value">
									<?= $value['totals'][$i]; ?>
								</div>
							</td>
							<!-- <td class="actions checkout-tabledata-6" data-th="">
								<div class="options-btn">
									<button class="btn btn-info btn-sm refresh-btn"><i class="fa fa-refresh"></i></button>
									<button class="btn btn-danger btn-sm remove-btn"><i class="fa fa-trash-o"></i></button>								
								</div>
							</td> -->
						</tr>
					</tbody>
					
				
</div><?php endfor; ?>
</table>
					<tfoot>
						<tr class="visible-xs">
							<td class="text-center">
								<div class="final-total-content">
									<div class="finaltotal">
										<div class="finaltotal-left">
											Grand Total
										</div>
										<div class="finaltotal-right">
											<?= $final_total; ?>
										</div>	  
									</div>	
								</div>	
							</td>
						</tr>
						<tr>
							<td>
								<div class="count-shop-btn">
									<div class="count-shop-btn-content">
										<a href="#" class="btn btn-warning count-btn">
											<i class="fa fa-angle-left"></i> Continue Shopping
										</a>
									</div>
								</div>	
							</td>
							<td colspan="2" class="hidden-xs"></td>
							
						</tr>
					</tfoot>
<div class="container checkout-main">
<h3>Payment Form</h3>

	<div class="checkout-pay-content">
		<div class="form-group row pay-name">
			<label for="name" class="col-sm-2 col-form-label">Name <i class="fa fa-user" aria-hidden="true"></i></label>
			<div class="col-sm-10">
				<input type="text" name="name" id="name" class="form-control">
			</div>
		</div>
		<div class="form-group row pay-number">
			<label for="phone" class="col-sm-2 col-form-label">Phone Number <i class="fa fa-mobile" aria-hidden="true"></i></label>
			<div class="col-sm-10">
				<input type="number" name="phone" id="phone" class="form-control">
			</div>
		</div>	
		<div class="form-group row pay-email">
			<label for="email" class="col-sm-2 col-form-label">Email <i class="fa fa-envelope" aria-hidden="true"></i></label>
			<div class="col-sm-10">
			<input type="text" class="form-control" id="email" name="email" placeholder="email@example.com">
			</div>
		</div>	
		<div class="form-group row pay-amount">
			<label for="amount" class="col-sm-2 col-form-label">Amount <i class="fa fa-money" aria-hidden="true"></i></label>
			<div class="col-sm-10">
			<input type="number" name='final_total' class="form-control" id="amount" value="<?= $final_total; ?>" readonly="readonly">
			</div>
		</div>
		<div class="form-group row pay-country">
			<label for="country" class="col-sm-2 col-form-label country-label-head">Select Country <i class="fa fa-globe" aria-hidden="true"></i></label>	
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
	</div>
	<div class="form-group row checkout-btn">
		<div class="col-sm-12 pay-now-btn">
		  <button <?php if($payment_method == 'flutter') { echo 'type="button"';} elseif($payment_method == 'paystack'){ echo 'type="submit"';} ?> name="pay_now" id="pay-now" <?php if($payment_method == 'flutter'){echo 'onClick="makePayment()"'; }?> title="Pay now"><i class="fa fa-angle-double-left" aria-hidden="true"></i> Pay now <i class="fa fa-angle-double-right" aria-hidden="true"></i></button>
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

	<script>
$(document).ready(function() {


   var fadeTime = 300;

   $('.pass-quantity input').change(function() {
     updateQuantity(this);
   });

   $('.remove-item button').click(function() {
     removeItem(this);
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
     productRow.slideUp(fadeTime, function() {
       productRow.remove();
       recalculateCart();
     });
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


	