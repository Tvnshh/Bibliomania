<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$servername = "localhost";
$username = "root";  // Replace with your MySQL username
$password = "";  // Replace with your MySQL password
$dbname = "bibliomania";    // Replace with your database name


// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (mysqli_connect_errno()) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
function loginUser($username, $password) {
    global $mysqli;

    $stmt = $mysqli->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    $stmt->close();

    if ($user && password_verify($password, $user['password'])) {
        return true; 
    } else {
        return false; 
    }
}
function insertUser($username, $password, $age, $email, $name) {
    global $mysqli;

    $hashed_password = password_hash($password, PASSWORD_BCRYPT); 

    $stmt = $mysqli->prepare("INSERT INTO student (username, password, age, email, name) VALUES (?, ?, ?)");
    $stmt->bind_param('sss', $username, $hashed_password, $age, $email, $name);
    $stmt->execute();
    $stmt->close();
}

function insertModerator($username, $password, $age, $email, $name) {
    global $mysqli;


    $stmt = $mysqli->prepare("INSERT INTO moderator (username, password, age, email, name) VALUES (?, ?, ?)");
    $stmt->bind_param('sss', $username, $password, $age, $email, $name);
    $stmt->execute();
    $stmt->close();
}