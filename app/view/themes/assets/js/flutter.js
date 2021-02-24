
  function makePayment() {
	  amount	= $('#amount').val();
	  currency	= $('#currency').find(":selected").val();
	  country	= $('#country').find(":selected").val();
	  email		= $('#email').val();
	  phone		= $('#phone').val();
	  name		= $('#name').val();
	  
	  console.log(name);
	  console.log(email);
	  console.log(phone);
	  console.log(amount);
	  console.log(country);
	  console.log(currency);
	  
    FlutterwaveCheckout({
      public_key: "FLWPUBK_TEST-7b279fd3c0cda0c7ae925ac9c1932ae7-X",
      tx_ref: "hooli-tx-1920bbtyt",
      amount: amount,
      currency: currency,
      country: country,
      payment_options: "card, mobilemoneyghana, ussd",
      redirect_url: // specified redirect URL
        "../cart/checkoutData.php",
      meta: {
        consumer_id: 23,
        consumer_mac: "92a3-912ba-1192a",
      },
      customer: {
        email: email,
        phone_number: phone,
        name: name,
      },
      callback: function (data) {
        console.log(data);
		
      },
      onclose: function() {
        // close modal
      },
      customizations: {
        title: "My store",
        description: "Payment for items in cart",
        logo: "https://assets.piedpiper.com/logo.png",
      },
    });

  }
