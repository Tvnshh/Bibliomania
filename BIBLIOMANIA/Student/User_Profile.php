<?php

$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "bibliomania"; 

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$student_id = 'S001';


$sql = "SELECT name, username, email FROM student WHERE student_id = '$student_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    $row = $result->fetch_assoc();
    $name = $row["name"];
    $username = $row["username"];
    $email = $row["email"];
} else {
    echo "0 results";
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>
</head>
<body>
    <div class="container">
        <div class="profile">
            <button class="button" onclick="window.location.href='Student_Menu.html'">BACK</button>
            <h2>MY PROFILE</h2>
            <div>Name: <?php echo $name; ?></div>
            <div>Username: <?php echo $username; ?></div>
            <div>Email: <?php echo $email; ?></div>
            <button class="button" onclick="window.location.href='Edit_Profile.html'">EDIT</button>
        </div>
    </div>
</body>
</html>