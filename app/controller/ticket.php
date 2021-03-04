<?php
session_start();

defined('APPLICATION_INNERPATH') || define('APPLICATION_INNERPATH', realpath( dirname(__FILE__) . '/../'));


$PATH =  constant("APPLICATION_INNERPATH");

require $PATH . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'service_config.php'; 
$DB_CLASS =  $config_service['DB_CLASS'];
require_once $config_service['FUNCTIONS'];

/* ticket form */
$ticketsend    = $_POST['sendto_ticket'] = isset($_POST['sendto_ticket']) ? $_POST['sendto_ticket'] : '';
$ticket_title  = $_POST['ticket_title']  = isset($_POST['ticket_title'])  ? $_POST['ticket_title'] : '';
$ticket_dis    = $_POST['ticket-dis']    = isset($_POST['ticket-dis'])    ? $_POST['ticket-dis'] : '';

echo 1;
?>