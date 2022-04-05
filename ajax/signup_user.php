<?php
require '../config/config.php';
$check_email = User::getUserByEmail($_REQUEST['email']);
if ($check_email) {
    echo json_encode(['error' => 'Email already used, please user another mail']);
} else {
    $token = openssl_random_pseudo_bytes(16);
    $token = bin2hex($token);
    $data = [
        'name'              => $_REQUEST['name'],
        'email'             => $_REQUEST['email'],
        'phone_number'      => $_REQUEST['phone_number'],
        'password'          => hash('sha512', $_REQUEST['password']),
        'type'              => $_REQUEST['type'],
        'token'             => $token,
    ];

    $user  = User::addUser($data);
    if($user){
        echo json_encode(['message' => 'Signup successful']);
    }
    else{
        echo json_encode(['error' => 'Oops! Something went wrong']);

    }
}