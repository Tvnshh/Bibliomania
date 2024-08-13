<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Slide Content</title>
    <link rel="stylesheet" href="../styles.css">
    <!-- Add the rest of your CSS and head elements here -->
</head>
<body>
    <div class="container">
        <div class="header">
            <button class="back-button" onclick="window.history.back();">Back</button>
            <div class="header-title">Edit Slide Content</div>
        </div>
        <div class="content">
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
            
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $content1 = $_POST['content1'];
                $content2 = $_POST['content2'];
                $content3 = $_POST['content3'];

                $update_stmt1 = $conn->prepare("UPDATE content SET content=? WHERE content_id=?");
                $update_stmt2 = $conn->prepare("UPDATE content SET content=? WHERE content_id=?");
                $update_stmt3 = $conn->prepare("UPDATE content SET content=? WHERE content_id=?");

                $update_stmt1->bind_param("ss", $content1, $content_1);
                $update_stmt2->bind_param("ss", $content2, $content_2);
                $update_stmt3->bind_param("ss", $content3, $content_3);

                $update_stmt1->execute();
                $update_stmt2->execute();
                $update_stmt3->execute();

                echo "<p>Content updated successfully!</p>";
            }

            $result_1 = $conn->query("SELECT content FROM content WHERE content_id='" . $conn->real_escape_string($content_1) . "'");
            $current_content_1 = ($result_1 && $result_1->num_rows > 0) ? $result_1->fetch_assoc()['content'] : "No content found.";

            // Fetch content for the second content ID
            $result_2 = $conn->query("SELECT content FROM content WHERE content_id='" . $conn->real_escape_string($content_2) . "'");
            $current_content_2 = ($result_2 && $result_2->num_rows > 0) ? $result_2->fetch_assoc()['content'] : "No content found.";

            // Fetch content for the third content ID
            $result_3 = $conn->query("SELECT content FROM content WHERE content_id='" . $conn->real_escape_string($content_3) . "'");
            $current_content_3 = ($result_3 && $result_3->num_rows > 0) ? $result_3->fetch_assoc()['content'] : "No content found.";

            echo "<form method='POST'>";
            echo "<textarea name='content1'>" . htmlspecialchars($current_content_1) . "</textarea>";
            echo "<textarea name='content2'>" . htmlspecialchars($current_content_2) . "</textarea>";
            echo "<textarea name='content3'>" . htmlspecialchars($current_content_3) . "</textarea>";
            echo "<input type='submit' value='Update Content'>";
            echo "</form>";
            ?>
        </div>
    </div>
</body>
</html>
