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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Slide</title>
    <link rel="stylesheet" href="../styles.css">
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
        .container {
            display: flex;
            align-items: center;
            justify-content: center;
            margin: auto;
        }
        .content {
            background: rgb(27, 27, 27);
            border: solid;
            box-shadow: 10px 10px 40px rgba(221, 83, 49, 0.5);
        }
        .slide-content  {
            color: rgb(221, 83, 49);
            transition: background-color, font-size 0.2s;
            margin: auto;
            display: flex;
            flex-direction: row;
            gap: 2vw;
        }
        .slide-content textarea {
            font-family: 'CustomFont';
            color: rgb(221, 83, 49);
            background-color: rgb(27, 27, 27);
            font-size: 1.3vw;
            border: solid;
            width: 27vw;
            height: 25vw;
            padding: 0.5vw;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: justify;
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
        .editbtn{
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 3.5vw;
        }
        .editbtn button {
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
        .editbtn button:hover {
            font-size: 2.3vw;
            background-color: rgb(27, 27, 27);
            color: rgb(221, 83, 49);
            border-color: rgb(221, 83, 49);
        }
    </style>
</head>
<body>
    <h1>Slides Content</h1>
    
    <div class="backbtn">
        <button onclick="location.href='Slides_Library.php'">BACK</button>
    </div>

    <div class="container">
        <div class="content">
            <?php
            include '../conn.php';
            $slides_id = $_GET['slide_id'] ?? '';

            // Fetch content IDs based on slides_id
            $stmt = $conn->prepare("SELECT content_1, content_2, content_3 FROM slides WHERE slides_id = ?");
            $stmt->bind_param("s", $slides_id);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $content_1 = $row['content_1'];
                $content_2 = $row['content_2'];
                $content_3 = $row['content_3'];
            }

            // Fetch content for the first content ID
            $result_1 = $conn->query("SELECT content FROM content WHERE content_id='" . $conn->real_escape_string($content_1) . "'");
            $current_content_1 = ($result_1 && $result_1->num_rows > 0) ? $result_1->fetch_assoc()['content'] : "No content found.";

            // Fetch content for the second content ID
            $result_2 = $conn->query("SELECT content FROM content WHERE content_id='" . $conn->real_escape_string($content_2) . "'");
            $current_content_2 = ($result_2 && $result_2->num_rows > 0) ? $result_2->fetch_assoc()['content'] : "No content found.";

            // Fetch content for the third content ID
            $result_3 = $conn->query("SELECT content FROM content WHERE content_id='" . $conn->real_escape_string($content_3) . "'");
            $current_content_3 = ($result_3 && $result_3->num_rows > 0) ? $result_3->fetch_assoc()['content'] : "No content found.";

            // Display content in a styled container
            echo "<div class='slide-content'>";
            echo "<textarea disabled>" . htmlspecialchars($current_content_1) . "</textarea>";
            echo "<textarea disabled>" . htmlspecialchars($current_content_2) . "</textarea>";
            echo "<textarea disabled>" . htmlspecialchars($current_content_3) . "</textarea>";
            echo "</div>";
            ?>
        </div>
    </div>

    <div class="top-right-container">
        <div class="user-icon">
            <span onclick="location.href='Mod_User_Profile.php'"><i style="font-size:3.5vw" class="fa">&#xf2bd;</i></span>
        </div>
        <button class="logout-button" onclick="location.href='../Logout_Page.php'">LOGOUT</button>  
    </div>

    <div class="editbtn">
        <?php
            echo "<button onclick=\"location.href='Edit_Slide_Content.php?slide_id=$slides_id'\">EDIT</button>";
        ?>
    </div>
</body>
</html>
