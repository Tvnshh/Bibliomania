<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../styles.css">
    <title>Edit Question</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            height: 900px;
            display: flex;
        }
        .backbtn {
            position: absolute;
        }
        .backbtn button {
            font-family: 'CustomFont';
            margin-top: 150px;
            margin-left: 90px;
            background-color: rgb(221, 83, 49);
            align-items: center;
            width: 15vw;
            height: 4.5vw;  
            justify-content: center;
            font-size: 30pt;
            color: rgb(0, 0, 0);
            border-radius: 1vw;
            border-color: rgb(0, 0, 0);
            transition: font-size 0.2s ease;
            display: flex;
            cursor: pointer;
        }
        .backbtn button:hover {
            font-size: 35pt;
            background-color: rgb(27, 27, 27);
            color: rgb(221, 83, 49);
            -webkit-text-stroke: 0.1vw rgb(221, 83, 49);
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
            margin-right: 20px;
            padding: 5px 10px;
            font-family: 'CustomFont';
            font-size: 30pt;
            background-color: rgb(27, 27, 27);
            color:  rgb(221, 83, 49);
            border: solid;
            border-color: rgb(221, 83, 49);
            border-radius: 15px;
            cursor: pointer;
            width: 400px;
        }
        .edit-button {
            padding: 5px 10px;
            font-family: 'CustomFont';
            font-size: 30pt;
            background-color: rgb(27, 27, 27);
            color:  rgb(221, 83, 49);
            border: solid;
            border-color: rgb(221, 83, 49);
            border-radius: 15px;
            cursor: pointer;
            width: 200px;
        }
    </style>
</head>
<body>

    <div class="backbtn">
        <button onclick="history.back()">BACK</button>
    </div>
    
    <div class="question-container">
        <?php

        include "../conn.php";

        if ($conn->connect_error) {
            die("Connection failed: " . $conn.connect_error);
        }

        $question_id = isset($_GET['question_ID']) ? $_GET['question_ID'] : null;

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $question_id = $_POST["question_id"];
            $question_text = $_POST["question_text"];
            $update_sql = "UPDATE Questions SET question='$question_text' WHERE question_ID='$question_id'";
            if ($conn->query($update_sql) === TRUE) {
                echo "<p>Record updated successfully</p>";
            } else {
                echo "<p>Error updating record: " . $conn->error . "</p>";
            }
        }

        if ($question_id) {
            $sql = "SELECT question_id, question FROM questions WHERE question_id = '$question_id'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                echo '<form method="post" action="Edit_Questions.php">
                        <input type="hidden" name="question_id" value="' . $row["question_id"] . '">
                        <textarea name="question_text" class="text-area">' . htmlspecialchars($row["question"]) . '</textarea>
                        <button type="submit" class="save-button">Save</button>
                      </form>';
            } else {
                echo "<p>No question found.</p>";
            }
        } else {
            echo "<p>No question selected.</p>";
        }

        $conn->close();
        ?>
    </div>
</body>
</html>
