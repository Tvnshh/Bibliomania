<?php
session_start();
include("../../assets/conn.php"); // Your database connection

// Get the topic ID from the query parameter
$topic_id = isset($_GET['topic_id']) ? $_GET['topic_id'] : 'T001'; // Default to 'T001' if not provided

// Set initial scores when the quiz starts
if (!isset($_SESSION['current_question'])) {
    $_SESSION['current_question'] = 1;
    $_SESSION['score'] = 0;
    $_SESSION['topic_id'] = $topic_id;
}

// Fetch the total number of questions for the topic
$total_questions_query = $conn->prepare("SELECT COUNT(*) FROM questions WHERE topic_id = ?");
$total_questions_query->bind_param("s", $_SESSION['topic_id']); // Bind as string
$total_questions_query->execute();
$total_questions_result = $total_questions_query->get_result();
$total_questions_count = $total_questions_result->fetch_array()[0];

// Fetch the current question based on the topic ID and question number
$current_question_number = $_SESSION['current_question'] - 1;

// Ensure we only get the next question for the current topic
$query = $conn->prepare("SELECT * FROM questions WHERE topic_id = ? ORDER BY question_id ASC LIMIT ?, 1");
$query->bind_param("si", $topic_id, $current_question_number); // Bind topic_id as string and current_question_number as integer
$query->execute();
$result = $query->get_result();
$question = $result->fetch_assoc();

if (!$question) {
    // If there are no more questions, mark the quiz as complete and store the score
    $student_id = $_SESSION['studentID'];
    $score = $_SESSION['score'];

    // Check if student record exists in scores
    $check_score = $conn->prepare("SELECT * FROM scores WHERE student_id = ?");
    $check_score->bind_param("s", $student_id); // Bind as strings
    $check_score->execute();
    $result_score = $check_score->get_result();

    if ($result_score->num_rows == 0) {
        // Insert score
        $insert_score = mysqli_query($conn,"INSERT INTO scores (student_id, topic_1) VALUES('$student_id','$score')");
    } else {
        // Update score
        $update_score = mysqli_query($conn,"UPDATE scores SET topic_1='$score' WHERE student_id='$student_id'");
    }

    // Clear session variables
    unset($_SESSION['current_question']);
    unset($_SESSION['score']);

    echo "<h2>Quiz Completed! Your score: $score</h2>";
    exit();
}

$question_id = $question['question_id'];
$question_text = $question['question'];
$option_1 = $question['option_1'];
$option_2 = $question['option_2'];
$option_3 = $question['option_3'];
$option_4 = $question['option_4'];
$correct_answer = $question['correct_answer'];

if (isset($_POST['answer'])) {
    $selected_answer = intval($_POST['answer']);

    // Update question attempts
    $update_attempts = $conn->prepare("UPDATE questions SET total_attempts = total_attempts + 1 WHERE question_id = ?");
    $update_attempts->bind_param("s", $question_id); // Bind as string
    $update_attempts->execute();

    // Check if the answer is correct
    if ($selected_answer == $correct_answer) {
        $_SESSION['score']++;
        $update_correct = $conn->prepare("UPDATE questions SET correct_attempts = correct_attempts + 1 WHERE question_id = ?");
        $update_correct->bind_param("s", $question_id); // Bind as string
        $update_correct->execute();
    }

    // Move to the next question
    $_SESSION['current_question']++;

    // If the next question exceeds the total, display the score and store it in the database
    if ($_SESSION['current_question'] > $total_questions_count) {
        $student_id = $_SESSION['studentID'];
        $score = $_SESSION['score'];

        // Determine which topic column to update based on topic_id
        $topic_column = '';
        if ($topic_id === 'T001') {
            $topic_column = 'topic_1';
        } elseif ($topic_id === 'T002') {
            $topic_column = 'topic_2';
        } elseif ($topic_id === 'T003') {
            $topic_column = 'topic_3';
        }

        // Check if student record exists in scores
        $check_score = $conn->prepare("SELECT * FROM scores WHERE student_id = ?");
        $check_score->bind_param("s", $student_id,); // Bind as strings
        $check_score->execute();
        $result_score = $check_score->get_result();

        if ($result_score->num_rows == 0) {
            // Insert score
            $insert_score = mysqli_query($conn,"INSERT INTO scores (student_id, topic_1) VALUES('$student_id','$score')");
        } else {
            // Update score
            $update_score = mysqli_query($conn,"UPDATE scores SET topic_1='$score' WHERE student_id='$student_id'");
        }

        // Clear session variables
        unset($_SESSION['current_question']);
        unset($_SESSION['score']);

        echo "<h2>Quiz Completed! Your score: $score</h2>";
        exit();
    } else {
        header("Location: Quiz_1.php?topic_id=" . $_SESSION['topic_id']);
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz</title>
    <style>
        /* Add your CSS styles here */
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        h2 {
            font-size: 24px;
            color: #333;
        }
        form {
            margin-top: 20px;
        }
        input[type="radio"] {
            margin: 10px 0;
        }
        button {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h2><?php echo $question_text; ?></h2>
    <form method="POST" action="Quiz_1.php?topic_id=<?php echo $topic_id; ?>">
        <input type="radio" name="answer" value="1"> <?php echo $option_1; ?><br>
        <input type="radio" name="answer" value="2"> <?php echo $option_2; ?><br>
        <input type="radio" name="answer" value="3"> <?php echo $option_3; ?><br>
        <input type="radio" name="answer" value="4"> <?php echo $option_4; ?><br>
        <button type="submit"><?php echo ($_SESSION['current_question'] == $total_questions_count) ? 'SUBMIT' : 'NEXT'; ?></button>
    </form>
</body>
</html>
