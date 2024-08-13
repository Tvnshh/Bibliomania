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
            include '../conn.php'; 
            $topic_id = $_GET['topic_id'] ?? 'T001'; 

            $query = "SELECT slides_id, slide_content FROM Slides WHERE topic_id = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("s", $topic_id);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<div><strong>Slide ID:</strong> {$row['slides_id']}</div>";
                    echo "<div><strong>Content:</strong> {$row['content']}</div><hr>";
                }
            } else {
                echo "<p>No slides found for this topic.</p>";
            }
            $stmt->close();
            ?>
        </div>
    </div>
</body>
</html>