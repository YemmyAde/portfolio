<?php
//session_start();
$title = "CEDA";
require 'config/config.php';
/* if($_SESSION['id']!=""){
     header('Location:/dashboard');
     die();
 }*/
$all_rates = CedaExchangeRate::getAll();
$exchange_rates = [];

foreach ($all_rates as $rate) {
    $parent = $rate['currency_from'];
    if (sizeof($exchange_rates[$parent]) == 0) {
        $exchange_rates[$parent] = array();
    }
    array_push($exchange_rates[$parent], $rate);
}
//print("<pre>".print_r($exchange_rates,true)."</pre>");
include 'templates/header.phtml';
include 'templates/index.phtml';