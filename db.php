<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "software_house";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
