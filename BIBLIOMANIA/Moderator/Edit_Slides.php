<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Slides</title>
    <link rel="stylesheet" href="../styles.css">
</head>
<body>
    <div class="container">
        <div class="header">
            <button class="back-button" onclick="window.history.back();">Back</button>
            <div class="header-title">Edit Slides</div>
        </div>
        <div class="content">
            <h2>Editing Slides for the Selected Topic</h2>
            <?php
            include '../conn.php'; // Assuming your database connection file is conn.php
            $topic_id = $_GET['topic_id'] ?? 'T001'; // Default to T001 if no topic_id is provided

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Processing form submission for updates
                $update_stmt = $conn->prepare("UPDATE content SET content=? WHERE content_id=?");
            
                foreach ($_POST['contents'] as $content_id => $new_content) {
                    // Bind parameters for each loop iteration separately
                    $update_stmt->bind_param("si", $new_content, $content_id);
                    $update_stmt->execute();
                }
                echo "<p>Changes saved successfully!</p>";
            }

            $query = "SELECT s.slides_id,
            c1.content as content_1, c1.content_id as content_id_1,
            c2.content as content_2, c2.content_id as content_id_2,
            c3.content as content_3, c3.content_id as content_id_3
            FROM slides s
            JOIN content c1 ON s.content_1 = c1.content_id
            JOIN content c2 ON s.content_2 = c2.content_id
            JOIN content c3 ON s.content_3 = c3.content_id
            WHERE s.topic_id = ?";
    
            $stmt = $conn->prepare($query);
            $stmt->bind_param("s", $topic_id);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                echo "<form method='POST'>";
                while ($row = $result->fetch_assoc()) {
                    echo "<div><strong>Slide ID:</strong> {$row['slides_id']}</div>";
                    foreach (['1', '2', '3'] as $index) {
                        echo "<div><label for='content_{$row["content_id_$index"]}'>Content $index:</label>";
                        echo "<textarea name='contents[{$row["content_id_$index"]}]' id='content_{$row["content_id_$index"]}'>{$row["content_$index"]}</textarea></div>";
                    }
                    echo "<hr>";
                }
                echo "<input type='submit' value='Save Changes'>";
                echo "</form>";
            } else {
                echo "No slides found for the specified topic.";
            }
            $stmt->close();
            ?>
        </div>
    </div>
</body>
</html>
