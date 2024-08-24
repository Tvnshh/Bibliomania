<?php
include("../../assets/conn.php");
$userID = $_POST['userID'];
$checkpointID = $_POST['checkpointID'];

$table = ($userID[0] == 'S') ? 'student' : 'guest';
$id_column = ($userID[0] == 'S') ? 'student_id' : 'guest_id';

$query = "
    INSERT INTO unlocks ($id_column, content_id)
    SELECT ?, ?
    WHERE NOT EXISTS (
        SELECT 1 
        FROM unlocks 
        WHERE $id_column = ? AND content_id = ?
    )
";
$stmt = $conn->prepare($query);
$stmt->bind_param("ssss", $userID, $checkpointID, $userID, $checkpointID);  
$stmt->execute();

