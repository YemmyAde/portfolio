<?php
require '../config/config.php';

$data =[
    'id' => $_SESSION['id'],
];

$transactions = Transactions::get($data);
print_r($transactions);
include('../templates/partials/transaction.phtml');