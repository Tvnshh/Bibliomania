<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/styles.css">
    <title>Edit Specific Question</title>
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
        .question-text {
            margin-bottom: 20px;
            font-family: 'CustomFont';
            font-size: 20pt;
            color:  rgb(221, 83, 49);
        }
        .input-field {
            width: 90%;
            padding: 10px;
            margin: 10px 0;
            font-size: 14pt;
            border-radius: 5px;
            border: solid 2px rgb(221, 83, 49);
            background-color: rgb(27, 27, 27);
            color: rgb(221, 83, 49);
        }
        .submit-button {
            font-family: 'CustomFont';
            font-size: 20pt;
            background-color: rgb(221, 83, 49);
            color: rgb(27, 27, 27);
            border: solid;
            border-color: rgb(221, 83, 49);
            border-radius: 15px;
            padding: 10px 20px;
            cursor: pointer;
            margin-top: 20px;
        }
        .submit-button:hover {
            background-color: rgb(27, 27, 27);
            color: rgb(221, 83, 49);
            border-color: rgb(221, 83, 49);
        }
        .success-message {
            color: #4CAF50;
            font-family: 'CustomFont';
            font-size: 16pt;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <button class="back-button" onclick="window.history.back()">Back</button>
    
    <div class="question-container">
        <?php
        // Include database connection file
        include "../conn.php";

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Get the question_ID from the URL
        $question_id = $_GET['question_ID'];

        // Initialize variables for success message and form data
        $success_message = '';
        $question = '';

        // Check if the form has been submitted
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Get the updated question from the form input
            $updated_question = $_POST['question'];

            // Update the question in the database
            $update_sql = "UPDATE Questions SET question = '$updated_question' WHERE question_ID = '$question_id'";

            if ($conn->query($update_sql) === TRUE) {
                $success_message = "Question updated successfully!";
            } else {
                echo "Error updating question: " . $conn->error;
            }
        }

        // Fetch the current question data from the database
        $sql = "SELECT question FROM Questions WHERE question_ID = '$question_id'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $question = $row['question'];
        } else {
            echo "No question found.";
        }

        $conn->close();
        ?>

        <!-- Display the current question and provide a form to edit it -->
        <div class="question-text">Edit Question:</div>
        <form method="POST" action="">
            <textarea class="input-field" name="question" rows="4" required><?php echo htmlspecialchars($question); ?></textarea>
            <button type="submit" class="submit-button">Update Question</button>
        </form>

        <!-- Display success message if the question is updated -->
        <?php if ($success_message): ?>
            <div class="success-message"><?php echo $success_message; ?></div>
        <?php endif; ?>
    </div>
</body>
</html>
