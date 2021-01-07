<?php 

header("Content-Type:application/json"); 

if (!isset($_GET["token"]))
{
echo "Technical error";
exit();
}



if ($_GET["token"]!='jDfZw1ZCzYpnhXDdPHAsrxSTrILuY0wyewf3Q/k8xEmhmyBy+VR67OEKMb22x0sliXLs1tAm4rfMgvyaGQSSdM0Pac4pv4CtFOtojNIskm9QabN//tCE1PSFIxZi0NJQJJAmHHGf5wAQH6iu++CdqNekTawS6pXwfc7nfeCKQViFPL08s1bu0n6PpPlLhECbeHEa743YPveHNdN7iZsoQ2wqkNOp7ZIEup1BodBEFBvwBYBOzt/vDgTmXzUG5x+eZbYWIehN3mpFfirssfwA9rsgdvTsVp/IcXxZS0MeVix5kFvGff7XVMmk6QfxC5xIVktPHofoV1DVrvgWiyRoBQ==')
{
echo "Invalid authorization";
exit();
}



/* 
here you need to parse the json format 
and do your business logic e.g. 
you can use the Bill Reference number 
or mobile phone of a customer 
to search for a matching record on your database. 
*/ 

/* 
Reject an Mpesa transaction 
by replying with the below code 
*/ 

echo '{"ResultCode":1, "ResultDesc":"Failed", "ThirdPartyTransID": 0}'; 

/* 
Accept an Mpesa transaction 
by replying with the below code 
*/ 

echo '{"ResultCode":0, "ResultDesc":"Success", "ThirdPartyTransID": 0}';
 
?>