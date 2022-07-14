<?php
session_start();
$title = "Bank Transfer";
require 'config/config.php';
if ($_SESSION['id'] == "") {
    header('Location:/login');
    die();
}
$kyc_info = KycVerification::getInfoByUserID($_SESSION['id']);

$data = json_decode(base64_decode($_REQUEST['q']));
$payment_method = $data->payment_type;
$amount = $data->entered_currency;
$equivalent =  $data->equivalent;
$sign = $data->selected_currency_sign;
$recipient = $data->recipient;

$bank = PaymentMethod::getByID($payment_method);
$bank_details = '';
$bank_data = array();
$bank_details = $bank['details'];
$bank_details = $bank_details . '=';
$b64 = base64_decode($bank_details);
$bank_data = json_decode($b64);
include 'templates/header.phtml';
include 'templates/transfer.phtml';
