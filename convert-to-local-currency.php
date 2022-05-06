<?php
session_start();
$title = 'Covert To Local Currency';
require 'config/config.php';
if($_SESSION['id']==""){
    header('Location:/login');
    die();
}
$exchange_rates = CedaExchangeRate::getUserByUserISO($_SESSION['iso']);

$amount = (isset($_REQUEST['am'])) ? $_REQUEST['am']:"";
$equivalent = (isset($_REQUEST['eq'])) ? $_REQUEST['eq']:"";
include 'templates/header.phtml';
include 'templates/convert-to-local-currency.phtml';