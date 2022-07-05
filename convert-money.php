<?php
session_start();
$title = 'Convert Money';
require 'config/config.php';
if($_SESSION['id']==""){
    header('Location:/login');
    die();
}
$exchange_rates = CedaExchangeRate::getUserByUserISO($_SESSION['iso']);
$kyc_info = KycVerification::getInfoByUserID($_SESSION['id']);
$payment_methods = PaymentMethod::get();
$res = "";
if ($kyc_info) {
    if ($kyc_info[0]['is_approved'] == '0') {
        $res= '1';
    }
} else {
    $res = "2";
}

$amount = (isset($_REQUEST['am'])) ? base64_decode($_REQUEST['am']):"";
$equivalent = (isset($_REQUEST['eq'])) ?base64_decode( $_REQUEST['eq']):"0";
include 'templates/header.phtml';
include 'templates/convert-money.phtml';