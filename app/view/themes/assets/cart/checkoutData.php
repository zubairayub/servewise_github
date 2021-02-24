<?php
REQUIRE '../../include/config.php';

if(!empty($_POST)){

$order_id =  process_order($DB_CLASS,$_POST,$owner_id,$vb_id);
$_SESSION['order_id'] = $order_id;
}
if(!empty($_GET)){

	echo $_SESSION['order_id'];
    echo $_GET['status'].'<br>';
    echo $_GET['transaction_id'].'<br>';
}



?>