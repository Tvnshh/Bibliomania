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
$sql_moderator = "SELECT moderator_id, name, email FROM moderator";
$sql_student = "SELECT student_id, name, email FROM student";

// Execute queries
$result_moderator = $conn->query($sql_moderator);
$result_student = $conn->query($sql_student);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users from Moderator and Student Tables</title>
    <link rel="stylesheet" href="../styles.css">
    <style>
        body {
            color: rgb(221, 83, 49);
        }
        h1 {
            text-align: center;
            font-size: 3vw;
            margin-bottom: 4vw;
        }
        table {
            width: 80%;
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
    <h1>View All Users</h1>

    <!-- Moderator Table -->
    <table align = center>
        <thead>
            <tr>
                <th colspan = "3">Moderators</th>
            </tr>
            <tr>
                <th>Moderator ID</th>
                <th>Name</th>
                <th>Email Address</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result_moderator->num_rows > 0) {
                while ($row = $result_moderator->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row["moderator_id"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["name"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["email"]) . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='3'>No results found</td></tr>";
            }
            ?>
        </tbody>
    </table>

    <!-- Student Table -->
    <table align = center>
        <thead>
            <tr>
                <th colspan = "3">Students</th>
            </tr>
            <tr>
                <th>Student ID</th>
                <th>Name</th>
                <th>Email Adress</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result_student->num_rows > 0) {
                // Output data of each row
                while ($row = $result_student->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row["student_id"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["name"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["email"]) . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='3'>No results found</td></tr>";
            }
            ?>
        </tbody>
    </table>

    <div class="backbtn">
        <button onclick="history.back()">BACK</button>
    </div>

</body>
</html>

<?php
$conn->close();
?>