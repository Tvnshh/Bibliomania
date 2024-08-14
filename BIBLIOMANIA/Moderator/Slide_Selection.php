<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Slides</title>
    <link rel="stylesheet" href="../styles.css">
    <style>
        body { margin: 0; }
        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            padding: 20px;
            box-sizing: border-box;
        }
        .header {
            width: 100%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        .back-button {
            background-color: #ff4500;
            border: none;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            cursor: pointer;
        }
        .header-title {
            font-size: 24px;
            font-weight: bold;
            text-align: center;
        }
        .content {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .slide {
            background-color: #333;
            border: 1px solid #ff4500;
            padding: 20px;
            margin: 10px 0;
            width: 200px;
            text-align: center;
            text-decoration: none;
            color: white;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .slide:hover {
            background-color: #444;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <button class="back-button" onclick="window.history.back();">Back</button>
            <div class="header-title">Edit Slides</div>
        </div>
        <div class="content">
            <?php
            include '../conn.php'; // Assuming your database connection file is conn.php
            $topic_id = $_GET['topic_id'] ?? 'T001'; // Default to T001 if no topic_id is provided

            $query = "SELECT slides_id, content_1, content_2, content_3 FROM Slides WHERE topic_id = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("s", $topic_id);
            $stmt->execute();
            $result = $stmt->get_result();

            $slideNumber = 1; // Counter to label slides as "Slide 1", "Slide 2", etc.
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<a href='Edit_Slide_Content.php?slide_id={$row['slides_id']}' class='slide'>Slide $slideNumber</a>";
                    $slideNumber++; // Increment the slide counter
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
