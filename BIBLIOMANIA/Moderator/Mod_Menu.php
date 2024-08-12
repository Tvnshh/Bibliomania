<?php
session_start();
include("../conn.php");
if(!isset($_SESSION['modID'])){
    header("location:Login_Page.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Moderator Main Page</title>
    <link rel="stylesheet" href="../styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body {
            color: rgb(221, 83, 49);
        }
        .top-right-container {
            position: absolute;
            top: 6.2vw;
            right: 15.4vw;
            display: flex;
            align-items: center;
        }
        .top-right-container button {
            font-family: 'CustomFont';
            background-color: rgb(27, 27, 27);
            color: rgb(221, 83, 49);
            border: solid;
            border-color: rgb(221, 83, 49);
            cursor: pointer;
            border-radius: 1vw;
            font-size: 1.3vw; 
            position: absolute;
            left: 5.4vw; 
            width: 7vw;
            height: 3.5vw;
            transition: font-size 0.2s ease;
        }
        .top-right-container button:hover {
            font-size: 1.5vw;
            -webkit-text-stroke: 0vw;
        }
        .user-icon {
            cursor: pointer;
            font-size: 1.5vw;
        }
        .user-icon:hover {
            color: whitesmoke;
        }
    </style>
</head>
<body>
    <center>
        <div class="container">
        <button style="margin: 1vw; width: 50vw;" onclick="location.href='Slides_Library.php'">Slides Library</button>
        <button style="margin: 1vw; width: 50vw;" onclick="location.href='Edit_Slides.php'">Edit Slides</button>
        <button style="margin: 1vw; width: 50vw;" onclick="location.href='Question_Library.php'">Question Library</button>
        <button style="margin: 1vw; width: 50vw;" onclick="location.href='Edit_Questions.php'">Edit Question</button>
        <button style="margin: 1vw; width: 50vw;" onclick="location.href='Mod_User_Profile.php'">User Profile</button>
        <button style="margin: 1vw; width: 50vw;" onclick="location.href='Mod_Edit_Profile.php'">Edit Profile</button>
        </div>
    </center>

    <div class="top-right-container">
        <div class="user-icon">
            <span onclick="location.href='Mod_User_Profile.php'"><i style="font-size:3.5vw" class="fa">&#xf2bd;</i></span>
        </div>
        <button onclick="location.href='../Logout_Page.php'">LOGOUT</button>
    </div>
</body>
</html>