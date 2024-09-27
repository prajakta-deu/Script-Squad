
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart Campus</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
        }

        .landing-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            transition: background-color 0.3s, color 0.3s;
            min-height: 100vh;
        }

        .dark {
            background-color: #121212;
            color: #ffffff;
        }

        .light {
            background-color: #ffffff;
            color: #000000;
        }

        .header {
            width: 100%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 50px;
        }

        .logo {
            font-size: 24px;
            font-weight: bold;
            color: #ffcc00;
        }

        .auth-buttons {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .button {
            background-color: #ffcc00;
            color: #121212;
            border: none;
            border-radius: 4px;
            padding: 10px 15px;
            cursor: pointer;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .button:hover {
            background-color: #e0b800;
        }

        .theme-toggle {
            background-color: #ffcc00;
            border: none;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            cursor: pointer;
            font-size: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: background-color 0.3s;
        }

        .theme-toggle:hover {
            background-color: #808080;
        }

        .hero {
            position: relative;
            height: 50vh;
            overflow: hidden;
        }

        .carousel-caption {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            color: #ffcc00;
            z-index: 10;
        }

        .features-section {
            padding: 50px 20px;
            text-align: center;
        }

        .features-section-title {
            margin-bottom: 30px;
            color: #ffcc00;
        }

        .features-container {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            gap: 20px;
        }

        .feature-card {
            background-color: #1f1f1f;
            border: 2px solid #ffcc00;
            border-radius: 10px;
            padding: 20px;
            flex: 1 1 180px;
            transition: transform 0.3s;
            min-width: 180px;
        }

        .feature-card:hover {
            transform: scale(1.05);
        }

        .footer {
            width: 100%;
            text-align: center;
            padding: 10px 0;
        }
    </style>
</head>
<body class="dark">
    <div class="landing-container">
        <header class="header">
            <div class="logo">Smart Campus</div>
            <div class="auth-buttons">
                <button class="button" onclick="register()">Register</button>
                <button class="button" onclick="login()">Login</button>
                <button class="theme-toggle" id="theme-toggle">🌙</button>
            </div>
        </header>

        <section class="hero">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="2000">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="assests\a1.jpg" alt="First slide">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Welcome to Smart Campus</h5>
                            <p>Manage student profiles efficiently with our user-friendly interface.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="assests\a2.jpg" alt="Second slide">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Welcome to Smart Campus</h5>
                            <p>Manage student profiles efficiently with our user-friendly interface.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="assests\a3.jpg" alt="Third slide">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Welcome to Smart Campus</h5>
                            <p>Manage student profiles efficiently with our user-friendly interface.</p>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </section>

        <section class="features-section">
            <h2 class="features-section-title">Features</h2>
            <div class="features-container">
                <div class="feature-card">
                    <h3>Comprehensive Profiles</h3>
                    <p>Create and manage detailed student profiles.</p>
                </div>
                <div class="feature-card">
                    <h3>Secure Data Storage</h3>
                    <p>Your data is safe with our secure storage solutions.</p>
                </div>
                <div class="feature-card">
                    <h3>User-Friendly Interface</h3>
                    <p>Navigate easily through our intuitive interface.</p>
                </div>
                <div class="feature-card">
                    <h3>Multi-User Support</h3>
                    <p>Support for multiple users for collaborative management.</p>
                </div>
            </div>
        </section>

        <footer class="footer">
            <p>© 2024 Smart Campus. All Rights Reserved.</p>
        </footer>
    </div>

    <script>
        document.getElementById('theme-toggle').addEventListener('click', function () {
            document.body.classList.toggle('dark');
            document.body.classList.toggle('light');
            this.textContent = document.body.classList.contains('dark') ? '🌙' : '☀️';
        });

        function register() {
    // Assuming you want to view the profile of a specific student
    window.location.href = `register.php?`;
}
function login() {
    // Assuming you want to view the profile of a specific student
    window.location.href = `login.php?`;
}
    </script>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>