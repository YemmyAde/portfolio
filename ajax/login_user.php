<?php
require '../config/config.php';

if(isset($_REQUEST['email']) && isset($_REQUEST['password'])){
    $password = hash('sha512', $_REQUEST['password']);
    $login = User::verifyUser($_REQUEST['email'],$password);
    if($login){
        $_SESSION['token'] = $login['token'];
        $_SESSION['id'] = $login['id'];
        echo json_encode(['message' => 'Login successful']);
    }
    else{
        echo json_encode(['error'=>'Email or password is incorrect']);
    }
}
else{
    echo json_encode(['error'=>'Oops! something went wrong']);
}