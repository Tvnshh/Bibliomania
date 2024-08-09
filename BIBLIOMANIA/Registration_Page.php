<?php
require_once('logregconn.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $password = $_POST['password'];
    $age = $_POST['age'];
    $email = $_POST['email'];

    insertUser($name, $password, $age, $email);


    header('Location: Choose_Account.html');
}
?>

<!DOCTYPE html>
<html>
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Sign Up</title> 
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <form action="Registration_Page.php" method="post">
        <h1>Sign Up</h1>
        <label for="name">Name:</label>
            <input type="text" name="name" id="name" required><br>

        <label for="password">Password:</label>
            <input type="password" name="password" id="password" required><br>

        <label for="email">E-Mail:</label>
            <input type="text" name="email" id="email" required><br>

        <label for="age">Age:</label>
            <input type="number" name="age" id="age" required><br>

        <div class="form-group">
        <button type="submit">Sign Up</button>
    </form>
</body>
</html>