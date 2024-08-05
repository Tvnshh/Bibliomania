<?php
require_once('conn.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    insertUser($username, $password, $age, $email, $name);


    header('Location: Login_Page.php');
}
?>

<!DOCTYPE html>
<link rel="stylesheet" href="style.css">
<html>
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Sign Up</title> 
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="Registration_Page.php" method="post">
        <h1>Sign Up</h1>
        <label for="username">Username:</label>
            <input type="text" name="username" id="username" required><br>

        <label for="password">Password:</label>
            <input type="password" name="password" id="password" required><br>

        <label for="name">Name:</label>
            <input type="text" name="name" id="name" required><br>

        <label for="email">E-Mail:</label>
            <input type="text" name="email" id="email" required><br>

        <label for="age">Age:</label>
            <input type="number" name="age" id="age" required><br>

        <div class="form-group">
        <button type="submit">Sign Up</button>
    </form>
</body>
</html>