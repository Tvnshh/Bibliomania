<?php
    session_start();
    include("config.php");
    if(!isset($_SESSION['studentID'])){
        header("Location: Bibliomania/BIBLIOMANIA/Student/Login_Page.php")
        }

$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "bibliomania"; 

$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$student_id = $_SESSION['student_id'];
$query = mysqli_query($conn)


$sql = "SELECT name, student_id , email FROM student WHERE student_id = '$student_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    $row = $result->fetch_assoc();
    $name = $row["name"];
    $student_id = $row["student_id"];
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
    <link rel="stylesheet" href="../styles.css">
</head>
<body>
    <div class="container">
        <div class="profile">
            <button class="button" onclick="window.location.href='Student_Menu.html'">BACK</button>
            <h2>MY PROFILE</h2>
            <div>Name: <?php echo $name; ?></div>
            <div>Student_ID: <?php echo $student_id; ?></div>
            <div>Email: <?php echo $email; ?></div>
            <button class="button" onclick="window.location.href='Edit_Profile.html'">EDIT</button>
        </div>
    </div>
</body>
</html>