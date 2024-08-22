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
        header('location:Level_Complete_3.php');
    }
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
    <title>Space Dash</title>
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
        .nextbtn {
            margin-top: 10px; /* Space between iframe and button */
            text-align: center;
        }

        .nextbtn button {
            font-family: 'CustomFont';
            background-color: rgb(221, 83, 49);
            width: 10vw;
            height: 4vw;
            font-size: 20pt;
            color: rgb(0, 0, 0);
            border-radius: 1vw;
            border-color: rgb(0, 0, 0);
            transition: font-size 0.2s ease;
            cursor: pointer;
        }

        .nextbtn button:hover {
            font-size: 22pt;
            background-color: rgb(27, 27, 27);
            color: rgb(221, 83, 49);
            -webkit-text-stroke: 0.1vw rgb(221, 83, 49);
            border-color: rgb(221, 83, 49);
        }

    </style>
</head>
<body>

    <div class="pausebtn">
        <a href="javascript:void(0);" onclick="openModal()">
            <span></span>
        </a>
    </div>
    <div class="container">
        <div class="gm">
            <iframe src="Game_3_Build/index.html" scrolling="no" style="width: 100%; height: 100%;"></iframe>
        </div>
        <div class="nextbtn">
            <form id="checkpointForm" action="../Unity_PHP/setData.php" method="post">
                <input type="hidden" name="userID" id="userID" value="<?php echo $_SESSION['studentID'];?>">
                <input type="hidden" name="checkpointID" id="checkpointID" value="T003">
            </form>
        <button type="button" onclick="submitCheckpoints()">Next</button>
        </div>
    </div>

    <!-- Modal Menu -->
    <div id="pauseModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <h2>Pause Menu</h2>
            <button onclick="closeModal()">Play</button>
            <button class="button" onclick="window.location.href='Topic_3.php';">Restart</button>
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
    <script>
        function submitCheckpoints() {
            const checkpoints = ['SL007_1','SL007_2','SL007_3','SL008_1','SL008_2','SL008_3','SL009_1','SL009_2','SL009_3']; // Array of all checkpoint IDs
            const form = document.getElementById('checkpointForm');
            const checkpointInput = document.getElementById('checkpointID');
            let currentIndex = 0;

            function submitNext() {
                if (currentIndex < checkpoints.length) {
                    checkpointInput.value = checkpoints[currentIndex];
                    currentIndex++;
                    
                    // Submit the form using XMLHttpRequest to avoid page refresh
                    const xhr = new XMLHttpRequest();
                    xhr.open("POST", form.action, true);
                    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

                    xhr.onreadystatechange = function () {
                        if (xhr.readyState === 4 && xhr.status === 200) {
                            // Proceed to the next checkpoint
                            submitNext();
                        }
                    };

                    // Prepare form data
                    const formData = new FormData(form);
                    const params = new URLSearchParams(formData).toString();
                    xhr.send(params);
                } else {
                    // Redirect or perform another action after all submissions are done
                    window.location.href = 'Level_Complete_3.php';
                }
            }

            // Start the submission loop
            submitNext();
        }

        function checkGameEndStatus() {
            var gameEnded = localStorage.getItem('GameEnded'); 
            if (gameEnded == '1') {
                window.location.href = 'Level_Complete_3.php'; 
                localStorage.setItem('GameEnded', 0);
                console.log("Game has ended!");
            }
        }
        setInterval(checkGameEndStatus, 1000);
    </script>
    </body>
</html>
