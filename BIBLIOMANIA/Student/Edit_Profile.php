<?php
session_start();
include("../assets/conn.php");
if(!isset($_SESSION['studentID'])){
    header("location:Login_Page.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
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
    }
    .header {
        margin-bottom: 1.5vw;
        text-align: left;
    }
    h1 {
        font-size: 3vw;
        text-align: center;
        margin-bottom: 4vw;
        color: black;
        background-color: rgb(221, 83, 49);
        border-radius: 0.5vw;
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
    input[type="text"],
    input[type="email"],
    input[type="date"] {
        font-family: 'CustomFont';
        width: 100%;
        font-size: 1.3vw;
        padding: 0.65vw;
        box-shadow: 5px 5px 10px rgba(221, 83, 49, 0.5);
        border: 1px solid #ccc;
        border-radius: 0.5vw;
        margin-top: 0.3vw;
        text-align: left;
        background-color: whitesmoke;
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
    input[type="submit"] {
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
        margin-top: 2.8vw;
    }
    input[type="submit"]:hover {
        background-color: rgb(27,27,27);
        border: solid;
        border-color: rgb(221, 83, 49);
        font-size: 1.9vw;
        color: rgb(221, 83, 49);
    }
    </style>
</head>
<body>
    <div class="backbtn">
        <button onclick="history.back()">BACK</button>
    </div>


    <?php
            if(isset($_POST['submit'])){
                $name = $_POST['name'];
                $email = $_POST['email'];
                $dob = date('Y-m-d', strtotime($_POST['dob']));
                $password = $_POST['password'];

                $id = $_SESSION['studentID'];

                $edit_profile = mysqli_query($conn,"UPDATE student SET name='$name', password='$password', date_of_birth='$dob', email='$email' WHERE student_id='$id'");

                if($edit_profile){
                    $_SESSION['email'] = $email;
                    $_SESSION['name'] = $name;
                    $_SESSION['password'] = $password;
                    $_SESSION['studentID'] = $id;
                    $_SESSION['dob'] = $dob;

                    header("Location: User_Profile.php");
                }
            }else{
                $id = $_SESSION['studentID'];
                $query = mysqli_query($conn,"SELECT * FROM student WHERE student_id='$id'");

                while($userinfo = mysqli_fetch_assoc($query)){
                    $user_name = $userinfo['name'];
                    $user_email = $userinfo['email'];
                    $user_password = $userinfo['password'];
                    $user_dob = $userinfo['date_of_birth'];
                }
        ?>

    <div class="container">
        <div class="header">
            <h1>Edit Profile</h1>
        </div>

        <div class="form-container">
            <form action="#" method="post">
                <label for="id">Student ID:</label>
                <p><?php echo $_SESSION['studentID']?></p>

                <label for="name">Name:</label>
                <input type="text" id="name" placeholder="Name" value="<?php echo $user_name ?>" name="name" required>

                <label for="email">Email Address:</label>
                <input type="email" id="email" placeholder="Email" value="<?php echo $user_email ?>" name="email" required>

                <label for="dob">Date of Birth:</label>
                <input type="date" id="dob" placeholder="yyyy-mm-dd" value="<?php echo $user_dob ?>" name="dob" required>

                <label for="password">Password:</label>
                <input type="text" id="password" placeholder="Password" value="<?php echo $user_password ?>" name="password" required>
                <br/><br/>

                <input type="submit" name="submit" value="SAVE">
            </form>
            <?php } ?>
        </div>
    </div>
</body>
</html>