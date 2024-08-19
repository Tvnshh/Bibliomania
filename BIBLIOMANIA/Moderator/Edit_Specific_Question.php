<?php
session_start();
include("../assets/conn.php");
if(!isset($_SESSION['modID'])){
    header("location:Login_Page.php");
}
?>

<?php
session_start();
include("../assets/conn.php");
if(!isset($_SESSION['modID'])){
    header("location:Login_Page.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../styles.css">
    <title>Edit Specific Question</title>
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
        .question-container {
            text-align: center;
            margin: auto;
            margin-top: 15vw;
            padding: 1vw;
            display: flex;
            flex-direction: column;
            align-items: center;
            max-width: 40vw;
            background: rgb(27, 27, 27);
            border: solid;
            border-color: rgb(221, 83, 49);
            border-radius: 2vw;
        }
        .input-field {
            margin: 1vw 0;
            color: black;
            background-color: whitesmoke;
            font-size: 1.3vw;
            border: solid;
            width: 30vw;
            height: 15vw;
            padding: 0.5vw;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: left;
            border-radius: 0.5vw;
        }
        .submit-button {
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
            margin: auto;
            margin-top: 3vw;
        }
        .submit-button:hover {
            font-size: 2.3vw;
            background-color: rgb(27, 27, 27);
            color: rgb(221, 83, 49);
            border-color: rgb(221, 83, 49);
        }
        .success-message {
            color: red;
            font-family: 'CustomFont';
            font-size: 1.5vw;
            margin-top: 20px;
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
    </style>
</head>
<body>

    <h1>Edit Question</h1>
    
    <div class="backbtn">
        <button onclick="location.href='Editing.php?topic_id=<?php echo $_SESSION['topicid']; ?>&page=<?php echo $_SESSION['page_num']; ?>'">BACK</button>
    </div>
    
    <div class="question-container">
        <?php
        // Include database connection file
        include "../assets/conn.php";

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
        <form method="POST" action="">
            <textarea class="input-field" name="question" rows="4" required><?php echo htmlspecialchars($question); ?></textarea>
            <button type="submit" class="submit-button">Save</button>
        </form>

        <!-- Display success message if the question is updated -->
        <?php if ($success_message): ?>
            <div class="success-message"><?php echo $success_message; ?></div>
        <?php endif; ?>
    </div>

    <div class="top-right-container">
        <div class="user-icon">
            <span onclick="location.href='Mod_User_Profile.php'"><i style="font-size:3.5vw" class="fa">&#xf2bd;</i></span>
        </div>
        <button class="logout-button" onclick="location.href='../auth/Logout_Page.php'">LOGOUT</button>  
    </div>
</body>
</html>
