<?php
$username = "root";
$password = "";
$database = "belajar";
$host = "127.0.0.1";
$conn = new mysqli( $host, $username, $password, $database );
if($conn->connect_error) {
    die("". $conn->connect_error);
}