<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Slide</title>
    <link rel="stylesheet" href="../styles.css">
    <!-- Add the rest of your CSS and head elements here -->
</head>
<body>
    <div class="container">
        <div class="header">
            <button class="back-button" onclick="window.history.back();">Back</button>
            <div class="header-title">View Slide</div>
        </div>
        <!-- <div class="content"> -->
            <?php
            include '../conn.php';
            $slides_id = $_GET['slide_id'] ?? '';

            // Fetch content IDs based on slides_id
            $stmt = $conn->prepare("SELECT content_1, content_2, content_3 FROM slides WHERE slides_id = ?");
            $stmt->bind_param("s", $slides_id);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $content_1 = $row['content_1'];
                $content_2 = $row['content_2'];
                $content_3 = $row['content_3'];
            }

            // Fetch content for the first content ID
            $result_1 = $conn->query("SELECT content FROM content WHERE content_id='" . $conn->real_escape_string($content_1) . "'");
            $current_content_1 = ($result_1 && $result_1->num_rows > 0) ? $result_1->fetch_assoc()['content'] : "No content found.";

            // Fetch content for the second content ID
            $result_2 = $conn->query("SELECT content FROM content WHERE content_id='" . $conn->real_escape_string($content_2) . "'");
            $current_content_2 = ($result_2 && $result_2->num_rows > 0) ? $result_2->fetch_assoc()['content'] : "No content found.";

            // Fetch content for the third content ID
            $result_3 = $conn->query("SELECT content FROM content WHERE content_id='" . $conn->real_escape_string($content_3) . "'");
            $current_content_3 = ($result_3 && $result_3->num_rows > 0) ? $result_3->fetch_assoc()['content'] : "No content found.";

            // Display content in a styled container
            echo "<div class='slide-content'>";
            echo "<p>" . htmlspecialchars($current_content_1) . "</p>";
            echo "<p>" . htmlspecialchars($current_content_2) . "</p>";
            echo "<p>" . htmlspecialchars($current_content_3) . "</p>";
            echo "</div>";
            ?>
        </div>
    </div>
</body>
</html>
