<?php
session_start();
$title="CEDA";
require 'config/config.php';
 if($_SESSION['id']!=""){
     header('Location:/dashboard');
     die();
 }
include 'templates/header.phtml';
include 'templates/business.phtml';