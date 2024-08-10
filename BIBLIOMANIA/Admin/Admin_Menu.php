<?php
session_start();
include("../conn.php");
if(!isset($_SESSION['adminID'])){
    header("Location: Login_Page.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../styles.css">
    <title>Document</title>
</head>
<body>

    <div>
        <h1>WELCOME, <?php echo $_SESSION['name']?></h1>
    </div>

    <div>
    <button onclick="location.href='View_All_Users.php'">VIEW USERS</button>
    <button onclick="location.href='Add_New_Moderator.php'">REGISTER MODERATOR</button>
    </div>

    <div>
    <button onclick="location.href='../Logout_Page.php'">LOG OUT</button>
    </div>
    
</body>
</html>