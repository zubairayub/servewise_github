<?php 
$id = null;
$name = null;
$symbol = null;
$code = null;
$rate = null;
$update =  'false';
if(isset($_GET['id'])){
$id = $_GET['id'];
$update =  'true';

$data = getcurrecny($id);	

if(count($data) > 0){

$name = $data[0]['name'];
$symbol = $data[0]['symbol'];
$code = $data[0]['code'];
$rate = $data[0]['rate'];
}
}




?>