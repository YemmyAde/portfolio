<?php
session_start();
$title = "Bank Transfer";
require 'config/config.php';
if ($_SESSION['id'] == "") {
    header('Location:/login');
    die();
}
$payment_method = base64_decode($_REQUEST['q']);
$kyc_info = KycVerification::getInfoByUserID($_SESSION['id']);
$amount = (isset($_REQUEST['am'])) ? base64_decode($_REQUEST['am']) : "";
$equivalent = (isset($_REQUEST['eq'])) ? base64_decode($_REQUEST['eq']) : "0";
$sign = base64_decode($_REQUEST['s']);

$bank = Bank::get();
$bank_details = '';
$bank_data = array();
if ($payment_method == 'bank') {
    $bank_details = $bank[0]['bank'];
}
if ($payment_method == 'payoneer') {
    $bank_details = $bank[1]['bank'];
}
$bank_details = $bank_details . '=';
$b64 = base64_decode($bank_details);
$bank_data = json_decode($b64);

include 'templates/header.phtml';
include 'templates/transfer.phtml';
