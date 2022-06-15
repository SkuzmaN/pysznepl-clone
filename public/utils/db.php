<?php
$host = 'mysql';

// Database use name
$user = 'restaurants_api';

//database user password
$pass = 'resaturant_2022';
$dbName= 'restaurants';

$dbConnection = new mysqli($host, $user, $pass,$dbName);

if ($dbConnection->connect_errno){
    die(":(");
}