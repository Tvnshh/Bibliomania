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

            $query = "SELECT s.slides_id,
            c1.content as content_1,
            c2.content as content_2,
            c3.content as content_3
            FROM slides s
            JOIN content c1 ON s.content_1 = c1.content_id
            JOIN content c2 ON s.content_2 = c2.content_id
            JOIN content c3 ON s.content_3 = c3.content_id
            WHERE s.topic_id = ?";  // Use s.slides_id = ? to fetch by slide

            $stmt = $conn->prepare($query);
            $stmt->bind_param("s", $topic_id);  // or $slides_id if fetching by slide
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                echo "<div><strong>Slide ID:</strong> {$row['slides_id']}</div>";
                echo "<div><strong>Content 1:</strong> {$row['content_1']}</div>";
                echo "<div><strong>Content 2:</strong> {$row['content_2']}</div>";
                echo "<div><strong>Content 3:</strong> {$row['content_3']}</div><hr>";
                }
            } else {
            echo "No slides found for the specified topic.";
            }
            $stmt->close();
            ?>
        </div>
    </div>
</body>
</html>