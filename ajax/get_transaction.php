<?php
session_start();
require '../config/config.php';

$data =[
    'id' => $_SESSION['id'],
];

$transactions = Transactions::get($data);

include('../templates/partials/transaction.phtml');