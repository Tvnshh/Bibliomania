<?php
session_start();
include("../../assets/conn.php");
if(!isset($_SESSION['studentID'])){
    header("location:../Login_Page.php");
}
$current_page = basename($_SERVER['PHP_SELF']);

// Store the current page as the last accessed page in the session
$_SESSION['last_page'] = $current_page;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../styles.css">
    <title>Level Complete - The Maze Game</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            height: 100vh;
            overflow: hidden; /* Prevent scrolling */
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: rgb(27, 27, 27);
            font-family: 'CustomFont';
            color: rgb(221, 83, 49);
        }

        .container {
            position: relative;
            height: 80vh; /* Adjust this value if needed */
            padding-bottom: 100px; /* Ensure enough space for the buttons */
            text-align: left; /* Align content to the left */
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: flex-start;
            width: 80vw; /* Reduced width to make space for animation */
            background-color: rgb(27, 27, 27);
            border: solid 2px rgb(221, 83, 49);
            color: rgb(221, 83, 49);
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.5);
        }

        .actions {
            position: absolute;
            bottom: 20px; /* Adjust if necessary */
            left: 15%;
            right: 0;
            display: flex;
            justify-content: center; /* Center the buttons horizontally */
            gap: 20px;

        }
        .container button{
            width: 20vw;
            height: 5vw;
            background-color: rgb(221, 83, 49);
            color: black;
            border: none;
            padding: 15px 30px;
            font-size: 1.5vw;
            border-radius: 5px;
            cursor: pointer;
            text-transform: uppercase;
            transition: background-color 0.3s ease, color 0.3s ease, font-size 0.3s ease;

        }

        .container button:hover {
            font-size: 2.2vw;
            background-color: rgb(27, 27, 27);
            color: rgb(221, 83, 49);
            -webkit-text-stroke: 0.1vw rgb(221, 83, 49);
            border-color: rgb(221, 83, 49);
        }
        .header {
            font-size: 4vw;
            margin-bottom: 20px;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        .message {
            font-size: 1.7vw;
            margin-bottom: 30px;
            width: 50%;
            line-height: 1.5;
            right: 50%;
        }

        .score {
            font-size: 3vw;
            margin-bottom: 30px;
            font-weight: bold;
        }

        .actions {
            display: flex;
            justify-content: flex-start;
            gap: 20px;
        }

        .btn {
        }

        .btn:hover {
            font-size: 1.3vw;
            background-color: rgb(27, 27, 27);
            color: rgb(221, 83, 49);
            border: 1px solid rgb(221, 83, 49);
        }

        .btn:active {
            transform: scale(0.98);
        }


        /* Character Animation */
        .character-container {
            position: absolute;
            left: 60%;
            bottom: 23%;
            width: 35vw;
            height: 70vh;
            display: flex;
            align-items: center;
        }

        .character {
            left: 20%;
            width: 30%;
            height: auto;
            animation: moveSideToSide 3s linear infinite, jump 1s ease-in-out infinite;
        }

        @keyframes moveSideToSide {
            0%, 100% {
                transform: translateX(0);
            }
            50% {
                transform: translateX(100px);
        }
        @keyframes jump {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-50px);
        }
}

}

    </style>
</head>
<body>

    <div class="container">
        <div class="header">Level Complete!</div>

        <div class="message">Congratulations! You’ve successfully navigated through the Maze</div>
        <div class="message">Navigate to Slide Library to view the slides. Click the 'I'm ready' button if you would like to test your knowledge.</div>


        <!-- <div class="score">Your Score: 12345</div>display score data -->


        <div class="actions">
            <button class="btn" onclick="window.location.href='../Slide_Library_In_Game/Slides_Library.php';">Slide Library</button>
            <button class="btn" onclick="window.location.href='../Quiz/Topic_1.php';">I'm Ready</button>
            <button class="btn" onclick="window.location.href='Topic_1.php';" style="width:10vh;"><img src="../../images/reload.png" alt="Reload Button" style="height: 5vh;"></button>
            <button class="btn" onclick="window.location.href='../Student_Menu.php';" style="width:10vh;"><img src="../../images/logout.png" alt="Exit Button" style="height: 5vh;"></button>
        </div>
    </div>

    <!-- Character Animation -->
    <div class="character-container">
        <img src="../../images/Player.png" alt="Character" class="character" id="character">
    </div>
    <!-- JavaScript for character animation -->
    <!--<script>
        const character = document.getElementById('character');
        let direction = 1;
        let position = 0;
        let jumpHeight = 0;
        let jumping = false;

        function animateCharacter() {
            position += direction * 2; // Horizontal movement
            character.style.transform = translate(${position}px, ${jumpHeight}px);

            if (position > 100 || position < -100) { // Change these values for desired movement range
                direction *= -1;
                character.style.transform = scaleX(${direction}) translateY(${jumpHeight}px); // Flip character on direction change
            }

            // Make the character jump
            if (!jumping) {
                jumping = true;
                setTimeout(() => {
                    jumpHeight = -50; // Jump up
                    setTimeout(() => {
                        jumpHeight = 0; // Come back down
                        jumping = false;
                    }, 500); // Duration of the jump
                }, 1000); // Interval between jumps
            }

            requestAnimationFrame(animateCharacter);
        }

        animateCharacter();
    </script>-->

</body>
</html>