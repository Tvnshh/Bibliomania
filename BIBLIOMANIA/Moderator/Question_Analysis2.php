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
    <link rel="stylesheet" href="../styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Edit Questions</title>
    <style>
        body {
            color: rgb(221, 83, 49);
        }
        h1 {
            position: relative;
            top: 5vw;
            display: block;
            align-items: center;
            background-color: rgb(221, 83, 49);
            color: black;
            border-radius: 0.5vw;
            width: 35vw;
            height: 5vw;
            margin: auto;
            text-align: center;
            font-size: 3.3vw;
            margin-bottom: 10vw;
        }
        p {
            text-align: center;
            font-size: 2.5vw;
            margin-top: 12vw;
        }
        .container {
            text-align: center;
            max-width: 700px;
            background: rgb(27, 27, 27);
            border: solid;
            border-color: rgb(221, 83, 49);
            padding: 20px;
            border-radius: 15px;
            position: relative;  
            padding-top: 70px;  
        }
        .backbtn{
            position: absolute;
            top: 10vw;
            left: 7vw;
        }
        .backbtn button {
            font-family: 'CustomFont';
            background-color: rgb(221, 83, 49);
            align-items: center;
            width: 11vw;
            height: 3.5vw;  
            justify-content: center;
            font-size: 2vw;
            color: rgb(0, 0, 0);
            border-radius: 0.5vw;
            border-color: rgb(0, 0, 0);
            transition: font-size 0.2s ease;
            display: flex;
            cursor: pointer;
        }
        .backbtn button:hover {
            font-size: 2.3vw;
            background-color: rgb(27, 27, 27);
            color: rgb(221, 83, 49);
            border-color: rgb(221, 83, 49);
        }
        .content {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            background-color: rgb(27, 27, 27);
            gap: 1vw;
            width: 20vw;
            height: 25vw;
            margin: auto;
            border: solid;
            box-shadow: 10px 10px 40px rgba(221, 83, 49, 0.5);
        }
        .subject-item {
            display: flex;
            flex-direction: row;
            align-items: center;
            margin: auto;
        }
        .subject-button {
            font-family: 'CustomFont';
            font-size: 1.7vw;
            background-color: rgb(27, 27, 27);
            color: rgb(221, 83, 49);
            border: solid;
            border-color: rgb(221, 83, 49);
            border-radius: 1vw;
            padding: 0.5vw;
            cursor: pointer;
            width: 18vw;
            transition: background-color, font-size 0.2s;
        }
        .subject-button:hover {
            background-color: rgb(221, 83, 49);
            color: rgb(27, 27, 27);
            font-size: 2vw;
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

    <h1>Question Analysis</h1>

    <div class="backbtn">
        <button onclick="location.href='Mod_Menu.php'">BACK</button>
    </div>

    <p>Select Level:</p>
    
    <div class="content">
        <?php
        // Include database connection file
        include "../assets/conn.php";

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Fetch topics from database
        $sql = "SELECT topic_id, topic_name FROM topic";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="subject-item">
                        <button class="subject-button" onclick="window.location.href=\'Question_Analysis.php?topic_id=' . $row["topic_id"] . '\'">' . htmlspecialchars($row["topic_name"]) . '</button>
                      </div>';
            }
        } else {
            echo "No subjects found.";
        }

        $conn->close();
        ?>
    </div>

    <div class="top-right-container">
        <div class="user-icon">
            <span onclick="location.href='Mod_User_Profile.php'"><i style="font-size:3.5vw" class="fa">&#xf2bd;</i></span>
        </div>
        <button class="logout-button" onclick="location.href='../auth/Logout_Page.php'">LOGOUT</button>  
    </div>
</body>
</html>
