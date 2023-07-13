<?php

// Disable mysqli exceptions so that we can handle errors ourselves
mysqli_report(MYSQLI_REPORT_OFF);

$dbServerName = "localhost:3306";
$dbUsername = "root";
$dbPassword = "";
$dbName = "sdi_exam_practice";

// Establish the database connection
$connection = mysqli_connect($dbServerName, $dbUsername, $dbPassword, $dbName);
if (!$connection) {
    die("Error" . mysqli_connect_error());
}
