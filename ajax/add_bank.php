<?php
session_start();
require '../config/config.php';
$bankData = [
    'user_id'               =>$_SESSION['id'],
    'bank_name'             =>$_REQUEST["bank_name"],
    'account_name'          =>$_SESSION['name'],
    'account_number'        =>$_REQUEST["account_number"],
];
$bank_res = Bank::addBank($bankData);
if($bank_res){
    echo json_encode(['message' => 'Recipient added successfully']);
}
else{
    echo json_encode(['error' => 'Oops! something went wrong']);
}