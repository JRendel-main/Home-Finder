<?php
session_start();
session_destroy();

date_default_timezone_set('Asia/Manila');
$date = date('m-d-Y H:i:sA');
$user = isset($_SESSION['username']) ? $_SESSION['username'] : "Guest";
$details = "logout";

logs($date, $user, $details);

function logs($date, $user, $details) {
    $format = $date . "\t\t" . $user . "\t\t" . $details . "\n";
    file_put_contents("logs.log", $format, FILE_APPEND);
}

header("location: login.php");
?>
