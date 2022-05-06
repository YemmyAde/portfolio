<?php
session_start();
$title = "Bank Transfer";
require 'config/config.php';
if ($_SESSION['id'] == "") {
    header('Location:/login');
    die();
}
$payment_method = $_REQUEST['q'];
$kyc_info = KycVerification::getInfoByUserID($_SESSION['id']);
if ($kyc_info) {
    if ($kyc_info['is_approved'] == '0') {
        echo "<script>
                alert(\"Your KYC verification under review\");
               history.back();
              </script>";
    } else {
        include 'templates/header.phtml';
        include 'templates/transfer.phtml';
    }
} else {
    echo "<script>
            alert(\"Please enter your KYC information first\");
            window.location.href='/kyc-verification';
          </script>";
   
}

