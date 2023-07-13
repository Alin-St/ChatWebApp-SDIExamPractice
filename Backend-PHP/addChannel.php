<?php
require_once 'db_connect.php';

$guid = $_POST['guid'] ?? die("Error: GUID not specified.");
$channelName = $_POST['channelName'] ?? die("Error: Channel name not specified.");

global $connection;

$stmt = mysqli_prepare($connection, "INSERT INTO channels (guid, name) VALUES (?, ?)");
mysqli_stmt_bind_param($stmt, "ss", $guid, $channelName);
if (!mysqli_stmt_execute($stmt)) {
    die("Error: " . mysqli_stmt_error($stmt));
}
else {
    echo "OK";
}

mysqli_stmt_close($stmt);
mysqli_close($connection);
