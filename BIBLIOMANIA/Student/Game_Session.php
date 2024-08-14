<?php
session_start(); // Start the session

// Check if session variable 'studentID' is set
if (isset($_SESSION['studentID'])) {
    // Fetch user_id from the session
    $user_id = $_SESSION['studentID'];

    // Create an associative array
    $response = array("user_id" => $user_id);

    // Set the content type to JSON
    header('Content-Type: application/json');

    // Encode the array as JSON and output it
    echo json_encode($response);
} else {
    // If user_id is not set, return an error message
    $response = array("error" => "User ID not found");
    header('Content-Type: application/json');
    echo json_encode($response);
}
?>