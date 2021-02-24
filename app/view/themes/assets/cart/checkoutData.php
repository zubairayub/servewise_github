<?php
REQUIRE '../../include/config.php';

if(!empty($_POST)){

echo process_order($DB_CLASS,$_POST,$owner_id,$vb_id);

}
if(!empty($_GET)){
    echo $_GET['status'];
    echo $_GET['transaction_id'];
    echo process_order($DB_CLASS,$_POST,$owner_id,$vb_id);
}



?>