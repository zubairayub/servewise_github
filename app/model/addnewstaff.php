<?php
if(isset($_GET['name'])){
$name = $_GET['name'];
$email = $_GET['email'];
$phone = $_GET['phone'];
$type = $_GET['type'];
$update = 'readonly';
}else{
$update = null;
$name = NULL;
$email = NULL;
$phone = NULL;
$type = NULL;

}
$data = getusertypes();
?>