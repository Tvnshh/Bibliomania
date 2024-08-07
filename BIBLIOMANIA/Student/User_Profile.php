<?php
// Database connection settings
$servername = "localhost";
$username = "root"; // Your MySQL username
$password = ""; // Your MySQL password
$dbname = "bibliomania"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Assuming the student ID is S001
$student_id = 'S001';

// Fetch user data from the database
$sql = "SELECT name, username, email FROM student WHERE student_id = '$student_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
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