<?php
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "bibliomania";


$conn = new mysqli($servername, $username, $password, $bibliomania);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL queries for both tables
$sql_moderator = "SELECT name, email, username FROM moderator";
$sql_student = "SELECT name, email, username FROM student";

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
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
        h2 {
            margin-bottom: 0;
        }
    </style>
</head>
<body>
    <h1>View All Users</h1>

    <!-- Moderator Table -->
    <h2>Moderators</h2>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Username</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result_moderator->num_rows > 0) {
                while ($row = $result_moderator->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row["name"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["email"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["username"]) . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='3'>No results found</td></tr>";
            }
            ?>
        </tbody>
    </table>

    <!-- Student Table -->
    <h2>Students</h2>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Username</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result_student->num_rows > 0) {
                // Output data of each row
                while ($row = $result_student->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row["name"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["email"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["username"]) . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='3'>No results found</td></tr>";
            }
            ?>
        </tbody>
    </table>

</body>
</html>

<?php
$conn->close();
?>