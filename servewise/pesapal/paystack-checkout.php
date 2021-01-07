<!DOCTYPE html>
<html lang="en">
<head>
  <title>Checkout Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

</head>
<body>
<section class="l-section l-section--hero l-section--blue" id="hero">
    <div class="c-section-pattern u-animate u-animate--play c-section-pattern--curved"></div>
    
<div class="c-hero c-hero--central c-hero--demo">
    <div class="l-container l-container--lg">
        <div class="l-container l-container--sm">
            <div class="l-grid">
                <div class="l-grid__column l-grid__column--9 l-grid__column--centered">
                    <div class="c-form__wrap c-card c-card--article c-card--form c-card--demo c-card--demo-checkout">
                        <form id="js-demo-form" class="c-form c-form--block u-animate u-animate--fade-in" method="post">
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
		  <input type="number" class="form-control" id="amount">
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
		  <button type="submit" name="pay_now" id="pay-now" title="Pay now">Pay now</button>

		</div>
	</div>
                            <script src="https://js.paystack.co/v2/inline.js"></script>
                        </form>
                        <div id="js-demo-success" class="u-animate u-animate--fade-in" style="display: none">
                            <h4>Payment Successful!</h4>
                            <div id="js-drip-registration-form" style="display: none;">
                                <p>Thanks for taking Paystack for a spin! Would you like to learn more about all the cool things Paystack can do?</p>
                                <button class="c-button c-button--primary c-button--full-width" id="js-drip-subscription-button" onclick="addToDrip()">
                                    <span class="c-button__text" id="js-drip-subscription-button-text">
                                        Yup! Send me more info via email
                                    </span>
                                </button>
                            </div>
                            <div id="js-no-drip-registration-form" style="display: none">
                                <p>Thanks for taking Paystack for a spin!</p>
                            </div>
                            <div class="c-card--demo__reset">
                                <a href="#" onclick="reset()">Make another payment</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


</section>
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