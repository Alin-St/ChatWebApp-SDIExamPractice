<?php
$dbServerName = "localhost:3306";
$dbUsername = "root";
$dbPassword = "";
$dbName = "sdi_exam_practice";

// Establish the database connection
$connection = mysqli_connect($dbServerName, $dbUsername, $dbPassword, $dbName);
if (!$connection) {
    die("Could not connect. " . mysqli_connect_error());
}
