<?php
session_start();
include("../../assets/conn.php");
if(!isset($_SESSION['studentID'])){
    header("location:../Login_Page.php");
}

$score = $_GET['score_id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../styles.css">
    <title>Quiz Completed</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            height: 100vh;
            overflow: hidden; /* Prevent scrolling */
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: rgb(27, 27, 27);
            font-family: 'CustomFont';
            color: rgb(221, 83, 49);
        }

        .container {
            position: relative;
            height: 65vh; /* Adjust this value if needed */
            padding-bottom: 60px; /* Ensure enough space for the buttons */
            text-align: center; /* Center-align the text */
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center; /* Center-align items horizontally */
            width: 65vw; /* Reduced width to make space for animation */
            background-color: rgb(27, 27, 27);
            border: solid 2px rgb(221, 83, 49);
            color: rgb(221, 83, 49);
            border-radius: 10px;
            padding: 20px;
            box-shadow: 10px 10px 40px rgba(221, 83, 49, 0.5);
        }

        .actions {
            position: relative;
            bottom: 0; /* Adjust if necessary */
            display: flex;
            justify-content: center; /* Center the buttons horizontally */
            gap: 20px;
            width: 100%; /* Make sure the buttons container takes full width */
        }
        .actions .btn2:hover {
            background-color: white;
        }
        .container button{
            width: 20vw;
            height: 5vw;
            background-color: rgb(221, 83, 49);
            color: black;
            border: none;
            padding: 15px 30px;
            font-size: 1.8vw;
            border-radius: 5px;
            cursor: pointer;
            text-transform: uppercase;
            transition: font-size 0.3s ease;

        }

        .container button:hover {
            font-size: 2.1vw;
            background-color: rgb(27, 27, 27);
            color: rgb(221, 83, 49);
            -webkit-text-stroke: 0.1vw rgb(221, 83, 49);
            border: 1px solid rgb(221, 83, 49);
        }
        .header {
            font-size: 4vw;
            margin-bottom: 20px;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        .message {
            font-size: 1.7vw;
            margin-bottom: 30px;
            width: 50%;
            line-height: 1.5;
            right: 50%;
        }

        .score {
            font-size: 3vw;
            margin-bottom: 30px;
            font-weight: bold;
        }


        .btn:active {
            transform: scale(0.98);
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="header">Quiz Completed!</div>

        <div class="message">Congratulations! You’ve successfully answered all 15 questions.</div>
        <div class="message">Navigate to Menu to view slides or try different test. <br><br>Enough for today? Logout</div>


        <div class="score">Your Score: <?php echo $score?> /15</div>


        <div class="actions">
            <button class="btn" onclick="window.location.href='../Guest_Menu.php';">Guest Menu</button>
            <button class="btn2" onclick="window.location.href='../../auth/Logout_Page.php';" style="width:10vh;"><img src="../../images/logout.png" alt="Exit Button" style="height: 5vh;"></button>
        </div>
    </div>
</body>
</html>