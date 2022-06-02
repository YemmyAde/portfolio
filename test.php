<?php
/*$data = [
    'account_name' => "Aliyu Mandam",
    'account_number' => "0000444000",
    'bank_name' => "Guaranty Trust Bank",
];*/
$data = [
    'beneficiary_name' => "Brace Network LLC",
    'bank_name' => "Evolve Bank & Trust",
    'account_number' => "0000444000",
    'aba' => "084106768",
    'bank_address' => "6070 Poplar Ave, Suite 200 Memphis, TN 38119",
    'type' => "Checking",
    'beneficiary_address' => "1309 Coffeen Avenue, Ste 1200 Sheridan, WY 82801",
];
//encode
$b64 = base64_encode(json_encode($data));
$string = substr($b64, 0, -1);
echo $string . '<br>';
//decode
$string = $string . '=';
$b64 = base64_decode($string);
echo $b64 . '<br>';
print_r(json_decode($b64));
?>