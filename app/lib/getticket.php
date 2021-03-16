<?php
session_start();
$dbcalss = '../model/classDatabaseManager.php';
require_once '../lib/functions.php';

if(isset($_GET['t_id']) && !empty($_GET['t_id'])){



$t_id = $_GET['t_id'];


 $logIn          =   $_SESSION["logIn"];
 $logInId        =   $_SESSION['logInId'];


$data = getticketsconversation('',$t_id);



$messages = 'Data Loading';

foreach ($data as $key => $value) {

    if( $logInId == $value['sender_id'] ){


    ?>

<div class='msgIn'>
    <div class='msgc'>
        <div class='msginner'>
            <p><?= $value['message'] ?></p> 
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
        
        <div class='msginner'>
            <p><?= $value['message'] ?></p> 
        </div> 
        <span class='chat-time'>
            <?= $value['datetime']; ?>
        </span>
    </div> 
</div>

<?php

}
}






}else{


$data = NULL;
$messages = 'No Message recieved yet on this ticket';
}





?>