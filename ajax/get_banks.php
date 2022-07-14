<?php
session_start();
require '../config/config.php';


$kyc_info = KycVerification::getInfoByUserID($_SESSION['id']);
include('../templates/partials/fetch_user_banks.phtml');