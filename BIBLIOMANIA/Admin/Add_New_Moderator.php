<?php
session_start();
include("../assets/conn.php");
if(!isset($_SESSION['adminID'])){
    header("Location: Login_Page.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register New Moderator</title>
    <link rel="website icon" type="png" href="./Webpage_items/quiz_icon.png">
    <link rel="stylesheet" href="../assets/styles.css">
    <style>
        body {
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        color: rgb(221, 83, 49);
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
        margin-top: 0.5vw;
        color: rgb(221, 83, 49);
        font-size: 1.3vw;
        text-align: left;
    }
    input[type="text"],
    input[type="email"],
    input[type="password"],
    input[type="date"] {
        width: 100%;
        font-size: 1.1vw;
        padding: 0.65vw;
        box-shadow: 5px 5px 10px rgba(221, 83, 49, 0.5);
        border: 1px solid #ccc;
        border-radius: 0.5vw;
        margin-top: 0.1vw;
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
    .container p {
        font-size: 1.3vw;
        color: red ;
    }
    .container button {
        background-color: rgb(221, 83, 49);
        text-align: center;
        font-size: 1.5vw;
        font-family: 'CustomFont';
        width: 13vw;
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
            <h1>Register Moderator</h1>
        </div>

        <?php
            include("../assets/conn.php");
            $adminID = $_SESSION['adminID'];

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $name = $_POST['name'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $dob = date('Y-m-d', strtotime($_POST['dob']));

                $verify_query = mysqli_query($conn, "SELECT email FROM moderator WHERE email='$email'");
                if(mysqli_num_rows($verify_query) !=0 ){
                    echo "<div class='message'>
                                <p>This email is already in use, Try different</p>
                            </div> <br/>";
                    echo "<a href='javascript:self.history.back()'><button>BACK</button>";
                }
                else{
                    $result = mysqli_query($conn,"SELECT MAX(CAST(SUBSTRING(moderator_id, 2) AS UNSIGNED)) AS max_num FROM moderator");
                    
                    $row = $result->fetch_assoc();
                    $maxNum = $row['max_num'] ?? 0;
                    
                    $newNum = str_pad($maxNum + 1, 3, '0', STR_PAD_LEFT);
                    $modID = 'M' . $newNum;

                    mysqli_query($conn,"INSERT INTO moderator(moderator_id,name,password,date_of_birth,email,admin_id) VALUES('$modID','$name','$password','$dob','$email','$adminID')");

                    echo "<div class='message'>
                                <p>Succesfully registered new Moderator</p>
                            </div> <br/>";
                    echo "<a href='Admin_Menu.php'><button>Back to Menu</button>";
                }
            }else{

        ?>

        <div class="form-container">
            <form action="" method="post">

                <label for="name">Name:</label>
                <input type="text" id="name"  name="name" required>
                <br/><br/>

                <label for="email">Email Address:</label>
                <input type="email" id="email" name="email" required>
                <br/><br/>

                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
                <br/><br/>

                <label for="dob">Date of Birth:</label>
                <input type="date" id="dob" name="dob" required>

                <input type="submit" name="submit" value="Register">
            </form>
        </div>

        <br/>

        <?php } ?>

    </div>
</body>
</html>