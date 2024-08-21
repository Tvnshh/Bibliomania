<?php
// Include the session and database connection files
include_once('../../conn.php');
include_once('session_data.php');

// Fetch user id from session_data.php
$user_id = $user_id; // Assuming $user_id is being set in session_data.php

// Determine the appropriate column name based on the first letter of the user ID
if (strpos($user_id, 'S') === 0) {
    $user_column = 'student_id';
} else {
    $user_column = 'guest_id';
}

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the topic number and score from POST data
    $topic_num = isset($_POST['topic']) ? intval($_POST['topic']) : null;
    $score = isset($_POST['score']) ? intval($_POST['score']) : null;

    if ($topic_num !== null && $score !== null) {
        // Construct the topic column name (e.g., topic_1, topic_2, etc.)
        $topic_column = "topic_" . $topic_num;

        // Check if the user ID exists in the scores table
        $stmt = $conn->prepare("SELECT COUNT(*) FROM scores WHERE $user_column = ?");
        $stmt->bind_param('s', $user_id);
        $stmt->execute();
        $stmt->bind_result($user_count);
        $stmt->fetch();
        $stmt->close();

        if ($user_count > 0) {
            // Update the existing record
            $stmt = $conn->prepare("UPDATE scores SET $topic_column = ? WHERE $user_column = ?");
            $stmt->bind_param('is', $score, $user_id);

            if ($stmt->execute()) {
                echo "Score updated successfully.";
            } else {
                echo "Error updating score: " . $stmt->error;
            }
        } else {
            // Insert a new record
            $stmt = $conn->prepare("INSERT INTO scores ($user_column, $topic_column) VALUES (?, ?)");
            $stmt->bind_param('si', $user_id, $score);

            if ($stmt->execute()) {
                echo "New score entry created successfully.";
            } else {
                echo "Error creating new score entry: " . $stmt->error;
            }
        }

        $stmt->close();
    } else {
        echo "Invalid topic or score provided.";
    }
}

// Check if the topic is an odd number and echo the boolean value
if (isset($topic_num)) {
    if ($topic_num % 2 !== 0) {
        echo true; // Echoing boolean true
    } else {
        echo false; // Echoing boolean false
    }
}

// Close the database connection
$conn->close();
?>
