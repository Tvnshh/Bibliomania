<?php
session_start();
include("../conn.php");
if(!isset($_SESSION['studentID'])){
    header("Location: Bibliomania/BIBLIOMANIA/Student/Login_Page.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Student Dashboard</title>
    <style>
        body {
            background-color: #000;
            color: #f05340;
            text-align: center;
        }
        .container {
            width: 600px;
            margin: auto;
            padding-top: 50px;
        }
        .header {
            font-size: 24px;
            margin-bottom: 30px;
        }
        .grid-container {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px;
        }
        .grid-item {
            background-color: #333;
            color: #f05340;
            padding: 20px;
            text-align: center;
            font-size: 18px;
            border-radius: 5px;
            cursor: pointer;
        }
        .grid-item:hover {
            background-color: #f05340;
            color: #000;
        }

        .top-right-container {
            position: absolute;
            top: 20px;
            right: 20px;
            display: flex;
            align-items: center;
        }

        .logout-button {
            background-color: #f05340;
            border: none;
            padding: 3px 6px; 
            color: #fff;
            cursor: pointer;
            border-radius: 3px;
            font-size: 12px; 
            width: 80px; 
            height: 25px; 
            line-height: 25px; 
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .user-icon {
            cursor: pointer;
            font-size: 24px;
        }
        .icon-container {
            position: absolute;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);  
            color: #f05340;
            font-size: 24px;
            display: flex;
            gap: 20px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">WELCOME, <?php echo $_SESSION['name']?></div>

        <div class="grid-container">
            <div class="grid-item" onclick="location.href='slide1.php'">SLIDE 1</div>
            <div class="grid-item" onclick="location.href='test1.php'">TEST 1</div>
            <div class="grid-item" onclick="location.href='slide2.php'">SLIDE 2</div>
            <div class="grid-item" onclick="location.href='test2.php'">TEST 2</div>
            <div class="grid-item" onclick="location.href='slide3.php'">SLIDE 3</div>
            <div class="grid-item" onclick="location.href='test3.php'">TEST 3</div>
        </div>
        
        <div class="top-right-container">
        <button class="logout-button" onclick="location.href='../Logout_Page.php'">LOGOUT</button>
            <div class="user-icon">
                <span onclick="location.href='User_Profile.php'"><i style="font-size:40px" class="fa">&#xf2bd;</i></span>
            </div>
        </div>
        
        <div class="icon-container">
            <span onclick="location.href='Slides_Library.php'">&#128278;</span>
            <span onclick="location.href='Leaderboard.html'" style="margin-left: 20px;">&#128101;</span>
        </div>
    </div>
</body>
</html>