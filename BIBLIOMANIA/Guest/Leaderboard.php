<?php
session_start();
include("../assets/conn.php");

if(!isset($_SESSION['studentID'])){
    header("location:Login_Page.php");
    exit;
}

$user_id = $_SESSION['studentID'];

$type = ($user_id[0] == 'S') ? 'student' : 'guest';

// Step 1: Query to get leaderboard data
$query = "
SELECT s.student_id AS id, s.name, 
       (sc.topic_1 + sc.topic_2 + sc.topic_3 + sc.topic_4) AS total_score
FROM student s
LEFT JOIN scores sc ON s.student_id = sc.student_id
GROUP BY s.student_id
UNION
SELECT g.guest_id AS id, g.name, 
       (sc.topic_1 + sc.topic_2 + sc.topic_3 + sc.topic_4) AS total_score
FROM guest g
LEFT JOIN scores sc ON g.guest_id = sc.guest_id
GROUP BY g.guest_id
ORDER BY total_score DESC;";

$result = mysqli_query($conn, $query);

// Step 2: Initialize variables
$leaderboard = [];
$user_rank = null;

// Step 3: Fetch leaderboard data and determine user rank
$rank = 1;
while($row = mysqli_fetch_assoc($result)) {
    $leaderboard[] = $row;

    if($row['id'] == $user_id) {
        $user_rank = $rank;
    }

    $rank++;
}

// Step 4: Display leaderboard data in the table
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Leaderboard</title>
    <link rel="stylesheet" href="../styles.css"> <!-- External CSS -->
    <style>
        /* Page Styling */
        body {
            margin: 0;
            padding: 0;
            background-image: url('../images/background_image.png');
            background-size: cover;
            background-position: center;
            font-family: 'CustomFont', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            color: #fff; /* Make text color contrast the dark background */
        }

        /* Flexbox layout for container */
        .container {
            display: flex;
            flex-direction: column;
            width: 100%;
            max-width: 1200px;
            height: 60%;
            padding: 20px;
            box-sizing: border-box;
            margin: auto;
        }

        /* Back Button */
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

        /* Main Content Layout */
        .content {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            align-items:center;
            flex-wrap: wrap;
            margin-top: 20px;
            
        }

        /* Current Rank Section */
        .current-rank {
            width: 30%;
            height: 40%;
            min-width: 250px;
            background-color: #DD5331;
            text-align: center;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
            animation: fadeInFromBelow 1s ease-out;
        }

        /* Leaderboard Section */
        .leaderboard {
            flex: 1;
            background-color: rgba(0, 0, 0, 0.8);
            padding: 20px;
            border-radius: 10px;
            margin-left: 20px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
            overflow-y: auto;
            max-height: 50vh;
        }

        .leaderboard table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 5vw;
            font-size: 1.3vw;
        }

        .leaderboard table th,
        .leaderboard table td {
            padding: 10px;
            border-bottom: 1px solid #fff;
            padding: 8px;
            /* background-color: rgb(50, 50, 50); */
            /* color: rgb(221, 83, 49); */
            text-align: center;
        }

        /* Fade in animation */
        @keyframes fadeInFromBelow {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .content {
                flex-direction: column;
                align-items: center;
            }

            .leaderboard {
                margin-left: 0;
                margin-top: 20px;
                width: 100%;
            }

            .podium {
                flex-direction: column;
                align-items: center;
            }

            .current-rank {
                margin-bottom: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="backbtn">
            <button onclick="history.back()">BACK</button>
        </div>
        <div class="content">
            <div class="current-rank">
                <h2>Your Rank</h2>
                <h1 id="rank" style="font-size: 3vw;"><?php echo $user_rank ? $user_rank . "th" : "Unranked"; ?></h1>
            </div>
            <div class="leaderboard">
                <h2></h2>
                <table id="leaderboard-table">
                    <thead>
                        <tr>
                            <th>Rank</th>
                            <th>Name</th>
                            <th>Score</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $rank = 1;
                        foreach($leaderboard as $entry) {
                            echo "<tr" . ($entry['id'] == $user_id ? " style='background-color: #DD5331; color: #fff;'" : "") . ">";
                            echo "<td width='80vw'>" . $rank . "</td>";
                            echo "<td width='370vw'>" . htmlspecialchars($entry['name']) . "</td>";
                            echo "<td>" . $entry['total_score'] . "</td>";
                            echo "</tr>";
                            $rank++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
    // Function to animate the rank count
    function animateRank(rank) {
        const rankElement = document.getElementById('rank');
        let currentRank = 1;
        const duration = 1000; // Duration of animation in milliseconds
        const incrementTime = Math.round(duration / rank);
        
        const timer = setInterval(function() {
            currentRank++;
            if (currentRank > rank) {
                clearInterval(timer);
            } else {
                rankElement.textContent = currentRank + 'th';
            }
        }, incrementTime);
    }

    // Start the animation with the user's rank
    document.addEventListener('DOMContentLoaded', function() {
        const userRank = <?php echo $user_rank ? $user_rank : 0; ?>;
        if (userRank > 0) {
            animateRank(userRank);
        }
    });
    </script>
</body>
</html>
