<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../assets/styles.css">
    <title>Ready Menu</title>
    <style>
        body {
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 500px;
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
            width: 90%;
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
    </style>
</head>
<body>

    <div class="backbtn">
        <button onclick="history.back()">BACK</button>
    </div>

    <div class="container">

        <div class="header">
            <p>BIBLIOMANIA</p>
        </div>

        <div class="content">
            <p>Play minigames to earn slides.</p> 
            <p>Study the slides for upcoming quizzes after the minigame.</p>
            <p>Do well enough correctly to move to the next level.</p>
            <p>If you do well enough, you'll face the final boss...</p>
        </div>

        <div class="playbtn">
            <a href="Game.html">
                <span></span>
            </a>
        </div>

    </div>
</body>
</html>