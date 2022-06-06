<?php
session_start();
$title = "Dashboard";
require 'config/config.php';
if(!isset($_SESSION['id']) || $_SESSION['id'] == ''){
    header('Location: login');
    die();
}
 $exchange_rates = CedaExchangeRate::getUserByUserISO($_SESSION['iso']);
$data =[
    'id' => $_SESSION['id'],
];

$transactions = Transactions::getTotalTransactions($data);
include 'templates/header.phtml';
include 'templates/dashboard.phtml';