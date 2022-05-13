<?php
session_start();
require '../config/config.php';
$target_dir = "../assets/uploads/transactions/";
$imageFileType = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);

$target_file = $target_dir . str_replace(' ', '-', $_SESSION['name']) . "." . $imageFileType;
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if ($_FILES['file'] != '') {
    $check = getimagesize($_FILES["file"]["tmp_name"]);
    if ($check !== false) {
        //echo json_encode(['message' => "File is an image - " . $check["mime"] . "."]);
        $uploadOk = 1;
    } else {
        echo json_encode(['upload_error' => "File is not an image."]);
        die();
    }

    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        die();
    }
    if ($uploadOk == 1) {
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
            $img_url = str_replace('..', '', $target_file);
            $data = [
                'user_id' => $_SESSION['id'],
                'amount_in' => $_REQUEST['amount_in'],
                'amount_to' => $_REQUEST['amount_to'],
                'amount_in_currency' => $_REQUEST['amount_in_currency'],
                'amount_to_currency' => $_REQUEST['amount_to_currency'],
                'transaction_img' => $img_url,
                'transaction_date' => $_REQUEST['transaction_date'],
                'status' => 'Pending',
            ];
            $res = Transactions::addTransaction($data);
            if ($res) {
                echo json_encode(['message' => 'Transactions added successfully']);
            } else {
                echo json_encode(['error' => 'Oops! something went wrong']);
            }
        } else {
            echo json_encode(['upload_error' => "Sorry, there was an error uploading your file."]);
        }
    }
}
