<?php
session_start();
$title = "transaction";
require 'config/config.php';

if($_SESSION['id']==""){
    header('Location:/login');
    die();
}
include 'templates/header.phtml';
include 'templates/transaction.phtml';
