<?php 
require_once('conn.php'); 

$username = '';  
$password = '';  
$login_error = ''; 
 
if ($_SERVER['REQUEST_METHOD'] === 'POST') { 
  $username = $_POST['username']; 
  $password = $_POST['password']; 
}
 
if (loginUser($username, $password)) {
  session_start(); 
  $_SESSION['username'] = $username; 

  $role = getrole($username); 
  $_SESSION['role'] = $role; 


} else {
  $login_error = 'Invalid username or password.';
}
?>
 
<!DOCTYPE html> 
<html lang="en"> 
<head> 
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Login</title> 
    <link rel="stylesheet" href="style.css">
</head> 
<body> 
    <h1>Login</h1> 
    <?php if (isset($_GET['error'])): ?>  <p style="color: red;"><?php echo htmlspecialchars($_GET['error']); ?></p> 
    <?php endif; ?> 
    <form action="Login_Page.php" method="post"> 
        <div class="form-group"> 
            <label for="username">Username:</label> 
            <input type="text" name="username" id="username" required> 
        </div> 
        <div class.form-group> 
            <label for="password">Password:</label> 
            <input type="password" name="password" id="password" required> 

        <button type="submit">Login</button><br>
        <a href="Registration_Page.php">Sign Up</a>
    </form> 
    <?php if ($login_error): ?> 
        <p style="color: red;"><?php echo $login_error; ?></p> 
    <?php endif; ?> 
</body> 
</html>