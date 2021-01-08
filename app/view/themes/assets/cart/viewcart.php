<?php
// Get the results as JSON string
$product_list = filter_input(INPUT_POST, 'cart_list');
// Convert JSON to array
$product_list_array = json_decode($product_list);
//var_dump($product_list_array);
 ?>

<?php foreach($product_list_array as $results){ ?>
<div class="container mt-5 mb-5">
  <div class="row justify-content-center">
    <div class="col-xl-7 col-lg-8 col-md-7">
      <div class="border border-gainsboro p-3">

        <h2 class="h6 text-uppercase mb-0">Cart Total (<?= $results -> product_quantity ?> Items): <strong class="cart-total"><?= $results->product_price * $results->product_quantity; ?></strong></h2>
      </div>

      <div class="border border-gainsboro p-3 mt-3 clearfix item">
        <div class="text-lg-left">
          <i class="fa fa-ticket fa-2x text-center" aria-hidden="true"></i>
        </div>
        <div class="col-lg-5 col-5 text-lg-left">
          <h3 class="h6 mb-0"><?= $results->product_name; ?><br>
            <small>Cost: <?= $results->product_price; ?></small>
          </h3>
        </div>
        <div class="product-price d-none"><?= $results->product_price; ?></div>
        <div class="pass-quantity col-lg-3 col-md-4 col-sm-3">
          <label for="pass-quantity" class="pass-quantity">Quantity</label>
          <input class="form-control" type="number" value="<?= $results->product_quantity;?>" min="1">
        </div>
        <div class="col-lg-2 col-md-1 col-sm-2 product-line-price pt-4">
          <span class="product-line-price"><?= $results->product_quantity * $results->product_price; ?>
          </span>
        </div>
        <div class="remove-item pt-4">
          <button class="remove-product btn-light">
            Delete
          </button>
        </div>
      </div>
	  <label for="coupon" class="coupon_label">Coupon</label>
	  <div class="coupon"><input type="number" name="coupon" id="coupon" /></div>
	  <button class='redeem'>Redeem</button>
    </div>
	<form method="post" action="checkout.php">
	<input type="hidden" name="subtotal" id="subtotal" value="<?= $results->product_quantity * $results->product_price; ?>">
	<input type="hidden" name="cart-discount" id="discount" value="">
	<input type="hidden" name="total" class="cart-total" value="<?= $results->product_quantity * $results->product_price; ?>">
	<input type="hidden" name="prod-name" value="<?= $results->product_name; ?>">
    <div class="col-xl-3 col-lg-4 col-md-5 totals">
      <div class="border border-gainsboro px-3">
        <div class="border-bottom border-gainsboro">
          <p class="text-uppercase mb-0 py-3"><strong>Order Summary</strong></p>
        </div>
        <div class="totals-item d-flex align-items-center justify-content-between mt-3">
          <p class="text-uppercase">Subtotal</p>
          <p class="totals-value" name="cart-subtotal" id="cart-subtotal"><?= $results->product_quantity * $results->product_price; ?></p>
        </div>
        <div class="totals-item d-flex align-items-center justify-content-between">
          <p class="text-uppercase">Coupon discount</p>
          <p class="totals-value" name="cart-discount" id="cart-discount"></p>
        </div>
        <div class="totals-item totals-item-total d-flex align-items-center justify-content-between mt-3 pt-3 border-top border-gainsboro">
          <p class="text-uppercase"><strong>Total</strong></p>
          <p class="totals-value font-weight-bold cart-total" name="total"><?= $results->product_quantity * $results->product_price; ?></p>
        </div>
      </div>
	  <label>Payment Method</label>
	  <select name="payment-method">
		<option value="pespal">pespal</option>
		<option value="mpesa">mpesa</option>
		<option value="paystack">paystack</option>
		<option value="flutter">flutter</option>
	  </select>	
      <input type="submit" name="submit" id="submit" class="mt-3 btn btn-pay w-100 d-flex justify-content-between btn-lg rounded-0" value="submit">
    </div>
	</form>
  </div>
</div><!-- container -->
<?php } ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js" type="text/javascript" ></script>
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