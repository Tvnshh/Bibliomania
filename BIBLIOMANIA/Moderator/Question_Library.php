<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../styles.css">
    <title>Question Library</title>
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
            background-color: hsl(0, 100%, 50%, 10%);
            gap: 1vw;
            width: 20vw;
            height: 24vw;
            margin: auto;
        }
        .subject-item {
            margin: 10px 0;
        }
        .subject-button {
            font-family: 'CustomFont';
            font-size: 1.7vw;
            background-color: rgb(27, 27, 27);
            color: rgb(221, 83, 49);
            border: solid;
            border-color: rgb(221, 83, 49);
            border-radius: 1vw;
            padding: 10px 20px;
            cursor: pointer;
            width: 300px;
            transition: background-color, font-size 0.2s;
        }
        .subject-button:hover {
            background-color: rgb(221, 83, 49);
            color: rgb(27, 27, 27);
            font-size: 2vw;
        }
    </style>
</head>
<body>

    <h1>Question Library</h1>

    <div class="backbtn">
        <button onclick="location.href='Mod_Menu.php'">BACK</button>
    </div>

    <p>Select Level:</p>
    
    <div class="content">
        <?php
        include "../conn.php";

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Fetch subjects from database
        $sql = "SELECT topic_id, topic_name FROM topic";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="subject-item">
                        <button class="subject-button" onclick="window.location.href=\'View_Question.php?topic_id=' . $row["topic_id"] . '\'">' . htmlspecialchars($row["topic_name"]) . '</button>
                      </div>';
            }
        } else {
            echo "No subjects found.";
        }

        $conn->close();
        ?>
    </div>
</body>
</html>
