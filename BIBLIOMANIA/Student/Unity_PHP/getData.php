<?php
    include("../../conn.php");

    // Read file content
    $fileContent = file_get_contents('http://localhost/bibliomania/BIBLIOMANIA/Student/Unity_PHP/session_data.php');    
    $fileContent = trim($fileContent); 
    
    $table = ($fileContent[0] == 'S') ? 'student' : 'guest';
    $query = "SELECT content_id 
              FROM unlocks 
              WHERE {$table}_id = '{$fileContent}'
              AND (
                  content_id LIKE 'SL009%' OR
                  content_id LIKE 'SL008%' OR
                  content_id LIKE 'SL007%' OR
                  content_id LIKE 'SL006%' OR
                  content_id LIKE 'SL005%' OR
                  content_id LIKE 'SL004%' OR
                  content_id LIKE 'SL003%' OR
                  content_id LIKE 'SL002%' OR
                  content_id LIKE 'SL001%'
              )
              ORDER BY 
                  SUBSTRING(content_id, 1, 6) DESC, 
                  SUBSTRING_INDEX(content_id, '_', -1) DESC 
              LIMIT 1;";

    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Query failed: " . mysqli_error($conn));
    }

    if ($row = mysqli_fetch_assoc($result)) {
        $completed_content = $row['content_id'];
        echo $completed_content;
    } else {
        echo "No results found.";
    }

