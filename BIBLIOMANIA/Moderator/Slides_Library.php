<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Slides Library</title>
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
        .back-button, .logout-button {
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
        .topic {
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
        .topic:hover {
            background-color: #444;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <button class="back-button" onclick="window.history.back();">Back</button>
            <div class="header-title">Slides Library</div>
        </div>
        <div class="content">
            <?php
            $topics = [
                'T001' => 'Topic 1',
                'T002' => 'Topic 2',
                'T003' => 'Topic 3',
            ];
            foreach ($topics as $id => $name) {
                echo "<a href='Slide_Number.php?topic_id=$id' class='topic'>$name</a>";
            }
            ?>
        </div>
    </div>
</body>
</html>