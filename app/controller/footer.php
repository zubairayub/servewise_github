<?php
session_start();

defined('APPLICATION_INNERPATH') || define('APPLICATION_INNERPATH', realpath( dirname(__FILE__) . '/../'));


$PATH =  constant("APPLICATION_INNERPATH");

require $PATH . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'service_config.php'; 
$DB_CLASS =  $config_service['DB_CLASS'];
require_once $config_service['FUNCTIONS'];

 $footer_logo    = $_POST['footer_logo']    = isset($_POST['footer_logo']) ? $_POST['footer_logo'] : '';
 $about_desc     = $_POST['about_desc']     = isset($_POST['about_desc']) ? $_POST['about_desc'] : '';
 $contact_add    = $_POST['contact_add']    = isset($_POST['contact_add']) ? $_POST['contact_add'] : '';
 $contact_ph     = $_POST['contact_ph']     = isset($_POST['contact_ph']) ? $_POST['contact_ph'] : '';
 $contact_email  = $_POST['contact_email']  = isset($_POST['contact_email']) ? $_POST['contact_email'] : '';
 $cpy_text       = $_POST['cpy_text']       = isset($_POST['cpy_text']) ? $_POST['cpy_text'] : '';
 $social_links   = $_POST['social_links']   = isset($_POST['social_links']) ? $_POST['social_links'] : '';
 $facebook       = $_POST['facebook']       = isset($_POST['facebook']) ? $_POST['facebook'] : '';
 $twitter        = $_POST['twitter']        = isset($_POST['twitter']) ? $_POST['twitter'] : '';
 $instagram      = $_POST['instagram']      = isset($_POST['instagram']) ? $_POST['instagram'] : '';
 $linkedin       = $_POST['linkedin']       = isset($_POST['linkedin']) ? $_POST['linkedin'] : '';

echo '1';
?>
 
