<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/styles.css">
    <title>Edit Questions</title>
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
        .subject-container {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .subject-item {
            margin: 10px 0;
        }
        .subject-button {
            font-family: 'CustomFont';
            font-size: 20pt;
            background-color: rgb(27, 27, 27);
            color: rgb(221, 83, 49);
            border: solid;
            border-color: rgb(221, 83, 49);
            border-radius: 15px;
            padding: 10px 20px;
            cursor: pointer;
            width: 300px;
        }
        .subject-button:hover {
            background-color: rgb(221, 83, 49);
            color: rgb(27, 27, 27);
        }
    </style>
</head>
<body>
    <button class="back-button" onclick="window.history.back()">Back</button>
    
    <div class="subject-container">
        <?php
        // Include database connection file
        include "../conn.php";

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Fetch topics from database
        $sql = "SELECT topic_id, topic_name FROM topic";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="subject-item">
                        <button class="subject-button" onclick="window.location.href=\'Editing.php?topic_id=' . $row["topic_id"] . '\'">' . htmlspecialchars($row["topic_name"]) . '</button>
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
