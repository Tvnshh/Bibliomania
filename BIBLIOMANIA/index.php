<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ARS Gamified Learning System</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            background-image: url('images/index.png');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
    </style>
</head>
<body>
    <div class="menu">
        <form method="post">
            <centre>
                <button type="submit" name="action" value="start">START</button> 
                <button type="submit" name="action" value="exit">EXIT</button>
            </centre>
        </form>
    </div>
    <script src="scripts.js"></script>
</body>
</html>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $action = $_POST['action'];
    if ($action == 'start') {
        header('Location: Choose_Account.html');
        exit();
    } elseif ($action == 'exit') {
        header('Location: exit.php');
        exit();
    }
}
?>
