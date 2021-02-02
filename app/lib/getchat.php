<?php
session_start();
// defined('APPLICATION_PATH') || define('APPLICATION_PATH', realpath( dirname(__FILE__) . '../../app'));
// const DS = DIRECTORY_SEPARATOR; 
// $dbcalss = APPLICATION_PATH . DS . 'model' . DS . 'classDatabaseManager.php';
// $functions = APPLICATION_PATH . DS . 'lib' . DS . 'functions.php';
$dbcalss = '../model/classDatabaseManager.php';
require_once 'functions.php';



// if(isset($_SESSION['visitor_id']) && !empty($_SESSION['visitor_id'])){
    

// 	$visitor_id = $_SESSION['visitor_id'];
	
     
    
//    $data = getchat($dbcalss,$visitor_id);



// }else
if(isset($_POST['branch_id']) && !empty($_POST['user_id'])){
    $visitor_id = $_POST['user_id'];
    $branch_id = $_POST['branch_id'];

   $data = getchat($dbcalss,$visitor_id,$branch_id);

}

$messsages  = NULL;
foreach ($data as $key => $value) {

	 if($value['status'] == 0){
?>
	 	<div class='msgIn'>
    <div class='msgc'>
        <div class='user-name'>
            <b class='user-name'><?=  $value['user_id'] ?></b> 
        </div> 
        <div class='msginner'>
            <p><?= $value['text'] ?></p> 
        </div> 
        <span class='chat-time'>
            <?= $value['datetime'] ?>
        </span>
    </div> 
</div>
<?php
	 }else{


?>

<div class='msgSend'>
    <div class='msgs'>
        <div class='user-name'>
            <b class='user-name'><?= $value['user_id'] ?></b> 
        </div> 
        <div class='msginner'>
            <p><?= $value['text'] ?></p> 
        </div> 
        <span class='chat-time'>
            <?= $value['datetime']; ?>
        </span>
    </div> 
</div>




<?php

	 }



}

//echo $messsages;




?>