<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ARS Gamified Learning System</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <img src="index.png" alt="Background" class="background-image">
            <div class="buttons">
                <form method="post">
                    <button type="submit" name="action" value="start">START</button>
                    <button type="submit" name="action" value="exit">EXIT</button>
                </form>
            </div>
    </div>
    <script src="scripts.js"></script>
</body>
</html>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $action = $_POST['action'];
    if ($action == 'start') {
        echo "<script>alert('Start button clicked');</script>";
        // Add your start button functionality here
    } elseif ($action == 'exit') {
        echo "<script>alert('Exit button clicked');</script>";
        // Add your exit button functionality here
    }
}
?>