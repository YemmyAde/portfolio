<?php
session_start();
$title = "Dashboard";
require 'config/config.php';
if (!isset($_SESSION['id']) || $_SESSION['id'] == '') {
    header('Location: login');
    die();
}
$exchange_rates = CedaExchangeRate::getUserByUserISO($_SESSION['iso']);
$data = [
    'id' => $_SESSION['id'],
    'status' => 'Successful'
];
$total = Transactions::getSumOfTransactions($data);
$pending = Transactions::lastPendingTransaction($_SESSION['id']);
$date_time = '';
$now = '';
if (!$pending) {
    $date_time = '';
    $now = '';

} else {
    $future = new DateTime($pending['transaction_date']);
    $future->add(new DateInterval('P1D'));

    $pending_date = new DateTime();


    $future_date = $future->format('Y-m-d H:i:s');
    $pending_final_date = $pending_date->format('Y-m-d H:i:s');


    $interval = $future->diff($pending_date);
    $hour = ($interval->format("%a") * 24) + $interval->format("%h");
    $min = $interval->format("%i");
    $sec = $interval->format("%s");

    $time = $hour . ':' . $min . ':' . $sec;
    $date_time = date('D M j Y H:i:s', strtotime($future_date));
    $now = date('D M j Y', strtotime($pending_final_date)) . ' ' . $time;
}
//echo $date_time. ' '. $now;
////die();
include 'templates/header.phtml';
include 'templates/dashboard.phtml';