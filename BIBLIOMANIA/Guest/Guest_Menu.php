<?php
session_start();
include("../assets/conn.php");
if(!isset($_SESSION['studentID'])){
    header("location:../index.php");
}
$file = '../Student/Unity_PHP/session_data.php';

if (isset($_SESSION['studentID'])) {
    $user_id = "<?php echo '" . $_SESSION['studentID'] . "';";
    file_put_contents($file, $user_id);
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
            width: 45vw;
            height: 5vw;
            margin: auto;
            text-align: center;
            font-size: 3.3vw;
            margin-bottom: 10vw;
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
            gap: 1vw;
        }
        .grid-item {
            background-color: rgb(27, 27, 27);
            color: rgb(221, 83, 49);
            padding: 1.5vw;
            text-align: center;
            font-size: 1.8vw;
            border-radius: 5px;
            cursor: pointer;
            transition: font-size 0.2s ease;
        }
        .grid-item:hover {
            font-size: 2vw;
            background-color: rgb(221, 83, 49);
            color: black;
        }
        .top-right-container {
            position: absolute;
            top: 8vw;
            right: 18vw;
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

    <h1>WELCOME, <?php echo $_SESSION['guestName']?></h1>
    <div class="container">
        <div class="grid-container">
            <div class="grid-item" onclick="location.href='Games/Topic_1.php'">SLIDE 1</div>
            <div class="grid-item" onclick="location.href='Quiz/Topic_1.php'">TEST 1</div>
            <div class="grid-item" onclick="location.href='Games/Topic_2.php'">SLIDE 2</div>
            <div class="grid-item" onclick="location.href='Quiz/Topic_2.php'">TEST 2</div>
            <div class="grid-item" onclick="location.href='Games/Topic_3.php'">SLIDE 3</div>
            <div class="grid-item" onclick="location.href='Quiz/Topic_3.php'">TEST 3</div>
        </div>
        
        <div class="top-right-container">
            <button onclick="location.href='../auth/Logout_Page.php'">LOGOUT</button>
        </div>
        
        <div class="icon-container">
            <span style="cursor:pointer" onclick="location.href='Slide_Library/Slides_Library.php'">&#128278;</span>
            <span style="cursor:pointer" onclick="location.href='Leaderboard.php'" style="margin-left: 20px;">&#128101;</span>
        </div>
    </div>
</body>
</html>