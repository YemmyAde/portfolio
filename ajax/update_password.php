<?php
session_start();
require '../config/config.php';

if($_REQUEST['password'] != ''){
    $data = [
      'password'    =>  hash('sha512', $_REQUEST['password']),
      'id'       => $_SESSION['id'],
    ];
    $update = User::updateUser($data);
    if($update){
        echo json_encode(['message' =>'Password updated']);
    }
    else{
        echo json_encode(['error' =>'Password not updated, please try again']);

    }
}