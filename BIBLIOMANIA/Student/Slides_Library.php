<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../styles.css">
    <title>Slides Library</title>
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
        .slides-list {
            list-style: none;
            padding: 0;
        }
        .slide-item {
            background-color: rgb(27, 27, 27);
            color: rgb(221, 83, 49);
            border: solid 2px rgb(221, 83, 49);
            padding: 15px;
            margin: 10px 0;
            border-radius: 10px;
            cursor: pointer;
            transition: background-color 0.2s ease, color 0.2s ease;
        }
        .slide-item:hover {
            background-color: rgb(221, 83, 49);
            color: rgb(0, 0, 0);
        }
    </style>
</head>
<body>
    <div class="container">
        <button class="back-button" onclick="history.back()">BACK</button>
        <ul class="slides-list">
            <?php
            // Include database connection file
            include "../conn.php";

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Fetch slides from the database
            $sql = "SELECT Slides.slides_ID, Slides.content_1, Topic.topic_name 
                    FROM Slides 
                    INNER JOIN Topic ON Slides.topic_ID = Topic.topic_ID 
                    ORDER BY Topic.topic_name, Slides.slides_ID";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<li class="slide-item"><a href="Slides.php?slides_ID=' . $row["slides_ID"] . '" style="color: rgb(221, 83, 49); text-decoration: none;">' . $row["topic_name"] . ' - ' . $row["content_1"] . '</a></li>';
                }
            } else {
                echo "No slides found.";
            }
            

            $conn->close();
            ?>
        </ul>
    </div>
</body>
</html>
