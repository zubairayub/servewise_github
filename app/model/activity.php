<?php
$type = getusertypes($type);
$type = $type[0]['title'];

if($type == 'Admin'){
$data = getactivities('','','','','Admin');
}elseif($type == 'Vendor'){

  $data = getactivities('','',$vendor_id,'','Brand');
}
elseif($type == 'Branch'){

  $data = getactivities('','','',$branch_id,'Vendor');
  //echo $branch_id;
}
elseif($type == 'Branch'){

  $data = getactivities('',$user_id,'','','user');
  //echo $branch_id;
}
?>