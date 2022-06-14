<?php
if (!session_id()) {
    session_start();
}
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
// error_reporting(E_ALL);
error_reporting(0);

define('SITE_TITLE', 'Join CEDA');
define('BASE_URL', 'https://joinceda.com');
define('PAGE_LIMIT', 10);

//loading of all classes
require dirname(__FILE__) .'/../lib/phpmailer/autoload.php';
foreach (glob(dirname(__FILE__) ."/../classes/*.php") as $filename) {
    include $filename;
}

$username='uhy0thqmh3rgd';
$password='61h%r4r117%(';
$database='dbaqyobxxpnqai';
$host='localhost';
$charset = 'utf8';

$dsn = "mysql:host=$host;dbname=$database;charset=$charset";
$opt = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

global $DB;
$DB = new PDO($dsn, $username, $password, $opt);

/*global $DBS;
$DBS = mysqli_connect($host, $username, $password, $database);*/

// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    die();
}
