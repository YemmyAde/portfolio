<?php
session_start();
$title = 'Covert To Local Currency';
require 'config/config.php';
if($_SESSION['id']==""){
    header('Location:/login');
    die();
}
$exchange_rates = CedaExchangeRate::getUserByUserISO($_SESSION['iso']);
$kyc_info = KycVerification::getInfoByUserID($_SESSION['id']);
$res = "";
if ($kyc_info) {
    if ($kyc_info['is_approved'] == '0') {
        if($kyc_info['fist_transaction']=="0"){
            $res = "0";
        }
        else {
            $res = "1";
        }
    }
} else {
    $res = "2";
}

$amount = (isset($_REQUEST['am'])) ? base64_decode($_REQUEST['am']):"";
$equivalent = (isset($_REQUEST['eq'])) ?base64_decode( $_REQUEST['eq']):"0";
include 'templates/header.phtml';
include 'templates/convert-to-local-currency.phtml';