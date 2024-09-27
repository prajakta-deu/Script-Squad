<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Teacher Dashboard</title>
    <style>
        body {
    margin: 0;
    font-family: Arial, sans-serif;
}

.container {
    display: flex;
    height: 100vh;
    background-color: #1a1a1a;
    color: white;
}

.sidebar {
    width: 250px;
    background-color: #212121;
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

.menu {
    list-style: none;
    padding: 0;
}

.menu li {
    padding: 10px 0;
    cursor: pointer;
    font-size: 18px;
    color: #b3b3b3;
    padding-left: 10px;
}

.menu li:hover {
    color: #ffcc00; /* Highlight color on hover */
}

.theme-switch {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.top-bar {
    display: flex;
    justify-content: space-between;
    margin-bottom: 20px;
}

.top-bar input {
    width: 300px;
    padding: 10px;
    background-color: #2a2a2a;
    border: none;
    color: white;
    border-radius: 5px;
}

.upgrade-button {
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
    background-color: #2a2a2a;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
}

.widget h3 {
    font-size: 18px;
    margin-bottom: 10px;
}

.widget p {
    font-size: 24px;
    margin: 0;
}

.progress {
    margin-top: 10px;
    font-size: 14px;
}

.ai-image {
    width: 100%;
}

.bar-chart {
    display: flex;
    justify-content: space-between;
    align-items: flex-end;
}
    </style>
</head>
<body>
    <div class="container">
        <div class="sidebar">
            <div class="profile-section">
                <img src="path/to/profile.jpeg" alt="profile" class="profile-image">
                <h2>Teacher</h2>
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
                        <span>Lectures attended</span> <span>78%</span><br />
                        <span>Lectures not attended</span> <span>22%</span>
                        
                    </div>
                    <button class="Click" onclick="viewAttendance()">Show</button>
                </div>
                <div class="widget report">
                    <h3>Exam Report</h3>
                    <p>2024</p>
                    <button>Download Report</button>
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
                <div class="widget course-plan">
                    <h3>Course Plan</h3>
                    <button class="Click" onclick="viewCoursePlan()">Show</button>
                    <div class="bar-chart"></div>
                </div>
            </div>
        </div>
    </div>
    <script>
    function viewProfile() {
    // Assuming you want to view the profile of a specific student
    const studentId = 1; // Replace with dynamic ID if necessary
    window.location.href = `viewteacher.php?id=${studentId}`;
}
function viewCoursePlan() {
    // Assuming you want to view the profile of a specific student
    window.location.href = `lessonplanedit.html?`;
}
function viewAttendance() {
    // Assuming you want to view the profile of a specific student
    window.location.href = `attend.html?`;
}

function logout() {
    // Assuming you want to view the profile of a specific student
    window.location.href = `logout.php?`;
}

    </script>
</body>
</html>