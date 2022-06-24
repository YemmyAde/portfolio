<?php
require '../config/config.php';
$check_email = User::getUserByEmail($_REQUEST['email']);
$check_phone = User::getUserByPhone($_REQUEST['phone_number']);
if ($check_email) {
    echo json_encode(['error' => 'Email already used, please use another mail']);
    die();
}
if ($check_phone) {
    echo json_encode(['error' => 'Phone number already used, please use anther phone number']);

} else {
    $token = openssl_random_pseudo_bytes(16);
    $token = bin2hex($token);
    $data = [
        'name' => $_REQUEST['name'],
        'email' => $_REQUEST['email'],
        'country' => $_REQUEST['country'],
        'iso2' => $_REQUEST['iso2'],
        'dial_code' => $_REQUEST['dial_code'],
        'phone_number' => $_REQUEST['phone_number'],
        'password' => hash('sha512', $_REQUEST['password']),
        'type' => $_REQUEST['type'],
        'token' => $token,
    ];
    /*print_r($data);
     die();*/
    $user = User::addUser($data);
    if ($user) {
        echo json_encode(['message' => 'Signup successful']);
    } else {
        echo json_encode(['error' => 'Oops! Something went wrong']);

    }
}