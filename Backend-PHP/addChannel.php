<?php
require_once 'db_connect.php';

$guid = $_POST['guid'];
$channelName = $_POST['channelName'];

global $connection;

$stmt = mysqli_prepare($connection, "INSERT INTO channels (guid, name) VALUES (?, ?)");
mysqli_stmt_bind_param($stmt, "ss", $guid, $channelName);
if (!mysqli_stmt_execute($stmt)) {
    die("Error: " . mysqli_stmt_error($stmt));
}
else {
    echo "OK";
}
