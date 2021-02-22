<?php
REQUIRE '../../include/config.php';

if(!empty($_POST)){

echo process_order($DB_CLASS,$_POST,$owner_id,$vb_id);







}


?>