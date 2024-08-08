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

// Assume student ID is known
$student_id = 'S001';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the posted data
    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];

    // Update user data in the database
    $sql = "UPDATE student SET name='$name', username='$username', email='$email' WHERE student_id='$student_id'";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }

    // Redirect back to the profile page (optional)
    header("Location: profile.php");
    exit();
} else {
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
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
</head>
<body>
    <div class="container">
        <div class="profile">
            <button class="button" onclick="window.location.href='User_Profile.html'">BACK</button>
            <h2>Edit Profile</h2>
            <form action="" method="post">
                <div>
                    Name: <input type="text" name="name" value="<?php echo isset($name) ? $name : ''; ?>">
                </div>
                <div>
                    Username: <input type="text" name="username" value="<?php echo isset($username) ? $username : ''; ?>">
                </div>
                <div>
                    Email: <input type="text" name="email" value="<?php echo isset($email) ? $email : ''; ?>">
                </div>
                <div>
                    <button class="button" type="submit">SAVE</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>