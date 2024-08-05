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
                <center>
                    <div><img src="images\bibliomania-logo-2.png" alt="" width=50%></div>
                    <button type="submit" name="action" value="start">START</button> 
                    <button type="submit" name="action" value="exit">EXIT</button>
                </center>
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
        header('Location: Choose_Account.html');
        exit();
    } elseif ($action == 'exit') {
        header('Location: exit.php');
        exit();
    }
}
?>
