<?php
    session_start();
    include("../conn.php");
    if(!isset($_SESSION['studentID'])){
        header("Location: Bibliomania/BIBLIOMANIA/Student/Login_Page.php");
    }

    $student_id = $_SESSION['studentID'];
    $email = $_SESSION['email'];
    $name = $_SESSION['name'];
 
    $sql = "UPDATE student SET name='$name', email='$email' WHERE student_id='$student_id'";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }


    header("Location: User_Profile.php");
    exit();
    else {

    $sql = "SELECT name, email FROM student WHERE student_id = '$student_id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

        $row = $result->fetch_assoc();
        $name = $row["name"];
        $studentID = $row["student_id"];
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
    <link rel="stylesheet" href="../styles.css">
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