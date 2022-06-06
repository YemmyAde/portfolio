<?php
session_start();
require '../config/config.php';

if(isset($_REQUEST['email']) && isset($_REQUEST['password'])){
    $password = hash('sha512', $_REQUEST['password']);
    $login = User::verifyUser($_REQUEST['email'],$password);

    if($login){
        $_SESSION['id'] = $login['id'];
        $_SESSION['name'] = $login['name'];
        $_SESSION['iso'] = $login['iso2'];
        if($login['iso2']=="ng"){
            $_SESSION['currency'] = 'naira';
            $_SESSION['currency_sign'] = '₦';
        }
        if($login['iso2']=="pk"){
            /*echo 'heerer';
            print_r($login);
            die();*/
            $_SESSION['currency'] = 'pkr';
            $_SESSION['currency_sign'] = 'pkr';
        }
        if($login['iso2']=="ph"){
            $_SESSION['currency'] = 'peso';
            $_SESSION['currency_sign'] = '₱';
        }
        echo json_encode(['message' => 'Login successful']);
    }
    else{
        echo json_encode(['error'=>'Email or password is incorrect']);
    }
}
else{
    echo json_encode(['error'=>'Oops! something went wrong']);
}