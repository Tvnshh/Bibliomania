<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../styles.css">
    <title>Slide Content</title>
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
        }
        .back-button {
            position: absolute;
            top: 10px;
            left: 10px;
            padding: 5px 10px; 
            background-color: #f0f0f0;
            border: none;
            cursor: pointer;
            font-size: 12px;
        }
        .back-button:hover {
            background-color: rgb(27, 27, 27);
            color: rgb(221, 83, 49);
            border-color: rgb(221, 83, 49);
        }
        .slide-container {
            margin-top: 50px;
            padding: 30px;
            background-color: rgb(27, 27, 27);
            border: solid 2px rgb(221, 83, 49);
            border-radius: 10px;
            color: #fff;
        }
        .slide-title {
            font-size: 24px;
            margin-bottom: 20px;
            color: #fff;
        }
        .slide-content {
            font-size: 18px;
            line-height: 1.5;
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="container">
        <button class="back-button" onclick="history.back()">BACK</button>
        <div class="slide-container">
            <?php
            // Include database connection file
            include "../assets/conn.php";

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Get slide ID from URL
            $slides_ID = $_GET['slides_ID'];

            // Fetch slide content from the database
            $sql = "SELECT Slides.content_1, Topic.topic_name 
                    FROM Slides 
                    INNER JOIN Topic ON Slides.topic_ID = Topic.topic_ID 
                    WHERE Slides.slides_ID = ?";
            
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $slideID);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                echo '<div class="slide-title">' . htmlspecialchars($row["topic_name"]) . '</div>';
                echo '<div class="slide-content">' . nl2br(htmlspecialchars($row["content_1"])) . '</div>';
            } else {
                echo '<div class="slide-content">No content found.</div>';
            }

            $stmt->close();
            $conn->close();
            ?>
        </div>
    </div>
</body>
</html>
