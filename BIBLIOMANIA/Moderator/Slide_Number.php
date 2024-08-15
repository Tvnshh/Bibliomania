<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Slide Number</title>
    <link rel="stylesheet" href="../styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        body {
            color: rgb(221, 83, 49);
        }
        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            max-width: 80vw;
            margin: auto;
        }
        h1 {
            position: relative;
            top: 5vw;
            display: block;
            align-items: center;
            background-color: rgb(221, 83, 49);
            color: black;
            border-radius: 0.5vw;
            width: 35vw;
            height: 5vw;
            margin: auto;
            text-align: center;
            font-size: 3.3vw;
            margin-bottom: 10vw;
        }
        p {
            text-align: center;
            font-size: 2.5vw;
            margin-top: 12vw;
        }
        .backbtn{
            position: absolute;
            top: 10vw;
            left: 7vw;
        }
        .backbtn button {
            font-family: 'CustomFont';
            background-color: rgb(221, 83, 49);
            align-items: center;
            width: 11vw;
            height: 3.5vw;  
            justify-content: center;
            font-size: 2vw;
            color: rgb(0, 0, 0);
            border-radius: 0.5vw;
            border-color: rgb(0, 0, 0);
            transition: font-size 0.2s ease;
            display: flex;
            cursor: pointer;
        }
        .backbtn button:hover {
            font-size: 2.3vw;
            background-color: rgb(27, 27, 27);
            color: rgb(221, 83, 49);
            border-color: rgb(221, 83, 49);
        }
        .content {
            display: flex;
            flex-direction: row;
            gap: 3vw;
            align-items: center;
            width: 70vw;
            height: 20vw;
            margin: auto;
        }
        .slide {
            background-color: rgb(27, 27, 27);
            padding: 6vw;
            text-align: center;
            text-decoration: none;
            color: rgb(221, 83, 49);
            cursor: pointer;
            font-size:2.5vw;
            transition: background-color, font-size 0.2s;
            border: solid;
            margin: auto;
        }
        .slide:hover {
            background-color: rgb(221, 83, 49);
            color: rgb(27, 27, 27);
            font-size: 2.3vw;
        }
        .top-right-container {
            position: absolute;
            top: 6.2vw;
            right: 15.4vw;
            display: flex;
            align-items: center;
        }
        .top-right-container button {
            font-family: 'CustomFont';
            background-color: rgb(27, 27, 27);
            color: rgb(221, 83, 49);
            border: solid;
            border-color: rgb(221, 83, 49);
            cursor: pointer;
            border-radius: 1vw;
            font-size: 1.3vw; 
            position: absolute;
            left: 5.4vw; 
            width: 7vw;
            height: 3.5vw;
            transition: font-size 0.2s ease;
        }
        .top-right-container button:hover {
            font-size: 1.5vw;
            -webkit-text-stroke: 0vw;
        }
        .user-icon {
            cursor: pointer;
            font-size: 1.5vw;
        }
        .user-icon:hover {
            color: whitesmoke;
        }
    </style>
</head>
<body>
    <h1>Slides Library</h1>
    
    <div class="backbtn">
        <button onclick="window.history.back();">BACK</button>
    </div>

    <p>Select Slide:</p>

    <div class="container">
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
                    echo "<a href='View_Slide.php?slide_id={$row['slides_id']}' class='slide'>Slide $slideNumber</a>";
                    $slideNumber++; // Increment the slide counter
                }
            } else {
                echo "<p>No slides found for this topic.</p>";
            }
            $stmt->close();
            ?>
        </div>
    </div>

    <div class="top-right-container">
        <div class="user-icon">
            <span onclick="location.href='Mod_User_Profile.php'"><i style="font-size:3.5vw" class="fa">&#xf2bd;</i></span>
        </div>
        <button class="logout-button" onclick="location.href='../Logout_Page.php'">LOGOUT</button>  
    </div>
</body>
</html>
