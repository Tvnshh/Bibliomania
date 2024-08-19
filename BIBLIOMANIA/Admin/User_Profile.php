<?php
session_start();
include("../assets/conn.php");
if(!isset($_SESSION['adminID'])){
    header("location:Login_Page.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="website icon" type="png" href="http://localhost/GRP_Assignment/Webpage_items/quiz_icon.png">
    <link rel="stylesheet" href="../styles.css">
    <style>
    body {
        margin: 0;
        padding: 0;
        height: 100vh;
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
        padding: 1.5vw;
        padding-right: 3vw;
        width: 29vw;
        text-align: center;
        margin: auto;
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
    .form-container p {
        width: 100%;
        font-size: 1.3vw;
        padding: 0.65vw;
        box-shadow: 5px 5px 10px rgba(221, 83, 49, 0.5);
        border: 1px solid #ccc;
        border-radius: 0.5vw;
        margin-top: 0.3vw;
        text-align: left;
        background-color: rgb(174, 57, 28);
        color: black;
    }
    .form-container button {
        background-color: rgb(221, 83, 49);
        text-align: center;
        font-size: 2vw;
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
    .form-container button:hover {
        background-color: rgb(27,27,27);
        border: solid;
        border-color: rgb(221, 83, 49);
        font-size: 2.3vw;
    }
    .container button {
        background-color: rgb(221, 83, 49);
        text-align: center;
        font-size: 1.7vw;
        font-family: 'CustomFont';
        width: 11vw;
        height: 3.5vw;
        color: black;
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
        font-size: 1.9vw;
    }
    </style>
</head>
<body>
    <div class="backbtn">
        <button onclick="history.back()">BACK</button>
    </div>

    <h1>Admin Profile</h1>

    <div class="container">
        <div class="form-container">
            <label for="id">Admin ID:</label>
            <p><?php echo $_SESSION['adminID']?></p>
            <label for="name">Name:</label>
            <p><?php echo $_SESSION['name']?></p>
            <label for="password">Password:</label>
            <p><?php echo $_SESSION['password']?></p>
        </div>
    </div>
</body>
</html>