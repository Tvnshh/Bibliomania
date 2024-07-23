<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$servername = "0.tcp.ap.ngrok.io";
$username = "your_username";  // Replace with your MySQL username
$password = "your_password";  // Replace with your MySQL password
$dbname = "your_database";    // Replace with your database name
$port = "18160";              // Port provided by ngrok

phpinfo();

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname, $port);

// Check connection
if (mysqli_connect_errno()) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?>