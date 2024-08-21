<?php
session_start();
include("../../assets/conn.php");
if(!isset($_SESSION['studentID'])){
    header("location:../Login_Page.php");
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $studentID = $_SESSION['studentID']; 
    $gameStatus = $_POST['status']; 
    if ($gameStatus == 'Game Completed'){
        header('location:Level_Complete_1.php');
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../styles.css">
    <title>The Maze Game</title>
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
        }

        .container {
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 80vw;
            height: 70vh;
            background-color: rgb(27, 27, 27);
            border: solid 2px rgb(221, 83, 49);
            color: rgb(221, 83, 49);
        }

        .backbtn, .pausebtn {
            position: absolute;
            top: 20px;
        }

        .backbtn {
            left: 20px;
        }

        .backbtn button {
            font-family: 'CustomFont';
            background-color: rgb(221, 83, 49);
            width: 10vw;
            height: 4vw;
            font-size: 20pt;
            color: rgb(0, 0, 0);
            border-radius: 1vw;
            border-color: rgb(0, 0, 0);
            transition: font-size 0.2s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
        }

        .backbtn button:hover {
            font-size: 22pt;
            background-color: rgb(27, 27, 27);
            color: rgb(221, 83, 49);
            -webkit-text-stroke: 0.1vw rgb(221, 83, 49);
            border-color: rgb(221, 83, 49);
        }

        .pausebtn {
            right: 20px;
        }

        .pausebtn a {
            display: block;
            width: 80px;
            height: 80px;
            background-color: rgb(27, 27, 27);
            border-radius: 100%;
            border: solid 2px rgb(221, 83, 49);
            position: relative;
            text-decoration: none;
            color: transparent;
            cursor: pointer;
        }

        .pausebtn a span {
            height: 40px;
            border-style: double;
            border-width: 0px 0px 0px 25px;
            border-color: rgb(221, 83, 49);
            position: absolute;
            top: 20%;
            left: 38%;
            transition: transform 0.2s;
        }

        .pausebtn a:hover {
            background-color: rgb(221, 83, 49);
        }

        .pausebtn a:hover span {
            border-color: rgb(27, 27, 27);
            transform: scale(1.2);
        }

        /* Modal Styling */
        .modal {
            display: none; /* Hidden by default */
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.5); /* Black background with opacity */
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            background-color: rgb(27, 27, 27);
            margin: auto;
            padding: 20px;
            border: solid 2px rgb(221, 83, 49);
            width: 300px;
            text-align: center;
            color: rgb(221, 83, 49);
            border-radius: 10px;
        }

        .modal-content h2 {
            margin-bottom: 20px;
        }

        .modal-content button {
            background-color: rgb(221, 83, 49);
            color: black;
            border: none;
            padding: 10px 20px;
            margin: 10px 0;
            cursor: pointer;
            width: 80%;
            font-size: 16pt;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .modal-content button:hover {
            background-color: rgb(27, 27, 27);
            color: rgb(221, 83, 49);
            border: 1px solid rgb(221, 83, 49);
        }

        .modal-content .close {
            color: rgb(221, 83, 49);
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .modal-content .close:hover,
        .modal-content .close:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
        }

        .gm {
            width: 100%;
            height: 100%;
            background-color: black;
        }
    </style>
</head>
<body>

    <div class="pausebtn">
        <a href="javascript:void(0);" onclick="openModal()">
            <span></span>
        </a>
    </div>

    <div class="backbtn">
        <button onclick="window.location.href = '../Slides_Library.php';">SLIDES</button>
    </div>

    <div class="container">
        <div class="gm" id="unity-container" class="unity-desktop">
            <canvas id="unity-canvas" width=960 height=600 tabindex="-1"></canvas>
            <div id="unity-loading-bar">
                <div id="unity-logo"></div>
                <div id="unity-progress-bar-empty">
                    <div id="unity-progress-bar-full"></div>
                </div>
            </div>
            <div id="unity-warning"></div>
            <div id="unity-footer">
                <div id="unity-webgl-logo"></div>
                <div id="unity-fullscreen-button"></div>
                <div id="unity-build-title">Maze Game</div>
            </div>
        </div>
    </div>

    <!-- Modal Menu -->
    <div id="pauseModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <h2>Pause Menu</h2>
            <button onclick="closeModal()">Play</button>
            <button class="button" onclick="window.location.href='Topic_1.php';">Restart</button>
            <button onclick="window.location.href='../Student_Menu.php';">Exit</button>
        </div>
    </div>

    <script>
        var modal = document.getElementById("pauseModal");
        function openModal() {
            modal.style.display = "flex"; 
        }
        function closeModal() {
            modal.style.display = "none";
        }
        window.onclick = function(event) {
            if (event.target == modal) {
                closeModal();
            }
        }
    </script>

    <!-- Unity WebGL Script -->
    <script>
<script>
    // Declare and initialize buildUrl at the start
    var buildUrl = "Build";

    var container = document.querySelector("#unity-container");
    var canvas = document.querySelector("#unity-canvas");
    var loadingBar = document.querySelector("#unity-loading-bar");
    var progressBarFull = document.querySelector("#unity-progress-bar-full");
    var fullscreenButton = document.querySelector("#unity-fullscreen-button");
    var warningBanner = document.querySelector("#unity-warning");

    function unityShowBanner(msg, type) {
        function updateBannerVisibility() {
            warningBanner.style.display = warningBanner.children.length ? 'block' : 'none';
        }
        var div = document.createElement('div');
        div.innerHTML = msg;
        warningBanner.appendChild(div);
        if (type == 'error') div.style = 'background: red; padding: 10px;';
        else {
            if (type == 'warning') div.style = 'background: yellow; padding: 10px;';
            setTimeout(function() {
                warningBanner.removeChild(div);
                updateBannerVisibility();
            }, 5000);
        }
        updateBannerVisibility();
    }

    var loaderUrl = buildUrl + "/Games.loader"; // No .gz extension for the loader file
    var config = {
        dataUrl: buildUrl + "/Games.data.gz", // Gzipped data file
        frameworkUrl: buildUrl + "/Games.framework.js.gz", // Gzipped framework file
        codeUrl: buildUrl + "/Games.wasm.gz", // Gzipped wasm file
        streamingAssetsUrl: "StreamingAssets",
        companyName: "DefaultCompany",
        productName: "Maze Game",
        productVersion: "1.0",
        showBanner: unityShowBanner,
    };

    if (/iPhone|iPad|iPod|Android/i.test(navigator.userAgent)) {
        var meta = document.createElement('meta');
        meta.name = 'viewport';
        meta.content = 'width=device-width, height=device-height, initial-scale=1.0, user-scalable=no, shrink-to-fit=yes';
        document.getElementsByTagName('head')[0].appendChild(meta);
        container.className = "unity-mobile";
        canvas.className = "unity-mobile";
    } else {
        canvas.style.width = "960px";
        canvas.style.height = "600px";
    }

    loadingBar.style.display = "block";

    var script = document.createElement("script");
    script.src = loaderUrl;
    script.onload = () => {
        createUnityInstance(canvas, config, (progress) => {
            progressBarFull.style.width = 100 * progress + "%";
        }).then((unityInstance) => {
            loadingBar.style.display = "none";
            fullscreenButton.onclick = () => {
                unityInstance.SetFullscreen(1);
            };
        }).catch((message) => {
            alert(message);
        });
    };
    document.body.appendChild(script);
</script>
    </script>
</body>
</html>
