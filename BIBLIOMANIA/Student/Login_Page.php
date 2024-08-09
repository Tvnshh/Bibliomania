<?php
    session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Brainiac Quiz</title>
    <link rel="website icon" type="png" href="http://localhost/GRP_Assignment/Webpage_items/quiz_icon.png">
    <link rel="stylesheet" href="../styles.css">
    <style>
    body {
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    }
    .image {
        margin-right: 150px;
        box-shadow: 5px 5px 50px rgba(0, 0, 0, 0.6);
        border-radius: 20px;
    }
    .image img {
        width: 40vw;
    }
    .container {
        background: rgb(27,27,27);
        box-shadow: 10px 10px 40px rgba(221, 83, 49, 0.5);
        border-style: solid;
        border-color: rgb(221, 83, 49);
        border-radius: 1.5vw;
        padding: 1.5vw;
        padding-right: 3vw;
        width: 29vw;
        text-align: center;
    }
    .header {
        margin-bottom: 1.5vw;
        text-align: left;
    }
    h1 {
        font-size: 3vw;
        text-align: center;
        margin-bottom: 0;
        color: rgb(221, 83, 49);
    }
    .form-container {
        margin-bottom: 1vw;
    }
    label {
        display: block;
        margin-top: 1.5vw;
        color: rgb(221, 83, 49);
        font-size: 1.3vw;
        text-align: left;
    }
    input[type="email"],
    input[type="password"] {
        width: 100%;
        font-size: 1.1vw;
        padding: 0.65vw;
        box-shadow: 5px 5px 10px rgba(221, 83, 49, 0.5);
        border: 1px solid #ccc;
        border-radius: 0.5vw;
        margin-top: 0.3vw;
    }
    input[type="submit"] {
        background-color: rgb(221, 83, 49);
        text-align: center;
        font-size: 1.5vw;
        font-family: 'CustomFont';
        width: 11vw;
        height: 3.5vw;
        color: whitesmoke;
        border: solid;
        border-color: rgb(27,27,27);
        border-radius: 0.5vw;
        cursor: pointer;
        transition: font-size 0.2s ease;
        margin-top: 3vw;
    }
    input[type="submit"]:hover {
        background-color: rgb(27,27,27);
        border: solid;
        border-color: rgb(221, 83, 49);
        font-size: 1.8vw;
    }
    .register p {
        margin-top: 3vw;
        font-size: 1vw;
        text-align: center;
        color: rgb(221, 83, 49);
    }
    .register a {
        color: #93c7ff;
        text-decoration: none;
    }
    .container p {
        font-size: 1.3vw;
        color: red ;
    }
    .container button {
        background-color: rgb(221, 83, 49);
        text-align: center;
        font-size: 1.5vw;
        font-family: 'CustomFont';
        width: 11vw;
        height: 3.5vw;
        color: whitesmoke;
        border: solid;
        border-color: rgb(27,27,27);
        border-radius: 0.5vw;
        cursor: pointer;
        transition: font-size 0.2s ease;
        margin-top: 3vw;
        margin: auto;
    }
    .container button:hover {
        background-color: rgb(27,27,27);
        border: solid;
        border-color: rgb(221, 83, 49);
        font-size: 1.8vw;
    }
    </style>
</head>
<body>
    <div class="image">
        <img src="../images/bibliomania-logo-2.png" alt="logo.png">
    </div>

    <div class="container">
        <div class="header">
            <h1>Log In</h1>
        </div>

        <?php
            include("../conn.php");
            if(isset($_POST['submit'])){
                $email = mysqli_real_escape_string($conn,$_POST['email']);
                $password = mysqli_real_escape_string($conn,$_POST['password']);

                $userinfo = mysqli_query($conn,"SELECT * FROM student WHERE email='$email' AND password='$password'");
                $row = mysqli_fetch_assoc($userinfo);

                if(is_array($row) && !empty($row)){
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['name'] = $row['name'];
                    $_SESSION['password'] = $row['password'];
                    $_SESSION['studentID'] = $row['student_id'];
                    $_SESSION['age'] = $row['age'];

                    if ($_SESSION['password'] === $password) {
                        header("Location: Student_Menu.php");
                    }
                }else{
                    echo "<div>
                                <p>Wrong Email or Password. Please try again</p>
                            </div> <br/>";
                    echo "<a href='Login_page.php'><button>Back</button>";
                }
            }else{

                
        ?>

        <div class="form-container">
            <form action="#" method="post">
                <label for="email">Email Address:</label>
                <input type="email" id="email" name="email" placeholder="jdoe@example.com" required>
                <br/><br/>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
                <input type="submit" name="submit" value="Log In">
            </form>
        </div>

        <div class="register">
            <p>Don't have an account? <a href="">Register</a></p>
        </div>
        <?php } ?>
    </div>
</body>
</html>