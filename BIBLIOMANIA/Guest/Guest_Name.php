<?php
include '../assets/conn.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $guest_name = $_POST['guest_name'];

    // Retrieve the last guest_id from the database
    $result = $conn->query("SELECT guest_id FROM guest ORDER BY guest_id DESC LIMIT 1");
    $last_guest_id = $result->fetch_assoc()['guest_id'] ?? 'G000';

    // Generate the new guest ID
    $new_guest_id = 'G' . str_pad((int)substr($last_guest_id, 1) + 1, 3, '0', STR_PAD_LEFT);

    // Store session ID
    $_SESSION['studentID'] = $new_guest_id;
    $_SESSION['guestName'] =  $guest_name;


    // Insert the guest's name into the database
    $stmt = $conn->prepare("INSERT INTO guest (guest_id, name) VALUES (?, ?)");
    $stmt->bind_param("ss", $new_guest_id, $guest_name);
    $stmt->execute();
    header("Location: Guest_Menu.php");

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guest Registration</title>
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
            background-color: #fff; /* Optional: You can add a background color */
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

        input[type="text"] {
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
    </style>
</head>
<body>
    <div class="image">
        <img src="../images/bibliomania-logo-2.png" alt="logo.png">
    </div>

    <div class="container">
        <div class="header">
            <h1>Guest Registration</h1>
        </div>

        <div class="form-container">
            <form action="Guest_Name.php" method="post">
                <label for="guest_name">Enter your name:</label>
                <input type="text" id="guest_name" name="guest_name" required>

                <input type="submit" value="Register">
            </form>
        </div>
    </div>
</body>
</html>
