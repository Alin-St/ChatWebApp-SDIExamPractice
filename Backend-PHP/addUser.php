<?php
require_once 'db_connect.php';

$nickname = $_POST['nickname'] ?? die("Error: Nickname not specified.");
$channelGuid = $_POST['channelGuid'] ?? die("Error: Channel GUID not specified.");

global $connection;

$stmt = mysqli_prepare($connection, "INSERT INTO users (nickname, channelGuid) VALUES (?, ?)");
mysqli_stmt_bind_param($stmt, "ss", $nickname, $channelGuid);
if (!mysqli_stmt_execute($stmt)) {
    die("Error: " . mysqli_stmt_error($stmt));
}
else {
    echo "OK";
}

mysqli_stmt_close($stmt);
mysqli_close($connection);
