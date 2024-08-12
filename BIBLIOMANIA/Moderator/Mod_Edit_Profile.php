<?php
    session_start();
    include("../conn.php");
    if(!isset($_SESSION['modID'])){
        header("Location: Bibliomania/BIBLIOMANIA/Student/Login_Page.php");
    }

    $moderator_id = $_SESSION['modID'];
    $email = $_SESSION['email'];
    $name = $_SESSION['name'];
 
    $sql = "UPDATE moderator SET name='$name', email='$email' WHERE moderator_id='$modID'";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }


    header("Location: Mod_User_Profile.php");
    exit();
    
    else {

    $sql = "SELECT name, email FROM moderator WHERE moderator_id = '$modID'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

        $row = $result->fetch_assoc();
        $name = $row["name"];
        $modID = $row["moderator_id"];
        $email = $row["email"];
    } else {
        echo "0 results";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles.css">
    <title>Edit Profile</title>
</head>
<body>
    <div class="container">
        <div class="profile">
            <button class="button" onclick="window.location.href='Mod_User_Profile.php'">BACK</button>
            <h2>Edit Profile</h2>
            <form action="" method="post">
                <div>
                    Name: <input type="text" name="name" value="<?php echo isset($name) ? $name : ''; ?>">
                </div>
                <div>
                    Moderator_ID: <input type="text" name="Moderator_ID" value="<?php echo isset($modID) ? $modID : ''; ?>">
                </div>
                <div>
                    Email: <input type="text" name="email" value="<?php echo isset($email) ? $email : ''; ?>">
                </div>
                <div>
                    <button class="button" type="submit">SAVE</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>