<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "kumul_electronics"; // updated database name

$conn = mysqli_connect($host, $username, $password, $database);

if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}
?>
