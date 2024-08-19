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
            max-width: 50vw;
            width: 25vw;
            background: rgb(27, 27, 27);
            border: solid;
            border-color: rgb(221, 83, 49);
            padding: 20px;
            border-radius: 1vw;
            position: relative; 
        }
        .back-button {
            position: absolute;
            top: 10vw;
            left: 7vw;
            font-family: 'CustomFont';
            background-color: rgb(221, 83, 49);
            align-items: center;
            left: ;
            width: 15vw;
            height: 4.5vw;  
            justify-content: center;
            font-size: 2.5vw;
            color: rgb(0, 0, 0);
            border-radius: 1vw;
            border-color: rgb(0, 0, 0);
            transition: font-size 0.2s ease;
            display: flex;
            cursor: pointer;
            margin: auto;
        }
        .back-button:hover {
            font-size: 2.8vw;
            background-color: rgb(27, 27, 27);
            color: rgb(221, 83, 49);
            -webkit-text-stroke: 0.1vw rgb(221, 83, 49);
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
            padding: 1vw;
            margin: 1vw;
            border-radius: 0.5vw;
            cursor: pointer;
            font-size: 1.3vw;
            transition: font-size 0.2s ease;    
        }
        .slide-item:hover {
            font-size: 1.5vw;
            color: black;
            background-color: rgb(221, 83, 49);
        }
    </style>
</head>
<body>
    <button class="back-button" onclick="history.back()">BACK</button>
    <div class="container">
        <ul class="slides-list">
            <?php
            // Include database connection file
            include "../assets/conn.php";

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
                    echo '<li class="slide-item">
                    <a href="Slides.php?slides_ID=' . $row["slides_ID"] . '">' . $row["topic_name"] . ' - ' . $row["content_1"] . '</a>
                    </li>';
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
