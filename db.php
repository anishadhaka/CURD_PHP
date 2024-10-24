<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "userdata";
$conn = mysqli_connect($servername, $username, $password, $dbname) or die("connection failed");
?>