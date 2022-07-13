<?php
if (!session_id()) {
    session_start();
}
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
 error_reporting(E_ALL);
error_reporting(1);

define('SITE_TITLE', 'Join CEDA');
define('BASE_URL', 'https://joinceda.com');
define('PAGE_LIMIT', 10);
define('STRIPE_KEY', 'pk_live_51JX66lADIz0KikRTMsM4OTxBNJjYxe0MAxleUQrywLk7RGeCvjgaRBLuX42noHdIHh4lLlFJRdAOB7018To36wyX00pYImKcVX');
define('STRIPE_SECRET', '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');
//loading of all classes
require dirname(__FILE__) .'/../lib/phpmailer/vendor/autoload.php';
require dirname(__FILE__) .'/../lib/stripe-php/vendor/autoload.php';
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
