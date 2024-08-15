<?php
session_start();
include("../conn.php");
if(!isset($_SESSION['studentID'])){
    header("location:Login_Page.php");
}
$file = 'session_data.txt';

// Check if session variable 'studentID' is set
if (isset($_SESSION['studentID'])) {
    // Fetch user_id from the session
    $user_id = $_SESSION['studentID'];

    // Write the user_id to the text file
    file_put_contents($file, $user_id);
} else {
    // If user_id is not set, write an error message to the file
    file_put_contents($file, "Error: User ID not found");
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
        .icon-container {
            position: absolute;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);  
            color: #f05340;
            font-size: 50px;
            display: flex;
            gap: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">Welcome, <?php echo $_SESSION['name']?></div>

        <div class="grid-container">
            <div class="grid-item" onclick="location.href='Game/Topic_1'">SLIDE 1</div>
            <div class="grid-item" onclick="location.href='Quiz/Topic_1.php'">TEST 1</div>
            <div class="grid-item" onclick="location.href='Game/Topic_2'">SLIDE 2</div>
            <div class="grid-item" onclick="location.href='Quiz/Topic_2.php'">TEST 2</div>
            <div class="grid-item" onclick="location.href='Game/Topic_3'">SLIDE 3</div>
            <div class="grid-item" onclick="location.href='Quiz/Topic_3.php'">TEST 3</div>
            <div class="grid-item" onclick="location.href='Quiz/Topic_4'">Final Test</div>
        </div>
        
        <div class="top-right-container">
            <div class="user-icon">
                <span onclick="location.href='User_Profile.php'"><i style="font-size:3.5vw" class="fa">&#xf2bd;</i></span>
            </div>
            <button onclick="location.href='../Logout_Page.php'">LOGOUT</button>
        </div>
        
        <div class="icon-container">
            <span style="cursor:pointer" onclick="location.href='Slides_Library.php'">&#128278;</span>
            <span style="cursor:pointer" onclick="location.href='Leaderboard.html'" style="margin-left: 20px;">&#128101;</span>
        </div>
    </div>
</body>
</html>