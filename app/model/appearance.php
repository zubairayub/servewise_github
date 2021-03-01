<?php
require_once($dbcalss);



if(isset($_GET['theme_id'])){



$theme_id = $_GET['theme_id'];
updatetheme($branch_id,$theme_id);



}



$data = getallthemes();






?>