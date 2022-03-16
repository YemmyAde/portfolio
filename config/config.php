<?php
if (!session_id()) {
    session_start();
}
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
// error_reporting(E_ALL);
error_reporting(0);
//loading of all classes
require dirname(__FILE__) .'/../lib/phpmailer/autoload.php';
foreach (glob(dirname(__FILE__) ."/../classes/*.php") as $filename) {
    include $filename;
}

$username='u5h4xv3u9cjon';
$password='1q]x1i1ctd)2';
$database='dbuc8comjcdvge';
$host='localhost';
global $DB;
$DB = mysqli_connect($host, $username, $password, $database);

// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    die();
}
