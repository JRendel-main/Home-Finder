<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "home_finder1_db"; 

$con = new mysqli($servername, $username, $password, $dbname);


// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

