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
    <title>Question Analysis</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
        .question-container {
            text-align: center;
            margin: auto;
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
            max-width: 65vw;
            background: rgb(27, 27, 27);
            border: solid;
            border-color: rgb(221, 83, 49);
            border-radius: 2vw;
        }
        .question-item {
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 1.5vw;
        }
        .question-text {
            margin-right: 1.5vw;
            padding: 0.5vw;
            font-family: 'CustomFont';
            font-size: 1.5vw;
            background-color: rgb(27, 27, 27);
            color:  rgb(221, 83, 49);
            border: solid;
            border-color: rgb(221, 83, 49);
            border-radius: 15px;
            width: 45vw;
            cursor: default;
        }
        .pagination {
            text-align: center;
            margin-top: 2vw;
            margin-bottom: 1vw;
            border: solid;
            border-radius: 2vw;
            padding: 0.2vw;
        }

        .pagination button {
            background-color: transparent;
            cursor: default;
            margin: 0 3vw;
            border: none;
        }
        .pagination button i {
            font-size: 3vw;
            color: rgb(221, 83, 49);
            cursor: pointer;
        }

        .pagination button i:hover {
            color: grey;
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
        .percentage {
            font-size: 1.7vw;
            color: rgb(27, 27, 27);
            background-color: rgb(221, 83, 49);
            padding: 0.5vw 1vw;
            border-radius: 0.5vw;
            border: solid 1px rgb(27, 27, 27);
            text-align: center;
            width: 7vw;
        }
    </style>
</head>
<body>
    
    <h1>Question Analysis</h1>
    
    <div class="backbtn">
        <button onclick="location.href='Mod_Menu.php'">BACK</button>
    </div>
    
    <div class="question-container">
        <?php
        // Include database connection file
        include "../assets/conn.php";

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Determine the current page and set the number of questions per page
        $questionsPerPage = 5;
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $offset = ($page - 1) * $questionsPerPage;

        // Fetch questions from the database with LIMIT and OFFSET
        $sql = "SELECT question_ID, question, total_attempts, correct_attempts FROM Questions ORDER BY question_ID LIMIT $questionsPerPage OFFSET $offset";
        $result = $conn->query($sql);

        // Count total questions for the pagination
        $totalQuestionsSql = "SELECT COUNT(*) as total FROM Questions";
        $totalResult = $conn->query($totalQuestionsSql);
        $totalQuestions = $totalResult->fetch_assoc()['total'];
        $totalPages = ceil($totalQuestions / $questionsPerPage);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $correctAttempts = $row['correct_attempts'];
                $totalAttempts = $row['total_attempts'];
                $percentage = $totalAttempts > 0 ? ($correctAttempts / $totalAttempts) * 100 : 0;

                echo '<div class="question-item">
                <div class="question-text">' . htmlspecialchars($row["question"]) . '</div>
                <div class="percentage">' . number_format($percentage) . '%</div>
            </div>';
            }
        } else {
            echo "No questions found for this topic.";
        }

        // Display pagination controls
        echo '<div class="pagination">';
        if ($page > 1) {
            echo '<button onclick="window.location.href=\'?page=' . ($page - 1) . '\'"><i class="fas fa-chevron-circle-left"></i></button>';
        }
        if ($page < $totalPages) {
            echo '<button onclick="window.location.href=\'?page=' . ($page + 1) . '\'"><i class="fas fa-chevron-circle-right"></i></button>';
        }
        echo '</div>';

        $_SESSION['page_num'] = $page;

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
