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
        .menu2 {
            display: flex;
            gap: 100px; /* Adds space between buttons */
            margin: auto;
            margin-bottom: 45px;
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
            <button onclick="window.location.href = 'Choose_Account.html';">START</button> 
        </div>
    </div>
    <script src="scripts.js"></script>
</body>
</html>
