<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>testing</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            background-image: url('images/index-new.png');
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
            transition: background-image 0.5s ease-in-out;
            background-color: white;
            margin: 0;
            padding: 0;
            font-family: 'CustomFont';
        }
        body::-webkit-scrollbar {
            display: none;
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
        .container button:hover {
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
        .section {
            background-image: url('images/index-new.png');
            background-position: center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
            padding: 2vw;
            margin: 0;
            position: relative;
            z-index: 1;
            background: rgb(27, 27, 27);
        }
        .about-us {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 4vw;
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 1vw;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            margin: 4vw 0;
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.6s ease, transform 0.6s ease;
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
        }
        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% {
                transform: translateX(-50%) translateY(0);
            }
            40% {
                transform: translateX(-50%) translateY(-15px);
            }
            60% {
                transform: translateX(-50%) translateY(-7px);
            }
        }
    </style>
</head>
<body>

    <!-- First Section -->
    <div class="container">
        <div class="menu2">
            <button onclick="window.location.href = 'Choose_Account.html';">LOGIN</button> 
        </div>
    </div>

    <!-- Second Section -->
    <div class="section">
    <div class="scroll-indicator" id="scrollIndicator"><i class='fas fa-chevron-down' style='font-size:2.5vw;color:rgb(221, 83, 49)'></i></div>
        <div class="about-us" id="aboutUs1">
            <img src="images/bibliomania-logo-2.png" alt="About Us Image">
            <div class="text">
                <h2>What is ARS?</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque sit amet accumsan arcu. Curabitur lacinia nunc nec urna sollicitudin, nec gravida sapien consequat.</p>
            </div>
        </div>
    </div>

    <div class="section">
        <div class="about-us" id="aboutUs2">
            <div class="text">
                <h2>About Us</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque sit amet accumsan arcu. Curabitur lacinia nunc nec urna sollicitudin, nec gravida sapien consequat.</p>
            </div>
            <img src="images/bibliomania-logo-2.png" alt="About Us Image">
        </div>
    </div>

    <script src="assets/scripts.js"></script>
    <script>
        document.addEventListener('scroll', function() {
            const aboutUs1Section = document.getElementById('aboutUs1');
            const aboutUs2Section = document.getElementById('aboutUs2');
            const scrollIndicator = document.getElementById('scrollIndicator');
            const section1Top = aboutUs1Section.getBoundingClientRect().top;
            const section2Top = aboutUs2Section.getBoundingClientRect().top;
            const windowHeight = window.innerHeight;

            // Show or hide the about-us sections
            if (section1Top < windowHeight) {
                aboutUs1Section.classList.add('visible');
            }
            if (section2Top < windowHeight) {
                aboutUs2Section.classList.add('visible');
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
