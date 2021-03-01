 <?php
 require("category/categoryClass.php");
 require_once($dbcalss);



$type =  $type;
$type = getstatus($type);


if(ISSET($_GET['name']) && !empty($_GET['name'])){

$name = $_GET['name'];
$email = $_GET['email'];
$phone = $_GET['phone'];
$dob = $_GET['dob'];
$address = $_GET['address'];






}else{


$name = 'NULL';
$email = 'NULL';
$phone = 'NULL';
$dob = 'NULL';
$address = 'NULL';



}


?>

