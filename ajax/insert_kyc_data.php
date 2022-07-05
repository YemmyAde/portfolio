<?php
session_start();
require '../config/config.php';
$target_dir = "../assets/uploads/kyc-documents/";
$imageFileType = pathinfo( $_FILES['file']['name'], PATHINFO_EXTENSION );

$target_file = $target_dir .str_replace(' ','-' ,$_SESSION['name']) .".".$imageFileType;
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
function add($img_url=""){
    $data = [
        'user_id'               =>$_SESSION['id'],
        'bank_name'             =>$_REQUEST["bank_name"],
        'account_name'          =>$_SESSION['name'],
        'account_number'        =>$_REQUEST["account_number"],
        'document_link'         =>($img_url!="")?$img_url:"",
        'is_approved'           =>($img_url!="")?0:1,
    ];
    $kyc_res = KycVerification::addKyc($data);
    return $kyc_res;
}
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

    // Check if file already exists
    if (file_exists($target_file)) {
        echo json_encode(['upload_error' => "Sorry, file already exists."]);
        die();
    }

    // Check file size
    if ($_FILES["file"]["size"] > 10485760) {
        echo json_encode(['upload_error' => "Sorry, your file is too large."]);
        die();
    }

    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        die();
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 1) {
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
            $img_url = str_replace('..','',$target_file);
            $kyc_res = add($img_url);
            if($kyc_res){
                echo json_encode(['message' => 'KYC information added and is under review']);
            }
            else{
                echo json_encode(['error' =>'Oops! something went wrong']);
            }
        } else {
            echo json_encode(['upload_error'=> "Sorry, there was an error uploading your file."]);
        }
    }
}
else{
    $kyc_res = add();
    if($kyc_res){
        echo json_encode(['message' => 'Recipient Added']);
    }
    else{
        echo json_encode(['error' =>'Oops! something went wrong']);
    }
}