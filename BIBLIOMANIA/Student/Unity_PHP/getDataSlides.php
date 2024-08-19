<?php
    include("../../conn.php");
    $fileContent = file_get_contents('http://localhost/bibliomania/BIBLIOMANIA/Student/Unity_PHP/session_data.php');    
    $fileContent = trim($fileContent); 
    $table = ($fileContent[0] == 'S') ? 'student' : 'guest';
    $query = "SELECT content_id FROM unlocks WHERE {$table}_id = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, 's', $fileContent);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $content_ids = [];

    // Loop through the result set and add each content_id to the array
    while ($row = mysqli_fetch_assoc($result)) {
        $content_ids[] = $row['content_id'];
    }   
    foreach ($content_ids as $content_id) {
        echo $content_id . "<br>";
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
