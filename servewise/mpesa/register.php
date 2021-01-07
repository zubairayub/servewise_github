<?php
header("Content-Type:application/json");
$shortcode='Shortcode 1';
$consumerkey    ="Y6deVtkCqFvpBcSKctZgrZUaf0jRf2aY";
$consumersecret ="nc7A5sTCxqbpcccb";
$validationurl="http://localhost/servewise/mpesa/validation.php?token=jDfZw1ZCzYpnhXDdPHAsrxSTrILuY0wyewf3Q/k8xEmhmyBy+VR67OEKMb22x0sliXLs1tAm4rfMgvyaGQSSdM0Pac4pv4CtFOtojNIskm9QabN//tCE1PSFIxZi0NJQJJAmHHGf5wAQH6iu++CdqNekTawS6pXwfc7nfeCKQViFPL08s1bu0n6PpPlLhECbeHEa743YPveHNdN7iZsoQ2wqkNOp7ZIEup1BodBEFBvwBYBOzt/vDgTmXzUG5x+eZbYWIehN3mpFfirssfwA9rsgdvTsVp/IcXxZS0MeVix5kFvGff7XVMmk6QfxC5xIVktPHofoV1DVrvgWiyRoBQ==";
$confirmationurl="http://localhost/servewise/mpesa/confirmation.php?token=jDfZw1ZCzYpnhXDdPHAsrxSTrILuY0wyewf3Q/k8xEmhmyBy+VR67OEKMb22x0sliXLs1tAm4rfMgvyaGQSSdM0Pac4pv4CtFOtojNIskm9QabN//tCE1PSFIxZi0NJQJJAmHHGf5wAQH6iu++CdqNekTawS6pXwfc7nfeCKQViFPL08s1bu0n6PpPlLhECbeHEa743YPveHNdN7iZsoQ2wqkNOp7ZIEup1BodBEFBvwBYBOzt/vDgTmXzUG5x+eZbYWIehN3mpFfirssfwA9rsgdvTsVp/IcXxZS0MeVix5kFvGff7XVMmk6QfxC5xIVktPHofoV1DVrvgWiyRoBQ==";
/* testing environment, comment the below two lines if on production */
$authenticationurl='https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';
$registerurl = 'https://sandbox.safaricom.co.ke/mpesa/c2b/v1/registerurl';
/* production un-comment the below two lines if you are in production */
//$authenticationurl='https://api.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials';
//$registerurl = 'https://api.safaricom.co.ke/mpesa/c2b/v1/registerurl';
$credentials= base64_encode($consumerkey.':'.$consumersecret);
$username=$consumerkey ;
$password=$consumersecret;
  // Request headers
  $headers = array(  
    'Content-Type: application/json; charset=utf-8'
  );
  // Request
  $ch = curl_init($authenticationurl);
  curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
  //curl_setopt($ch, CURLOPT_HEADER, TRUE); // Includes the header in the output
  curl_setopt($ch, CURLOPT_HEADER, FALSE); // excludes the header in the output
  curl_setopt($ch, CURLOPT_USERPWD, $username . ":" . $password); // HTTP Basic Authentication
  $result = curl_exec($ch);  
  $status = curl_getinfo($ch, CURLINFO_HTTP_CODE);  
$result = json_decode($result);
$access_token=$result->access_token;
curl_close($ch);

//Register urls
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $registerurl);
curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json','Authorization:Bearer '.$access_token)); 
$curl_post_data = array(
  //Fill in the request parameters with valid values
  'ShortCode' => $shortcode,
  'ResponseType' => 'Cancelled',
  'ConfirmationURL' => $confirmationurl,
  'ValidationURL' => $validationurl
);
$data_string = json_encode($curl_post_data);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
$curl_response = curl_exec($curl);
echo $curl_response;
?>