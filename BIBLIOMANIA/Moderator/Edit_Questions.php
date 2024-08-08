<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../styles.css">
    <title>Question Library</title>
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
        #edit-container {
            display: none;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
        }
        .edit-box {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            position: relative;
        }
        .question-number {
            font-size: 18px;
            margin-bottom: 10px;
        }
        .text-area {
            width: 300px;
            height: 100px;
            margin-bottom: 10px;
        }
        .save-button {
            padding: 5px 10px;
            background-color: #28a745;
            color: white;
            border: none;
            cursor: pointer;
        }
    </style>
</head>
<body>

    <div class="backbtn">
        <button onclick="history.back()">BACK</button>
    </div>
    
    <div class="question-container">
        <?php
        // Include database connection file
        include "../conn.php";

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Update question if form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $question_id = $_POST["question_id"];
            $question_text = $_POST["question_text"];
            $update_sql = "UPDATE Questions SET question='$question_text' WHERE question_ID='$question_id'";
            if ($conn->query($update_sql) === TRUE) {
                echo "Record updated successfully";
            } else {
                echo "Error updating record: " . $conn->error;
            }
        }

        // Fetch questions from database
        $sql = "SELECT question_ID, question FROM Questions";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="question-item">
                        <div class="question-text" id="question-' . $row["question_ID"] . '">' . $row["question"] . '</div>
                        <button class="edit-button" onclick="Edit_Question(' . $row["question_ID"] . ')">Edit</button>
                      </div>';
            }
        } else {
            echo "No questions found.";
        }

        $conn->close();
        ?>
    </div>

    <div id="edit-container">
        <button class="back-button" onclick="Close_Edit()">Back</button>
        <div class="edit-box">
            <div id="question-number" class="question-number"></div>
            <form method="post" action="Edit_Questions.php">
                <input type="hidden" id="question_id" name="question_id" value="">
                <textarea id="question_text" name="question_text" class="text-area"></textarea>
                <button type="submit" class="save-button">Save</button>
            </form>
        </div>
    </div>

    <script>
        function Edit_Question(questionId) {
            document.getElementById('edit-container').style.display = 'flex';
            document.getElementById('question-number').textContent = 'Question ' + questionId;
            document.getElementById('question_id').value = questionId;
            document.getElementById('question_text').value = document.getElementById('question-' + questionId).textContent;
        }

        function Close_Edit() {
            document.getElementById('edit-container').style.display = 'none';
        }
    </script>
</body>
</html>
