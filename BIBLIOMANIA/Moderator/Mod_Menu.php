<?php
session_start();
include("../assets/conn.php");
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
        h1 {
            position: relative;
            top: 4.6vw;
            display: block;
            align-items: center;
            background-color: rgb(221, 83, 49);
            color: black;
            border-radius: 0.5vw;
            width: 40vw;
            height: 5vw;
            margin: auto;
            text-align: center;
            font-size: 3.3vw;
            margin-bottom: 10vw;
        }
        .container {
            background: rgb(27,27,27);
            border-radius: 1.5vw;
            padding-top: 2.5vw;
            padding-bottom: 2.5vw;
            width: 45vw;
            margin: auto;
            margin-top: 15vw;
            text-align: center;
            display: flex;
            flex-direction: column;
            gap: 5vw;
        }
        .container button {
            background-color: transparent;
            color: rgb(221, 83, 49);
            border-color: rgb(221, 83, 49);
            width: 35vw;
            font-size: 2.5vw;
            margin: auto;
        }
        .container button:hover {
            background-color: rgb(221, 83, 49);
            color: rgb(27, 27, 27);
            border-color: rgb(27, 27, 27);
            -webkit-text-stroke: 0.1vw rgb(27, 27, 27);
            font-size: 2.8vw;
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
        .grid-container {
            display: grid;
            gap: 2vw;
            margin: auto;
        }
        .grid-item {
            background-color: rgb(27, 27, 27);
            padding: 20px;
            width: 35vw;
            text-align: center;
            border-radius: 1vw;
            cursor: pointer;
            color: rgb(221, 83, 49);
            border: solid;
            border-color: rgb(221, 83, 49);
            font-size: 2.5vw;
            margin: auto;
            transition: font-size 0.2s ease;
        }
        .grid-item:hover {
            background-color: rgb(221, 83, 49);
            color: rgb(27, 27, 27);
            border-color: rgb(27, 27, 27);
            -webkit-text-stroke: 0.1vw rgb(27, 27, 27);
            font-size: 2.8vw;
        }
    </style>
</head>
<body>
    <h1>WELCOME, <?php echo $_SESSION['name']?></h1>
    <center>
        <div class="container">
            <!-- <button onclick="location.href='Slides_Library.php'">Slides Library</button> -->
            <!-- <button onclick="location.href='Edit_Questions.php'">Edit Question</button> -->
            <!-- <button onclick="location.href='Edit_Questions.php'">Edit Question</button> -->
            <div class="grid-container">
                <div class="grid-item" onclick="location.href='Slides_Library.php'">Slides Library</div>
                <div class="grid-item" onclick="location.href='Edit_Questions.php'">Edit Question</div>
                <div class="grid-item" onclick="location.href='Question_Analysis2.php'">Question Analysis</div>
            </div>
        </div>
    </center>

    <div class="top-right-container">
        <div class="user-icon">
            <span onclick="location.href='Mod_User_Profile.php'"><i style="font-size:3.5vw" class="fa">&#xf2bd;</i></span>
        </div>
        <button onclick="location.href='../auth/Logout_Page.php'">LOGOUT</button>
    </div>
</body>
</html>