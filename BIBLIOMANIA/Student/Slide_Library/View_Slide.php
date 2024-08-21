<?php
session_start();
include("../../assets/conn.php");
if(!isset($_SESSION['studentID'])){
    header("location:Login_Page.php");
    exit;
}

$student_id = $_SESSION['studentID'];
$slides_id = $_GET['slide_id'] ?? '';

// Fetch content IDs based on slides_id
$stmt = $conn->prepare("SELECT content_1, content_2, content_3 FROM slides WHERE slides_id = ?");
$stmt->bind_param("s", $slides_id);
$stmt->execute();
$result = $stmt->get_result();
$content_1 = $content_2 = $content_3 = null;

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $content_1 = $row['content_1'];
    $content_2 = $row['content_2'];
    $content_3 = $row['content_3'];
}

// Function to check if content is unlocked
function is_content_unlocked($conn, $student_id, $content_id) {
    $stmt = $conn->prepare("SELECT * FROM unlocks WHERE (student_id = ? OR guest_id = ?) AND content_id = ?");
    $stmt->bind_param("sss", $student_id, $student_id, $content_id);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->num_rows > 0;
}

// Initialize an array to hold the unlocked content
$unlocked_content = [];

// Check each content ID and add to the array if unlocked
if ($content_1 && is_content_unlocked($conn, $student_id, $content_1)) {
    $unlocked_content[] = $content_1;
}
if ($content_2 && is_content_unlocked($conn, $student_id, $content_2)) {
    $unlocked_content[] = $content_2;
}
if ($content_3 && is_content_unlocked($conn, $student_id, $content_3)) {
    $unlocked_content[] = $content_3;
}

// Determine the topic based on the slides_id
function get_topic_by_slide($slides_id) {
    if (in_array($slides_id, ['SL001', 'SL002', 'SL003'])) {
        return 1;
    } elseif (in_array($slides_id, ['SL004', 'SL005', 'SL006'])) {
        return 2;
    } elseif (in_array($slides_id, ['SL007', 'SL008', 'SL009'])) {
        return 3;
    } else {
        return null; // Unknown topic
    }
}

$topic = get_topic_by_slide($slides_id);
$game_page = $topic ? "Games/Topic_$topic.php" : '#';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Slide</title>
    <link rel="stylesheet" href="../../styles.css">
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
        .container {
            display: flex;
            align-items: center;
            justify-content: center;
            margin: auto;
        }
        .content {
            background: rgb(27, 27, 27);
            border: solid;
            box-shadow: 10px 10px 40px rgba(221, 83, 49, 0.5);
            width: 40%;
            padding: 2vw;
            text-align: center;
        }
        .slide-content  {
            display: flex;
            flex-direction: column; /* Arrange items vertically */
            gap: 2vw; /* Adjust the spacing between items */
            width: 100%; /* Make the content containers full width */
        }
        .slide-content textarea {
            font-family: 'CustomFont';
            color: rgb(221, 83, 49);
            background-color: rgb(27, 27, 27);
            font-size: 1.3vw;
            border: solid;
            width: 100%; /* Make each textarea full width */
            height: 20vw; /* Adjust the height as necessary */
            padding: 0vw;
            text-align: center; /* Center text within the textarea */
            resize: none; /* Prevent resizing */
        }
        .unlock-button {
            margin-top: 2vw;
            font-family: 'CustomFont';
            background-color: rgb(221, 83, 49);
            color: black;
            border-radius: 0.5vw;
            padding: 1vw 2vw;
            border: none;
            cursor: pointer;
            transition: background-color 0.2s ease, color 0.2s ease;
        }
        .unlock-button:hover {
            background-color: rgb(27, 27, 27);
            color: rgb(221, 83, 49);
        }
    </style>
</head>
<body>
    <h1>Slides Content</h1>
    
    <div class="backbtn">
        <button onclick="location.href='Slides_Library.php'">BACK</button>
    </div>

    <div class="container">
        <div class="content">
            <?php if (empty($unlocked_content)): ?>
                <center>
                <p style="font-size:2vw;">You have not unlocked any slides.</p>
                <a href="<?= $game_page ?>"><button class="unlock-button" style="font-size:2vw; width:20vw; height:5vw;">Unlock Slides</button></a>
                </center>
            <?php else: ?>
                <div class='slide-content'>
                    <?php
                    // Display each unlocked content
                    foreach ($unlocked_content as $content_id) {
                        // Fetch the content for this content ID
                        $stmt = $conn->prepare("SELECT content FROM content WHERE content_id = ?");
                        $stmt->bind_param("s", $content_id);
                        $stmt->execute();
                        $result = $stmt->get_result();
                        if ($result->num_rows > 0) {
                            $content = $result->fetch_assoc()['content'];
                            echo "<textarea disabled>" . htmlspecialchars($content) . "</textarea>";
                        } else {
                            echo "<textarea disabled>No content found.</textarea>";
                        }
                    }
                    $total_content_count = 3;
                    $remaining_slides = $total_content_count - count($unlocked_content);
            
                    if ($remaining_slides > 0) {
                        echo "<p style='font-size:1.5vw;'>$remaining_slides slide" . ($remaining_slides > 1 ? "s" : "") . " remaining</p>";
                    }               
                    ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
