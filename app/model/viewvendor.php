<?php
if(getstatus($type) == 'Admin'){

$admin = TRUE;
$vendors = getvendors();	
}else{
$admin = FALSE;
$vendors = getvendors($logInId);

}




?>