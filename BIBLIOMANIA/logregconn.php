<?php
include("conn.php");
/*function loginUser($name, $password) {
    global $mysqli;

    $stmt = $mysqli->prepare("SELECT * FROM users WHERE name = ?");
    $stmt->bind_param('s', $name);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    $stmt->close();

    if ($user && password_verify($password, $user['password'])) {
        return true; 
    } else {
        return false; 
    }
}*/
function insertUser($name, $password, $age, $email) {
    include("conn.php");

    $result = mysqli_query($conn,"SELECT MAX(CAST(SUBSTRING(student_id, 2) AS UNSIGNED)) AS max_num FROM student");

    $row = $result->fetch_assoc();
    $maxNum = $row['max_num'] ?? 0; // Default to 0 if no rows are returned

    // Generate the new username
    $newNum = str_pad($maxNum + 1, 3, '0', STR_PAD_LEFT); // Format as 3-digit number
    $username = 'S' . $newNum;

    // Prepare and execute the insert statement
    mysqli_query($conn,"INSERT INTO student (student_id, name, password, age, email) VALUES ('$username','$name','$password','$age', '$email')");
    echo 'User inserted successfully';
}

function insertModerator($username, $password, $age, $email, $name) {
    global $mysqli;


    $stmt = $mysqli->prepare("INSERT INTO moderator (username, password, age, email, name) VALUES (?, ?, ?)");
    $stmt->bind_param('sss', $username, $password, $age, $email, $name);
    $stmt->execute();
    $stmt->close();
}