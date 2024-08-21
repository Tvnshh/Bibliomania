<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ARS Gamified Learning System</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            background-image: url('images/index.png');
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
        .container {
            display: flex;
            justify-content: flex-end;
            align-items: flex-end;
            height: 95vh;
        }
        .container button {
            font-family: 'CustomFont';
            position: relative;
            background-color: rgb(221, 83, 49);
            display: flex;
            align-items: center;
            width: 32vw;
            height: 8vw;  
            display: flex;
            justify-content: center;
            font-size: 4vw;
            color: rgb(27, 27, 27);
            border-radius: 1vw;
            border-color: rgb(0, 0, 0);
            transition: font-size 0.2s ease;
            cursor: pointer;
        }
        .container button:hover{
            font-size: 4.3vw;
            background-color: rgb(27, 27, 27);
            color: rgb(221, 83, 49);
            -webkit-text-stroke: 0.1vw rgb(221, 83, 49);
            border-color: rgb(221, 83, 49);
        }
        .menu2 {
            display: flex;
            margin: auto;
            margin-bottom: 3vw;
        }
        .menu2 button {
            cursor: pointer;
            width: 25vw;
            height: 7vw; 
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="menu2">
            <button onclick="window.location.href = 'auth/Choose_Account.html';">LOGIN</button> 
        </div>
    </div>
    <script src="assets/scripts.js"></script>
</body>
</html>
