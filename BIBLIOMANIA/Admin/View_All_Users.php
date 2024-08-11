<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bibliomania";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL queries for both tables
$sql_moderator = "SELECT moderator_id, name, email, date_of_birth FROM moderator";
$sql_student = "SELECT student_id, name, email, date_of_birth FROM student";

// Execute queries
$result_moderator = $conn->query($sql_moderator);
$result_student = $conn->query($sql_student);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
    <link rel="stylesheet" href="../styles.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body {
            color: rgb(221, 83, 49);
        }
        h1 {
            position: relative;
            top: 70px;
            display: block;
            align-items: center;
            background-color: rgb(221, 83, 49);
            color: black;
            border-radius: 0.5vw;
            width: 23vw;
            margin: auto;
            text-align: center;
            font-size: 3vw;
            margin-bottom: 10vw;
        }
        .mod-table {
            width: 75%;
            border-collapse: collapse;
            margin-bottom: 5vw;
            font-size: 1.5vw;
        }
        .stu-table {
            width: 75%;
            border-collapse: collapse;
            margin-bottom: 5vw;
            font-size: 1.5vw;
        }
        th, td {
            border: 1px solid rgb(221, 83, 49);
            padding: 8px;
            background-color: rgb(50, 50, 50);
            color: rgb(221, 83, 49);
            text-align: center;
        }
        th {
            background-color: rgb(27,27,27);
        }
        .action {
            border: none;
            background-color: transparent;
        }
        .action a button {
            font-family: 'CustomFont';
            cursor: pointer;
            color: black;
            background-color: rgb(221, 83, 49);
            border: solid;
            border-radius: 1vw;
            border-color: black;
            font-size: 1.5vw;
        }
        .action a button:hover {
            color: rgb(221, 83, 49);
            background-color: rgb(27, 27, 27);
            border-color: rgb(221, 83, 49);

        }
        .top-right-container {
            position: absolute;
            top: 95px;
            right: 230px;
            display: flex;
            align-items: center;
        }
        .logout-button {
            font-family: 'CustomFont';
            background-color: rgb(27, 27, 27);
            color: rgb(221, 83, 49);
            border: solid;
            border-color: rgb(221, 83, 49);
            cursor: pointer;
            border-radius: 1vw;
            font-size: 1.3vw; 
            position: absolute;
            left: 80px; 
            width: 7vw;
            height: 3.5vw;
            transition: font-size 0.2s ease;
        }
        .logout-button:hover {
            font-size: 1.5vw;
        }
        .user-icon {
            cursor: pointer;
            font-size: 24px;
        }
        .user-icon:hover {
            color: whitesmoke;
        }
        .backbtn button {
            font-family: 'CustomFont';
            background-color: rgb(221, 83, 49);
            align-items: center;
            width: 15vw;
            height: 4.5vw;  
            justify-content: center;
            font-size: 2.5vw;
            color: rgb(0, 0, 0);
            border-radius: 1vw;
            border-color: rgb(0, 0, 0);
            transition: font-size 0.2s ease;
            display: flex;
            cursor: pointer;
            margin: auto;
        }
        .backbtn button:hover {
            font-size: 2.8vw;
            background-color: rgb(27, 27, 27);
            color: rgb(221, 83, 49);
            -webkit-text-stroke: 0.1vw rgb(221, 83, 49);
            border-color: rgb(221, 83, 49);
        }
    </style>
</head>
<body>
    <h1>USERS</h1>

    <table class="mod-table" align="center">
        <tr>
            <th colspan = "4">Moderators</th>
        </tr>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email Address</th>
            <th>Date of Birth</th>
        </tr>
        <?php
        if ($result_moderator->num_rows > 0) {
            while ($row = $result_moderator->fetch_assoc()) {
                echo "<tr>";
                echo "<td width='80vw'>" . htmlspecialchars($row["moderator_id"]) . "</td>";
                echo "<td width='370vw'>" . htmlspecialchars($row["name"]) . "</td>";
                echo "<td width='370vw'>" . htmlspecialchars($row["email"]) . "</td>";
                echo "<td width='160vw'>" . htmlspecialchars($row["date_of_birth"]) . "</td>";
                echo "<td class='action'><a href='Delete.php?id=$row[moderator_id]'><button>Delete</button></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='3'>No results found</td></tr>";
        }
        ?>
    </table>


    <table class="stu-table" align = center>
        <tr>
            <th colspan = "4">Students</th>
        </tr>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email Adress</th>
            <th>Date of Birth</th>
        </tr>
        <?php
        if ($result_student->num_rows > 0) {
            // Output data of each row
            while ($row = $result_student->fetch_assoc()) {
                echo "<tr>";
                echo "<td width='80vw'>" . htmlspecialchars($row["student_id"]) . "</td>";
                echo "<td width='370vw'>" . htmlspecialchars($row["name"]) . "</td>";
                echo "<td width='370vw'>" . htmlspecialchars($row["email"]) . "</td>";
                echo "<td width='160vw'>" . htmlspecialchars($row["date_of_birth"]) . "</td>";
                echo "<td class='action'><a href='Delete.php?id=$row[student_id]'><button>Delete</button></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No results found</td></tr>";
        }
        ?>
    </table>

    <div class="top-right-container">
        <div class="user-icon">
            <span onclick="location.href='User_Profile.php'"><i style="font-size:55px" class="fa">&#xf2bd;</i></span>
        </div>
        <button class="logout-button" onclick="location.href='../Logout_Page.php'">LOGOUT</button>  
    </div>


    <div class="backbtn">
        <button onclick="location.href='Admin_Menu.php'">BACK</button>
    </div>

</body>
</html>

<?php
$conn->close();
?>