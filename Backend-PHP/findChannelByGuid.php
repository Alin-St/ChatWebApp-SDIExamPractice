<?php
require_once 'db_connect.php';

$guid = $_GET['guid'] ?? "";

global $connection;

$stmt = mysqli_prepare($connection, "SELECT * FROM channels WHERE guid = ?");
mysqli_stmt_bind_param($stmt, "s", $guid);
if (!mysqli_stmt_execute($stmt)) {
    die("Error: " . mysqli_stmt_error($stmt));
}

$result = mysqli_stmt_get_result($stmt);
if (mysqli_num_rows($result) !== 0) {
    $row = mysqli_fetch_assoc($result);
    echo json_encode($row);
}

mysqli_stmt_close($stmt);
mysqli_close($connection);
