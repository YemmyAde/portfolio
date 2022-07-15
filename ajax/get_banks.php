<?php
session_start();
require '../config/config.php';


$banks = Bank::getInfoByUserID($_SESSION['id']);
include('../templates/partials/fetch_user_banks.phtml');