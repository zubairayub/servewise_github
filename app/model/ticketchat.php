<?php
//session_start();
// defined('APPLICATION_PATH') || define('APPLICATION_PATH', realpath( dirname(__FILE__) . '../../app'));
// const DS = DIRECTORY_SEPARATOR; 
// $dbcalss = APPLICATION_PATH . DS . 'model' . DS . 'classDatabaseManager.php';
// $functions = APPLICATION_PATH . DS . 'lib' . DS . 'functions.php';
//$dbcalss = '../model/classDatabaseManager.php';
//require_once '../lib/functions.php';

if(isset($_GET['t_id']) && !empty($_GET['t_id'])){



$t_id = $_GET['t_id'];


$toemail = $_GET['to_email'];


$data = getticketsconversation('',$t_id);



$messages = 'Data Loading';

}else{


$data = NULL;
$messages = 'No Message recieved yet on this ticket';
}





?>