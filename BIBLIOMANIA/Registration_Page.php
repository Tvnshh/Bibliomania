<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - Brainiac Quiz</title>
    <link rel="website icon" type="png" href="./Webpage_items/quiz_icon.png">
    <link rel="stylesheet" href="styles.css">
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
    input[type="number"] {
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
    .login p {
        margin-top:0vw;
        margin-bottom: 0;
        font-size: 1vw;
        text-align: center;
    }
    .login a {
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
        <img src="images/bibliomania-logo-2.png" alt="logo.png">
    </div>

    <div class="container">

        <div class="header">
            <h1>Register</h1>
        </div>

        <?php
            include("conn.php");
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $name = $_POST['name'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $age = $_POST['age'];

                $verify_query = mysqli_query($conn, "SELECT email FROM student WHERE email='$email'");
                if(mysqli_num_rows($verify_query) !=0 ){
                    echo "<div class='message'>
                                <p>This email is already in use, Try different email</p>
                            </div> <br/>";
                    echo "<a href='javascript:self.history.back()'><button>BACK</button>";
                }
                else{
                    $result = mysqli_query($conn,"SELECT MAX(CAST(SUBSTRING(student_id, 2) AS UNSIGNED)) AS max_num FROM student");
                    
                    $row = $result->fetch_assoc();
                    $maxNum = $row['max_num'] ?? 0; // Default to 0 if no rows are returned
                    
                    // Generate the new username
                    $newNum = str_pad($maxNum + 1, 3, '0', STR_PAD_LEFT); // Format as 3-digit number
                    $username = 'S' . $newNum;

                    mysqli_query($conn,"INSERT INTO student(student_id,name,password,age,email) VALUES('$username','$name','$password','$age','$email')");

                    echo "<div class='message'>
                                <p>Succesfully created account</p>
                            </div> <br/>";
                    echo "<a href='Student/Login_page.php'><button>LOGIN NOW</button>";
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
                <label for="age">Age:</label>
                <input type="number" id="age" name="age" required>
                <input type="submit" name="submit" value="Register">
            </form>
        </div>

        <br/>

        <div class="login">
            <p>Have an account? <a href="Student/Login_Page.php">Login</a></p>
        </div>
        <?php } ?>
    </div>
</body>
</html>