<?php
// Dark mode logic - simple toggle via PHP session or variable
$isDarkMode = true;

function toggleTheme() {
    global $isDarkMode;
    $isDarkMode = !$isDarkMode;
}

// Handling the theme toggle
if (isset($_POST['toggle_theme'])) {
    toggleTheme();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: <?= $isDarkMode ? '#1a1a1a' : '#ffffff'; ?>;
            color: <?= $isDarkMode ? 'white' : 'black'; ?>;
        }
        .sidebar {
            width: 250px;
            background-color: <?= $isDarkMode ? '#212121' : '#f0f0f0'; ?>;
            padding: 20px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        .profile-section {
            text-align: center;
            margin-bottom: 20px;
        }
        .profile-section img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            margin-bottom: 10px;
        }
        .menu {
            list-style: none;
            padding: 0;
        }
        .menu li {
            padding: 10px 0;
            cursor: pointer;
            font-size: 18px;
            color: <?= $isDarkMode ? '#b3b3b3' : '#333'; ?>;
        }
        .theme-switch {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .main-content {
            flex-grow: 1;
            padding: 20px;
        }
        .dashboard {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            grid-gap: 20px;
        }
        .widget {
            background-color: <?= $isDarkMode ? '#2a2a2a' : '#f9f9f9'; ?>;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }
        .bar {
            background-color: #ffcc00;
            border-radius: 5px;
        }
    </style>
</head>
<body>

    <div style="display: flex; height: 100vh;">
        <div class="sidebar">
            <div class="profile-section">
                <img src="profile.jpeg" alt="profile" />
                <h2>Admin</h2>
                <button>Edit</button>
            </div>
            <ul class="menu">
                <li>Dashboard</li>
                <li>Activity</li>
                <li>Schedule</li>
                <li>Settings</li>
            </ul>
            <div class="theme-switch">
                <span>Light</span>
                <form method="post">
                    <label>
                        <input type="checkbox" name="toggle_theme" <?= !$isDarkMode ? 'checked' : ''; ?> onchange="this.form.submit()" />
                        Toggle
                    </label>
                </form>
                <span>Dark</span>
            </div>
        </div>

        <div class="main-content">
            <div class="top-bar" style="display: flex; justify-content: space-between;">
                <input type="text" placeholder="Search something..." style="width: 300px; padding: 10px;" />
                <button>Logout</button>
            </div>

            <div class="dashboard">
                <div class="widget">
                    <h3>Attendance</h3>
                    <p>12K</p>
                    <div>
                        <span>Lectures attended: 78%</span><br />
                        <span>Lectures not attended: 22%</span>
                    </div>
                </div>
                <div class="widget">
                    <h3>Faculty Feedback</h3>
                    <p>2024</p>
                    <button>Download Report</button>
                </div>
                <div class="widget">
                    <h3>Events</h3>
                    <p>23%</p>
                    <p>Coming soon</p>
                </div>
                <div class="widget">
                    <h3>Database</h3>
                    <p>283%</p>
                    <p>Click to view</p>
                </div>
                <div class="widget">
                    <h3>Assessments</h3>
                    <img src="ai-image.jpg" alt="AI" style="width: 100%;" />
                </div>
                <div class="widget">
                    <h3>Syllabus Coverage</h3>
                    <p>12.8%</p>
                    <div style="display: flex; justify-content: space-between;">
                        <div class="bar" style="width: 20px; height: 50px;"></div>
                        <div class="bar" style="width: 20px; height: 40px;"></div>
                        <div class="bar" style="width: 20px; height: 60px;"></div>
                        <div class="bar" style="width: 20px; height: 30px;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>