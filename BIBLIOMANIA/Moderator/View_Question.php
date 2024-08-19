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
    <title>View Questions</title>
    <style>
        body {
            background-color: #000;
            color: #fff;
            font-family: 'CustomFont';
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
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
        .back-button {
            position: absolute;
            top: 20px;
            left: 20px;
            font-family: 'CustomFont';
            background-color: rgb(221, 83, 49);
            color: rgb(0, 0, 0);
            border: solid 2px rgb(0, 0, 0);
            border-radius: 10px;
            padding: 10px 20px;
            cursor: pointer;
            transition: background-color 0.2s ease, color 0.2s ease;
        }
        .back-button:hover {
            background-color: rgb(27, 27, 27);
            color: rgb(221, 83, 49);
            border-color: rgb(221, 83, 49);
        }
        .question-container {
            text-align: center;
            margin: auto;
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
            max-width: 700px;
            background: rgb(27, 27, 27);
            border: solid;
            border-color: rgb(221, 83, 49);
            margin-top: 250px;
        }
        .question-item {
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 10px 0;
        }
        .question-text {
            padding: 5px 10px;
            font-family: 'CustomFont';
            font-size: 30pt;
            background-color: rgb(27, 27, 27);
            color:  rgb(221, 83, 49);
            border: solid;
            border-color: rgb(221, 83, 49);
            border-radius: 15px;
            cursor: pointer;
            width: 600px;
        }
    </style>
</head>
<body>
    <button class="back-button" onclick="window.history.back()">Back</button>
    
    <div class="question-container">
        <?php
        // Include database connection file
        include "../assets/conn.php";

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Get the selected topic_id from the URL
        $topic_id = $_GET['topic_id'];

        // Fetch questions from database based on the selected topic_id
        $sql = "SELECT question_ID, question FROM Questions WHERE topic_id = '$topic_id' ORDER BY question_ID";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="question-item">
                        <div class="question-text">' . htmlspecialchars($row["question"]) . '</div>
                      </div>';
            }
        } else {
            echo "No questions found for this subject.";
        }

        $conn->close();
        ?>
    </div>
</body>
</html>
