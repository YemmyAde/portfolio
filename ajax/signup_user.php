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
        'country'           => $_REQUEST['country'],
        'ios2'              => $_REQUEST['ios2'],
        'dial_code'         => $_REQUEST['dial_code'],
        'phone_number'      => $_REQUEST['phone_number'],
        'password'          => hash('sha512', $_REQUEST['password']),
        'type'              => $_REQUEST['type'],
        'token'             => $token,
    ];
    /* print_r($_REQUEST);
     die();*/
    $user = User::addUser($data);
    if ($user) {
        echo json_encode(['message' => 'Signup successful']);
    } else {
        echo json_encode(['error' => 'Oops! Something went wrong']);

    }
}