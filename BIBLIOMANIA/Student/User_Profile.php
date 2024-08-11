<?php
    session_start();
    include("../conn.php");
    if(!isset($_SESSION['studentID'])){
        header("Location: Bibliomania/BIBLIOMANIA/Student/Login_Page.php");
    }


$student_id = $_SESSION['studentID'];
$email = $_SESSION['email'];
$name = $_SESSION['name'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <style>
body {
    margin: 0;
    background-color: #000;
    color: #fff;
}

.container {
    width: 100%;
    height: 100vh;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    position: relative;
}

.back-btn {
    position: absolute;
    top: 20px;
    left: 20px;
    background-color: #FF4500;
    color: #000;
    border: none;
    padding: 10px 20px;
    font-size: 16px;
    cursor: pointer;
    display: flex;
    align-items: center;
    border-radius: 5px;
}

.back-btn img {
    margin-right: 10px;
}

.profile-header {
    font-size: 40px;
    margin-bottom: 20px;
}

.profile-info {
    display: flex;
    flex-direction: column;
    align-items: center;
    margin-bottom: 20px;
}

.profile-field {
    background-color: #FF4500;
    color: #000;
    padding: 10px 20px;
    margin: 10px 0;
    font-size: 18px;
    width: 250px;
    text-align: center;
    border-radius: 5px;
}

.edit-btn {
    background-color: #FF4500;
    color: #000;
    border: none;
    padding: 10px 20px;
    font-size: 16px;
    cursor: pointer;
    border-radius: 5px;
}
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>
    <link rel="stylesheet" href="../styles.css">
</head>

<body>
    <div class="container">
        <div class="profile-field">
        <h2>MY PROFILE</h2>

            <div>Name: <?php echo $name; ?></div>
            <div>Student_ID: <?php echo $student_id; ?></div>
            <div>Email: <?php echo $email; ?></div>
            
        </div>
    </div>
</body>
</html>