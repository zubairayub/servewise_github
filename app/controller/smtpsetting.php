<?php
session_start();

defined('APPLICATION_INNERPATH') || define('APPLICATION_INNERPATH', realpath( dirname(__FILE__) . '/../'));


$PATH =  constant("APPLICATION_INNERPATH");

require $PATH . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'service_config.php'; 
$DB_CLASS =  $config_service['DB_CLASS'];
require_once $config_service['FUNCTIONS'];

$smtp_type      = $_POST['smtp_type']       = isset($_POST['smtp_type']) ? $_POST['smtp_type'] : '';
$smtp_host      = $_POST['smtp_host']       = isset($_POST['smtp_host']) ? $_POST['smtp_host'] : '';
$smtp_port      = $_POST['smtp_port']       = isset($_POST['smtp_port']) ? $_POST['smtp_port'] : '';
$smtp_user      = $_POST['smtp_user']       = isset($_POST['smtp_user']) ? $_POST['smtp_user'] : '';
$smtp_pass      = $_POST['smtp_pass']       = isset($_POST['smtp_pass']) ? $_POST['smtp_pass'] : '';
$smtp_enc       = $_POST['smtp_enc']        = isset($_POST['smtp_enc']) ? $_POST['smtp_enc'] : '';
$smtp_frm_add   = $_POST['smtp_frm_add']    = isset($_POST['smtp_frm_add']) ? $_POST['smtp_frm_add'] : '';
$smtp_frm_name  = $_POST['smtp_frm_name']   = isset($_POST['smtp_frm_name']) ? $_POST['smtp_frm_name'] : '';

echo 1;
?>