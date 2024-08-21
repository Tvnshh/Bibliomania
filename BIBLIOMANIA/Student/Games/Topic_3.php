<?php
session_start();
include("../../assets/conn.php");
if(!isset($_SESSION['studentID'])){
    header("location:../Login_Page.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../styles.css">
    <title>Space Dash</title>
    <style>
        body {
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 100vh;
            margin: auto;
            text-align: center;
            padding-top: 100px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .backbtn{
            position: absolute;
        }
        .backbtn button {
            font-family: 'CustomFont';
            margin-top: 150px;
            margin-left: 90px;
            background-color: rgb(221, 83, 49);
            align-items: center;
            width: 15vw;
            height: 4.5vw;  
            justify-content: center;
            font-size: 30pt;
            color: rgb(0, 0, 0);
            border-radius: 1vw;
            border-color: rgb(0, 0, 0);
            transition: font-size 0.2s ease;
            display: flex;
            cursor: pointer;
        }
        .backbtn button:hover {
            font-size: 35pt;
            background-color: rgb(27, 27, 27);
            color: rgb(221, 83, 49);
            -webkit-text-stroke: 0.1vw rgb(221, 83, 49);
            border-color: rgb(221, 83, 49);
        }

        .header {
            background-color: rgb(221, 83, 49);
            display: flex;
            align-items: center;
            justify-content: center;
            width: 25vw;
            height: 6vw;  
            font-size: 30pt;
            color: black;
            border-radius: 1vw;
            border-color: rgb(221, 83, 49);
            margin-bottom: 5px;
        }
        
        .content {
            color: rgb(221, 83, 49);
            background-color: rgb(27, 27, 27);
            border: solid;
            border-color: rgb(221, 83, 49);
            border-radius: 0;
            width: 100%;
            height: 400px;
            padding: 0px 5px 0px 10px;
            font-size: 23pt;
        }
        .content p {
            text-align: left;
            margin-top: 0;
            margin-bottom: 20px;
        }
        .playbtn {
            display: inline-block;
        }

        .playbtn a {
            display: block;
            width: 100px;
            height: 100px;
            background-color: rgb(27, 27, 27);
            border-radius: 100%;
            border: solid;
            position: relative;
            text-indent: 0;
            text-decoration: none;
            color: transparent;
            cursor: pointer;
        }

        .playbtn a span {
            width: 0;
            height: 0;
            border-top: 30px solid transparent;
            border-left: 45px solid rgb(221, 83, 49);
            border-bottom: 30px solid transparent;
            position: absolute;
            top: 20%;
            left: 36%;
            transition: transform 0.2s
        }

        .playbtn a:hover {
            background-color: rgb(221, 83, 49);
        }

        .playbtn a:hover span {
            border-left: 45px solid rgb(27, 27, 27);
            transform: scale(1.2)
        }

        .section {
            /* background-image: url('../../images/index-new.png'); */
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
            padding: 2vw;
            margin: 0;
            position: relative;
            z-index: 1;
            background: black;
        }
        .about-us {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 4vw;
            background-color: #491105;
            border-radius: 1vw;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            margin: 4vw 0;
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 2.5s ease, transform 0.6s ease;
        }
        .about-us img {
            width: 40%;
            border-radius: 1vw;
        }
        .about-us .text {
            width: 55%;
        }
        .about-us.visible {
            opacity: 1;
            transform: translateY(0);
        }
        .scroll-indicator {
            position: fixed;
            bottom: -0.5vw;
            left: 50%;
            transform: translateX(-50%);
            padding: 0.5vw 1vw;
            font-size: 1.5vw;
            font-weight: bold;
            opacity: 1;
            transition: opacity 0.6s ease, transform 0.6s ease;
            animation: bounce 1.5s infinite;
        }    </style>
</head>
<body>

    <div class="backbtn">
        <button onclick="location.href='../Student_Menu.php'">BACK</button>
    </div>

    <div class="container">

        <div class="header">
            <p>Space Dash</p>
        </div>

        <div class="content">
            <p>Navigate through space debree by flapping your spaceship to avoid collisions.</p> 
            <p>Reach checkpoints to unlock new slides.</p>
            <p>Maintain your flight by using the SPACE key.</p>
        </div>

        <div class="playbtn">
            <a href="Space_Dash.php">
                <span></span>
            </a>
        </div>
    </div>
    <div class="section">
        <div class="scroll-indicator" id="scrollIndicator"><i class='fas fa-chevron-down' style='font-size:2.5vw;color:rgb(221, 83, 49)'></i></div>
        <div class="about-us" id="aboutUs1">
            <img src="../../images/maze.png" alt="About Us Image">
            <div class="text">
            <h2>How to play <br><span style="font-size:10vh;">SPACE DASH?</span></h2>
            <p style="font-size:3vh;">After navigating the dark maze and gliding through Slide and Splash, you now venture into the depths of space with Space Dash. As a skilled space pilot, you must guide your spaceship through an asteroid field, dodging obstacles and reaching checkpoints to enhance your ship’s capabilities. Your goal is to keep your ship soaring through the stars, overcoming challenges and unlocking new galaxies as you continue your interstellar adventure.</p>
        </div>
    </div>

    <script>
    document.addEventListener('scroll', function() {
        const aboutUs1Section = document.getElementById('aboutUs1');
        const scrollIndicator = document.getElementById('scrollIndicator');
        const section1Top = aboutUs1Section.getBoundingClientRect().top;
        const windowHeight = window.innerHeight;

        // Show or hide the about-us sections
        if (section1Top < windowHeight) {
            aboutUs1Section.classList.add('visible');
        }

        // Adjust the background position and change image based on scroll
        const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
        document.body.style.backgroundPosition = `center ${-scrollTop * 1}px`;

        // Fade out the scroll indicator as user scrolls down
        if (scrollTop > 20) { // Change this value to adjust when the text should fade out
            scrollIndicator.style.opacity = '0';
            scrollIndicator.style.transform = 'translateX(-50%)';
        } else {
            scrollIndicator.style.opacity = '1';
            scrollIndicator.style.transform = 'translateX(-50%)';
        }
    });
    </script>
</body>
</html>