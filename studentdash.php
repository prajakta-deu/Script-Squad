
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
    margin: 0;
    font-family: Arial, sans-serif;
    transition: background-color 0.3s, color 0.3s;
}

.container {
    display: flex;
    height: 100vh;
}

.sidebar {
    width: 250px;
    background-color: #212121; /* Dark Mode */
    padding: 20px;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

.profile-section {
    text-align: center;
    margin-bottom: 20px;
}

.profile-image {
    width: 80px;
    height: 80px;
    border-radius: 50%;
    margin-bottom: 10px;
}

h2 {
    font-size: 20px;
    margin: 0;
    color: white;
}

.edit-button {
    background-color: #ffcc00;
    border: none;
    padding: 5px 10px;
    color: black;
    cursor: pointer;
    margin-top: 10px;
}

.menu {
    list-style: none;
    padding: 0;
}

.menu li {
    padding: 10px 0;
    cursor: pointer;
    font-size: 18px;
    color: #b3b3b3; /* Light Gray */
    padding-left: 10px;
}

.theme-switch {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.theme-switch .switch {
    position: relative;
    display: inline-block;
    width: 40px;
    height: 20px;
}

.switch input {
    display: none;
}

.slider {
    position: absolute;
    cursor: pointer;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: #ccc;
    transition: 0.4s;
    border-radius: 20px;
}

.slider.round {
    border-radius: 50px;
}

.main-content {
    flex-grow: 1;
    padding: 20px;
    background-color: #f0f0f0; /* Light Mode */
}

.top-bar {
    display: flex;
    justify-content: space-between;
    margin-bottom: 20px;
}

input[type="text"] {
    width: 300px;
    padding: 10px;
    background-color: #e0e0e0;
    border: none;
    color: black;
    border-radius: 5px;
}

.logout-button {
    background-color: #ffcc00;
    color: black;
    border: none;
    padding: 10px 20px;
    cursor: pointer;
    border-radius: 5px;
}

.dashboard {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    grid-gap: 20px;
}

.widget {
    background-color: #f9f9f9;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
}

h3 {
    font-size: 18px;
    margin-bottom: 10px;
}

.progress {
    margin-top: 10px;
    font-size: 14px;
}

.download-button {
    background-color: #ffcc00;
    border: none;
    padding: 5px 10px;
    cursor: pointer;
}

.ai-image {
    width: 100%;
}

.bar-chart {
    display: flex;
    justify-content: space-between;
    align-items: flex-end;
}

.bar {
    width: 20px;
    background-color: #ffcc00;
    border-radius: 5px;

        </style>
</head>

<body class="dark-mode"> <!-- Change to class="light-mode" for light theme -->
    <div class="container">
        <div class="sidebar">
            <div class="profile-section">
                <img src="assets/profile.jpeg" alt="Profile" class="profile-image">
                <h2>Student</h2>
                <button class="edit-button" onclick="viewProfile()">View Profile</button>

            </div>
            <ul class="menu">
                <li>Dashboard</li>
                <li>Activity</li>
                <li>Schedule</li>
                <li>Settings</li>
            </ul>

        </div>

        <div class="main-content">
            <div class="top-bar">
                <input type="text" placeholder="Search something...">
                <button class="logout-button" onclick="logout()">Logout</button>
            </div>

            <div class="dashboard">
                <div class="widget attendance">
                    <h3>Attendance</h3>
                    <p>12K</p>
                    <div class="progress">
                        <span>Lectures attended: 78%</span><br>
                        <span>Lectures not attended: 22%</span>
                    </div>
                    <br>
                    <button class="logout-button" onclick="attendance()">Show </button>
                </div>
                <div class="widget exam-report">
                    <h3>Exam Report</h3>
                    <p>2024</p>
                    <button class="download-button">Download Report</button>
                </div>
                <div class="widget events">
                    <h3>Events</h3>
                    <p>23%</p>
                    <p>Coming soon</p>
                </div>
                <div class="widget assignments">
                    <h3>Assignments</h3>
                    <p>283%</p>
                    <p>Scheduled assignments</p>
                </div>
                <div class="widget assessments">
                    <h3>Assessments</h3>
                    <img src="ai-image.jpg" alt="AI" class="ai-image">
                </div>
                <div class="widget performance">
                    <h3>Academic Performance</h3>
                    <p>12.8%</p>
                    <div class="bar-chart">
                        <div class="bar" style="height: 50px;"></div>
                        <div class="bar" style="height: 40px;"></div>
                        <div class="bar" style="height: 60px;"></div>
                        <div class="bar" style="height: 30px;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
    function viewProfile() {
    // Assuming you want to view the profile of a specific student
    const studentId = 1; // Replace with dynamic ID if necessary
    window.location.href = `viewstud.php?id=${studentId}`;
}
function logout() {
    // Assuming you want to view the profile of a specific student
    window.location.href = `logout.php?`;
}
function attendance() {
    // Assuming you want to view the profile of a specific student
    window.location.href = `studattend.php?`;
}
    </script>

    <script src="script.js"></script> <!-- Optional: For toggle theme functionality -->
</body>

</html>